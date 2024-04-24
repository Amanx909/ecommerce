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
                  <div class="col-xl-7 col-lg-7">
                     
                  </div>
                  <div class="col-lg-7">
                     <div class="tp-checkout-bill-area">
                        <h3 class="tp-checkout-bill-title">Billing Details</h3>

                        <div class="tp-checkout-bill-form">
                           <form action="#">
                              <div class="tp-checkout-bill-inner">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="tp-checkout-input">
                                          <label>First Name <span>*</span></label>
                                          <input type="text" placeholder="First Name">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="tp-checkout-input">
                                          <label>Last Name <span>*</span></label>
                                          <input type="text" placeholder="Last Name">
                                       </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                       <div class="tp-checkout-input">
                                          <label>Country / Region </label>
                                          <input type="text" placeholder="United States (US)">
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="tp-checkout-input">
                                          <label>Street address</label>
                                          <input type="text" placeholder="Street name">
                                       </div>

                                      
                                    </div>
                                    <div class="col-md-12">
                                       <div class="tp-checkout-input">
                                          <label>Town / City</label>
                                          <input type="text" placeholder="">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="tp-checkout-input">
                                          <label>State / County</label>
                                          <select>
                                             <option>Kathmandu</option>
                                             <option>Pokhara</option>
                                             <option>Chitwan</option>
                                             
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="tp-checkout-input">
                                          <label>Postcode ZIP</label>
                                          <input type="text" placeholder="">
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="tp-checkout-input">
                                          <label>Phone <span>*</span></label>
                                          <input type="text" placeholder="">
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="tp-checkout-input">
                                          <label>Email address <span>*</span></label>
                                          <input type="email" placeholder="">
                                       </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                       <div class="tp-checkout-input">
                                          <label>Order notes (optional)</label>
                                          <textarea placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                       </div>
                                    </div>
                                 </div>
                              </div>
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
                                    </span>
                                 </div>
                              </li>

                              <!-- total -->
                              <li class="tp-order-info-list-total">
                                 <span>Total</span>
                                 <span>Npr <?=number_format($total['grandtotal'])?></span>
                              </li>
                           </ul>
                           
                        </div>
                        <div class="tp-checkout-payment">
                           <div class="tp-checkout-payment-item">
                              <input type="radio" id="back_transfer" name="payment">
                              <label for="back_transfer" data-bs-toggle="direct-bank-transfer">Khalti</label>
                              <div class="tp-checkout-payment-desc direct-bank-transfer">
                                 <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                              </div>
                           </div>
                        </div>
                        <div class="tp-checkout-btn-wrapper">
                           <a href="#" class="tp-checkout-btn w-100">Place Order</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- checkout area end -->


      </main>