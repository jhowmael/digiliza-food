<?php 

$arrayData = array(
    'entity' => $foodTable,
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
                    <h4>Visualizar</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <strong>Id</strong>
                            <p><?= $foodTable->id?></p>
                            <strong>Mesa</strong>
                            <p><?= $foodTable->number?></p>
                            <strong>Ocupação</strong>
                            <p><?= $foodTable->capacity?></p>
                            <strong>Status</strong>
                            <p><?= $foodTable->status?></p>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-secondary btn-sm w-10" onclick="window.location.href='{{ route('foodTables.dashboard') }}'">Voltar</button>       
                        <button type="button" class="btn btn-warning btn-sm w-10" onclick="window.location.href='{{ route('foodTables.edit', $foodTable->id) }}'">Editar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
