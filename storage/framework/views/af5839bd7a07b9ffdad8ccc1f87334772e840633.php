<?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<form action="<?php echo e(route("publisher.profile.basic-information.update")); ?>" method="POST" id="settingForm" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field("PATCH"); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="first_name" class="font-weight-bold text-black font-size14">First Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="first_name" name="first_name" placeholder="First Name" value="<?php echo e($user->first_name ?? null); ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="last_name" class="font-weight-bold text-black font-size14">Last Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo e($user->last_name ?? null); ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="intro" class="font-weight-bold text-black font-size14">Bio<span class="text-danger">*</span></label>
                <small class="fs-10"><i>(Tell advertisers about yourself and what you’re looking for.)</i></small>
                <textarea class="form-control <?php $__errorArgs = ['intro'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="intro" name="intro" rows="3" cols="100" placeholder=""><?php echo e($publisher->intro); ?></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="language" class="font-weight-bold text-black font-size14">Language<span class="text-danger">*</span></label>
                <select name="language[]" id="language" class="form-control <?php $__errorArgs = ['language'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" multiple>
                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($language); ?>" <?php if(in_array($language, isset($publisher->language) && $publisher->language ? @json_decode($publisher->language, true) : [])): ?> selected <?php endif; ?>><?php echo e($language); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="customer_reach" class="font-weight-bold text-black font-size14">Target Region<span class="text-danger">*</span></label>
                <select name="customer_reach[]" id="customer_reach" class="form-control <?php $__errorArgs = ['customer_reach'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" multiple>
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country['name']); ?>" <?php if(in_array($country['name'], isset($publisher->customer_reach) && $publisher->customer_reach ? @json_decode($publisher->customer_reach, true) : [])): ?> selected <?php endif; ?>><?php echo e($country['name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="user_name" class="font-weight-bold text-black font-size14">User Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control <?php $__errorArgs = ['user_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="user_name" name="user_name" placeholder="User Name" value="<?php echo e($user->user_name ?? null); ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="gender" class="font-weight-bold text-black font-size14">Gender<span class="text-danger">*</span></label>
                <select class="form-control <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="gender" name="gender">
                    <option value="" selected disabled>Please Select</option>
                    <option <?php echo e($publisher->gender == "male" ? "selected" : null); ?> value="male">Male</option>
                    <option <?php echo e($publisher->gender == "female" ? "selected" : null); ?> value="female">Female</option>
                    <option <?php echo e($publisher->gender == "nonbinary" ? "selected" : null); ?> value="nonbinary">Nonbinary</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group form-group-calender">
                <i class="ri-calendar-line me-1"></i><label for="datepickerdob" class="fs-14 text-dark">Date of Birth<span class="text-danger">*</span></label>
                <div class="position-relative">
                    <input type="text" class="form-control <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="datepickerdob" name="dob" placeholder="<?php echo e(now()->format("F d, Y")); ?>" value="<?php echo e($publisher->dob); ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for="location_address_1" class="font-weight-bold text-black font-size14">Address<span class="text-danger">*</span></label>
                <input id="location_address_1" name="location_address_1" class="form-control <?php $__errorArgs = ['location_address_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" value="<?php echo e($publisher->location_address_1); ?>">
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
unset($__errorArgs, $__bag); ?>" id="zip_code" name="zip_code" placeholder="" value="<?php echo e($publisher->zip_code); ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="location_country" class="font-weight-bold text-black font-size14">Country<span class="text-danger">*</span></label>
                <select class="form-control <?php $__errorArgs = ['location_country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="location_country" name="location_country">
                    <option value="" selected disabled>Please Select</option>
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country['id']); ?>" <?php echo e($publisher->location_country == $country['id'] ? "selected" : null); ?>><?php echo e(ucwords($country['name'])); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="location_state" class="font-weight-bold text-black font-size14">State<span class="text-danger">*</span></label>
                <select class="form-control <?php $__errorArgs = ['location_state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="location_state" name="location_state">
                    <option value="" selected disabled>Please Select Country</option>
                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($state['id']); ?>" <?php echo e($publisher->location_state == $state['id'] ? "selected" : null); ?>><?php echo e(ucwords($state['name'])); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="location_city" class="font-weight-bold text-black font-size14">City</label>
                <select class="form-control <?php $__errorArgs = ['location_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="location_city" name="location_city">
                    <option value="" selected disabled>Please Select State</option>
                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($city['id']); ?>" <?php echo e($publisher->location_city == $city['id'] ? "selected" : null); ?>><?php echo e(ucwords($city['name'])); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <label for="postal_code" class="font-weight-bold text-black font-size14">Media Kit</label>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="font-size14">Name</th>
                        <th class="font-size14">Size</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php if(count($mediakits) > 0): ?>
                    <?php $__currentLoopData = $mediakits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a href="<?php echo e(\App\Helper\Static\Methods::staticAsset($kit->image)); ?>" target="_blank"><?php echo e($kit->name); ?></a>
                            </td>
                            <td>
                                <?php echo e($kit->size); ?> Kb
                            </td>
                            <td class="text-center">
                                <a href="<?php echo e(route("publisher.profile.basic-information.media-kits.delete", ["mediakit" => $kit->id])); ?>">
                                    <span data-feather="trash-2"></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">
                            <div class="atbd-empty text-center">
                                <div class="atbd-empty__image">
                                    <img src="<?php echo e(\App\Helper\Static\Methods::staticAsset("img/folders/1.svg")); ?>" alt="Admin Empty">
                                </div>
                                <div class="atbd-empty__text">
                                    <p class="">No Data</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <input type="file" class="form-control" id="media_kit" name="mediakit_image" />
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
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/publisher/settings/basic_info/index.blade.php ENDPATH**/ ?>