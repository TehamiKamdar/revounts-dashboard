<?php $__env->startSection("step_form_content"); ?>

<div class="row justify-content-center">
    <div class="page-header">
        <h1>Advertiser Business Info</h1>
    </div>
    <div class="col-xl-12 col-lg-12 col-sm-12">
        <div class="card" style="margin-top: 20px;">
            <div class="card-body">
                <div class="edit-profile__body">
                    <form id="stepTwo" action="javascript:void(0)">
                        <div class="form-group">
                            <label for="brand_name" class="form-label">Brand Name<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Enter Brand Name" value="<?php echo e($stepOne['brand_name'] ?? null); ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="company_name" class="form-label">Full Company Legal Name<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Company Legal Name" value="<?php echo e($stepOne['company_name'] ?? null); ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="website_url" class="form-label">Website<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="website_url" name="website_url" placeholder="https://example.com" value="<?php echo e($stepOne['website_url'] ?? null); ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone_number" class="form-label">Phone Number<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Contact Phone Number" value="<?php echo e($stepOne['phone_number'] ?? null); ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="country" class="form-label">Country<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select class="form-control select2-custom" id="country" name="country">
                                    <option value="" disabled selected>Please Select Country</option>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e(isset($stepOne['country']) && $stepOne['country'] == $country['id'] ? "selected" : null); ?> value="<?php echo e($country['id']); ?>"><?php echo e(ucwords($country['name'])); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="state" class="form-label">State<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <select class="form-control select2-custom" id="state" name="state">
                                            <option value="" disabled selected>First Select Country</option>
                                            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(isset($stepOne['state']) && $stepOne['state'] == $state['id'] ? "selected" : null); ?> value="<?php echo e($state['id']); ?>"><?php echo e(ucwords($state['name'])); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city" class="form-label">City</label>
                                    <div class="input-group">
                                        <select class="form-control select2-custom" id="city" name="city">
                                            <option value="" disabled selected>First Select State</option>
                                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(isset($stepTwo['city']) && $stepTwo['city'] == $city['id'] ? "selected" : null); ?> value="<?php echo e($city['id']); ?>"><?php echo e(ucwords($city['name'])); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="form-label">Address<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Complete Address" value="<?php echo e($stepOne['address'] ?? null); ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="checkbox-container">
                                <input type="checkbox" class="checkbox" id="agree" name="agree" />
                                <label for="agree">I Agree with the
                                    <a href="https://www.linkscircle.com/terms">Terms and Conditions</a>.</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="terms" name="terms" hidden />
                        </div>

                        <div class="button-group d-flex pt-3 justify-content-between flex-wrap">
                            <button type="button" onclick="stepFormShow(1)" class="btn-light">
                                <i class="ri-arrow-left-line mr-10"></i>Previous
                            </button>
                            <button type="submit" id="saveTwoStep" class="btn-login">
                                Save &amp; Next
                                <i class="ri-arrow-right-line ml-10"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- ends: .card -->
    </div><!-- ends: .col -->
</div>

<style>

    .form-label {
        font-weight: 600;
        margin-bottom: 8px;
        color: var(--dark-color);
        display: block;
    }

    .input-group {
        position: relative;
    }

    .form-control {
        width: 100%;
        padding: 14px 15px;
        border: 2px solid #e9ecef;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #f9f9fc;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(123, 54, 181, 0.1);
        background: white;
        outline: none;
    }

    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%236c757d' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 12px;
    }

    .checkbox-container {
        display: flex;
        align-items: flex-start;
        margin-top: 10px;
    }

    .checkbox-container input {
        margin-top: 5px;
        margin-right: 10px;
        accent-color: var(--primary-color);
    }

    .checkbox-container label {
        line-height: 1.5;
        color: var(--dark-color);
    }

    .checkbox-container a {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
    }

    .checkbox-container a:hover {
        text-decoration: underline;
    }

    .btn-login {
        padding: 14px 30px;
        background: var(--primary-color);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-login:hover {
        background: var(--primary-dark-color);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(123, 54, 181, 0.3);
    }

    .btn-light {
        padding: 14px 30px;
        background: #f8f9fa;
        color: var(--dark-color);
        border: 1px solid #e9ecef;
        border-radius: 12px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-light:hover {
        background: #e9ecef;
        transform: translateY(-2px);
    }

    .text-danger {
        color: #dc3545;
    }

    .mr-10 {
        margin-right: 10px;
    }

    .ml-10 {
        margin-left: 10px;
    }

    .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .border-color {
        border: 1px solid #e9ecef;
    }

    /* Select2 Custom Styling */
    .select2-custom + .select2-container .select2-selection--single {
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 12px 15px;
        height: auto;
        background: #f9f9fc;
        transition: all 0.3s ease;
    }

    .select2-custom + .select2-container .select2-selection--single:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(123, 54, 181, 0.1);
        background: white;
    }

    .select2-custom + .select2-container .select2-selection--single .select2-selection__rendered {
        padding: 0;
        color: var(--dark-color);
    }

    .select2-custom + .select2-container .select2-selection--single .select2-selection__arrow {
        height: 100%;
        right: 10px;
    }

    @media (max-width: 768px) {
        .card {
            margin: 20px 0;
            padding: 20px 15px;
        }

        .btn-login, .btn-light {
            width: 100%;
            justify-content: center;
        }

        .step-title {
            font-size: 1.3rem;
        }

        .button-group {
            flex-direction: column;
            gap: 15px;
        }
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("auth.advertiser_register.base", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Downloads\revdb\resources\views/auth/advertiser_register/step_two.blade.php ENDPATH**/ ?>