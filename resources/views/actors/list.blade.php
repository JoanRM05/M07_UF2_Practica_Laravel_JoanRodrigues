
@extends('template')
@section('titulo', "Prov")

@section('header')
    @parent()
@stop

@section('content')
@if(empty($actors))
    <FONT COLOR="red">No se ha encontrado ningun actor</FONT>
@else
    <div align="center">
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Birthdate</th>
            <th>Country</th>
            <th>Img_Url</th>
        </tr>

        @foreach($actors as $actor)
            <tr>
                <td>{{$actor['name']}}</td>
                <td>{{$actor['surname']}}</td>
                <td>{{$actor['birthdate']}}</td>
                <td>{{$actor['country']}}</td>
                <td><img src={{$actor['img_url']}} style="width: 100px; heigth: 120px;" /></td>
            </tr>
        @endforeach
    </table>
</div>
@endif
@stop

@section('footer')
    @parent()
@stop