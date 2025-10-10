@extends("auth.publisher_register.base")

@section("step_form_content")
<div class="card">
    <div class="card-body">
        <div class="edit-profile__body">
            <form id="stepThree" action="javascript:void(0)">
                <div class="form-group">
                    <label for="website_url" class="form-label">Website URL<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="website_url" name="website_url" placeholder="https://www.domain.com" value="{{ $stepThree['website_url'] ?? null }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="brief_introduction" class="form-label">Brief Introduction<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <textarea class="form-control" id="brief_introduction" name="brief_introduction" rows="3" placeholder="Please write a brief introduction to help us and the brand get to know you quickly.">{{ $stepThree['brief_introduction'] ?? null }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="categories" class="form-label">Category (Max. 4)<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <select name="categories[]" id="categories" class="form-control select2-custom" multiple="multiple">
                            @foreach($categories as $category)
                                <option value="{{ $category['id'] }}" {{ isset($stepThree['categories']) && in_array($category['id'], $stepThree['categories']) ? 'selected' : null }}>
                                    {{ $category['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="partner_types" class="form-label">Partner Type (Max. 3)<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <select name="partner_types[]" id="partner_types" class="form-control select2-custom" multiple="multiple">
                            @foreach($partners as $partner)
                                <option value="{{ $partner['id'] }}" {{ isset($stepThree['partner_types']) && in_array($partner['id'], $stepThree['partner_types']) ? 'selected' : null }}>
                                    {{ $partner['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="website_country" class="form-label">Website Country / Region<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <select class="form-control" id="website_country" name="website_country">
                            <option value="" disabled selected>Please Select</option>
                            @foreach($countries as $country)
                                <option {{ isset($stepThree['website_country']) && $stepThree['website_country'] == $country['id'] ? 'selected' : null }} value="{{ $country['id'] }}">
                                    {{ ucwords($country['name']) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="monthly_traffic" class="form-label">Monthly Traffic<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="monthly_traffic" name="monthly_traffic" placeholder="e.g., 50,000" value="{{ $stepThree['monthly_traffic'] ?? null }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="monthly_page_views" class="form-label">Monthly Page Views<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="monthly_page_views" name="monthly_page_views" placeholder="e.g., 200,000" value="{{ $stepThree['monthly_page_views'] ?? null }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="button-group d-flex pt-3 mb-20 justify-content-between flex-wrap">
                    <button type="button" onclick="stepFormShow(2)" class="btn-light"><i class="ri-arrow-left-line mr-10"></i>Previous</button>
                    <button type="submit" id="saveThreeStep" class="btn-login">Save &amp; Next<i class="ri-arrow-right-line ml-10"></i></button>
                </div>
            </form>
        </div>
    </div>
</div><!-- ends: .card -->
<style>
    /* Select2 Custom Styling to match our theme */
    .select2-custom + .select2-container .select2-selection--multiple {
        border: 1px solid #e9ecef;
        padding: 10px 15px;
        min-height: 52px;
        background: #f9f9fc;
        transition: all 0.3s ease;
    }

    .select2-custom + .select2-container .select2-selection--multiple:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(123, 54, 181, 0.1);
        background: white;
        outline: none;
    }

    .select2-custom + .select2-container .select2-selection--multiple .select2-selection__rendered {
        padding: 0;
        margin: 0;
    }

    .select2-custom + .select2-container .select2-selection--multiple .select2-selection__choice {
        background: var(--primary-color);
        border: 1px solid var(--primary-dark-color);
        color: white;
        padding: 6px 12px;
        margin: 2px 4px 2px 0;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .select2-custom + .select2-container .select2-selection--multiple .select2-selection__choice__remove {
        color: white;
        margin-right: 6px;
        border: none;
        background: transparent;
        font-size: 1rem;
        line-height: 1;
    }

    .select2-custom + .select2-container .select2-selection--multiple .select2-selection__choice__remove:hover {
        color: var(--primary-light-color);
        background: transparent;
    }

    .select2-custom + .select2-container .select2-search--inline .select2-search__field {
        margin: 0;
        padding: 0;
        color: var(--dark-color);
        font-family: var(--primary-font-family);
        min-height: auto;
    }

    .select2-custom + .select2-container .select2-search--inline .select2-search__field::placeholder {
        color: #020202;
        opacity: 0.7;
    }

    .select2-custom + .select2-container .select2-search--inline .select2-search__field:focus {
        outline: none;
        border: none;
        box-shadow: none;
    }

    /* Dropdown Styling */
    .select2-custom + .select2-container .select2-dropdown {
        border: 1px solid #e9ecef;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .select2-custom + .select2-container .select2-results__option {
        padding: 12px 15px;
        font-family: var(--primary-font-family);
        color: var(--dark-color);
        transition: all 0.2s ease;
    }

    .select2-custom + .select2-container .select2-results__option:hover {
        background: var(--primary-light-color);
        color: var(--primary-dark-color);
    }

    .select2-custom + .select2-container .select2-results__option--selected {
        background: var(--primary-color);
        color: white;
    }

    .select2-custom + .select2-container .select2-results__option--highlighted {
        background: var(--primary-color);
        color: white;
    }

    /* Search box in dropdown */
    .select2-custom + .select2-container .select2-search--dropdown {
        padding: 15px;
        border-bottom: 1px solid #e9ecef;
    }

    .select2-custom + .select2-container .select2-search--dropdown .select2-search__field {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 10px 15px;
        font-family: var(--primary-font-family);
        background: #f9f9fc;
        transition: all 0.3s ease;
    }

    .select2-custom + .select2-container .select2-search--dropdown .select2-search__field:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(123, 54, 181, 0.1);
        background: white;
        outline: none;
    }

    /* Clear and dropdown arrows */
    .select2-custom + .select2-container .select2-selection__clear {
        color: #6c757d;
        margin-right: 5px;
        font-size: 1.2rem;
    }

    .select2-custom + .select2-container .select2-selection__arrow {
        color: #6c757d;
    }

    .select2-custom + .select2-container .select2-selection--multiple .select2-selection__choice {
        display: flex;
        align-items: center;
    }

    /* Limit indicator */
    .select-limit-warning {
        font-size: 0.875rem;
        color: #dc3545;
        margin-top: 5px;
        display: none;
    }
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
        border: 1px solid #e9ecef;
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

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }

    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%236c757d' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 12px;
    }

    select.form-control[multiple] {
        background-image: none;
        min-height: 120px;
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
@endsection