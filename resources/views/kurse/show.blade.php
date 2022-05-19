<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<ul>
    <h1>{{$kurs->name}}</h1>
    <p>{{$kurs->semester}}</p>
    <p>{{$kurs->description}}</p>
</ul>
<!--$lessons = DB::(‘lessons’)->where(‘lesson_course_id’,$id)->get();-->

</body>
</html>
