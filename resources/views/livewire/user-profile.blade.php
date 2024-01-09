<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">  {{ __('Perfíl del usuario') }} </h1>
    </div>
    <!-- Page Header Close -->

    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-body p-0">
                    <div class="d-sm-flex align-items-top p-4 border-bottom border-block-end-dashed main-profile-cover">
                        <div>
                            <span class="avatar avatar-xxl avatar-rounded  me-3">
                                <img src="{!! asset('storage/user/' . Auth::user()->id) !!}" alt="">
                            </span>
                        </div>
                        <div class="flex-fill main-profile-info">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="fw-semibold mb-1 text-fixed-white">{{ \Auth::user()->fullname }}</h6>
                                <button class="btn btn-light btn-wave"><i class="ri-add-line me-1 align-middle d-inline-block"></i>Follow</button>
                            </div>
                            <p class="mb-1 text-muted text-fixed-white op-7"> {{ \Auth::user()->profession->name }} </p>
                            <p class="fs-12 text-fixed-white mb-4 op-5">  
                                <span class="me-3"><i class="ri-building-line me-1 align-middle"></i>{{ \Auth::user()->city->name }}</span> 
                                <span><i class="ri-map-pin-line me-1 align-middle"></i>{{ \Auth::user()->city->state->name }}</span> 
                                <span><i class="ri-map-pin-line me-1 align-middle"></i>{{ \Auth::user()->city->state->country->name }}</span> 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body p-0">
                            <div class="p-3 border-bottom border-block-end-dashed d-flex align-items-center justify-content-between">
                                <div>
                                    <ul class="nav nav-tabs mb-0 tab-style-6 justify-content-start" id="userProfileTabs" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="profile" data-bs-toggle="tab"
                                                data-bs-target="#profile-pane" type="button" role="tab"
                                                aria-controls="profile-pane" aria-selected="true"><i
                                                    class="bx bx-user me-1 align-middle d-inline-block"></i> {{ __('Perfíl del usuario') }} </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="token" data-bs-toggle="tab"
                                                data-bs-target="#token-pane" type="button" role="tab"
                                                aria-controls="token-pane" aria-selected="false"><i
                                                    class="ri-bill-line me-1 align-middle d-inline-block"></i>{{ __('Token') }}</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-3">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane show active fade p-0 border-0" id="profile-pane"
                                        role="tabpanel" aria-labelledby="profile" tabindex="0">
                                        <div class="row">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade p-0 border-0" id="token-pane"
                                        role="tabpanel" aria-labelledby="token" tabindex="0">
                                        <livewire:token-configuration />
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End::row-1 -->

</div>