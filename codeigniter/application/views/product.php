<?php
if($this->session->userdata('pro_id')!=''){
    $pro_id = $this->session->userdata('pro_id');

}else{
    $this->session->set_userdata('pro_id',mt_rand(11111,99999));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <base href="http://localhost:3000/codeigniter/">
    <!-- App favicon -->
</head>
<?php include('links.php'); ?>
<?php include('header.php'); ?>

<body data-sidebar="colored">
    <div id="layout-wrapper">
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <?php if ($this->session->flashdata('succMsg')) { ?>
                        <div class="alert alert-success">
                            <?= $this->session->flashdata('succMsg') ?>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('errMsg')) { ?>
                        <div class="alert alert-success">
                            <?= $this->session->flashdata('errMsg') ?>
                    <?php } ?>
                </div>
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-wl-6">
                            <div class="card">
                                <div class="card-header border-0 align-items-center d-flex pb-0">
                                    <h4 class="card-title mb-0 flex-grow-1">Product</h4>
                                    <a href="javascript:void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ms-1"></i></a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Floating labels</h5>
                                    <p class="card-title-desc">Create beautifully simple form labels that float over your input fields.</p>
                                    <?= form_open_multipart() ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="" name="pro_id" readonly value="<?= set_value('pro_id', $pro_id) ?>" >
                                                <label for="floatingFirstnameInput">Product ID </label>
                                            </div>
                                            <?= form_error('pro_id') ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" onchange="get_categories(this.value)" name="category" id="categorySelect">
                                                    <option value="" selected>Select</option>
                                                    <?php foreach ($categories as $value) { ?>
                                                        <option value="<?= $value->cate_id ?>">
                                                            <?= $value->cate_name ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                                <label for="categorySelect">Category</label>
                                            </div>
                                            <?= form_error('category') ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-select subcat" name="sub_category" id="subCategorySelect">
                                                    <option value="" selected>Select</option>
                                                </select>
                                                <label for="subCategorySelect">Sub Category</label>
                                            </div>
                                            <?= form_error('sub_category') ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="" name="pro_name" placeholder="product name">
                                                <label for="floatingFirstnameInput">Product name </label>
                                            </div>
                                            <?= form_error('pro_name') ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="" name="brand" placeholder="product Brand">
                                                <label for="floatingFirstnameInput">Product Brand </label>
                                            </div>
                                            <?= form_error('brand') ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" name="featured" id="statusSelect">
                                                    <option value="" selected>Select</option>
                                                    <option value="1">Deal of the month</option>
                                                    <option value="0">New arrival</option>
                                                </select>
                                                <label for="statusSelect">Featured</label>
                                            </div>
                                            <?= form_error('featured') ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <textarea class="form-select" name="highlights" id="statusSelect"></textarea>
                                                <label for="statusSelect">Highlights</label>
                                            </div>
                                            <?= form_error('highlights') ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <textarea class="form-select" name="description" id="statusSelect"></textarea>
                                                <label for="statusSelect">Description</label>
                                            </div>
                                            <?= form_error('description') ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="" name="stock" placeholder="product Stock">
                                                <label for="floatingFirstnameInput">Product Stock </label>
                                            </div>
                                            <?= form_error('stock') ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="" name="mrp" placeholder="product MRP">
                                                <label for="floatingFirstnameInput">Product MRP</label>
                                            </div>
                                            <?= form_error('mrp') ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="" name="selling_price" placeholder="product Selling Price">
                                                <label for="floatingFirstnameInput">Product Selling Price</label>
                                            </div>
                                            <?= form_error('selling_price') ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="" name="meta_title" placeholder="">
                                                <label for="floatingFirstnameInput">Meta Title</label>
                                            </div>
                                            <?= form_error('meta_title') ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="" name="meta_keywords" placeholder="">
                                                <label for="floatingFirstnameInput">Meta keywords</label>
                                            </div>
                                            <?= form_error('meta_keywords') ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="" name="meta_desc" placeholder="">
                                                <label for="floatingFirstnameInput">Meta Description</label>
                                            </div>
                                            <?= form_error('meta_desc') ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="file" class="form-control" id="" name="pro_main_image" placeholder="">
                                                <label for="floatingFirstnameInput">Product Image</label>
                                            </div>
                                            <?= form_error('pro_main_image') ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="file" class="form-control" id="" name="gallery_image" placeholder="">
                                                <label for="floatingFirstnameInput">Product Gallery Image</label>
                                            </div>
                                            <?= form_error('gallery_image') ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" name="status" id="statusSelect">
                                                    <option value="" selected>Select</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Deactive</option>
                                                </select>
                                                <label for="statusSelect">Status</label>
                                            </div>
                                            <?= form_error('status') ?>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                                    </div>
                                    <?= form_close() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('footer.php'); ?>
</body>

</html>
