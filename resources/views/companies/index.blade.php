@extends('layouts/app')

@section('title')
    Companies
@endsection

@section('h2')
Companies
@endsection

@section('content')

<div class="companies">
    @foreach($companies ?? '' as $company)
    <div class="companies__detail" >
        <a href ="/companies/{{$company->id}}">{{ $company-> name}}</a>
        <p>{{ $company-> bio}}</p>
        <hr class="companies__line">
        <p>{{ $company-> city}}</p>
    </div>
    @endforeach
</div>
@endsection