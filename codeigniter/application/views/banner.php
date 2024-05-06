<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Dashboard | Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesdesign" name="author">
    <base href="http://localhost:3000/codeigniter/">
    <!-- App favicon -->
    <?php include('links.php'); ?>
</head>
<body data-sidebar="colored">
    <?php include('header.php'); ?>
    <div id="layout-wrapper">
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Success Message -->
                    <?php if ($this->session->flashdata('succMsg')): ?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('succMsg'); ?>
                    </div>
                    <?php endif; ?>
                    
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header border-0 align-items-center d-flex pb-0">
                                    <h4 class="card-title mb-0 flex-grow-1">Manage Banners</h4>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Banner Details</h5>
                                    <p class="card-title-desc">Fill in the information below to update or create a new banner.</p>
                                    <?= form_open_multipart(); ?>
                                        <!-- Banner Name Input -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="bann_name" name="bann_name" placeholder="Banner Name">
                                                <label for="bann_name">Banner Name</label>
                                            </div>
                                            <?= form_error('bann_name'); ?>
                                        </div>
                                        <!-- Main Banner Image Input -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="file" class="form-control" id="bann_image" name="bann_image" placeholder="Banner Image">
                                                <label for="bann_image">Main Banner Image</label>
                                            </div>
                                            <?= form_error('bann_image'); ?>
                                        </div>
                                        <!-- Sub Banner Image Input -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="file" class="form-control" id="bann_subimage" name="bann_subimage" placeholder="Sub Banner Image">
                                                <label for="bann_subimage">Sub Banner Image</label>
                                            </div>
                                            <?= form_error('bann_subimage'); ?>
                                        </div>
                                        <!-- Status Select -->
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" name="status" id="floatingSelectGrid">
                                                    <option value="" selected>Select</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Deactivate</option>
                                                </select>
                                                <label for="floatingSelectGrid">Status</label>
                                            </div>
                                            <?= form_error('status'); ?>
                                        </div>
                                        <!-- Submit Button -->
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                                        </div>
                                    <?= form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
</body>
</html>
