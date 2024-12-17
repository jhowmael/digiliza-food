<?php 
$arrayData = array(
    'action_dashboard' => 'customers-dashboard',
    'action_filter' => 'customers-filter',
    'action_add' => false,
    'action_view' => 'customers-view',

    'entity' => $customers,
    'icone' => config('users.customers.defaultIncone'),
    'entity_plural_display_name' => config('users.customers.pluralDisplayName'),
    'entity_singular_display_name' => config('users.customers.singularDisplayName'),
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
                    <div class="d-flex justify-content-center">
                        {{ $arrayData['entity']->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
