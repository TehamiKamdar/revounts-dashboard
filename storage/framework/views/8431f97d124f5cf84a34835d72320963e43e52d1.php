<?php $__env->startSection("step_form_content"); ?>

<div class="card">
    <div class="card-body">
        <div class="edit-profile__body">
            <form id="stepTwo" action="javascript:void(0)">
                <input type="hidden" id="dialCode" name="dialCode" value="<?php echo e($stepTwo['dialCode'] ?? '+1'); ?>">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_name" class="form-label">Company Legal Name<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter company name (Legal)" value="<?php echo e($stepTwo['company_name'] ?? null); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="entity_type" class="form-label">Entity Type<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select class="form-control" id="entity_type" name="entity_type">
                                    <option value="" disabled selected>Please Select</option>
                                    <?php $__currentLoopData = \App\Models\Publisher::getLegalEntity(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e(isset($stepTwo['entity_type']) && $stepTwo['entity_type'] == $entity['value'] ? 'selected' : null); ?> value="<?php echo e($entity['value']); ?>">
                                            <?php echo e($entity['name']); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contact_name" class="form-label">Contact name<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Contact person name" value="<?php echo e($stepTwo['contact_name'] ?? null); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number" class="form-label">Phone number<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Phone number" value="<?php echo e($stepTwo['phone_number'] ?? null); ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="country" class="form-label">Country / Region<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select class="form-control" id="country" name="country">
                                    <option value="" disabled selected>Please Select</option>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e(isset($stepTwo['country']) && $stepTwo['country'] == $country['id'] ? 'selected' : null); ?> value="<?php echo e($country['id']); ?>"><?php echo e(ucwords($country['name'])); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="state" class="form-label">State<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select class="form-control" id="state" name="state">
                                    <option value="" disabled selected>First Select Country / Region</option>
                                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e(isset($stepTwo['state']) && $stepTwo['state'] == $state['id'] ? 'selected' : null); ?> value="<?php echo e($state['id']); ?>"><?php echo e(ucwords($state['name'])); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="city" class="form-label">City</label>
                            <div class="input-group">
                                <select class="form-control" id="city" name="city">
                                    <option value="" disabled selected>First Select State</option>
                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e(isset($stepTwo['city']) && $stepTwo['city'] == $city['id'] ? 'selected' : null); ?> value="<?php echo e($city['id']); ?>"><?php echo e(ucwords($city['name'])); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="postal_code" class="form-label">Postal code<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Postal code" value="<?php echo e($stepTwo['postal_code'] ?? null); ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address" class="form-label">Address<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="address" name="address" placeholder="Apartment, suite, unit etc." value="<?php echo e($stepTwo['address'] ?? null); ?>">
                    </div>
                </div>

                <div class="button-group pt-3 flex-wrap">
                    <button type="button" onclick="stepFormShow(1)" class="btn-light">
                        <i class="ri-arrow-left-line me-2"></i>Previous
                    </button>
                    <button type="submit" id="saveTwoStep" class="btn-login">
                        Save &amp; Next<i class="ri-arrow-right-line ms-2"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div><!-- ends: .card -->

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
    }

    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%236c757d' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 12px;
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

    .button-group {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
    }

    @media (max-width: 768px) {
        .button-group {
            flex-direction: column;
            gap: 15px;
        }

        .btn-login, .btn-light {
            width: 100%;
            justify-content: center;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("auth.publisher_register.base", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Downloads\revdb\resources\views/auth/publisher_register/step_two.blade.php ENDPATH**/ ?>