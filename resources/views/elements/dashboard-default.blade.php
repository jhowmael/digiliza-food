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
                    <h4>Dashboard</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <!-- Exibir os campos dinamicamente como cabeçalhos -->
                                @foreach($arrayData['fields'] as $field => $label)
                                    <th class="text-center">{{ $label }}</th>
                                @endforeach
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($arrayData['entity'] as $entity)
                                <tr>
                                    <!-- Exibir os valores das reservas -->
                                    @foreach($arrayData['fields'] as $field => $label)
                                        <?php if($field == 'user'): ?>
                                            <td class="text-center">
                                                @if($entity->$field)
                                                    {{ $entity->$field->name }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                        <?php elseif($field == 'foodTable'): ?>
                                            <td class="text-center">
                                                @if($entity->$field)
                                                    {{ $entity->$field->number }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                        <?php else: ?>
                                            <td class="text-center">{{ $entity->$field }}</td>
                                        <?php endif; ?>
                                    @endforeach
                                    <td class="text-center">
                                    <a href="{{ route($arrayData['entity_plural_name'] . '.' . $arrayData['action_edit'], $entity->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="{{ route($arrayData['entity_plural_name'] . '.' . $arrayData['action_view'], $entity->id) }}" class="btn btn-primary btn-sm">Visualizar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Links de paginação -->
                    <div class="d-flex justify-content-center">
                        {{ $arrayData['entity']->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
