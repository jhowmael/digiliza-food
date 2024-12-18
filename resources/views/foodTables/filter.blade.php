<?php 

$arrayData = array(
    'entities' => $foodTables,
    'icone' => config('foodTables.defaultIncone'),
    'entity_plural_display_name' => config('foodTables.pluralDisplayName'),
    'entity_singular_display_name' => config('foodTables.singularDisplayName'),
    'entity_plural_name' => 'foodTables',
    'entity_singular_name' => 'foodTable',
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
                    <form action="{{ route($arrayData['entity_plural_name'] . '.filter') }}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="id" class="form-label">Id:</label>
                                <input type="text" id="id" name="id" value="{{ request('id') }}" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="number" class="form-label">Numero:</label>
                                <input type="text" id="number" name="number" value="{{ request('food_table_id') }}" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="capacity" class="form-label">Capacidade:</label>
                                <input type="text" id="capacity" name="capacity" value="{{ request('occupation') }}" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="status" class="form-label">Status:</label>
                                <input type="text" id="status" name="status" value="{{ request('status') }}" class="form-control">
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
                                <th class="text-center">Number</th>
                                <th class="text-center">Capacidade</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($foodTables as $foodTable): ?>
                                <tr>
                                    <td class="text-center"><?= $foodTable->id ?></td>
                                    <td class="text-center"><?= $foodTable->number ?></td>
                                    <td class="text-center"><?= $foodTable->capacity ?></td>
                                    <td class="text-center"><?= config('foodTables.status.'. $foodTable->status) ?></td>
                                    <td class="text-center">
                                        <a href="{{ route('foodTables.edit', $foodTable->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <a href="{{ route('foodTables.view', $foodTable->id) }}" class="btn btn-primary btn-sm">Visualizar</a>
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