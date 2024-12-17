<?php 

$arrayData = array(
    'entity' => $foodTables,
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
                    <h4>Dashboard</h4>
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
                    <div class="d-flex justify-content-center">
                        {{ $arrayData['entity']->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
