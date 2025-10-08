<div class="checkout-progress justify-content-center px-0">
    <div class="step completed" id="1">
        <span class="ri-check-line"></span>
    </div>
    <div class="step completed" id="2">
        <span class="ri-check-line"></span>
    </div>
    <div class="step completed" id="3">
        <span class="ri-check-line"></span>
    </div>
    <div class="step current" id="4">
        <span>4</span>
    </div>
</div>
<div class="page-header">
    <h4>Verify your email</h4>
    <p>We have emailed your inbox, check and verify to complete your registration.</p>
    @section('image')
    <img class="svg" src="{{ \App\Helper\Static\Methods::staticAsset("img/svg/progress5.svg") }}" alt="img">
    @endsection
</div>
