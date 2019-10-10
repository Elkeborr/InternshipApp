<h1>{{ $title }}</h1>

<ul>
    @foreach($internships as $internship)
    <li>
        {{$internship['name']}}
    </li>
    @endforeach
</ul>