<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<ul>
    <h1>{{$lesson->title}}</h1>
    <p>{{$lesson->description}}</p>
    <p>{{$lesson->timeslot1}}</p>
    <p>{{$lesson->timeslot2}}</p>
</ul>
<!--$lessons = DB::(‘lessons’)->where(‘lesson_course_id’,$id)->get();-->

</body>
</html>
