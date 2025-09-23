<?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<form action="<?php echo e(route("publisher.profile.company.update")); ?>" method="POST" id="companyForm" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field("PATCH"); ?>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="company_name" class="font-weight-bold text-black font-size14">Company Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="company_name" name="company_name" placeholder="" value="<?php echo e($company->company_name ?? null); ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="legal_entity_type" class="font-weight-bold text-black font-size14">Legal Entity Type<span class="text-danger">*</span></label>
                <select class="js-example-basic-single js-states form-control <?php $__errorArgs = ['legal_entity_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="legal_entity_type" name="legal_entity_type">
                    <option value="" disabled selected>Please Select</option>
                    <?php $__currentLoopData = \App\Models\Publisher::getLegalEntity(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(isset($company->legal_entity_type) && $company->legal_entity_type == $entity['value'] ? "selected" : null); ?> value="<?php echo e($entity['value']); ?>">
                            <?php echo e($entity['name']); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="countryOption">
                    <label for="location_country" class="font-weight-bold text-black font-size14">Country / Region<span class="text-danger">*</span></label>
                    <select class="js-example-basic-single js-states form-control <?php $__errorArgs = ['location_country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="location_country" name="country">
                        <option value="" disabled selected>Please Select</option>
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php echo e(isset($company->country) && $company->country == $country['id'] ? "selected" : null); ?>  value="<?php echo e($country['id']); ?>"><?php echo e(ucwords($country['name'])); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="location_state" class="font-weight-bold text-black font-size14">State<span class="text-danger">*</span></label>
                <select class="js-example-basic-single js-states form-control <?php $__errorArgs = ['location_state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="location_state" name="state">
                    <option value="" disabled selected>First Select Country / Region</option>
                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(isset($company->state) && $company->state == $state['id'] ? "selected" : null); ?>  value="<?php echo e($state['id']); ?>"><?php echo e(ucwords($state['name'])); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="location_city" class="font-weight-bold text-black font-size14">City</label>
                <select class="js-example-basic-single js-states form-control <?php $__errorArgs = ['location_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="location_city" name="city">
                    <option value="" disabled selected>First Select State</option>
                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(isset($company->city) && $company->city == $city['id'] ? "selected" : null); ?>  value="<?php echo e($city['id']); ?>"><?php echo e(ucwords($city['name'])); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="zip_code" class="font-weight-bold text-black font-size14">Zip Code<span class="text-danger">*</span></label>
                <input type="text" class="form-control <?php $__errorArgs = ['zip_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="zip_code" name="zip_code" placeholder="" value="<?php echo e($company->zip_code ?? null); ?>">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="address" class="font-weight-bold text-black font-size14">Address Line 1<span class="text-danger">*</span></label>
                <textarea class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="address" name="address" rows="3" placeholder="Please write a brief introduction to help us and the brand get to know you quickly."><?php echo e($company->address); ?></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="address_2" class="font-weight-bold text-black font-size14">Address Line 2</label>
                <textarea class="form-control <?php $__errorArgs = ['address_2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="address_2" name="address_2" rows="3" placeholder="Please write a brief introduction to help us and the brand get to know you quickly."><?php echo e($company->address_2); ?></textarea>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <button type="submit" class="btn btn-sm text-white btn-primary btn-default btn-squared text-capitalize m-1">Update</button>
        </div>
    </div>

</form>
<div class="loader-overlay display-hidden" id="showLoader">
    <div class="atbd-spin-dots spin-lg">
        <span class="spin-dot badge-dot dot-primary"></span>
        <span class="spin-dot badge-dot dot-primary"></span>
        <span class="spin-dot badge-dot dot-primary"></span>
        <span class="spin-dot badge-dot dot-primary"></span>
    </div>
</div>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/publisher/settings/company_info/index.blade.php ENDPATH**/ ?>