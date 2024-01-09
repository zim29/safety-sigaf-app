<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">  {{ __('Perfíl del usuario') }} </h1>
    </div>
    <!-- Page Header Close -->

    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xxl-4 col-xl-12">
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
        <div class="col-xxl-8 col-xl-12">
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
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="followers-tab" data-bs-toggle="tab"
                                                data-bs-target="#followers-tab-pane" type="button" role="tab"
                                                aria-controls="followers-tab-pane" aria-selected="false"><i
                                                    class="ri-money-dollar-box-line me-1 align-middle d-inline-block"></i>Friends</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="gallery-tab" data-bs-toggle="tab"
                                                data-bs-target="#gallery-tab-pane" type="button" role="tab"
                                                aria-controls="gallery-tab-pane" aria-selected="false"><i
                                                    class="ri-exchange-box-line me-1 align-middle d-inline-block"></i>Gallery</button>
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
                                    <div class="tab-pane fade p-0 border-0" id="followers-tab-pane"
                                        role="tabpanel" aria-labelledby="followers-tab" tabindex="0">
                                        <div class="row">
                                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <div class="card custom-card shadow-none border">
                                                    <div class="card-body p-4">
                                                        <div class="text-center">
                                                            <span class="avatar avatar-xl avatar-rounded">
                                                                <img src="../assets/images/faces/2.jpg" alt="">
                                                            </span>
                                                            <div class="mt-2">
                                                                <p class="mb-0 fw-semibold">Samantha May</p>
                                                                <p class="fs-12 op-7 mb-1 text-muted">samanthamay2912@gmail.com</p>
                                                                <span class="badge bg-info-transparent rounded-pill">Team Member</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <div class="btn-list">
                                                            <button class="btn btn-sm btn-light btn-wave">Block</button>
                                                            <button class="btn btn-sm btn-primary btn-wave">Unfollow</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <div class="card custom-card shadow-none border">
                                                    <div class="card-body p-4">
                                                        <div class="text-center">
                                                            <span class="avatar avatar-xl avatar-rounded">
                                                                <img src="../assets/images/faces/15.jpg" alt="">
                                                            </span>
                                                            <div class="mt-2">
                                                                <p class="mb-0 fw-semibold">Andrew Garfield</p>
                                                                <p class="fs-12 op-7 mb-1 text-muted">andrewgarfield98@gmail.com</p>
                                                                <span class="badge bg-success-transparent rounded-pill">Team Lead</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <div class="btn-list">
                                                            <button class="btn btn-sm btn-light btn-wave">Block</button>
                                                            <button class="btn btn-sm btn-primary btn-wave">Unfollow</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <div class="card custom-card shadow-none border">
                                                    <div class="card-body p-4">
                                                        <div class="text-center">
                                                            <span class="avatar avatar-xl avatar-rounded">
                                                                <img src="../assets/images/faces/5.jpg" alt="">
                                                            </span>
                                                            <div class="mt-2">
                                                                <p class="mb-0 fw-semibold">Jessica Cashew</p>
                                                                <p class="fs-12 op-7 mb-1 text-muted">jessicacashew143@gmail.com</p>
                                                                <span class="badge bg-info-transparent rounded-pill">Team Member</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <div class="btn-list">
                                                            <button class="btn btn-sm btn-light btn-wave">Block</button>
                                                            <button class="btn btn-sm btn-primary btn-wave">Unfollow</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <div class="card custom-card shadow-none border">
                                                    <div class="card-body p-4">
                                                        <div class="text-center">
                                                            <span class="avatar avatar-xl avatar-rounded">
                                                                <img src="../assets/images/faces/11.jpg" alt="">
                                                            </span>
                                                            <div class="mt-2">
                                                                <p class="mb-0 fw-semibold">Simon Cowan</p>
                                                                <p class="fs-12 op-7 mb-1 text-muted">jessicacashew143@gmail.com</p>
                                                                <span class="badge bg-warning-transparent rounded-pill">Team Manager</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <div class="btn-list">
                                                            <button class="btn btn-sm btn-light btn-wave">Block</button>
                                                            <button class="btn btn-sm btn-primary btn-wave">Unfollow</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <div class="card custom-card shadow-none border">
                                                    <div class="card-body p-4">
                                                        <div class="text-center">
                                                            <span class="avatar avatar-xl avatar-rounded">
                                                                <img src="../assets/images/faces/7.jpg" alt="">
                                                            </span>
                                                            <div class="mt-2">
                                                                <p class="mb-0 fw-semibold">Amanda nunes</p>
                                                                <p class="fs-12 op-7 mb-1 text-muted">amandanunes45@gmail.com</p>
                                                                <span class="badge bg-info-transparent rounded-pill">Team Member</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <div class="btn-list">
                                                            <button class="btn btn-sm btn-light btn-wave">Block</button>
                                                            <button class="btn btn-sm btn-primary btn-wave">Unfollow</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <div class="card custom-card shadow-none border">
                                                    <div class="card-body p-4">
                                                        <div class="text-center">
                                                            <span class="avatar avatar-xl avatar-rounded">
                                                                <img src="../assets/images/faces/12.jpg" alt="">
                                                            </span>
                                                            <div class="mt-2">
                                                                <p class="mb-0 fw-semibold">Mahira Hose</p>
                                                                <p class="fs-12 op-7 mb-1 text-muted">mahirahose9456@gmail.com</p>
                                                                <span class="badge bg-info-transparent rounded-pill">Team Member</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <div class="btn-list">
                                                            <button class="btn btn-sm btn-light btn-wave">Block</button>
                                                            <button class="btn btn-sm btn-primary btn-wave">Unfollow</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="text-center mt-4">
                                                    <button class="btn btn-primary-light btn-wave">Show All</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade p-0 border-0" id="gallery-tab-pane"
                                        role="tabpanel" aria-labelledby="gallery-tab" tabindex="0">
                                        <div class="row">
                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                <a href="../assets/images/media/media-40.jpg" class="glightbox card" data-gallery="gallery1">
                                                    <img src="../assets/images/media/media-40.jpg" alt="image" >
                                                </a>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                <a href="../assets/images/media/media-41.jpg" class="glightbox card" data-gallery="gallery1">
                                                    <img src="../assets/images/media/media-41.jpg" alt="image" >
                                                </a>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                <a href="../assets/images/media/media-42.jpg" class="glightbox card" data-gallery="gallery1">
                                                    <img src="../assets/images/media/media-42.jpg" alt="image" >
                                                </a>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                <a href="../assets/images/media/media-43.jpg" class="glightbox card" data-gallery="gallery1">
                                                    <img src="../assets/images/media/media-43.jpg" alt="image" >
                                                </a>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                <a href="../assets/images/media/media-44.jpg" class="glightbox card" data-gallery="gallery1">
                                                    <img src="../assets/images/media/media-44.jpg" alt="image" >
                                                </a>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                <a href="../assets/images/media/media-45.jpg" class="glightbox card" data-gallery="gallery1">
                                                    <img src="../assets/images/media/media-45.jpg" alt="image" >
                                                </a>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                <a href="../assets/images/media/media-46.jpg" class="glightbox card" data-gallery="gallery1">
                                                    <img src="../assets/images/media/media-46.jpg" alt="image" >
                                                </a>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                <a href="../assets/images/media/media-60.jpg" class="glightbox card" data-gallery="gallery1">
                                                    <img src="../assets/images/media/media-60.jpg" alt="image" >
                                                </a>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                <a href="../assets/images/media/media-26.jpg" class="glightbox card" data-gallery="gallery1">
                                                    <img src="../assets/images/media/media-26.jpg" alt="image" >
                                                </a>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                <a href="../assets/images/media/media-32.jpg" class="glightbox card" data-gallery="gallery1">
                                                    <img src="../assets/images/media/media-32.jpg" alt="image" >
                                                </a>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                <a href="../assets/images/media/media-30.jpg" class="glightbox card" data-gallery="gallery1">
                                                    <img src="../assets/images/media/media-30.jpg" alt="image" >
                                                </a>
                                            </div>
                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                <a href="../assets/images/media/media-31.jpg" class="glightbox card" data-gallery="gallery1">
                                                    <img src="../assets/images/media/media-31.jpg" alt="image" >
                                                </a>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="text-center mt-4">
                                                    <button class="btn btn-primary-light btn-wave">Show All</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-xl-">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">
                                Personal Info
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-semibold">
                                            Name :
                                        </div>
                                        <span class="fs-12 text-muted">Sonya Taylor</span>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-semibold">
                                            Email :
                                        </div>
                                        <span class="fs-12 text-muted">sonyataylor231@gmail.com</span>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-semibold">
                                            Phone :
                                        </div>
                                        <span class="fs-12 text-muted">+(555) 555-1234</span>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-semibold">
                                            Designation :
                                        </div>
                                        <span class="fs-12 text-muted">C.E.O</span>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-semibold">
                                            Age :
                                        </div>
                                        <span class="fs-12 text-muted">28</span>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-semibold">
                                            Experience :
                                        </div>
                                        <span class="fs-12 text-muted">10 Years</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card custom-card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="card-title">
                                Recent Posts
                            </div>
                            <div>
                                <span class="badge bg-primary-transparent">Today</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="javascript:void(0);">
                                        <div class="d-flex flex-wrap align-items-center">
                                            <span class="avatar avatar-md me-3">
                                                <img src="../assets/images/media/media-39.jpg" class="img-fluid" alt="...">
                                            </span>
                                            <div class="flex-fill">
                                                <p class="fw-semibold mb-0">Animals</p>
                                                <p class="mb-1 fs-12 profile-recent-posts text-truncate text-muted">
                                                    There are many variations of passages of Lorem Ipsum available
                                                </p>
                                            </div>
                                        </div>
                                    </a>    
                                </li>
                                <li class="list-group-item">
                                    <a href="javascript:void(0);">
                                        <div class="d-flex flex-wrap align-items-center">
                                            <span class="avatar avatar-md me-3">
                                                <img src="../assets/images/media/media-56.jpg" class="img-fluid" alt="...">
                                            </span>
                                            <div class="flex-fill">
                                                <p class="fw-semibold mb-0">Travel</p>
                                                <p class="mb-1 fs-12 profile-recent-posts text-truncate text-muted">
                                                    Latin words, combined with a handful of model sentence
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="javascript:void(0);">
                                        <div class="d-flex flex-wrap align-items-center">
                                            <span class="avatar avatar-md me-3">
                                                <img src="../assets/images/media/media-54.jpg" class="img-fluid" alt="...">
                                            </span>
                                            <div class="flex-fill">
                                                <p class="fw-semibold mb-0">Interior</p>
                                                <p class="mb-1 fs-12 profile-recent-posts text-truncate text-muted">
                                                    Contrary to popular belief, Lorem Ipsum is not simply random
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="javascript:void(0);">
                                        <div class="d-flex flex-wrap align-items-center">
                                            <span class="avatar avatar-md me-3">
                                                <img src="../assets/images/media/media-64.jpg" class="img-fluid" alt="...">
                                            </span>
                                            <div class="flex-fill">
                                                <p class="fw-semibold mb-0">Nature</p>
                                                <p class="mb-1 fs-12 profile-recent-posts text-truncate text-muted">
                                                    It is a long established fact that a reader will be distracted by the readable content
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card custom-card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="card-title">
                                Suggestions
                            </div>
                            <div>
                                <button class="btn btn-sm btn-success-light btn-wave">View All</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="fw-semibold d-flex align-items-center">
                                            <span class="avatar avatar-xs me-2">
                                                <img src="../assets/images/faces/15.jpg" alt="">
                                            </span>Alister
                                        </div>
                                        <div>
                                            <button class="btn btn-sm btn-icon btn-primary-light">
                                                <i class="ri-add-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="fw-semibold d-flex align-items-center">
                                            <span class="avatar avatar-xs me-2">
                                                <img src="../assets/images/faces/4.jpg" alt="">
                                            </span>Samantha Sams
                                        </div>
                                        <div>
                                            <button class="btn btn-sm btn-icon btn-primary-light">
                                                <i class="ri-add-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="fw-semibold d-flex align-items-center">
                                            <span class="avatar avatar-xs me-2">
                                                <img src="../assets/images/faces/11.jpg" alt="">
                                            </span>Jason Mama
                                        </div>
                                        <div>
                                            <button class="btn btn-sm btn-icon btn-primary-light">
                                                <i class="ri-add-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="fw-semibold d-flex align-items-center">
                                            <span class="avatar avatar-xs me-2">
                                                <img src="../assets/images/faces/5.jpg" alt="">
                                            </span>Alicia Sierra
                                        </div>
                                        <div>
                                            <button class="btn btn-sm btn-icon btn-primary-light">
                                                <i class="ri-add-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="fw-semibold d-flex align-items-center">
                                            <span class="avatar avatar-xs me-2">
                                                <img src="../assets/images/faces/7.jpg" alt="">
                                            </span>Kiara Advain
                                        </div>
                                        <div>
                                            <button class="btn btn-sm btn-icon btn-primary-light">
                                                <i class="ri-add-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End::row-1 -->

</div>