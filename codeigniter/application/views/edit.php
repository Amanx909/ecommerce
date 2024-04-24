<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Dashboard |  - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <base href="http://localhost:3000/codeigniter/">
    <!-- App favicon -->
    <?php include('links.php');?>
</head>
<?php include('header.php');?>
<body data-sidebar="colored">
    <div id="layout-wrapper">
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                <?php if($this->session->flashdata('succMsg')){ ?>
                   <div class="alert alert-success">
                   <?=$this->session->flashdata('succMsg')?>
                   </div>

                <?php } ?>    
<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                <div class="form-inline float-md-start mb-3">
                                                    <div class="search-box me-2">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control border" placeholder="Search...">
                                                            <i class="ri-search-line search-icon"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 float-end">
                                                    <a href="product" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                                        <i class="mdi mdi-plus me-1"></i> Add Product
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="table-responsive mb-4">
                                            <table class="table table-hover table-nowrap align-middle mb-0">
                                                <thead class="bg-light">
                                                  <tr>
                                                    <th scope="col" style="width: 50px;">
                                                        <div class="form-check font-size-16">
                                                            <input type="checkbox" class="form-check-input" id="contacusercheck">
                                                            <label class="form-check-label" for="contacusercheck"></label>
                                                        </div>
                                                    </th>
                                                    <th scope="col">ProductName</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Mrp</th>
                                                    <th scope="col">Selling price</th>
                                                    <th scope="col" style="width: 200px;">Action</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($products as $product): ?>
                                                    <tr>
                                                        <th scope="row">
                                                            <div class="form-check font-size-16">
                                                                <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                                                <label class="form-check-label" for="contacusercheck1"></label>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <?= $product->pro_name ?>
                                                        </td>
                                                        <td>
                                                            <img src="<?= base_url('uploads/' . $product->pro_main_image) ?>" alt="<?= $product->pro_name ?>" class="avatar-xs rounded-circle me-2">
                                                        </td>
                                                        <td><?= $product->mrp ?></td>
                                                        <td><?= $product->selling_price ?></td>
                                                        <td>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item">
                                                                    <a href="<?= base_url('edit/' . $product->id) ?>" class="px-2 text-primary"><i class="ri-pencil-line font-size-18"></i></a>
                                                                    <td class="tp-cart-action">
                                                <a href= "adminproduct/removeproduct/<?=$product->pro_id?>" class="tp-cart-action-btn">
                                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z" fill="currentColor"/>
                                                    </svg>
                                                    <span>Remove</span>
                                                </a>
                                                <input type="TEXT" name="up_pro_id[]" value="<?=$product->pro_id?>">
                                            

                                                                <li class="list-inline-item dropdown">
                                                                    <a class="dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                                        <i class="ri-more-2-fill"></i>
                                                                    </a>
                                                                
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                        <a class="dropdown-item" href="#">Another action</a>
                                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-6">
                                                <div>
                                                    <p class="mb-sm-0">Showing 1 to 10 of 12 entries</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="float-sm-end">
                                                    <ul class="pagination mb-sm-0">
                                                        <li class="page-item disabled">
                                                            <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                                        </li>
                                                        <li class="page-item active">
                                                            <a href="#" class="page-link">1</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link">2</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link">3</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                 <!-- Modal -->
                 
                <!-- end modal -->
                
               
                
            </div>
            <?php include('footer.php');?>
