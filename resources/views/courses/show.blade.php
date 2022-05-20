<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<ul>
    <h1>{{$course->name}}</h1>
    <p>{{$course->semester}}</p>
    <p>{{$course->description}}</p>
</ul>
<!--$lessons = DB::(‘lessons’)->where(‘lesson_course_id’,$id)->get();-->

</body>
</html>
