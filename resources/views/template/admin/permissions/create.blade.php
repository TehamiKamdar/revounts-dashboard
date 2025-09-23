@extends("layouts.admin.panel_app")

@section("content")

    <div class="container-fluid">
        <h1 class="title">{{ trans('global.add') }}
            {{ trans('cruds.permission.title_singular') }}</h1>
                <a href="{{ route("admin.user-management.permissions.index") }}"
            class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-decoration-none my-3"
            style="width: 40px; height: 40px; cursor: pointer;">
            <i class="ri-arrow-left-line text-white"></i>
        </a>
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        @include("partial.admin.alert")

                        <form action="{{ route("admin.user-management.permissions.store") }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @include("template.admin.permissions.form")
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection