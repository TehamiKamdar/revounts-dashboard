@if(auth()->user()->profile_complete_per < 100)
<style>
    .sales-target__progress-bar {
    position: relative;
    margin: 4px;
    float: left;
    text-align: center;
}
.sales-target__progress-bar .barOverflow {
    position: relative;
    overflow: hidden;
    width: 222px;
    height: 111px;
    margin-bottom: -14px;
}
.sales-target__progress-bar .bar {
    position: absolute;
    top: 0;
    left: 0;
    width: 222px;
    height: 222px;
    border-radius: 50%;
    box-sizing: border-box;
    border: 15px solid #eddfff;
    border-bottom-color: #3c1a55;
    border-right-color: #3c1a55;
    transform: rotate(45deg);
}
.sales-target__progress-bar .left {
    position: absolute;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    left: 0;
    bottom: -24px;
    overflow: hidden;
}
.sales-target__progress-bar .right {
    position: absolute;
    background: white;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    right: 0;
    bottom: -24px;
    overflow: hidden;
}
.sales-target__progress-bar .back {
    width: 15px;
    height: 15px;
    background: #eddfff;
    position: absolute;
}
.sales-target__progress-bar .total-count {
    position: absolute;
    top: 92%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 30px;
    font-weight: 700;
}
.sales-target__progress-bar .total-count .total-count__text {
    font-size: 15px;
    line-height: 22px;
    text-transform: capitalize;
    color: #868EAE;
    font-weight: 400;
}

.top-circle {
    position: absolute;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    left: 0;
    bottom: 87px;
    overflow: hidden;
    top: 88%;
    left: 12%;
    transform: translate(-50%, -50%);
}
</style>
    <div class="row">
        <div class="col-md-3">
            <div class="sales-target__progress-bar">
                <div class="left"></div>
                <div class="right">
                    <div class="back"></div>
                </div>
                <div class="barOverflow">
                    <div class="bar">
                        <div class="top-circle"></div>
                    </div>
                </div>
                <div class="total-count">
                    <span>{{ auth()->user()->profile_complete_per }}</span>%
                    <div class="total-count__text">
                        Profile Completeness
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-9 mb-25">
            <div class="user-group radius-xl bg-white media-ui media-ui--onHold pt-30 pb-20">
                <div class="px-30">
                    <div class="media user-group-media d-flex justify-content-between">
                        <div class="media-body d-flex align-items-center flex-wrap text-capitalize my-sm-0 my-n2">
                            <h6 class="mt-0  fw-500 user-group media-ui__title">Complete your profile to apply more advertisers </h6>
                        </div>
                    </div>
                    <div class="user-group-people mt-15">
                        <p class="mb-0">Please complete your profile to get more brand approvals. To complete your profile, you must submit the logo and all the details in <a href="{{ route("publisher.profile.basic-information.index") }}">profile picture</a>, <a href="{{ route("publisher.profile.basic-information.index") }}">basic</a>, <a href="{{ route("publisher.profile.company.index") }}">company</a>, <a href="{{ route("publisher.payments.billing-information.index") }}">billing</a>, and <a href="{{ route("publisher.payments.payment-settings.index") }}">payments</a>.</p>
                    </div>
                    <div class="user-group-progress-bar">


                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{ auth()->user()->profile_complete_per }}%;" aria-valuenow="{{ auth()->user()->profile_complete_per }}" aria-valuemin="0" aria-valuemax="100">{{ auth()->user()->profile_complete_per }}%</div>
                            </div>



                        <p class="color-light fs-12 mb-0">{{ count(auth()->user()->profile_complete_section ?? []) }} / 5 settings completed</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endif
