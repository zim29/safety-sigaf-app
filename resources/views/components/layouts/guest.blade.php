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

        <!-- Start::app-content -->
        <div class="main-content">
            <div class="container-fluid mt-3">
                {{$slot}}
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


    @livewireScripts

    @vite(['resources/js/app.js'])
    
    <!-- Popper JS -->
    <script src="{!! asset('assets/libs/@popperjs/core/umd/popper.min.js') !!}"></script>

    <!-- Bootstrap JS -->
    <script src="{!! asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

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


        function playsound (url) {
            const audio = document.createElement('audio');
             audio.src = url;
             audio.play();
        }

        function removeIsInvalidClass () {
            this.classList.remove('is-invalid');
        }

        document.addEventListener('DOMContentLoaded', () => {
            let inputs = document.querySelectorAll('input'); 
            inputs.forEach(input => input.addEventListener('keydown', removeIsInvalidClass));
        });
        
    </script>

    @stack('scripts')

</body>

</html>