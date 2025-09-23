@extends("layouts.admin.panel_app")

@pushonce('styles')
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/css/select2.min.css") }}"/>
@endpushonce

@pushonce('scripts')
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/select2.full.min.js") }}"></script>
    <script>
        $("#permissions").select2({
            placeholder: "Permissions",
            dropdownCssClass: "tag",
            allowClear: true,
        });
        $('.select-all').click(function () {
            let $select2 = $(this).parent().siblings('.select2')
            $select2.find('option').prop('selected', 'selected')
            $select2.trigger('change')
        });
        $('.deselect-all').click(function () {
            let $select2 = $(this).parent().siblings('.select2')
            $select2.find('option').prop('selected', '')
            $select2.trigger('change')
        });
    </script>
@endpushonce

@section("content")
    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h1 class="title">{{ trans('global.edit') }} {{ trans('cruds.role.title_singular') }}</h1>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="action-btn">
                                    <a href="{{ route('admin.user-management.roles.index') }}" class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-decoration-none my-3" style="width: 40px; height: 40px; cursor: pointer;">
                                        <i class="ri-arrow-left-line text-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                @include("partial.admin.alert")

                                <form action="{{ route("admin.user-management.roles.update", [$role->id]) }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    @include("template.admin.roles.form")
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
