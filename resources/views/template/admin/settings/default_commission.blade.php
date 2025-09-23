@extends("layouts.admin.panel_app")

@pushonce("styles")

@endpushonce

@section('content')

<div class="container-fluid">
    <h1 class="title">Default Commission</h1>
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    @include("partial.admin.alert")

                    <form action="#" method="POST"
                        enctype="multipart/form-data" id="userForm">
                        @csrf
                        <label for="name">Enter Default
                            Commission</label>

                        <input type="text" placeholder="" class="form-control" name="default_commission"
                            value="80">
                        <div style="margin-top:20px;">
                            <input class="btn btn-danger" type="submit" value="Save">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection