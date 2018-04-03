<div class='page-topbar no-print'>
    <div class='logo-area'>
    </div>
    <div class='quick-area'>
        <div class='pull-left'>
            <ul class="info-menu left-links list-inline list-unstyled">
                <li class="sidebar-toggle-wrap">
                    <a href="#" data-toggle="sidebar" class="sidebar_toggle">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
                <li class="notify-toggle-wrapper">
                    <a href="#" data-toggle="dropdown" class="toggle">
                        <i class="fa fa-credit-card"></i>
                        <span class="badge badge-accent"><?php echo count($newInforms) ?></span>
                    </a>
                    <ul class="dropdown-menu notifications animated fadeIn">
                        <li class="total">
                            <span class="small">
                                คุณมี <strong><?php echo count($newInforms) ?></strong> การแจ้งเตือนชำระเงินมาใหม่
                                <a href="/informs" class="pull-right">ดูทั้งหมด</a>
                            </span>
                        </li>
                        <li class="list">

                            <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                                <?php foreach ($newInforms as $newInform) {
                                    ?>
                                    <li class="unread available">
                                        <a href="/orders/view/<?php echo $newInform['Order']['id'] ?>">
                                            <div class="notice-icon">
                                                <i class="fa fa-credit-card"></i>
                                            </div>
                                            <div>
                                                <div class="name">
                                                    <strong>ใบสั่งซื้อเลขที่ <?php echo $newInform['Order']['order_no'] ?></strong>
                                                    <div class="time small"><?php echo $this->Phonlamai->timeAgo($newInform['InformPayment']['payment_date']) ?></div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                <?php 
                            } ?>
                            </ul>

                        </li>

                        <!-- <li class="external">
                            <a href="/informs">
                                <span>ดูทั้งหมด</span>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <li class="notify-toggle-wrapper">
                    <a href="#" data-toggle="dropdown" class="toggle">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="badge badge-accent"><?php echo count($newOrders) ?></span>
                    </a>
                    <ul class="dropdown-menu notifications animated fadeIn">
                        <li class="total">
                            <span class="small">
                                มี <strong><?php echo count($newOrders) ?></strong> รายการสั่งซื้อใหม่
                                <a href="/orders" class="pull-right">ดูทั้งหมด</a>
                            </span>
                        </li>
                        <li class="list">

                            <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                            <?php foreach ($newOrders as $newOrder) { 
                                ?>
                                <li class="unread available"> <!-- available: success, warning, info, error -->
                                    <a href="/orders/view/<?php echo $newOrder['Order']['id'] ?>">
                                        <div class="notice-icon">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                        <div>
                                                <div class="name">
                                                    <strong>คุณ <?php echo $newOrder['Customer']['first_name'].' '.$newOrder['Customer']['last_name'] ?></strong>
                                                    <div class="time">ยอด <?php echo number_format($newOrder['Order']['summary']) ?> บาท</div>
                                                    <div class="time small"><?php echo $this->Phonlamai->timeAgo($newOrder['Order']['order_date']) ?></div>
                                                </div>
                                        </div>
                                    </a>
                                </li>
                                <?php 
                            } ?>
                            </ul>
                        </li>

                        <!-- <li class="external">
                            <a href="/orders">
                                <span>ดูทั้งหมด</span>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <li class="notify-toggle-wrapper">
                    <a href="#" data-toggle="dropdown" class="toggle">
                        <i class="fa fa-remove"></i>
                        <span class="badge badge-accent"><?php echo count($refundedItems) ?></span>
                    </a>
                    <ul class="dropdown-menu notifications animated fadeIn">
                        <li class="total">
                            <span class="small">
                                    มี <strong><?php echo count($refundedItems) ?></strong> รายการสขอยกเลิกสินค้า
<!--                                <a href="/orders" class="pull-right">ดูทั้งหมด</a>-->
                            </span>
                        </li>
                        <li class="list">

                            <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                                <?php foreach ($refundedItems as $refundedItem) {
                                    ?>
                                    <li class="unread available"> <!-- available: success, warning, info, error -->
                                        <a href="/orders/view/<?php echo $refundedItem['OrderDetail']['order_id'] ?>">
                                            <div class="notice-icon">
                                                <i class="fa fa-shopping-cart"></i>
                                            </div>
                                            <div>
                                                <div class="name">
                                                    <strong>คุณ <?php echo $refundedItem['Customer']['first_name'].' '.$refundedItem['Customer']['last_name'] ?></strong>
                                                    <div class="time">ยอด <?php echo number_format($refundedItem['OrderDetail']['total_price']) ?> บาท</div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <?php
                                } ?>
                            </ul>
                        </li>

                        <!-- <li class="external">
                            <a href="/orders">
                                <span>ดูทั้งหมด</span>
                            </a>
                        </li> -->
                    </ul>
                </li>
                </li>
            </ul>
        </div>
        <div class='pull-right'>
            <ul class="info-menu right-links list-inline list-unstyled">
                <li class="profile">
                    <a href="#" data-toggle="dropdown" class="toggle">
                        <img src="/data/profile/profile-ecommerce.jpg" alt="user-image" class="img-circle img-inline">
                        <?php $user = $this->Session->read('Auth'); ?>
                        <span><?php echo $user['User']['first_name'] . ' ' . $user['User']['last_name'] ?> <i
                                    class="fa fa-angle-down"></i></span>
                    </a>
                    <ul class="dropdown-menu profile animated fadeIn">
                        <!-- <li>
                            <a href="#settings">
                                <i class="fa fa-wrench"></i>
                                Settings
                            </a>
                        </li>
                        <li>
                            <a href="#profile">
                                <i class="fa fa-user"></i>
                                Profile
                            </a>
                        </li>
                        <li>
                            <a href="#help">
                                <i class="fa fa-info"></i>
                                Help
                            </a>
                        </li> -->
                        <li class="last">
                            <a href="/logout">
                                <i class="fa fa-lock"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

</div>