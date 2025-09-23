<?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<form action="<?php echo e(route("publisher.payments.billing-information.update")); ?>" method="POST" id="billingForm" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field("PATCH"); ?>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name" class="font-weight-bold text-black font-size14">Billing Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name" placeholder="Enter Full Billing Name" value="<?php echo e($billing->name ?? null); ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="phone" class="font-weight-bold text-black font-size14">Billing Phone<span class="text-danger">*</span></label>
                <input type="tel" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="phone" name="phone" placeholder="Enter Billing Phone Number" value="<?php echo e($billing->phone ?? null); ?>">
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for="address" class="font-weight-bold text-black font-size14">Billing Address<span class="text-danger">*</span></label>
                <input id="address" name="address" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($billing->address ?? null); ?>" type="text">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="zip_code" class="font-weight-bold text-black font-size14">Zip Code<span class="text-danger">*</span></label>
                <input type="text" class="form-control <?php $__errorArgs = ['zip_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="zip_code" name="zip_code" placeholder="" value="<?php echo e($billing->zip_code ?? null); ?>" >
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="country" class="font-weight-bold text-black font-size14">Country<span class="text-danger">*</span></label>
                <select class="js-example-basic-single js-states form-control <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="country" name="country">
                    <option value="" disabled selected>Please Select</option>
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(isset($billing->country) && $billing->country == $country['id'] ? "selected" : null); ?>  value="<?php echo e($country['id']); ?>"><?php echo e(ucwords($country['name'])); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="state" class="font-weight-bold text-black font-size14">State<span class="text-danger">*</span></label>
                <select class="js-example-basic-single js-states form-control <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="state" name="state">
                    <option value="" disabled selected>First Select Country / Region</option>
                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(isset($billing->state) && $billing->state == $state['id'] ? "selected" : null); ?>  value="<?php echo e($state['id']); ?>"><?php echo e(ucwords($state['name'])); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="city" class="font-weight-bold text-black font-size14">City</label>
                <select class="js-example-basic-single js-states form-control <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="city" name="city">
                    <option value="" disabled selected>First Select State</option>
                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(isset($billing->city) && $billing->city == $city['id'] ? "selected" : null); ?>  value="<?php echo e($city['id']); ?>"><?php echo e(ucwords($city['name'])); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    </div>

    <div class="row border-top mt-10 pt-10">
        <div class="col-md-6">
            <div class="form-group">
                <label for="company_registration_no" class="font-weight-bold text-black font-size14">Company Registration Number</label>
                <input type="text" class="form-control <?php $__errorArgs = ['company_registration_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="company_registration_no" name="company_registration_no" placeholder="Enter Registration Number" value="<?php echo e($billing->company_registration_no ?? null); ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tax_vat_no" class="font-weight-bold text-black font-size14">TAX/VAT Number</label>
                <input type="tel" class="form-control <?php $__errorArgs = ['tax_vat_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tax_vat_no" name="tax_vat_no" placeholder="Enter TAX/VAT Number" value="<?php echo e($billing->tax_vat_no ?? null); ?>">
            </div>
        </div>
    </div>


    <div class="button-group d-flex flex-wrap pt-30 mb-15">
        <button class="btn btn-primary btn-default btn-squared mr-15 text-capitalize">update</button>
    </div>
</form>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/publisher/settings/payment/billing_info/index.blade.php ENDPATH**/ ?>