@extends('template')
@section('titulo', "Prov")

@section('header')
    @parent()
@stop

@section('content')
@if($count == 0)
    <FONT COLOR="red">No hay ningun actor</FONT>
@else
    <div align="center">
        <table border="1">
            <tr>
                
            </tr>
                <td>Num de Actores Almacenados</td>
            <tr>
                <td align="center">{{$count}}</td>
            </tr>
        
        </table>
    </div>
@endif
@stop

@section('footer')
    @parent()
@stop