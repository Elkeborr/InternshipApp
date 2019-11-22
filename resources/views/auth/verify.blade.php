@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifieer uw E-mailadres') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Een nieuwe verificatie link is naar uw E-mailadres verstuurd.') }}
                        </div>
                    @endif

                    {{ __('Gelieve eerst uw e-mails te bekijken of u de verificatie link ontvangen heeft voordat u verder gaat.') }}
                    {{ __('Als u deze mail nog niet ontvangen heeft.') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
		                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Klik hier voor een nieuwe verificatie link') }}</button>.
	                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
