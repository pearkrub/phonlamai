<?php
/**
 * Created by PhpStorm.
 * User: praibool
 * Date: 24/2/2018 AD
 * Time: 12:42
 */

class OrdersController extends AppController
{
    public $uses = array('Product', 'Order', 'CustomerAddress', 'OrderDetail', 'InformPayment');

    public function index() {
        $this->layout = 'cart';
        $auth = $this->Session->read('Auth');
        if(empty($auth)){
            $this->redirect('/');
        }
        $orders = $this->Order->find('all', array(
            'conditions' => array(
                'Order.customer_id' => $auth['Customer']['id']
            ),
            'order' => array('Order.id desc')
        ));
        $this->set('orders', $orders);
    }

    public function view($id) {
        $this->layout = 'cart';
        $auth = $this->Session->read('Auth');
        if(empty($auth)){
            $this->redirect('/');
        }

        if(empty($id)){
            $this->redirect('/');
        }
        $order = $this->Order->find('first', array(
            'conditions' => array(
                'Order.customer_id' => $auth['Customer']['id'],
                'Order.id' => $id
            ),
            'recursive' => 3
        ));
        $this->set('order', $order);
    }

    public function create()
    {
        $this->autoRender = false;
        $customer = $this->Session->read('Auth');

        $data = $this->request->data;
        $carts = $this->Session->read('carts');
        $shippingAddressId = $this->Session->read('shippingAddressId');
        $payment_method = $data['payment_method'];
        $product_ids = array();
        $products = array();

        foreach ($carts as $key => $cart) {
            $product_ids[] = $key;
        }
        if (!empty($product_ids)) {
            $products = $this->Product->find('all', array(
                'conditions' => array(
                    'Product.id' => $product_ids
                ),
                'recursive' => 0
            ));
        }

        $error['error'] = [];

        $outOfStocks = $this->checkProduct($products);
        if (!empty($outOfStocks)) {
            $error['error'] = join(',', $outOfStocks);

            return json_encode($error);
        }

        $address = $this->CustomerAddress->findById($shippingAddressId);
        $order['order_no'] = $this->getOrderNo();
        $order['order_date'] = date('Y-m-d H:i:s');
        $order['status'] = 'new_order';
        $order['customer_id'] = $customer['Customer']['id'];
        $order['payment_method'] = $payment_method;
        $order['shipping_address'] = json_encode($address);
        if ($this->Order->save($order)) {

            $order_id = $this->Order->getLastInsertId();
            $total = 0;
            foreach ($products as $key => $product) {
                $order_detail = array();
                $order_detail['order_id'] = $order_id;
                $order_detail['product_id'] = $product['Product']['id'];
                $order_detail['customer_id'] = $customer['Customer']['id'];
                $order_detail['merchant_id'] = $product['Product']['merchant_id'];
                $order_detail['count'] = $carts[$product['Product']['id']]['qty'];
                $order_detail['normal_price'] = $carts[$product['Product']['id']]['qty'] * $product['Product']['normal_price'];
                $order_detail['total_price'] = $carts[$product['Product']['id']]['qty'] * $product['Product']['price'];
                $order_detail['product_name'] = $product['Product']['name'];
                $order_detail['product_detail'] = $product['Product']['detail'];
                $order_detail['category_id'] = $product['Product']['category_id'];
                $order_detail['price'] = $product['Product']['price'];
                $order_detail['available_date'] = date('Y-m-d', strtotime("+" . $product['Product']['category_id'] . " months"));
                $this->OrderDetail->create();
                $this->OrderDetail->save($order_detail);
                $total = $total + ($carts[$product['Product']['id']]['qty'] * $product['Product']['price']);

                $updateProduct = array();
                $updateProduct['id'] = $product['Product']['id'];
                $updateProduct['quantity'] = intval($product['Product']['quantity']) - intval($carts[$product['Product']['id']]['qty']);

                $this->Product->save($updateProduct);
            }

            $order = array();
            $order['id'] = $order_id;
            $order['summary'] = $total;
            $order['total_price'] = $total;
            if ($this->Order->save($order)) {
                $this->Session->delete('carts');
                $this->Session->delete('shippingAddressId');
            }
        }

        return json_encode(['id' => base64_encode($order_id)]);
    }

    public function getOrderNo()
    {
        $order = $this->Order->find('first', array(
            'order' => array(
                'Order.id desc'
            )
        ));
        $year = date('Y');
        $mounth = date('m');
        if (!empty($order)) {
            $running = sprintf("%'.05d", intval($order['Order']['id']) + 1);
            return 'INV' . $year . $mounth . $running;
        } else {
            return 'INV' . $year . $mounth . '00001';
        }
    }

    /**
     * @return array
     */
    public function success($id = null)
    {
        $this->layout = 'success';
        if (!empty($id)) {
            $id = base64_decode($id);
            $order = $this->Order->find('first', array(
                'conditions' => array(
                    'Order.id' => $id

                ),
                'recursive' => 3
            ));
            $this->set('order', $order);
        } else {
            $this->redirect('/');
        }
    }

    /**
     * @return array
     */
    public function checkProduct($products = null)
    {
        $carts = $this->Session->read('carts');
        $error = array();
        foreach ($products as $key => $product) {
            if ($product['Product']['quantity'] < $carts[$product['Product']['id']]['qty']) {
                $error[] = ' ' . $product['Product']['name'] . ' ขาด ' . intval($carts[$product['Product']['id']]['qty'] - $product['Product']['quantity']) . ' ' . $product['Product']['price_per_key'];
            }
        }

        return $error;
    }

    /**
     * @return array
     */
    public function informPayment()
    {
        $this->layout = 'cart';

        if($this->request->is('post')) {
            $data = $this->request->data;
            $auth = $this->Session->read('Auth');
            $order = $this->Order->find('first', array(
                'conditions' => array(
                    'Order.customer_id' => $auth['Customer']['id'],
                    'Order.order_no' => $data['order_no']
                ),
                'recursive' => 3
            ));
            if(!empty($order)) {
                $inform['order_id'] = $order['Order']['id'];
                $inform['payment_date'] = $data['payment_date'].':00';
                $inform['amount'] = $data['amount'];
                $file = $_FILES['document'];
                $type = explode('.', $file['name']);
                $file_name = $this->uniqid_base36(true) . '.' . end($type);
                $target_file = 'files/inform/' . $file_name;
                if (move_uploaded_file($file["tmp_name"], $target_file)) {
                    $inform['document_path'] = $target_file;
                    if ($this->InformPayment->save($inform)) {
                        $this->set('response', 'success');
                    }
                }else{
                    $this->set('response', 'errorUpload');
                }
            }else{
                $this->set('response', 'emptyOrder');
            }
        }
    }

    public function uniqid_base36($more_entropy = false)
    {
        $s = uniqid('', $more_entropy);
        if (!$more_entropy)
            return base_convert($s, 16, 36);

        $hex = substr($s, 0, 13);
        $dec = $s[13] . substr($s, 15); // skip the dot
        return base_convert($hex, 16, 36) . base_convert($dec, 10, 36);
    }
}