<?php 

$arrayData = array(
    'entity' => $reservation,
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
                    <h4>Visualizar</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <strong>Id</strong>
                            <p><?= $reservation->id?></p>
                            <strong>Cliente</strong>
                            <p><?= $reservation->user->name?></p>
                            <strong>Mesa</strong>
                            <p><?= $reservation->foodTable->number?></p>
                            <strong>Ocupação</strong>
                            <p><?= $reservation->foodTable->occupation?></p>
                            <strong>Entrada</strong>
                            <p><?= $reservation->foodTable->entry ?></p>
                            <strong>Encerramento</strong>
                            <p><?= $reservation->foodTable->finished?></p>
                            <strong>Status</strong>
                            <p><?= $reservation->foodTable->status?></p>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-secondary btn-sm w-10" onclick="window.location.href='{{ route('reservations.dashboard') }}'">Voltar</button>       
                        <button type="button" class="btn btn-warning btn-sm w-10" onclick="window.location.href='{{ route('reservations.edit', $reservation->id) }}'">Editar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
