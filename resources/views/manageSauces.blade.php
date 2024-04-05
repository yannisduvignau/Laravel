@extends('layouts.app')

@section('content')
    <h1>Gestion des Sauces</h1>

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


    @if ($sauces->isEmpty())
        <p>Il n'y a pas de sauce à gérer pour le moment.</p>
    @else
        <ul>
            @foreach ($sauces as $sauce)
                <li>
                    {{ $sauce->name }}
                    <a href="{{ route('AllSauces.edit',['id' => $sauce->id] ) }}" class="btn btn-primary">Modifier</a>
                    <!-- Bouton de suppression avec fenêtre modale de confirmation -->
                    <button class="btn btn-danger" onclick="openModal('{{ $sauce->id }}')">Supprimer</button>
                    
                    <!-- Fenêtre modale de confirmation de suppression -->
                    <div class="modal fade" id="confirmDelete{{ $sauce->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel{{ $sauce->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteLabel{{ $sauce->id }}">Confirmation de Suppression</h5>
                                </div>
                                <div class="modal-body">
                                    Êtes-vous sûr de vouloir supprimer la sauce "{{ $sauce->name }}" ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" onclick="closeModal('{{ $sauce->id }}')">Annuler</button>
                                    <!-- Formulaire de suppression -->
                                    <form action="{{ route('AllSauces.destroy', ['id' => $sauce->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif

    <script>
        function openModal(sauceId) {
            var modal = document.getElementById('confirmDelete' + sauceId);
            modal.classList.add('show');
            modal.style.display = 'block';
            modal.setAttribute('aria-modal', 'true');
            modal.setAttribute('aria-hidden', 'false');
            var backdrop = document.createElement('div');
            backdrop.classList.add('modal-backdrop', 'fade', 'show');
            document.body.appendChild(backdrop);
        }

        function closeModal(sauceId) {
            var modal = document.getElementById('confirmDelete' + sauceId);
            modal.classList.remove('show');
            modal.style.display = 'none';
            modal.setAttribute('aria-modal', 'false');
            modal.setAttribute('aria-hidden', 'true');
            var backdrop = document.querySelector('.modal-backdrop');
            backdrop.parentNode.removeChild(backdrop);
        }
    </script>
@endsection
