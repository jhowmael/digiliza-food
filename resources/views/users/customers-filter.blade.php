<?php 

$arrayData = array(
    'action_dashboard' => 'customers-dashboard',
    'action_filter' => 'customers-filter',
    'action_add' => false,
    'action_view' => 'customers-view',

    'entities' => $customers,
    'icone' => config('customers.defaultIncone'),
    'entity_plural_display_name' => config('customers.pluralDisplayName'),
    'entity_singular_display_name' => config('customers.singularDisplayName'),
    'entity_plural_name' => 'users',
    'entity_singular_name' => 'user',
);

?>

@extends('layouts.connect')

@section('content')

<div class="main-content">
    <div class="row">

    @include('elements.default-side-actions', ['arrayData' => $arrayData])

        <div class="col-md-9">
            <div class="card mb-12">
                <div class="card-header text-center">
                    <h4>Filtrar {{ $arrayData['entity_plural_display_name'] }}</h4>
                </div>
                <div class="card-body">
                    <!-- Formulário de Filtro -->
                    <form action="{{ route($arrayData['entity_plural_name'] . '.customers-filter') }}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label">Nome:</label>
                                <input type="text" id="name" name="name" value="{{ request('name') }}" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="text" id="email" name="email" value="{{ request('email') }}" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="phone" class="form-label">Telefone:</label>
                                <input type="text" id="phone" name="phone" value="{{ request('phone') }}" class="form-control">
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary btn-sm w-100">Filtrar</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tabela de Entidades Filtradas -->
            <div class="card mb-12 mt-4">
                <div class="card-header text-center">
                    <h4>{{ $arrayData['entity_plural_display_name'] }} Encontradas</h4>
                </div>
                <div class="card-body">
                <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Telefone</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($customers as $customer): ?>
                                <tr>
                                    <td class="text-center"><?= $customer->id ?></td>
                                    <td class="text-center"><?= $customer->name ?></td>
                                    <td class="text-center"><?= $customer->email ?></td>
                                    <td class="text-center"><?= $customer->phone ?></td>
                                    <td class="text-center"><?= config('users.status.'. $customer->status) ?></td>
                                    <td class="text-center">
                                    <a href="{{ route('users.customers-view', $customer->id) }}" class="btn btn-primary btn-sm">Visualizar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- Caso não haja resultados -->
                    @if(empty($arrayData['entity']))
                    <p class="text-center">Nenhuma {{ $arrayData['entity_singular_display_name'] }} encontrada.</p>
                    @endif

                    <!-- Paginação com Bootstrap -->
                    <div class="d-flex justify-content-center">
                        {{ $arrayData['entities']->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection