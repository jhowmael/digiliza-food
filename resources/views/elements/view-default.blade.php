<?php 

$arrayData['action_dashboard'] = $arrayData['action_dashboard'] ?? 'dashboard';
$arrayData['action_filter'] = $arrayData['action_filter'] ?? 'filter';
$arrayData['action_add'] = $arrayData['action_add'] ?? 'add';
$arrayData['action_view'] = $arrayData['action_view'] ?? 'view';
$arrayData['action_edit'] = $arrayData['action_edit'] ?? 'edit';

?>

<div class="main-content">
    <div class="row">
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

        <div class="col-md-9">
            <div class="card mb-12">
                <div class="card-header text-center">
                    <h4>Visualizar</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Exibir os campos da reserva ou da entidade -->
                        @foreach($arrayData['fields'] as $field => $label)
                            <div class="col-md-12 mb-3">
                                <strong>{{ $label }}:</strong>
                                <p>
                                    @if($field == 'user')
                                        {{ optional($arrayData['entity']->$field)->name }}
                                    @elseif($field == 'foodTable')
                                        {{ optional($arrayData['entity']->$field)->number }}
                                    @else
                                        {{ $arrayData['entity']->$field }}
                                    @endif
                                </p>
                            </div>
                        @endforeach

                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-secondary btn-sm w-10" onclick="window.location.href='{{ route($arrayData['entity_plural_name'] . '.dashboard') }}'">Voltar</button>       
                        <button type="button" class="btn btn-warning btn-sm w-10" onclick="window.location.href='{{ route($arrayData['entity_plural_name'] . '.' . $arrayData['action_edit'], $arrayData['entity']->id) }}'">Editar</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
