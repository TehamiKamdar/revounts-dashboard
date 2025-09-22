<div class="row">
    <div class="col-lg-6">
        <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
            <label for="name" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.fields.name')); ?></label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo e(old('name', $data->name ?? '')); ?>" <?php echo e(\App\Helper\Advertiser\Base::getFormFieldReadOnly($data->source, "name") ? "disabled" : ""); ?>>
            <?php if($errors->has('name')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('name')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('advertiser.api-advertiser.fields.name_helper')); ?>

            </p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group <?php echo e($errors->has('url') ? 'has-error' : ''); ?>">
            <label for="url" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.fields.url')); ?></label>
            <input type="url" id="url" name="url" class="form-control" value="<?php echo e(old('url', $data->url ?? '')); ?>" <?php echo e(\App\Helper\Advertiser\Base::getFormFieldReadOnly($data->source, "url") ? "disabled" : ""); ?>>
            <?php if($errors->has('url')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('url')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('advertiser.api-advertiser.fields.url_helper')); ?>

            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group <?php echo e($errors->has('primary_region') ? 'has-error' : ''); ?>">
            <label for="primary_region" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.fields.primary_region')); ?></label>
            <select class="js-example-basic-single js-states form-control" id="primary_region" name="primary_region" <?php echo e(\App\Helper\Advertiser\Base::getFormFieldReadOnly($data->source, "primary_region") ? "disabled" : ""); ?>>
                <option value="" disabled selected>Please Select</option>
                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php echo e(in_array($country['iso2'], $data->primary_regions ?? []) ? "selected" : null); ?>  value="<?php echo e($country['iso2']); ?>"><?php echo e($country['name']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('primary_region')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('primary_region')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('advertiser.api-advertiser.fields.primary_region_helper')); ?>

            </p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group <?php echo e($errors->has('currency_code') ? 'has-error' : ''); ?>">
            <label for="currency_code" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.fields.currency_code')); ?></label>
            <select class="js-example-basic-single js-states form-control" id="currency_code" name="currency_code" <?php echo e(\App\Helper\Advertiser\Base::getFormFieldReadOnly($data->source, "currency_code") ? "disabled" : ""); ?>>
                <option value="" disabled selected>Please Select</option>
                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($country['currency']): ?>
                        <option <?php echo e($country['currency'] == $data->currency_code ?? '' ? "selected" : null); ?>  value="<?php echo e($country['currency']); ?>"><?php echo e($country['currency']); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('currency_code')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('currency_code')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('advertiser.api-advertiser.fields.currency_code_helper')); ?>

            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group <?php echo e($errors->has('average_payment_time') ? 'has-error' : ''); ?>">
            <label for="average_payment_time" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.fields.average_payment_time')); ?></label>
            <input type="text" id="average_payment_time" name="average_payment_time" class="form-control" value="<?php echo e(old('average_payment_time', $data->average_payment_time ?? '')); ?>">
            <?php if($errors->has('average_payment_time')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('average_payment_time')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('advertiser.api-advertiser.fields.average_payment_time_helper')); ?>

            </p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group <?php echo e($errors->has('validation_days') ? 'has-error' : ''); ?>">
            <label for="validation_days" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.fields.validation_days')); ?></label>
            <input type="text" id="validation_days" name="validation_days" class="form-control" value="<?php echo e(old('validation_days', $data->validation_days ?? '')); ?>">
            <?php if($errors->has('validation_days')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('validation_days')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('advertiser.api-advertiser.fields.validation_days_helper')); ?>

            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group <?php echo e($errors->has('epc') ? 'has-error' : ''); ?>">
            <label for="epc" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.fields.epc')); ?></label>
            <input type="text" id="epc" name="epc" class="form-control" value="<?php echo e(old('epc', $data->epc ?? '')); ?>" <?php echo e(\App\Helper\Advertiser\Base::getFormFieldReadOnly($data->source, "epc") ? "disabled" : ""); ?>>
            <?php if($errors->has('epc')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('epc')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('advertiser.api-advertiser.fields.epc_helper')); ?>

            </p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group <?php echo e($errors->has('deeplink_enabled') ? 'has-error' : ''); ?>">
            <label for="deeplink_enabled" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.fields.deeplink_enabled')); ?></label>
            <select class="js-example-basic-single js-states form-control" id="deeplink_enabled" name="deeplink_enabled" <?php echo e(\App\Helper\Advertiser\Base::getFormFieldReadOnly($data->source, "deeplink_enabled") ? "disabled" : ""); ?>>
                <option value="" disabled selected>Please Select</option>
                <option <?php echo e(isset($data->deeplink_enabled) && $data->deeplink_enabled == 1 ? "selected" : null); ?>  value="1">True</option>
                <option <?php echo e(isset($data->deeplink_enabled) && $data->deeplink_enabled == 0 ? "selected" : null); ?>  value="0">False</option>
            </select>
            <?php if($errors->has('deeplink_enabled')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('deeplink_enabled')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('advertiser.api-advertiser.fields.deeplink_enabled_helper')); ?>

            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group <?php echo e($errors->has('supported_regions') ? 'has-error' : ''); ?>">
            <label for="supported_regions" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.fields.supported_regions')); ?></label>
            <div class="atbd-select ">
                <select name="supported_regions[]" id="supported_regions" class="form-control " multiple="multiple" <?php echo e(\App\Helper\Advertiser\Base::getFormFieldReadOnly($data->source, "supported_regions") ? "disabled" : ""); ?>>
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country['iso2']); ?>" <?php echo e(isset($data->supported_regions) && in_array($country['iso2'], $data->supported_regions) ? "selected" : null); ?>><?php echo e($country['name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php if($errors->has('supported_regions')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('supported_regions')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('advertiser.api-advertiser.fields.supported_regions_helper')); ?>

            </p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group <?php echo e($errors->has('categories') ? 'has-error' : ''); ?>">
            <label for="categories" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.fields.categories')); ?> (Max. 4)</label>
            <div class="atbd-select ">
                <select name="categories[]" id="categories" class="form-control " multiple="multiple" <?php echo e(\App\Helper\Advertiser\Base::getFormFieldReadOnly($data->source, "categories") ? "disabled" : ""); ?>>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(isset($data->categories) && in_array($category['id'], $data->categories) ? "selected" : null); ?> value="<?php echo e($category['id']); ?>">
                            <?php echo e($category['name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php if($errors->has('categories')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('categories')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('advertiser.api-advertiser.fields.categories_helper')); ?>

            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group <?php echo e($errors->has('promotional_methods') ? 'has-error' : ''); ?>">
            <label for="promotional_methods" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.fields.promotional_methods')); ?></label>
            <div class="atbd-select ">
                <select name="promotional_methods[]" id="promotional_methods" class="form-control " multiple="multiple" <?php echo e(\App\Helper\Advertiser\Base::getFormFieldReadOnly($data->source, "promotional_methods") ? "disabled" : ""); ?>>
                    <?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(isset($data->promotional_methods) && in_array($method['id'], $data->promotional_methods) ? "selected" : null); ?> value="<?php echo e($method['id']); ?>">
                            <?php echo e($method['name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php if($errors->has('promotional_methods')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('promotional_methods')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('advertiser.api-advertiser.fields.promotional_methods_helper')); ?>

            </p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group <?php echo e($errors->has('program_restrictions') ? 'has-error' : ''); ?>">
            <label for="program_restrictions" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.fields.program_restrictions')); ?></label>
            <div class="atbd-select ">
                <select name="program_restrictions[]" id="program_restrictions" class="form-control " multiple="multiple" <?php echo e(\App\Helper\Advertiser\Base::getFormFieldReadOnly($data->source, "program_restrictions") ? "disabled" : ""); ?>>
                    <?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($method['id']); ?>" <?php echo e(isset($data->program_restrictions) && in_array($method['id'], $data->program_restrictions) ? "selected" : null); ?>>
                            <?php echo e($method['name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php if($errors->has('program_restrictions')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('program_restrictions')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('advertiser.api-advertiser.fields.program_restrictions_helper')); ?>

            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group <?php echo e($errors->has('tags') ? 'has-error' : ''); ?>">
            <label for="tags" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.fields.tags')); ?></label>
            <div class="atbd-select ">
                <input type="text" name="tags" data-role="tagsinput" value="<?php if($data->tags): ?><?php echo e($data->tags); ?><?php endif; ?>" <?php echo e(\App\Helper\Advertiser\Base::getFormFieldReadOnly($data->source, "tags") ? "disabled" : ""); ?>>
            </div>
            <?php if($errors->has('tags')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('tags')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('advertiser.api-advertiser.fields.tags_helper')); ?>

            </p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group <?php echo e($errors->has('offer_type') ? 'has-error' : ''); ?>">
            <label for="offer_type" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.fields.offer_type')); ?></label>
            <input type="text" id="offer_type" name="offer_type" class="form-control" value="<?php echo e(old('offer_type', $data->offer_type ?? '')); ?>" <?php echo e(\App\Helper\Advertiser\Base::getFormFieldReadOnly($data->source, "offer_type") ? "disabled" : ""); ?>>
            <?php if($errors->has('offer_type')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('offer_type')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('advertiser.api-advertiser.fields.offer_type_helper')); ?>

            </p>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group <?php echo e($errors->has('commission') ? 'has-error' : ''); ?>">
            <label for="offer_type" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.fields.commission')); ?></label>
            <input type="text" id="commission" name="commission" class="form-control" value="<?php echo e(old('commission', $data->commission ?? '')); ?>" <?php echo e(\App\Helper\Advertiser\Base::getFormFieldReadOnly($data->source, "commission") ? "disabled" : ""); ?>>
            <?php if($errors->has('commission')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('commission')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('advertiser.api-advertiser.fields.commission_helper')); ?>

            </p>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group <?php echo e($errors->has('commission_type') ? 'has-error' : ''); ?>">
            <label for="offer_type" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.fields.commission_type')); ?></label>
            <input type="text" id="commission_type" name="commission_type" class="form-control" value="<?php echo e(old('commission_type', $data->commission_type ?? '')); ?>" <?php echo e(\App\Helper\Advertiser\Base::getFormFieldReadOnly($data->source, "commission_type") ? "disabled" : ""); ?>>
            <?php if($errors->has('commission_type')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('commission_type')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('advertiser.api-advertiser.fields.commission_type_helper')); ?>

            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <td colspan="6">
                        <label class="p-0 m-0 font-weight-bold text-black">Commission Table</label>
                        <a href="javascript:void(0)" onclick="addMoreCommission(<?php echo e($api_advertiser->commissions->count()); ?>)" id="commissionBtn" class="btn btn-xs btn-success float-right">
                            Add More
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>Date</th>
                    <th>Condition</th>
                    <th>Rate</th>
                    <th>Type</th>
                    <th>Info</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="commissionContent">
                <?php if(count($api_advertiser->commissions ?? [])): ?>
                    <?php $__currentLoopData = $api_advertiser->commissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $commission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <input type="hidden" id="commission-id-<?php echo e($key); ?>" name="commissions[<?php echo e($key); ?>][commission_id]" value="<?php echo e($commission->id ?? ''); ?>">
                        <tr id="commission-<?php echo e($key); ?>">
                            <td class="input-group-sm">
                                <input type="date" name="commissions[<?php echo e($key); ?>][date]" class="form-control" value="<?php echo e($commission->date ?? ''); ?>" min="1990-01-01" max="<?php echo e(now()->format("Y-m-d")); ?>">
                            </td>
                            <td class="input-group-sm">
                                <input type="text" name="commissions[<?php echo e($key); ?>][condition]" class="form-control" value="<?php echo e($commission->condition ?? ''); ?>">
                            </td>
                            <td class="input-group-sm">
                                <input type="text" name="commissions[<?php echo e($key); ?>][rate]" class="form-control" value="<?php echo e($commission->rate ?? ''); ?>">
                            </td>
                            <td class="input-group-sm">
                                <input type="text" name="commissions[<?php echo e($key); ?>][type]" class="form-control" value="<?php echo e($commission->type ?? ''); ?>">
                            </td>
                            <td class="input-group-sm">
                                <input type="text" name="commissions[<?php echo e($key); ?>][info]" class="form-control" value="<?php echo e($commission->info ?? ''); ?>">
                            </td>
                            <td class="text-center">
                                <?php if(isset($commission->created_by) && ($commission->created_by == \App\Helper\Static\Vars::DEFAULT_GENERATED || $commission->created_by == \App\Helper\Static\Vars::CRON_JOB_CREATED)): ?>
                                    -
                                <?php else: ?>
                                    <a href="javascript:void(0)" onclick="removeCommission(<?php echo e($key); ?>)" class="text-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">
                            <small>No Commission Exist</small>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-12">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <td colspan="2">
                        <label class="p-0 m-0 font-weight-bold text-black">Validation Domains Table</label>
                        <a href="javascript:void(0)" onclick="addMoreValidation(<?php echo e(count($api_advertiser->valid_domains ?? [])); ?>)" id="validationBtn" class="btn btn-xs btn-success float-right">
                            Add More
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="validationDomainContent">
                <?php if(count($api_advertiser->validation_domains ?? [])): ?>
                    <?php $__currentLoopData = $api_advertiser->validation_domains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $domain): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="validation-domains-<?php echo e($key); ?>">
                            <td class="input-group-sm">
                                <input type="hidden" id="validation-domains-id-<?php echo e($key); ?>" value="<?php echo e($domain['id']); ?>">
                                <input type="text" name="validations[<?php echo e($key); ?>][domain]" <?php if(isset($domain['created_by']) && $domain['created_by'] == \App\Helper\Static\Vars::CRON_JOB_CREATED): ?> disabled <?php endif; ?> class="form-control" value="<?php echo e($domain['name'] ?? ''); ?>">
                            </td>
                            <td class="text-center">
                                <?php if(isset($domain['created_by']) && $domain['created_by'] == \App\Helper\Static\Vars::CRON_JOB_CREATED): ?>
                                    -
                                <?php else: ?>
                                    <a href="javascript:void(0)" onclick="removeValidation(<?php echo e($key); ?>)" class="text-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2" class="text-center">
                            <small>No Validation Domains Exist</small>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-12">
        <div class="form-group <?php echo e($errors->has('click_through_url') ? 'has-error' : ''); ?>">
            <label for="click_through_url" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.fields.click_through_url')); ?></label>
            <input type="url" id="click_through_url" name="click_through_url" class="form-control" value="<?php echo e(old('click_through_url', $data->click_through_url ?? '')); ?>" <?php echo e(\App\Helper\Advertiser\Base::getFormFieldReadOnly($data->source, "click_through_url") ? "disabled" : ""); ?>>
            <?php if($errors->has('click_through_url')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('click_through_url')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('advertiser.api-advertiser.fields.click_through_url_helper')); ?>

            </p>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-12">
        <div class="form-group <?php echo e($errors->has('custom_domain') ? 'has-error' : ''); ?>">
            <label for="custom_domain" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.fields.custom_domain')); ?></label>
            <input type="text" id="custom_domain" name="custom_domain" class="form-control" value="<?php echo e(old('custom_domain', $data->custom_domain ?? '')); ?>">
            <?php if($errors->has('custom_domain')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('custom_domain')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('advertiser.api-advertiser.fields.custom_domain_helper')); ?>

            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="form-group <?php echo e($errors->has('logo') ? 'has-error' : ''); ?>">
            <label for="logo" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.fields.logo')); ?></label>
            <input class="form-control" type="file" name="logo" id="logo">
            <?php if($errors->has('logo')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('logo')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('advertiser.api-advertiser.fields.logo_helper')); ?>

            </p>
            <label for="logo_preview" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.fields.logo_preview')); ?></label><br />
            <img class="img-thumbnail" src="<?php echo e(isset($data->logo) && str_contains($data->logo, "http") ? $data->logo : \App\Helper\Static\Methods::staticAsset($data->logo)); ?>" alt="">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="form-group <?php echo e($errors->has('program_policies') ? 'has-error' : ''); ?>">
            <label for="program_policies" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.fields.program_policies')); ?></label>
            <textarea name="program_policies" id="program_policies" cols="30" rows="10" class="form-control" <?php echo e(\App\Helper\Advertiser\Base::getFormFieldReadOnly($data->source, "program_policies") ? "disabled" : ""); ?>><?php echo e($data->program_policies ?? null); ?></textarea>
            <?php if($errors->has('program_policies')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('program_policies')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('advertiser.api-advertiser.fields.program_policies_helper')); ?>

            </p>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-12">
        <div class="form-group <?php echo e($errors->has('short_description') ? 'has-error' : ''); ?>">
            <label for="short_description" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.fields.short_description')); ?></label>
            <textarea name="short_description" id="short_description" cols="30" rows="10" class="form-control" <?php echo e(\App\Helper\Advertiser\Base::getFormFieldReadOnly($data->source, "short_description") ? "disabled" : ""); ?>><?php echo e($data->short_description ?? null); ?></textarea>
            <?php if($errors->has('short_description')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('short_description')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('advertiser.api-advertiser.fields.short_description_helper')); ?>

            </p>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-12">
        <div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
            <label for="description" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.fields.description')); ?></label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control" <?php echo e(\App\Helper\Advertiser\Base::getFormFieldReadOnly($data->source, "description") ? "disabled" : ""); ?>><?php echo e($data->description ?? null); ?></textarea>
            <?php if($errors->has('description')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('description')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('advertiser.api-advertiser.fields.description_helper')); ?>

            </p>
        </div>
    </div>
</div>

<div>
    <input class="btn btn-danger" type="submit" value="<?php echo e(trans('global.save')); ?>">
</div>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/advertisers/form.blade.php ENDPATH**/ ?>