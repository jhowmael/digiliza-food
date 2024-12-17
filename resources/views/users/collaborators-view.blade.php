<?php 

$arrayData = array(
    'action_dashboard' => 'collaborators-dashboard',
    'action_filter' => 'collaborators-filter',
    'action_add' => false,
    'action_view' => 'collaborators-view',

    'entity' => $collaborator,
    'icone' => config('collaborators.defaultIncone'),
    'entity_plural_display_name' => config('collaborators.pluralDisplayName'),
    'entity_singular_display_name' => config('collaborators.singularDisplayName'),
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
                    <h4>Visualizar</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <strong>Id</strong>
                            <p><?= $collaborator->id?></p>
                            <strong>Nome</strong>
                            <p><?= $collaborator->name?></p>
                            <strong>Status</strong>
                            <p><?= $collaborator->status?></p>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-secondary btn-sm w-10" onclick="window.location.href='{{ route('users.collaborators-dashboard') }}'">Voltar</button>       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
