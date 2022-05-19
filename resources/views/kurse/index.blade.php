<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<ul>
    @foreach ($kurse as $kurs)
        <li><a href="kurse/{{$kurs->id}}">
                {{$kurs->name}}</a></li>
    @endforeach
</ul>
</body>
</html>
