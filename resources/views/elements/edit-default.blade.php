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
                    <h4>Editar</h4>
                </div>
                <div class="card-body">
                    <!-- Formulário de edição -->
                    <form action="{{ route($arrayData['entity_plural_name'] . '.update', $arrayData['entity']->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Definindo o método PUT para a atualização -->
                    <?php foreach ($arrayData['fields'] as $field => $label): ?>
                        <div class="form-group">
                            <label for="{{ $field }}" class="form-label">{{ $label }}:</label>

                            <!-- Verificar o tipo do campo, para exibir o input correto -->
                            @if($field === 'entry')
                                <input type="datetime-local" id="{{ $field }}" name="{{ $field }}" value="{{ old($field, $arrayData['entity']->{$field}) }}" class="form-control" required>
                            @else
                                <input type="text" id="{{ $field }}" name="{{ $field }}" value="{{ old($field, $arrayData['entity']->{$field}) }}" class="form-control" required>
                            @endif

                            <!-- Exibir erros de validação, se houver -->
                            @error($field)
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    <?php endforeach; ?>
                    <div class="small-extra-spacing"></div>
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-secondary btn-sm w-10" onclick="window.location.href='{{ route($arrayData['entity_plural_name'] . '.dashboard') }}'">Voltar</button>
                        <button type="submit" class="btn btn-success btn-sm w-10">Salvar</button>
                    </div>                
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
