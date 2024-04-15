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
<section class="breadcrumb__area include-bg pt-100 pb-50">
   <div class="container">
      <div class="row">
         <div class="col-xxl-12">
            <div class="breadcrumb__content p-relative z-index-1">
               <h3 class="breadcrumb__title">Shop Grid</h3>
               <div class="breadcrumb__list">
                  <span><a href="#">Home</a></span>
                  <span>Shop Grid</span>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- breadcrumb area end -->

<!-- shop area start -->
<section class="tp-shop-area pb-120">
   <div class="container">
      <div class="row">
         <div class="col-xl-3 col-lg-4">
            <div class="tp-shop-sidebar mr-10">
               <!-- filter -->
               <div class="tp-shop-widget mb-35">
                  <h3 class="tp-shop-widget-title no-border">Price Filter</h3>

                  <div class="tp-shop-widget-content">
                     <div class="tp-shop-widget-filter">
                        <div id="slider-range" class="mb-10"></div>
                        <div class="tp-shop-widget-filter-info d-flex align-items-center justify-content-between">
                           <span class="input-range">
                              <input type="text" id="amount" readonly>
                           </span>
                           <button class="tp-shop-widget-filter-btn" type="button">Filter</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- status -->
               <div class="tp-shop-widget mb-50">
                  <h3 class="tp-shop-widget-title">Product Status</h3>

                  <div class="tp-shop-widget-content">
                     <div class="tp-shop-widget-checkbox">
                        <ul class="filter-items filter-checkbox">
                           <li class="filter-item checkbox">
                              <input id="on_sale" type="checkbox">
                              <label for="on_sale">On sale</label>
                           </li>
                           <li class="filter-item checkbox">
                              <input id="in_stock" type="checkbox">
                              <label for="in_stock">In Stock</label>
                           </li>
                        </ul><!-- .filter-items -->
                     </div>
                  </div>
               </div>
               <!-- categories -->
               <div class="tp-shop-widget mb-50">
                  <h3 class="tp-shop-widget-title">Categories</h3>

                  <div class="tp-shop-widget-content">
    <div class="tp-shop-widget-categories">
        <ul>
        <?php foreach($getcategorynav as $val): ?>
                <?php $check_sub = $this->HomeModel->getsubcatcheck($val->cate_id); ?>
                <li><a href="category/<?=$val->slug?>"><?=$val->cate_name?> <span></span></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
               </div>
               <!-- color -->
               
             
               
               
            </div>
         </div>
         <div class="col-xl-9 col-lg-8">
            <div class="tp-shop-main-wrapper">
               
               <div class="tp-shop-top mb-45">
                  <div class="row">
                     <div class="col-xl-6">
                        <div class="tp-shop-top-left d-flex align-items-center ">
                           <div class="tp-shop-top-tab tp-tab">
                              <ul class="nav nav-tabs" id="productTab" role="tablist">
                                 <li class="nav-item" role="presentation">
                                   <button class="nav-link active" id="grid-tab" data-bs-toggle="tab" data-bs-target="#grid-tab-pane" type="button" role="tab" aria-controls="grid-tab-pane" aria-selected="true">
                                       <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M16.3327 6.01341V2.98675C16.3327 2.04675 15.906 1.66675 14.846 1.66675H12.1527C11.0927 1.66675 10.666 2.04675 10.666 2.98675V6.00675C10.666 6.95341 11.0927 7.32675 12.1527 7.32675H14.846C15.906 7.33341 16.3327 6.95341 16.3327 6.01341Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M16.3327 15.18V12.4867C16.3327 11.4267 15.906 11 14.846 11H12.1527C11.0927 11 10.666 11.4267 10.666 12.4867V15.18C10.666 16.24 11.0927 16.6667 12.1527 16.6667H14.846C15.906 16.6667 16.3327 16.24 16.3327 15.18Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M7.33268 6.01341V2.98675C7.33268 2.04675 6.90602 1.66675 5.84602 1.66675H3.15268C2.09268 1.66675 1.66602 2.04675 1.66602 2.98675V6.00675C1.66602 6.95341 2.09268 7.32675 3.15268 7.32675H5.84602C6.90602 7.33341 7.33268 6.95341 7.33268 6.01341Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M7.33268 15.18V12.4867C7.33268 11.4267 6.90602 11 5.84602 11H3.15268C2.09268 11 1.66602 11.4267 1.66602 12.4867V15.18C1.66602 16.24 2.09268 16.6667 3.15268 16.6667H5.84602C6.90602 16.6667 7.33268 16.24 7.33268 15.18Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>
                                   </button>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                   <button class="nav-link" id="list-tab" data-bs-toggle="tab" data-bs-target="#list-tab-pane" type="button" role="tab" aria-controls="list-tab-pane" aria-selected="false">
                                       <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M15 7.11108H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M15 1H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M15 13.2222H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>
                                   </button>
                                 </li>
                               </ul>
                           </div>
                           <div class="tp-shop-top-result">
                              <p>Showing 1–14 of 26 results</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-6">
                        <div class="tp-shop-top-right d-sm-flex align-items-center justify-content-xl-end">
                           <div class="tp-shop-top-select">
                              <select>
                                 <option >Default Sorting</option>
                                 <option >Low to Hight</option>
                                 <option >High to Low</option>
                                 <option >New Added</option>
                                 <option >On Sale</option>
                              </select>
                           </div>
                           <div class="tp-shop-top-filter">
                              <button type="button" class="tp-filter-btn filter-open-btn">
                                 <span>
                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M14.9998 3.45001H10.7998" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M3.8 3.45001H1" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M6.5999 5.9C7.953 5.9 9.0499 4.8031 9.0499 3.45C9.0499 2.0969 7.953 1 6.5999 1C5.2468 1 4.1499 2.0969 4.1499 3.45C4.1499 4.8031 5.2468 5.9 6.5999 5.9Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M15.0002 11.15H12.2002" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M5.2 11.15H1" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M9.4002 13.6C10.7533 13.6 11.8502 12.5031 11.8502 11.15C11.8502 9.79691 10.7533 8.70001 9.4002 8.70001C8.0471 8.70001 6.9502 9.79691 6.9502 11.15C6.9502 12.5031 8.0471 13.6 9.4002 13.6Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                 </span>
                                 Filter
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
        <div class="col-12">
            <div class="tp-product-tab-content">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="new-tab-pane" role="tabpanel" aria-labelledby="new-tab" tabindex="0">
                        <div class="row">
                            <?php if(!empty($products)):
                                foreach($products as $product):
                                    // Fetch category name for the product
                            ?>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                                <div class="tp-product-item p-relative transition-3 mb-25">
                                    <div class="tp-product-thumb p-relative fix m-img">
                                        <a href="product/<?=$product->slug?>">
                                            <img src="uploads/<?=$product->pro_main_image?>" alt="product-electronic">
                                        </a>
                                        <!-- If you have product actions, add them here -->
                                    </div>
                                    <div class="tp-product-content">
                                        <div class="tp-product-category">
                                            <a href="product/<?=$product->slug?>"><?= $product->category ?></a>
                                        </div>
                                        <h3 class="tp-product-title">
                                            <a href="product/<?=$product->slug?>"><?= $product->pro_name ?></a>
                                        </h3>
                                        <!-- Assuming you have product rating functionality -->
                                        <div class="tp-product-rating d-flex align-items-center">
                                            <!-- Product rating stars -->
                                        </div>
                                        <div class="tp-product-price-wrapper">
                                            <span class="tp-product-price old-price">Npr <?=number_format($product->mrp,2)?></span>
                                            <span class="tp-product-price new-price">Npr <?=number_format($product->selling_price,2)?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>








                    </main>
                    <?php $this->load->view('front/footer');?>