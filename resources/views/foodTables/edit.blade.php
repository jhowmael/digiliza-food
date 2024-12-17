<?php 

$arrayData = array(
    'entity' => $foodTable,
    'icone' => config('foodTables.defaultIncone'),
    'entity_plural_display_name' => config('foodTables.pluralDisplayName'),
    'entity_singular_display_name' => config('foodTables.singularDisplayName'),
    'entity_plural_name' => 'foodTables',
    'entity_singular_name' => 'foodTable',
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
                    <h4>Editar</h4>
                </div>
                <div class="card-body">
                    <!-- Formulário de edição -->
                    <form action="{{ route($arrayData['entity_plural_name'] . '.update', $arrayData['entity']->id) }}" method="POST">
                        @csrf
                        @method('PUT')  <!-- Usando o método PUT para a atualização -->
                    
                        <!-- Campos do formulário -->
                        <div class="form-group">
                            <label for="number">Numero</label>
                            <input type="number" name="number" id="number" class="form-control" value="{{ $arrayData['entity']->number }}" required>
                        </div>

                        <div class="form-group">
                            <label for="capacity">Capacidade</label>
                            <input type="number" name="capacity" id="capacity" class="form-control" value="{{ $arrayData['entity']->capacity }}" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                @foreach(config('foodTables.status') as $statusKey => $statusLabel)
                                    <option value="{{ $statusKey }}" {{ $arrayData['entity']->status == $statusKey ? 'selected' : '' }}>
                                        {{ $statusLabel }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="created_at">Criado em</label>
                            <input type="text" name="created_at" id="created_at" class="form-control" value="{{ $arrayData['entity']->created_at }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="updated_at">Atualizado em</label>
                            <input type="text" name="updated_at" id="updated_at" class="form-control" value="{{ $arrayData['entity']->updated_at }}" disabled>
                        </div>

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
@endsection
