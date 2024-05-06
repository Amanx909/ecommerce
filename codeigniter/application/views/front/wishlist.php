<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Eden- Digital Marketplace</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets_front/img/logo/favicon.png">
    <?php $this->load->view('front/links');?> <!-- CSS and other links -->
</head>
<body>
    <?php $this->load->view('front/header');?> <!-- Header -->
   
    <main>
        <!-- breadcrumb area start -->
        <section class="breadcrumb__area include-bg pt-95 pb-50">
           <div class="container">
              <div class="row">
                 <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                       <h3 class="breadcrumb__title">Wishlist</h3>
                       <div class="breadcrumb__list">
                          <span><a href="#">Home</a></span>
                          <span>Wishlist</span>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- wishlist area start -->
        <section class="tp-cart-area pb-120">
           <div class="container">
              <div class="row">
                 <div class="col-xl-12">
                    <div class="tp-cart-list mb-45 mr-30">
                       <table class="table">
                          <thead>
                            <tr>
                              <th colspan="2" class="tp-cart-header-product">Product</th>
                              <th class="tp-cart-header-price">Price</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if (!empty($wishlist)): ?>
                                <?php foreach ($wishlist as $item): ?>
                                    <tr>
                                        <td class="tp-cart-img">
                                            <a href="<?= site_url('product/' . $item->slug); ?>">
                                                <img src="<?= !empty($item->pro_main_image) ? base_url('uploads/' . $item->pro_main_image) : base_url('assets/default_image_path.jpg'); ?>" alt="<?= htmlspecialchars($item->pro_name ?? 'Unknown Product'); ?>">
                                            </a>
                                        </td>
                                        <td class="tp-cart-title">
                                            <a href="<?= site_url('product/' . $item->slug); ?>"><?= htmlspecialchars($item->pro_name ?? 'Unknown Product'); ?></a>
                                        </td>
                                       <!-- Display price if you include pricing in your wishlist -->
                                       <td class="tp-cart-price">
    <?php if(isset($item->selling_price)): ?>
        <span>Npr <?= number_format($item->selling_price, 2); ?></span>
    <?php else: ?>
        <span>Price not available</span>
    <?php endif; ?>
</td>


                                        <td class="tp-cart-action">
                                            <a href="<?= site_url('cart/addtocart/' . $item->pro_id); ?>" class="tp-btn tp-btn-2 tp-btn-blue">Add To Cart</a>
                                            <a href="<?= site_url('wishlist/removefromwishlist/' . $item->pro_id); ?>" class="tp-btn tp-btn-2 tp-btn-red">Remove</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="4">No items in your wishlist.</td></tr>
                            <?php endif; ?>
                          </tbody>
                        </table>
                    </div>
                 </div>
              </div>
           </div>
        </section>
        <!-- wishlist area end -->

    </main>

    <?php $this->load->view('front/footer');?> <!-- Footer -->
    
    <!-- JavaScript Function -->
    
</body>
</html>
