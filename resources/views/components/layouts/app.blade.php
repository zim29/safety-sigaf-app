<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="icon-overlay-close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="user_id" content="{{Auth::id()}}"/>
    <title> {{ config('app.name') }} | {{ __($title  ?? '') }} </title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/brand-logos/bypaulBrand.jpg') }}" type="image/x-icon">

    <!-- Main Theme Js -->
    <script src="{!! asset('assets/js/main.js') !!}"></script>
    
    <!-- Bootstrap Css -->
    <link id="style" href="{!! asset('assets/libs/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet" >

    <!-- Style Css -->
    <link href="{!! asset('assets/css/styles.min.css') !!}" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="{!! asset('assets/css/icons.css') !!}" rel="stylesheet" >

    <!-- Node Waves Css -->
    <link href="{!! asset('assets/libs/node-waves/waves.min.css') !!}" rel="stylesheet" > 

    <!-- Simplebar Css -->
    <link href="{!! asset('assets/libs/simplebar/simplebar.min.css') !!}" rel="stylesheet" >

    <!-- Choices Css -->
    <link rel="stylesheet" href="{!! asset('assets/libs/choices.js/public/assets/styles/choices.min.css') !!}">

    <style type="text/css">
        @media print {
            .no-print, header, aside {
                display: none;
            }
        }
        .hoverable {
            transition: transform 0.3s ease-out; /* Transición suave para el cambio de tamaño */
        }

        .hoverable-container:hover .hoverable {
            z-index: 200;
            transform: scale(10) translate(50%); /* Aumenta el tamaño y centra la imagen al 120% cuando el mouse está sobre la imagen */
        }

        .chatbot
        {
            transition: transform 0.3s ease-out;
        }

        .chatbot:hover {
            transform: scale(1.2)
        }

        
    </style>

    <!-- Styles -->
        @livewireStyles


</head>

<body>


    <div class="page">
        <!-- app-header -->
        <header class="app-header" style="z-index: 100;">

            <!-- Start::main-header-container -->
            <div class="main-header-container container-fluid">

                <!-- Start::header-content-left -->
                <div class="header-content-left">

                    <!-- Start::header-element -->
                    <div class="header-element">
                        <div class="horizontal-logo">
                            <a href="index.html" class="header-logo">
                                <img src="{!! asset('assets/images/brand-logos/bypaulBrand.jpg') !!}" alt="logo" class="desktop-logo">
                                <img src="{!! asset('assets/images/brand-logos/bypaulBrand.jpg') !!}" alt="logo" class="toggle-logo">
                                <img src="{!! asset('assets/images/brand-logos/bypaulBrand.jpg') !!}" alt="logo" class="desktop-dark">
                                <img src="{!! asset('assets/images/brand-logos/bypaulBrand.jpg') !!}" alt="logo" class="toggle-dark">
                            </a>
                        </div>
                    </div>
                    <!-- End::header-element -->
                    <!-- Start::header-element -->
                    <div class="header-element">
                        <!-- Start::header-link -->
                        <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle" data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
                        <!-- End::header-link -->
                    </div>
                    <!-- End::header-element -->

                    <div class="header-element position-absolute top-0 start-50 translate-middle-x">
                        {{-- @livewire('ChooseStation') --}}
                    </div>

                </div>
                <!-- End::header-content-left -->

                <!-- Start::header-content-right -->
                <div class="header-content-right">
                    <!-- Start::header-element -->
                    <div class="header-element notifications-dropdown">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" id="messageDropdown" aria-expanded="false">
                            <i class="bx bx-bell header-link-icon"></i>
                            <span class="badge bg-secondary rounded-pill header-icon-badge pulse pulse-secondary" id="notification-icon-badge">5</span>
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <!-- Start::main-header-dropdown -->
                        <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                            <div class="p-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0 fs-17 fw-semibold">Notificaciones</p>
                                    <span class="badge bg-secondary-transparent" id="notifiation-data">3 Sin leer</span>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <ul class="list-unstyled mb-0" id="header-notification-scroll">
                                <li class="dropdown-item">
                                    <div class="d-flex align-items-start">
                                         <div class="pe-2">
                                             <span class="avatar avatar-md bg-primary-transparent avatar-rounded"><i class="bx bx-user fs-18"></i></span>
                                         </div>
                                         <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="mb-0 fw-semibold"><a href="notifications.html">Solicitud de acceso a Vasconia-ODC</a></p>
                                                <span class="text-muted fw-normal fs-12 header-notification-text">Realizado por ByPaul</span>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i class="ti ti-x fs-16"></i></a>
                                            </div>
                                         </div>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="d-flex align-items-start">
                                         <div class="pe-2">
                                             <span class="avatar avatar-md bg-primary-transparent avatar-rounded"><i class="bx bx-user fs-18"></i></span>
                                         </div>
                                         <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="mb-0 fw-semibold"><a href="notifications.html">Solicitud de acceso a Vasconia-Ocsensa</a></p>
                                                <span class="text-muted fw-normal fs-12 header-notification-text">Realizado por CoyotePOS</span>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i class="ti ti-x fs-16"></i></a>
                                            </div>
                                         </div>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="d-flex align-items-start">
                                         <div class="pe-2">
                                             <span class="avatar avatar-md bg-primary-transparent avatar-rounded"><i class="bx bxs-truck fs-18"></i></span>
                                         </div>
                                         <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="mb-0 fw-semibold"><a href="notifications.html">Solicitud de acceso a Caucasi-ODC</a></p>
                                                <span class="text-muted fw-normal fs-12 header-notification-text">Realizado por Ecopetrol</span>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i class="ti ti-x fs-16"></i></a>
                                            </div>
                                         </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="p-3 empty-header-item1 border-top">
                                <div class="d-grid">
                                    <a href="notifications.html" class="btn btn-primary">Ver todo</a>
                                </div>
                            </div>
                            <div class="p-5 empty-item1 d-none">
                                <div class="text-center">
                                    <span class="avatar avatar-xl avatar-rounded bg-secondary-transparent">
                                        <i class="ri-notification-off-line fs-2"></i>
                                    </span>
                                    <h6 class="fw-semibold mt-3">No New Notifications</h6>
                                </div>
                            </div>
                        </div>
                        <!-- End::main-header-dropdown -->
                    </div>
                    <!-- End::header-element -->
                    <!-- Start::header-element -->
                    <div class="header-element header-fullscreen">
                        <!-- Start::header-link -->
                        <a onclick="openFullscreen();" href="#" class="header-link">
                            <i class="bx bx-fullscreen full-screen-open header-link-icon"></i>
                            <i class="bx bx-exit-fullscreen full-screen-close header-link-icon d-none"></i>
                        </a>
                        <!-- End::header-link -->
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="#" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="me-sm-2 me-0">
                                    <img src="{!! asset('storage/user/' . Auth::user()->id) !!}" onerror="this.src='{!! asset('assets/images/authentication/default-person.jfif')!!}';this.onerror='';" alt="{{__('Foto de perfíl de usuario')}}" width="32" height="32" class="rounded-circle">
                                </div>
                                <div class="d-sm-block d-none">
                                    <p class="fw-semibold mb-0 lh-1">{!! Auth::user()->fullname !!}</p>
                                </div>
                            </div>
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end" aria-labelledby="mainHeaderProfile">
                            <li><a class="dropdown-item d-flex" href="{!! route('user-profile', Auth::user()) !!}"><i class="ti ti-user-circle fs-18 me-2 op-7"></i>{!! __('Perfíl') !!}</a></li>
                            <form action="{!! route('logout') !!}" method="POST">
                                @csrf
                                <li><button type="submit" class="dropdown-item d-flex" href="sign-in-cover.html"><i class="ti ti-logout fs-18 me-2 op-7"></i>{!! __('Cerrar Sessión') !!}</button></li>
                            </form>
                        </ul>
                    </div>  
                    <!-- End::header-element -->

                </div>
                <!-- End::header-content-right -->

            </div>
            <!-- End::main-header-container -->
        </header>
        <!-- /app-header -->
        
        @include('components.layouts.sidenav')

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid mt-3">
                @yield('content')
                {{ $slot }}
            </div>
        </div>
        <!-- End::app-content -->
        <!-- Footer Start -->
        <footer class="footer mt-auto py-3 bg-white text-center">
            <div class="container">
                <span class="text-muted"> Copyright © <span id="year"></span> <a
                        href="javascript:void(0);" class="text-dark fw-semibold">ByPaul</a>.{!! __('Todos los derechos reservados.') !!}
                </span>
            </div>
        </footer>
        <!-- Footer End -->

    </div>

    
    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>

    {{-- <livewire:error-message /> --}}
    {{-- <livewire:chat-bot /> --}}

    @livewireScripts

    @vite(['resources/js/app.js'])
    
    <!-- Popper JS -->
    <script src="{!! asset('assets/libs/@popperjs/core/umd/popper.min.js') !!}"></script>

    <!-- Bootstrap JS -->
    <script src="{!! asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

    <!-- Defaultmenu JS -->
    <script src="{!! asset('assets/js/defaultmenu.min.js') !!}"></script>

    <!-- Node Waves JS-->
    <script src="{!! asset('assets/libs/node-waves/waves.min.js') !!}"></script>

    <!-- Sticky JS -->
    <script src="{!! asset('assets/js/sticky.js') !!}"></script>

    <!-- Simplebar JS -->
    <script src="{!! asset('assets/libs/simplebar/simplebar.min.js') !!}"></script>
    <script src="{!! asset('assets/js/simplebar.js') !!}"></script>
    
    <!-- JSVector Maps JS -->
    <script src="{!! asset('assets/libs/jsvectormap/js/jsvectormap.min.js') !!}"></script>

    <!-- JSVector Maps MapsJS -->
    <script src="{!! asset('assets/libs/jsvectormap/maps/world-merc.js') !!}"></script>

    <!-- Apex Charts JS -->
    <script src="{!! asset('assets/libs/apexcharts/apexcharts.min.js') !!}"></script>

    <!-- Chartjs Chart JS -->
    <script src="{!! asset('assets/libs/chart.js/chart.min.js') !!}"></script>

    <script type="text/javascript">
        'use strict';

        /**
         * Validates input field using regEx
         *
         * @param {Object} window.event Event Object.
         * @param {String} regex Regular Expresion used to validate field.
         * @return {void}
         */
        function validateInput (event, regex) {

            let key = event.key;

            if( !key.match(regex) ) event.preventDefault();
        }

        function removeIsInvalidClass () {
            this.classList.remove('is-invalid');
        }

        function playsound (url) {
            const audio = document.createElement('audio');
             audio.src = url;
             audio.play();
        }


        document.addEventListener('DOMContentLoaded', () => {
            let inputs = document.querySelectorAll('input'); 
            inputs.forEach(input => input.addEventListener('keydown', removeIsInvalidClass));
        });
        
    </script>

    @stack('scripts')

</body>

</html>