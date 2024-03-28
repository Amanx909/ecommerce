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
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0 align-items-center d-flex pb-0">
                                <h4 class="card-title mb-0 flex-grow-1">Category</h4>
                                <a href="javascript:void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ms-1"></i></a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Floating labels</h5>
                                <p class="card-title-desc">Create beautifully simple form labels that float over your input fields.</p>
                                <?=form_open_multipart()?>                                    
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="parent_id" id="floatingSelectGrid">
                                                <option value="" selected>select</option>
                                                <?php foreach($categories as $cat): ?>
                                                    <option value="<?= $cat->cate_id ?>"><?= $cat->cate_name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <label for="floatingSelectGrid">Parent Category</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="" name="cate_name" placeholder="Enter Your Category Name">
                                            <label for="floatingFirstnameInput">Category Name</label>
                                        </div>
                                        <?=form_error('cate_name')?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="status" id="floatingSelectGrid">
                                                <option value="" selected>Select</option>
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
                                            <label for="floatingSelectGrid">Status</label>
                                        </div>
                                        <?=form_error('status')?>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="file" class="form-control" id="" name="image" placeholder="">
                                                <label for="floatingFirstnameInput"> Image</label>
                                            </div>
                                            <?= form_error('image') ?>
                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                                    </div>
                                <?=form_close()?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php');?>
