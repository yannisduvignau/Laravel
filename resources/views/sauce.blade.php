@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails de la sauce</h1>
        <div>
            <p><strong>Nom :</strong> {{ $sauce->name }}</p>
            <p><strong>Fabricant :</strong> {{ $sauce->manufacturer }}</p>
            <p><strong>Description :</strong> {{ $sauce->description }}</p>
            <p><strong>Ingrédient principal :</strong> {{ $sauce->mainPepper }}</p>
            <p><strong>Niveau de chaleur :</strong> {{ $sauce->heat }}/10</p>
            <!-- Ajoutez d'autres détails de la sauce ici -->
            <!-- Vous pouvez également inclure l'image de la sauce si vous avez une URL -->
            @if ($sauce->imageURL)
            <img src="{{ asset('storage/' . $sauce->imageURL) }}" alt="imageSauce numéro {{$sauce['id']}}">
            @endif
        </div>
    </div>
@endsection
