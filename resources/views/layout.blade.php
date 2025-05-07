<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>@yield('title')</title>
    <link rel="shortcut icon"
        href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTwTbdF7XTBr_BUlNucqk45960GecrVYKPjFmQFNsPrEyIV-z0sPF3KRdHZuXSVJGLb1w&usqp=CAU" />
    <script src="{{ asset('js/scriptsHeader.js') }}"></script>

    {{-- CSS Errepikatuak --}}
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- DATATABLES CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- DATATABLES JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>



    @yield('link')
</head>

<body>

    {{-- HEADER CONTENT --}}
    <header class="custom-navbar">
        <div class="navbar-container">
            <div class="navbar-logo">
                
                    <a href="/">
                    
                    <img src="https://www.goierrieskola.eus/wp-content/uploads/2014/11/Logo_color.jpg"
                        alt="Goierri Eskola Logo">
                </a>
            </div>
            <!-- Botón para el menú en móvil -->
            <div class="menu-toggle">
                <i class="fas fa-bars"></i>
            </div>
            <!-- Menú en Desktop -->
            <nav class="navbar-menu"><b>
                    <ul class="menu-list">
                        
                        <li><a href="/admin/create/createRecord">Makinak</a></li>
                        <li><a href="/admin">Peligro</a></li>
                        <li><a href="/admin/view/viewAutoa">Produkto quimico</a></li>
                        <li><a href="/admin/view/viewUser">Residuos generados</a></li>
                        <li><a href="/admin/view/viewZita">EPIs</a></li>
                        


                    </ul>
                </b>

            </nav>

            

            <div class="navbar-login">
                
                <a href="/loginView" class="login-button"><i class="fa-solid fa-user"></i><b> Iniciar Sesión</a></b>
                
            </div>

        </div>
    </header>

    

    <script>
        // scripts.js

        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const sidebar = document.getElementById('mobileSidebar');
            const closeSidebar = document.getElementById('closeSidebar');

            menuToggle.addEventListener('click', function() {
                sidebar.style.width = '250px'; // Abre el sidebar
            });

            closeSidebar.addEventListener('click', function() {
                sidebar.style.width = '0'; // Cierra el sidebar
            });
        });

        function navigateTo(path) {
            // Obtiene la URL actual del navegador
            const currentUrl = window.location.origin;

            // Redirige a la nueva ruta
            window.location.href = currentUrl + path;
        }
    </script>


    <div class="containerContent">
        @yield('content')
    </div>

    <footer class="custom-footer">
        <div class="footer-container">
            <div class="footer-logo">
                <img src="https://www.goierrieskola.eus/wp-content/uploads/2014/11/Logo_color.jpg" alt="Logo Footer">
            </div>
            <div class="footer-text">
                <p>©2024 GOIERRI ESKOLA</p>
            </div>
        </div>
    </footer>
</body>

</html>