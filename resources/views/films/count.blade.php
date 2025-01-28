<h1>{{$title}}</h1>

@if($count == 0)
    <FONT COLOR="red">No hay ninguna película</FONT>
@else
    <div align="center">
        <table border="1">
            <tr>
                
            </tr>
                <td>Num de Peliculas Almacenadas</td>
            <tr>
                <td align="center">{{$count}}</td>
            </tr>
        
        </table>
    </div>
@endif