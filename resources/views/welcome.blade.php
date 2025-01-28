
@extends('template')
@section('titulo', "Lista Peliculas")

@section('header')
    @parent()
@stop

@section('content')
    <div class="col">
        <h1 class="mt-4">Lista de Peliculas</h1>
        <ul>
            <li><a href=/filmout/oldFilms>Pelis antiguas</a></li>
            <li><a href=/filmout/newFilms>Pelis nuevas</a></li>
            <li><a href=/filmout/films>Pelis</a></li>
            <li><a href="/filmout/filmsGenre">Pelis Filtradas por Genero</a></li>
            <li><a href="/filmout/filmsYear">Pelis Filtradas por Año</a></li>
            <li><a href="/filmout/sortFilms">Pelis Ordenadas de manera descendente (Por Año)</a></li>
            <li><a href="/filmout/countFilms">Contador de numero total de Peliculas</a></li>
        </ul>
    </div>
    <div class="col">
        <h1 class="mt-4">Añadir Pelicula</h1>
        <form action="{{route('createFilm')}}" method="POST" enctype="multipart/form-data">
            @csrf
            Nombre: <input type="text" name="nombre"> <br> <br>
            Año: <input type="number" name="año"> <br> <br>
            Genero: <input type="text" name="genero"> <br> <br>
            Pais: <input type="text" name="pais"> <br> <br>
            Duracion: <input type="number" name="duracion"> <br> <br>
            Imagen URL: <input type="url" name="url"> <br> <br>
            <input type="submit" value="Enviar">
        </form>
    </div>
@stop

@section('footer')
    @parent()
@stop