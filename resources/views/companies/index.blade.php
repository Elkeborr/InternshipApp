@extends('layouts/app')

@section('content')
<h2>Companies</h2>
<div class="companies">
    @foreach($companies as $company)
    <div class="companies__detail" >
        <a href ="/companies/{{$company->id}}">{{ $company-> name}}</a>
        <p>{{ $company-> bio}}</p>
        <hr class="companies__line">
        <p>{{ $company-> city}}</p>
    </div>
    @endforeach
</div>
@endsection