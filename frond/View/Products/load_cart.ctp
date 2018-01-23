<?php if (empty($cart_products)) {
    ?>
    ไม่มีสินค้าในตะกร้า
    <?php
} ?>
<?php foreach ($cart_products as $product) { ?>
    <li>
        <a href="/products/view/<?php echo $product['id'] ?>" class="product-image">
            <img src="<?php echo Configure::read('Portal.Domain') .$product['image'] ?>" alt="Sample Product ">
        </a>
        <div class="product-details">
            <div class="close-icon">
                <a title="ลบสินค้าอกจากตะกร้า" onclick="removeProductInCart(<?php echo $product['id'] ?>)" href="javascript:void(0);"><i class="fa fa-close"></i></a>
            </div>
            <p class="product-name">
                <a href="/products/view/<?php echo $product['id'] ?>"><?php echo $product['name'] ?></a>
            </p>
            <strong><?php echo $product['qty'] ?></strong> x <span class="price text-primary"><?php echo $product['price'] ?> บ.</span>
        </div><!-- end product-details -->
    </li><!-- end item -->
<?php } ?>