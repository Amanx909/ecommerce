<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shofy - Multipurpose eCommerce HTML Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/favicon.png">
    <?php $this->load->view('front/links');?>
</head>
<body>
    <?php $this->load->view('front/header');?>
    
    <main>

         <!-- breadcrumb area start -->
         <section class="breadcrumb__area include-bg pt-95 pb-50" data-bg-color="#EFF1F5">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-12">
                     <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Checkout</h3>
                        <div class="breadcrumb__list">
                           <span><a href="#">Home</a></span>
                           <span>Checkout</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- breadcrumb area end -->

         <!-- checkout area start -->
         <section class="tp-checkout-area pb-120" data-bg-color="#EFF1F5">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="tp-checkout-bill-area">
                    <h3 class="tp-checkout-bill-title">Billing Details</h3>
                    <div class="tp-checkout-bill-form">
                        <form action="<?php echo site_url('checkout/initiate_payment'); ?>" method="post">
                            <div class="tp-checkout-bill-inner">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="tp-checkout-input">
                                            <label>First Name <span>*</span></label>
                                            <input type="text" name="first_name" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="tp-checkout-input">
                                            <label>Last Name <span>*</span></label>
                                            <input type="text"  name="last_name" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="tp-checkout-input">
                                            <label>Country / Region</label>
                                            <input type="text" name="country" placeholder="United States (US)">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="tp-checkout-input">
                                            <label>Street address</label>
                                            <input type="text" name="street_address"placeholder="Street name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="tp-checkout-input">
                                            <label>Town / City</label>
                                            <input type="text" name="city"placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
    <div class="tp-checkout-input">
        <label>City</label>
        <select name="state">
            <option value="Kathmandu">Kathmandu</option>
            <option value="Pokhara">Pokhara</option>
            <option value="Chitwan">Chitwan</option>
        </select>
    </div>


                                    </div>
                                    <div class="col-md-12">
                                        <div class="tp-checkout-input">
                                            <label>Phone <span>*</span></label>
                                            <input type="text"name="phone" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="tp-checkout-input">
                                            <label>Email address <span>*</span></label>
                                            <input type="email"name="email" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="tp-checkout-input">
                                            <label>Order notes (optional)</label>
                                            <textarea name="order_notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Include the submit button inside the form -->
                            <input type="submit" value="Pay with Khalti" class="tp-checkout-btn w-100">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <!-- checkout place order -->
                <div class="tp-checkout-place white-bg">
                    <h3 class="tp-checkout-place-title">Your Order</h3>
                    <div class="tp-order-info-list">
                        <ul>
                            <!-- header -->
                            <li class="tp-order-info-list-header">
                                <h4>Product</h4>
                                <h4>Total</h4>
                            </li>
                            <!-- item list -->
                            <?php foreach($cart as $arr): ?>
                            <li class="tp-order-info-list-desc">
                                <a><?=$arr->pro_name?> x <span></a></span>
                                <span>Npr <?=number_format($arr->pro_price)?></span>
                            </li>
                            <?php endforeach; ?>
                            <!-- subtotal -->
                            <li class="tp-order-info-list-subtotal">
                                <span>Subtotal</span>
                                <span>Npr <?=number_format($total['subtotal'])?></span>
                            </li>
                            <!-- shipping -->
                            <li class="tp-order-info-list-shipping">
                                <span>Shipping</span>
                                <div class="tp-cart-checkout-shipping-option-wrapper">
                                    <?php if($total['subtotal']>499):?>
                                    <p>Free shipping: Npr <del><?=number_format($total['delivery'],2 )?></del></p>
                                    <?php else:?>
                                    <p>Shipping Charges: Npr <?=number_format($total['delivery'])?> </p>
                                    <?php endif; ?>
                                </div>
                            </li>
                            <!-- total -->
                            <li class="tp-order-info-list-total">
                                <span>Total</span>
                                <span>Npr <?=number_format($total['grandtotal'])?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


         <!-- checkout area end -->


      </main>