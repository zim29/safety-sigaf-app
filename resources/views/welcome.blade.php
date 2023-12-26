<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Página de Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Agrega cualquier otro estilo personalizado que necesites -->
    <style>
        /* Estilos personalizados */
        body {
            padding-top: 56px;
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: url('{{ asset('assets/images/landing/sigaf_landing.jpg')  }}') no-repeat center center fixed;
            background-size: cover;
        }

        .navbar {
            position: absolute;
            
        }

        .navbar * {
            display: inline;
        }

        @media only screen and (min-width: 1024px) {
            .navbar {
                top: 60vh;
                left: 15vw;
                height: 10%;
            }
        }

        @media only screen and (min-width: 800px) {
            .navbar {
                top: 60vh;
                left: 10vw;
                height: 10%;
            }
        }

    </style>
</head>
<body>

    <div class="container">
        
        <div class="navbar">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item inline">
                        <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ route('register') }}"> {{ __('Registrarse') }} </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ url('logout') }}"> {{ __('Acceder al sistema') }} </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>

</body>
</html>
