<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo', 'Cines Rodrigues')</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>

        html, body {
            height: 100%;
            margin: 0;
        }

      
        .container-gen {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        
        body {
            background-image: url('{{ asset('img/cine.png') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
        }

        
        .navbar {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .navbar-brand img {
            height: 50px;
        }

        
        footer {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 10px 0;
            margin-top: auto;
        }

        
        .content-box {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 10px;
            flex-grow: 1;  
            justify-content: center;  
            align-items: center;      
            
        }

        table {
        width: 80%;
        border-collapse: collapse;
        background: rgba(0, 0, 0, 0.8); 
        color: white;
        font-size: 18px;
        text-align: center;
        margin-top: 20px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
        }
        
        th, td {
            padding: 12px;
            border: 1px solid #FFD700; 
        }

        th {
            background: #FF4500; 
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background: rgba(255, 255, 255, 0.1); 
        }

        tr:hover {
            background: rgba(255, 255, 255, 0.2); 
        }

        img {
            border-radius: 8px;
            border: 2px solid #FFD700; 
        }

        div[align="center"] {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

    </style>
    
</head>
<body>

    <div class="container-gen">
        @section('header')
            <header class="container my-4">
                <div class="text-center">
                    <img src="{{ asset('img/CinesRodrigues.png') }}" class="img-fluid rounded" alt="Cines Rodrigues" style="max-width: 80%;">
                </div>
            </header>
        @show

        <main class="container my-5">
            <div class="content-box row">
                @yield('content')
            </div>
        </main>

        @section('footer')
            <footer class="text-center">
                <div class="container">
                    <p class="mb-0">© 2024 Cines Rodrigues. Todos los derechos reservados.</p>
                </div>
            </footer>
        @show
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
