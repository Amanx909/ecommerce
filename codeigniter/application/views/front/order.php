<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shofy - Multipurpose eCommerce HTML Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/favicon.png">
    <?php $this->load->view('front/links');?>
</head>
<body>
    <?php $this->load->view('front/header');?>
    <main>

        <!-- breadcrumb area start -->
        <section class="breadcrumb__area include-bg pt-95 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__content p-relative z-index-1">
                            <h3 class="breadcrumb__title">Track your order</h3>
                            <div class="breadcrumb__list">
                                <span><a href="#">Home</a></span>
                                <span>Track your order</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- order area start -->
        <section class="tp-order-area pb-160">
            <div class="container">
                <div class="tp-order-inner">
                    <div class="row gx-0">
                        <div class="col-lg-6">
                            <div class="tp-order-details" data-bg-color="#4F3D97">
                                <div class="tp-order-details-top text-center mb-70">
                                    <div class="tp-order-details-icon">
                                        <!-- Icon SVG or other content -->
                                    </div>
                                    <div class="tp-order-details-content">
                                        <h3 class="tp-order-details-title">Your Order Confirmed</h3>
                                        <p>We will send you a shipping confirmation email as soon as your order ships</p>
                                    </div>
                                </div>
                                <div class="tp-order-details-item-wrapper">
                                    <div class="row">
                                        <!-- Dynamically generated order details -->
                                        <?php if (!empty($orders)): ?>
                                            <?php foreach ($orders as $order): ?>
                                                <div class="col-sm-6">
                                                    <div class="tp-order-details-item">
                                                        <h4>Order Date:</h4>
                                                        <p><?= date('F d, Y', strtotime($order->added_on)); ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="tp-order-details-item">
                                                        <h4>Expected Delivery:</h4>
                                                        <p><?= date('F d, Y', strtotime($order->delivery_date)); ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="tp-order-details-item">
                                                        <h4>Order Number:</h4>
                                                        <p>#<?= $order->order_id ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="tp-order-details-item">
                                                        <h4>Payment Method:</h4>
                                                        <p><?= $order->pay_mode ?></p>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <p>No orders found.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="tp-order-info-wrapper">
                                <h4 class="tp-order-info-title">Order Details</h4>
                                <div class="tp-order-info-list">
                                    <ul>
                                        <!-- Dynamic List of Items -->
                                        <?php if (!empty($orders)): ?>
                                            <?php foreach ($orders as $order): ?>
                                                <li class="tp-order-info-list-header">
                                                    <h4>Product</h4>
                                                    <h4>Total</h4>
                                                </li>
                                                <?php foreach ($order->items as $item): ?>
                                                    <li class="tp-order-info-list-desc">
                                                        <p><?= $item->product_name ?> <span> x <?= $item->quantity ?></span></p>
                                                        <span>$<?= number_format($item->total_price, 2); ?></span>
                                                    </li>
                                                <?php endforeach; ?>
                                                <li class="tp-order-info-list-total">
                                                    <span>Total</span>
                                                    <span>$<?= number_format($order->total, 2); ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- order area end -->

    </main>

    <?php $this->load->view('front/footer');?>
</body>
</html>
