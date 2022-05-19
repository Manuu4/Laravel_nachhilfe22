<!DOCTYPE html>
<html>
    <head>
        <title>Nachhilfe</title>
    </head>
    <body>
        <h1>Hello World</h1>
        <ul>
            @foreach ($kurse as $kurs)
                <li>{{$kurs->name}} {{$kurs->semester}}</li>
            @endforeach
        </ul>
    </body>
</html>
