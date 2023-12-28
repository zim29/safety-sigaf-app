<!-- Start::app-sidebar -->
<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="{{ route('dashboard') }}" class="header-logo">
            <img src="{!! asset('assets/images/brand-logos/bypaul.jpg') !!}" alt="logo" class="desktop-logo">
            <img src="{!! asset('assets/images/brand-logos/bypaulBrand.jpg') !!}" alt="logo" class="toggle-logo">
            <img src="{!! asset('assets/images/brand-logos/bypaul.jpg') !!}" alt="logo" class="desktop-dark">
            <img src="{!! asset('assets/images/brand-logos/bypaulBrand.jpg') !!}" alt="logo" class="toggle-dark">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
            </div>
            <ul class="main-menu">


                <!-- Start::slide User-->
                @can('manage', \App\Models\User::class)
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <i class="bx bx-user side-menu__icon"></i>
                            <span class="side-menu__label">{!! __('Usuarios') !!}</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">

                            @can('invite', \App\Models\User::class)
                            <li class="slide">
                                <a href="{{ route('create-user') }}" class="side-menu__item">{!! __('Invitar usuario') !!}</a>
                            </li>
                            @endcan

                            @can('list', \App\Models\User::class)
                            <li class="slide">
                                <a href="{{ route('list-users') }}" class="side-menu__item">{!! __('Listar') !!}</a>
                            </li>
                            @endcan

                            @can('createUserAccessRequest', \App\Models\User::class)
                            <li class="slide">
                                <a href="{{ route('create-user-access-request') }}" class="side-menu__item">{!! __('Solicitar acceso') !!}</a>
                            </li>
                            @endcan

                            @can('ApproveUserAccessRequest', \App\Models\User::class)
                            <li class="slide">
                                <a href="{{ route('list-user-access-request') }}" class="side-menu__item">{!! __('Solicitudes pendientes') !!}</a>
                            </li>
                            @endcan

                        </ul>
                    </li>
                @endcan 
                <!-- End ::slide User-->

                <!-- Start::slide Vehicle-->
                @can('showMenu', \App\Models\Vehicle::class)
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <i class="bx bxs-truck side-menu__icon"></i>
                            <span class="side-menu__label">{!! __('Vehículos') !!}</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            @can('create', \App\Models\Vehicle::class)
                                <li class="slide">
                                    <a href="{{ route('create-vehicle') }}" class="side-menu__item">{!! __('Crear') !!}</a>
                                </li>
                            @endcan

                            @can('list', \App\Models\Vehicle::class)
                                <li class="slide">
                                    {{-- <a href="{{ route('list-vehicles') }}" class="side-menu__item">{!! __('Listar') !!}</a> --}}
                                </li>
                            @endcan
                            
                            @can('create', \App\Models\VehicleAccessRequest::class)
                                <li class="slide">
                                    {{-- <a href="{{ route('create-vehicle-access-request') }}" class="side-menu__item">{!! __('Solicitar acceso') !!}</a> --}}
                                </li>
                            @endcan

                            @can('list', \App\Models\Vehicle::class)
                            <li class="slide">
                                {{-- <a href="{{ route('list-vehicle-access-request') }}" class="side-menu__item">{!! __('Solicitudes') !!}</a> --}}
                            </li>
                            @endcan

                            @can('list', \App\Models\Vehicle::class)
                            <li class="slide">
                                {{-- <a href="{{ route('list-vehicle-access-request-history') }}" class="side-menu__item">{!! __('Histórico de solicitudes') !!}</a> --}}
                            </li>
                            @endcan

                        </ul>
                    </li>
                @endcan
                <!-- End ::slide Vehicle-->

                <!-- Start::slide Company-->
                @can('manage', \App\Models\Company::class)
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <i class="bx bxs-buildings side-menu__icon"></i>
                            <span class="side-menu__label">{!! __('Empresas') !!}</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            @can('create', \App\Models\Company::class)
                            <li class="slide">
                                {{-- <a href="{{ route('create-company') }}" class="side-menu__item">{!! __('Crear') !!}</a> --}}
                            </li>
                            @endcan
                            @can('list', \App\Models\Company::class)
                            <li class="slide">
                                {{-- <a href="{{ route('list-companies') }}" class="side-menu__item">{!! __('Listar') !!}</a> --}}
                            </li>
                            @endcan
                            @can('configure', \App\Models\Company::class)
                            <li class="slide">
                                <a href="" class="side-menu__item">{!! __('Contratos') !!}</a>
                            </li>
                            @endcan

                        </ul>
                    </li>
                @endcan
                <!-- End ::slide Company-->

                <!-- Start::slide Stations-->
                @can('manage', \App\Models\Station::class)
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <i class="bx bxs-city side-menu__icon"></i>
                            <span class="side-menu__label">{!! __('Estaciones') !!}</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            @can('create', \App\Models\Station::class)
                            <li class="slide">
                                {{-- <a href="{{ route('create-station') }}" class="side-menu__item">{!! __('Crear') !!}</a> --}}
                            </li>
                            @endcan
                            @can('list', \App\Models\Station::class)
                            <li class="slide">
                                {{-- <a href="{{ route('list-stations') }}" class="side-menu__item">{!! __('Listar') !!}</a> --}}
                            </li>
                            @endcan
                            @can('configure', \App\Models\Station::class)
                            <li class="slide">
                                <a href="" class="side-menu__item">{!! __('Contratos') !!}</a>
                            </li>
                            @endcan

                        </ul>
                    </li>
                @endcan
                <!-- End ::slide Stations-->

                <!-- Start::slide System-->
                @can('manage', \App\Models\System::class)
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <i class="bi bi-shield-fill side-menu__icon"></i>
                            <span class="side-menu__label">{!! __('Sistemas') !!}</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            @can('create', \App\Models\System::class)
                            <li class="slide">
                                {{-- <a href="{{ route('create-system') }}" class="side-menu__item">{!! __('Crear') !!}</a> --}}
                            </li>
                            @endcan
                            @can('list', \App\Models\System::class)
                            <li class="slide">
                                {{-- <a href="{{ route('list-systems') }}" class="side-menu__item">{!! __('Listar') !!}</a> --}}
                            </li>
                            @endcan
                            @can('configure', \App\Models\System::class)
                            <li class="slide">
                                <a href="" class="side-menu__item">{!! __('Contratos') !!}</a>
                            </li>
                            @endcan

                        </ul>
                    </li>
                @endcan
                <!-- End ::slide System-->

                <!-- Start::slide Permission-->
                @can('manage', \App\Models\Permission::class)
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <i class="bx bx-key side-menu__icon"></i>
                            <span class="side-menu__label">{!! __('Permisos') !!}</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide">
                                {{-- <a href="{{ route('create-permission') }}" class="side-menu__item">{!! __('Crear') !!}</a> --}}
                            </li>
                            <li class="slide">
                                {{-- <a href="{{ route('list-permissions') }}" class="side-menu__item">{!! __('Listar') !!}</a> --}}
                            </li>
                            <li class="slide">
                                {{-- <a href="{{ route('link-permission') }}" class="side-menu__item">{!! __('Gestionar permisos de roles') !!}</a> --}}
                            </li>

                        </ul>
                    </li>
                @endcan
                <!-- End::slide Permission-->
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->
</aside>
<!-- End::app-sidebar -->