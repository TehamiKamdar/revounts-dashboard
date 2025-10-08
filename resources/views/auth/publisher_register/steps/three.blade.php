<div class="checkout-progress justify-content-center px-0">
    <div class="step completed" id="1">
        <span class="ri-check-line"></span>
    </div>
    <div class="step completed" id="2">
        <span class="ri-check-line"></span>
    </div>
    <div class="step current" id="3">
        <span>3</span>
    </div>
    <div class="step" id="4">
        <span>4</span>
    </div>
</div>
<div class="page-header">
    <h4>Fill in your website information</h4>
    @section('image')
    <img class="svg" src="{{ \App\Helper\Static\Methods::staticAsset("img/svg/progress4.svg") }}" alt="">
    @endsection
</div>
