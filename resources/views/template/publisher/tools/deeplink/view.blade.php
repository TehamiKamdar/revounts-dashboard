@extends("layouts.publisher.panel_app")

@pushonce('styles')

@endpushonce

@pushonce('scripts')

@endpushonce

@section("content")

    <div class="contents">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="col-xxl-6 col-lg-6 offset-3 col-sm-12 m-bottom-50 m-top-50">

                        @php
                            $title = "Deep Link Generator";
                            $description = "Create a Link with our super fast deep link generator tool and promote any brand easily.";
                        @endphp
                        @include("template.publisher.widgets.deeplink")
                    </div>

                </div><!-- End: .col -->
            </div>
        </div>

    </div>

@endsection
