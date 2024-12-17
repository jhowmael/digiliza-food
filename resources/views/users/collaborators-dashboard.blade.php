<?php 

$arrayData = array(
    'action_dashboard' => 'collaborators-dashboard',
    'action_filter' => 'collaborators-filter',
    'action_add' => false,
    'action_view' => 'collaborators-view',

    'entity' => $collaborators,
    'icone' => config('users.collaborators.defaultIncone'),
    'entity_plural_display_name' => config('users.collaborators.pluralDisplayName'),
    'entity_singular_display_name' => config('users.collaborators.singularDisplayName'),
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
                    <h4>Dashboard</h4>
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
                            <?php foreach($collaborators as $collaborator): ?>
                                <tr>
                                    <td class="text-center"><?= $collaborator->id ?></td>
                                    <td class="text-center"><?= $collaborator->name ?></td>
                                    <td class="text-center"><?= $collaborator->email ?></td>
                                    <td class="text-center"><?= $collaborator->phone ?></td>
                                    <td class="text-center"><?= config('users.status.'. $collaborator->status) ?></td>
                                    <td class="text-center">
                                    <a href="{{ route('users.collaborators-view', $collaborator->id) }}" class="btn btn-primary btn-sm">Visualizar</a>
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
