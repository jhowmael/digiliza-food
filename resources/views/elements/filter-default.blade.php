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
                    <h4>Filtrar {{ $arrayData['entity_plural_display_name'] }}</h4>
                </div>
                <div class="card-body">
                    <!-- Formulário de Filtro -->
                    <form action="{{ route($arrayData['entity_plural_name'] . '.filter') }}" method="GET">
                        @csrf
                        <div class="row">
                            <!-- Campos do Filtro -->
                            @foreach($arrayData['fields'] as $field => $label)
                                @if($field !== 'id') <!-- Evitar o campo id no filtro se não necessário -->
                                    <div class="col-md-12 mb-3">
                                        <label for="{{ $field }}" class="form-label">{{ $label }}:</label>
                                        <input type="text" id="{{ $field }}" name="{{ $field }}" value="{{ request()->get($field) }}" class="form-control">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary btn-sm w-100">Filtrar</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tabela de Entidades Filtradas -->
            <div class="card mb-12 mt-4">
                <div class="card-header text-center">
                    <h4>{{ $arrayData['entity_plural_display_name'] }} Encontradas</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <!-- Exibir os campos dinamicamente como cabeçalhos -->
                                @foreach($arrayData['dashboard_fields'] as $field => $label)
                                    <th class="text-center">{{ $label }}</th>
                                @endforeach
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($arrayData['entities'] as $entity)
                                <tr>
                                    <!-- Exibir os valores das entidades -->
                                    @foreach($arrayData['dashboard_fields'] as $field => $label)
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
                                    <button type="button" class="btn btn-warning btn-sm" onclick="window.location.href='{{ route($arrayData['entity_plural_name'] . '.' . $arrayData['action_edit'], $entity->id) }}'">Editar</button>
                                    <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='{{ route($arrayData['entity_plural_name'] . '.' . $arrayData['action_view'], $entity->id) }}'">Visualizar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Caso não haja resultados -->
                    @if(empty($arrayData['entity']))
                        <p class="text-center">Nenhuma {{ $arrayData['entity_singular_display_name'] }} encontrada.</p>
                    @endif

                    <!-- Paginação com Bootstrap -->
                    <div class="d-flex justify-content-center">
                        {{ $arrayData['entities']->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
