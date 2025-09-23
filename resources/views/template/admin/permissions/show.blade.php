@extends("layouts.admin.panel_app")

@section("content")

    <div class="container-fluid">

        <h1 class="title">{{ trans('global.show') }} {{ trans('cruds.permission.title') }}</h1>
        <a href="{{ route("admin.user-management.permissions.index") }}"
            class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-decoration-none my-3"
            style="width: 40px; height: 40px; cursor: pointer;">
            <i class="ri-arrow-left-line text-white"></i>
        </a>

        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2">
                            <div class="table-container">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-social">
                                        <tbody>
                                            <tr>
                                                <th>
                                                    {{ trans('cruds.permission.fields.id') }}
                                                </th>
                                                <td>
                                                    {{ $permission->id }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    {{ trans('cruds.permission.fields.title') }}
                                                </th>
                                                <td>
                                                    {{ $permission->title }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection