@extends('layouts.connect')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-header text-center">
                    <h4><i class="fa-regular fa-user"></i> Minha conta</h4>
                </div>
                <div class="card-body">
                    <p>Altere as configurações e confira suas notificações</p>

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('users.auto-view') }}">Informações <i class="fa-solid fa-chevron-right"></i></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('users.auto-edit') }}">Editar de Perfil <i class="fa-solid fa-chevron-right"></i></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.auto-edit-password') }}">Alterar Senha <i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-md-7">
            <div class="card mb-12">
                <div class="card-header text-center">
                    <h4>Alterar Senha</h4>
                </div>
                <div class="card-body">
                    <p>Você pode alterar a senha da sua conta</p>

                    <!-- Exibir mensagem de sucesso, se existir -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Sucesso!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('users.update-password') }}" method="POST" class="form">
                        @csrf

                        <div class="form-group">
                            <label for="current_password" class="form-label">Senha Atual:</label>
                            <input type="password" id="current_password" name="current_password" class="form-control" required>
                            @error('current_password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="new_password" class="form-label">Nova Senha:</label>
                            <input type="password" id="new_password" name="new_password" class="form-control" required>
                            @error('new_password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="new_password_confirmation" class="form-label">Confirmar Nova Senha:</label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>
                            @error('new_password_confirmation')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <br>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Este script irá garantir que o alert seja removido após um tempo, se desejar isso.
    setTimeout(function() {
        const alert = document.querySelector('.alert');
        if (alert) {
            alert.classList.add('fade');
            setTimeout(() => {
                alert.remove();
            }, 500); // Aguarda a transição do fade para remover o alerta
        }
    }, 5000); // O alerta será removido automaticamente após 5 segundos
</script>
@endpush
