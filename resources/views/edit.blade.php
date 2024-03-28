<!-- edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier la Sauce</h1>
        <form action="{{ route('AllSauce.update', $sauce->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nom de la Sauce</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $sauce->name }}">
            </div>

            <div class="form-group">
                <label for="manufacturer">Fabricant</label>
                <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{ $sauce->manufacturer }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $sauce->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="mainPepper">Ingrédient Principal</label>
                <input type="text" class="form-control" id="mainPepper" name="mainPepper" value="{{ $sauce->mainPepper }}">
            </div>

            <div class="form-group">
                <label for="heat">Niveau de Chaleur (Heat)</label>
                <input type="number" class="form-control" id="heat" name="heat" min="0" max="10" step="0.1" value="{{ $sauce->heat }}">
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
