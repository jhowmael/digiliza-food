<?php 

$arrayData = array(
    'entity' => $reservation,
    'icone' => config('reservations.defaultIncone'),
    'entity_plural_display_name' => config('reservations.pluralDisplayName'),
    'entity_singular_display_name' => config('reservations.singularDisplayName'),
    'entity_plural_name' => 'reservations',
    'entity_singular_name' => 'reservation',
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
                            <label for="user_id">Usuário</label>
                            <input type="number" name="user_id" id="user_id" class="form-control" value="{{ $arrayData['entity']->user_id }}" required>
                        </div>

                        <div class="form-group">
                            <label for="food_table_id">Mesa de comida</label>
                            <input type="number" name="food_table_id" id="food_table_id" class="form-control" value="{{ $arrayData['entity']->food_table_id }}" required>
                        </div>

                        <div class="form-group">
                            <label for="occupation">Ocupação</label>
                            <input type="text" name="occupation" id="occupation" class="form-control" value="{{ $arrayData['entity']->occupation }}" required>
                        </div>

                        <div class="form-group">
                            <label for="entry">Entrada</label>
                            <input type="datetime-local" name="entry" id="entry" class="form-control" value="{{ $arrayData['entity']->entry }}" required>
                        </div>

                        <div class="form-group">
                            <label for="finished">Finalizado</label>
                            <input type="datetime-local" name="finished" id="finished" class="form-control" value="{{ $arrayData['entity']->finished }}">
                        </div>

                        <div class="form-group">
                            <label for="canceled">Cancelado</label>
                            <input type="datetime-local" name="canceled" id="canceled" class="form-control" value="{{ $arrayData['entity']->canceled }}">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                @foreach(config('reservations.status') as $statusKey => $statusLabel)
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
