<?php 

$arrayData = array(
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
                    <h4>Adicionar {{ $arrayData['entity_singular_display_name'] }}</h4>
                </div>
                <div class="card-body">
                    <!-- Formulário de Adição -->
                    <form action="{{ route($arrayData['entity_plural_name'] . '.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <!-- Campo para ID do Cliente -->
                            <div class="col-md-6 mb-3">
                                <label for="user_id" class="form-label">ID do Cliente :</label>
                                <input type="text" id="user_id" name="user_id" class="form-control" required>
                            </div>

                            <!-- Campo para ID da Mesa -->
                            <div class="col-md-6 mb-3">
                                <label for="food_table_id" class="form-label">ID da Mesa :</label>
                                <input type="text" id="food_table_id" name="food_table_id" class="form-control" required>
                            </div>

                            <!-- Campo para ocupação -->
                            <div class="col-md-12 mb-3">
                                <label for="occupation" class="form-label">Ocupação :</label>
                                <input type="text" id="occupation" name="occupation" class="form-control" required>
                            </div>

                            <!-- Campo para a entrada (data/hora) -->
                            <div class="col-md-12 mb-3">
                                <label for="entry" class="form-label">Entrada :</label>
                                <input type="datetime-local" id="entry" name="entry" class="form-control" required>
                            </div>

                            <!-- Campo para o encerramento (data/hora) -->
                            <div class="col-md-12 mb-3">
                                <label for="finished" class="form-label">Encerramento :</label>
                                <input type="datetime-local" id="finished" name="finished" class="form-control">
                            </div>

                            <!-- Campo para o cancelamento (data/hora) -->
                            <div class="col-md-12 mb-3">
                                <label for="canceled" class="form-label">Cancelado :</label>
                                <input type="datetime-local" id="canceled" name="canceled" class="form-control">
                            </div>

                            <!-- Campo para o status -->
                            <div class="col-md-12 mb-3">
                                <label for="status" class="form-label">Status :</label>
                                <select id="status" name="status" class="form-control" required>
                                    @foreach(config('reservations.status') as $status => $label)
                                        <option value="{{ $status }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Botões de ação -->
                        <div class="text-center mt-3">
                            <button type="button" class="btn btn-secondary btn-sm w-10" onclick="window.location.href='{{ route('reservations.dashboard') }}'">Voltar</button>
                            <button type="submit" class="btn btn-success btn-sm w-10">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
