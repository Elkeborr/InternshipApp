<h1>Alle studenten</h1>
@foreach($students as $student)
<h3><a href="/students/{{ $student->id }}">{{$student->name}}</a></h3>
@endforeach