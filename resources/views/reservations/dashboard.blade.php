<?php 

$arrayData = array(
    'entity' => $reservations,
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
                    <h4>Dashboard</h4>
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
                    <div class="d-flex justify-content-center">
                        {{ $arrayData['entity']->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
