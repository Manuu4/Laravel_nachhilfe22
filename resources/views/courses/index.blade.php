<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<ul>
{{--    @foreach ($courses as $course)--}}
{{--        <li><a href="lessons/{{$course->id}}">--}}
{{--                {{$course->name}}</a></li>--}}
{{--    @endforeach--}}

    @foreach ($lessons as $lesson)
        <li><a href="lessons/{{$lesson->id}}">
                {{$lesson->title}}</a></li>
    @endforeach
</ul>
</body>
</html>
