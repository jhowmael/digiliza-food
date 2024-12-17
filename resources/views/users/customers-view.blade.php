<?php 

$arrayData = array(
    'action_dashboard' => 'customers-dashboard',
    'action_filter' => 'customers-filter',
    'action_add' => false,
    'action_view' => 'customers-view',

    'entity' => $customer,
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
                    <h4>Visualizar</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <strong>Id</strong>
                            <p><?= $customer->id?></p>
                            <strong>Nome</strong>
                            <p><?= $customer->name?></p>
                            <strong>Status</strong>
                            <p><?= $customer->status?></p>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-secondary btn-sm w-10" onclick="window.location.href='{{ route('users.customers-dashboard') }}'">Voltar</button>       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
