<h1>All Companies</h1>
<ul>
    @foreach($companies as $company)
    <li><a href ="/companies/{{$company->id}}">{{ $company-> name}}</a></li>
    @endforeach

</ul>
