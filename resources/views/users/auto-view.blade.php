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


        <div class="col-md-9">
            <div class="card mb-12">
                <div class="card-header text-center">
                    <h4>Informações de Perfil</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <th>Tipo</th>
                            <td>{{ config("users.types." . $user->type) }}</td>
                        </tr>
                        <tr>
                            <th>Nome</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Foto de Perfil</th>
                            <td>
                                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" width="100">
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Telefone</th>
                            <td>{{ $user->phone }}</td>
                        </tr>
                        <tr>
                        <tr>
                            <th>Data de Nascimento</th>
                            <td>{{ $user->birthday }}</td>
                        </tr>
                            <th>Status</th>
                            <td>{{ $user->status }}</td>
                        </tr>
                        <tr>
                            <th>Cadastrado em</th>
                            <td>{{ $user->registered }}</td>
                        </tr>
                        <tr>
                            <th>Criado em</th>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Atualizado em</th>
                            <td>{{ $user->updated_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection