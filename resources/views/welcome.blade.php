<!DOCTYPE html>
<html>
    <head>
        <title>Nachhilfe</title>
    </head>
    <body>
        <h1>Hello World</h1>
        <ul>
            @foreach ($courses as $course)
                <li>{{$course->name}} {{$course->semester}}</li>
            @endforeach
        </ul>
    </body>
</html>
