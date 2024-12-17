<?php 

$arrayData = array(
    'entities' => $reservations,
    'icone' => config('reservations.defaultIncone'),
    'entity_plural_display_name' => config('reservations.pluralDisplayName'),
    'entity_singular_display_name' => config('reservations.singularDisplayName'),
    'entity_plural_name' => 'reservations',
    'entity_singular_name' => 'reservation',
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
                                <label for="user_id" class="form-label">Cliente:</label>
                                <input type="text" id="user_id" name="user_id" value="{{ request('user_id') }}" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="food_table_id" class="form-label">Mesa:</label>
                                <input type="text" id="food_table_id" name="food_table_id" value="{{ request('food_table_id') }}" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="occupation" class="form-label">Ocupção:</label>
                                <input type="text" id="occupation" name="occupation" value="{{ request('occupation') }}" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="entry" class="form-label">Entrada:</label>
                                <input type="text" id="entry" name="entry" value="{{ request('entry') }}" class="form-control">
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
                                <th class="text-center">Cliente</th>
                                <th class="text-center">Mesa</th>
                                <th class="text-center">Ocupação</th>
                                <th class="text-center">Entrada</th>
                                <th class="text-center">Encerramento</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($reservations as $reservation): ?>
                                <tr>
                                    <td class="text-center"><?= $reservation->id ?></td>
                                    <td class="text-center"><?= $reservation->user->name ?></td>
                                    <td class="text-center"><?= $reservation->foodTable->number ?></td>
                                    <td class="text-center"><?= $reservation->occupation ?></td>
                                    <td class="text-center"><?= $reservation->entry ?></td>
                                    <td class="text-center"><?= $reservation->finished ?></td>
                                    <td class="text-center"><?= config('users.status.'. $reservation->status) ?></td>
                                    <td class="text-center">
                                    <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="{{ route('reservations.view', $reservation->id) }}" class="btn btn-primary btn-sm">Visualizar</a>
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