@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
<ul>
    @foreach ($errors->all() as $error)
        <li class="alert alert-danger">{{$error}}</li>
    @endforeach
</ul>
    <form action="{{route('addSauce/traitement')}}" method="POST" enctype="multipart/form-data" class="form-group">
        @csrf
    
        <div class="mb-3">
            <label for="nom" class="form-label">Nom de la sauce :</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
    
        <div class="mb-3">
            <label for="fabricant" class="form-label">Fabricant :</label>
            <input type="text" class="form-control" id="fabricant" name="fabricant" required>
        </div>
    
        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
    
        <div class="mb-3">
            <label for="image" class="form-label">Image :</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/png, image/jpeg" required>
        </div>
    
        <div class="mb-3">
            <label for="ingredient_principal" class="form-label">Ingrédient principal de piment :</label>
            <input type="text" class="form-control" id="ingredient_principal" name="ingredient_principal" required>
        </div>
    
        <div class="mb-3">
            <label for="heat" class="form-label">Heat (de 0 à 10) :</label>
            <input type="range" class="form-range" id="heat" name="heat" min="0" max="10" step="1" value="0" onchange="updateHeatValue(this.value)">
            <span id="heatValue">0</span>
        </div>
    
        <button type="submit" class="btn btn-primary">Ajouter la sauce</button>
    </form>
    <script>
        function updateHeatValue(value) {
            document.getElementById('heatValue').innerText = value;
        }
    </script>
@endsection