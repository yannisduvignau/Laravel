@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}

@if ($sauces->isEmpty())
    <div class="containerPasSauce">
        <div class="pasDeSauce">
            <h2>Il n'y a pas de sauce dans la collection</h2>
            <a href="{{ url('/addSauce') }}"><button>Ajoute une sauce</button></a>
        </div>
    </div>
@else
    <div class="afficheSauce">
        <h1>Les Sauces</h1>
        <ul>
            @foreach($sauces as $sauce)
                <div class="containerSauce">
                    <img src="{{ asset('storage/' . $sauce->imageURL) }}" alt="imageSauce numéro {{$sauce['id']}}">
                    <h2>{{$sauce['name']}}</h2>
                    <div class="heat" style="color: {{ $sauce->heat >= 8 ? 'red' : ($sauce->heat >= 5 ? 'orange' : 'green') }};">
                        Heat:{{ $sauce->heat }}/10
                    </div>
                    <a href="sauce/{{$sauce['id']}}"><button>Détails</button></a>
                </div>

                {{-- <li><a href="{{$sauce['userId']}}">{{$sauce['name']}}</a></li> --}}
            @endforeach
        </ul>
    </div>
@endif

@endsection