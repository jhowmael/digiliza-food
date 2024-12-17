<?php 

$arrayData['action_dashboard'] = $arrayData['action_dashboard'] ?? 'dashboard';
$arrayData['action_filter'] = $arrayData['action_filter'] ?? 'filter';
$arrayData['action_add'] = $arrayData['action_add'] ?? 'add';
$arrayData['action_view'] = $arrayData['action_view'] ?? 'view';
$arrayData['action_edit'] = $arrayData['action_edit'] ?? 'edit';

?>


<div class="col-md-3">
    <div class="card mb-4">
        <div class="card-header text-center">
            <h4><i class="{{ $arrayData['icone'] }}"></i> {{ $arrayData['entity_plural_display_name'] }}</h4>
        </div>
        <div class="card-body">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route($arrayData['entity_plural_name'] . '.' . $arrayData['action_dashboard']) }}">Dashboard <i class="fa-solid fa-chevron-right"></i></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="{{ route($arrayData['entity_plural_name'] . '.' . $arrayData['action_filter']) }}">Filtrar <i class="fa-solid fa-chevron-right"></i></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="{{ route($arrayData['entity_plural_name'] . '.' . $arrayData['action_add']) }}">Incluir Nova {{ $arrayData['entity_singular_display_name'] }} <i class="fa-solid fa-chevron-right"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>

