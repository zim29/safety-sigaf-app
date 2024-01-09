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
        [disabled] {
            cursor: not-allowed;
        }
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

        [sortable] {
            cursor: pointer;
        }

        .spinner, .offline {
            position: fixed; /* or absolute */
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            width:100vw;
            height :100vh;
            background-color: rgba(0,0,0,.9);
        }

        /* Simple spinner animation */
        .spinner::after {
            position: fixed; /* or absolute */
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            content: '';
            display: block;
            width: 40px;
            height: 40px;
            margin: 8px;
            border-radius: 50%;
            border: 6px solid #fff;
            border-color: blue transparent blue transparent;
            animation: spinner 1.2s linear infinite;
        }

        .offline {
            text-align: center;
            color: red;
            padding-top: 50vh;
            font-size: 20px;
        }


        @keyframes spinner {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
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
                    @livewire('notification')
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
                                    <img src="{!! asset('storage/user/' . Auth::user()->id) !!}"  alt="{{__('Foto de perfíl de usuario')}}" width="32" height="32" class="rounded-circle">
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
                <div id="initial-loading-spinner" class="spinner" >
                </div>
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

    <livewire:alert />
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

    <script>
        document.addEventListener('livewire:initialized', () => {
            document.getElementById('initial-loading-spinner').style.display = 'none';
        });
    </script>

    <script>

        function checkInternetSpeed () {
            const connection = navigator.connection || navigator.mozConnection || navigator.webkitConnection;

            if (connection) {
                if (connection.downlink < .5) {
                    // Conexión lenta detectada
                    window.Livewire.dispatch('warning', {message: 'Conexión a Internet Lenta o Inestable Detectada. La eficiencia y estabilidad del sistema podrían verse comprometidas. Por favor, considera mejorar tu conexión para una experiencia óptima.'});
                }
                return true;
            } else {
                console.log('The Network Information API is not supported by this browser.');
                return false;
            }
        }
        document.addEventListener('livewire:initialized', () => {
            if ( checkInternetSpeed() ) {
                document.addEventListener('change', checkInternetSpeed); 
            }
        });
    </script>

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


        function playsound ( ) {
            const audio = document.createElement('audio');
             audio.src = "{{ asset('assets/sounds/notification.wav') }}";
             audio.play();
             console.log(1);
        }

        document.addEventListener('livewire:init', () => {
               Livewire.on('notifications-updated', playsound);
            });



        document.addEventListener('DOMContentLoaded', () => {
            let inputs = document.querySelectorAll('input, select'); 
            inputs.forEach(input => input.addEventListener('keydown', removeIsInvalidClass));
        });
        
    </script>

    @stack('scripts')

</body>

</html>