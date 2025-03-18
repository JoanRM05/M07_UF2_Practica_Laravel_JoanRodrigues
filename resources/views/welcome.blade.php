
@extends('template')
@section('titulo', "Lista Peliculas")

@section('header')
    @parent()
@stop

@section('content')

    <style>
        .error-message {
            background-color: #ffcccc;
            color: #cc0000;
            padding: 10px;
            border: 1px solid #cc0000;
            border-radius: 5px;
            text-align: center;
            width: fit-content;
            margin: 10px auto;
            opacity: 1;
            transition: opacity 1s ease-in-out;
        }
        .contenedor {
            background: rgba(0, 0, 0, 0.8);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
            color: white;
        }
        h2 {
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
        }
        a {
            text-decoration: none;
            color: #FFD700;
        }
        a:hover {
            color: #FF4500;
        }
        .btn-enviar {
            background: #ff4500;
            border: none;
            font-weight: bold;
        }
        .btn-enviar:hover {
            background: #e63900;
        }
        .list-group-item {
            background: transparent;
            border: none;
        }
        .list-group-item a {
            font-size: 18px;
        }
        input {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            padding: 8px;
            border-radius: 5px;
        }
    </style>

<div class="container mt-5">
    <div class="row justify-content-center">

        <div class="col-md-5 contenedor">
            <div>
                <h2 class="text-warning">Películas</h2>
                <ul class="list-group list-group-flush" style="align-items: center">
                    <li class="list-group-item"><a href=/filmout/oldFilms>🎞️ Pelis antiguas</a></li>
                    <li class="list-group-item"><a href=/filmout/newFilms>🎬 Pelis nuevas</a></li>
                    <li class="list-group-item"><a href=/filmout/films>📽️ Todas las Pelis</a></li>
                    <li class="list-group-item"><a href="/filmout/filmsGenre">🔍 Filtrar por Género</a></li>
                    <li class="list-group-item"><a href="/filmout/filmsYear">📅 Filtrar por Año</a></li>
                    <li class="list-group-item"><a href="/filmout/sortFilms">⬇️ Ordenar por Año (DESC)</a></li>
                    <li class="list-group-item"><a href="/filmout/countFilms">🔢 Contador total de Pelis</a></li>
                </ul>
            </div>
            
        </div>

        <div class="col-md-5 contenedor">
            <h2 class="text-success">Añadir Película</h2>
            <form action="{{route('createFilm')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Nombre:</label>
                    <input type="text" class="form-control" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label>Año:</label>
                    <input type="number" class="form-control" name="año" required>
                </div>
                <div class="mb-3">
                    <label>Género:</label>
                    <input type="text" class="form-control" name="genero" required>
                </div>
                <div class="mb-3">
                    <label>País:</label>
                    <input type="text" class="form-control" name="pais" required>
                </div>
                <div class="mb-3">
                    <label>Duración (minutos):</label>
                    <input type="number" class="form-control" name="duracion" required>
                </div>
                <div class="mb-3">
                    <label>Imagen URL:</label>
                    <input type="url" class="form-control" name="url">
                </div>
                <button type="submit" class="btn btn-enviar w-100">📤 Enviar</button>
            </form>
        </div>
    </div>
</div>
@stop

@if($errors->has('error'))
    <div class="error-message">
        {{$errors->first('error')}}
    </div>
@endif 

@if(isset($status))
    <div class="error-message">
        {{ $status }}
    </div>
@endif

@section('footer')
    @parent()
@stop