<?php 

$arrayData = array(
    'entity' => $foodTables,
    'icone' => config('foodTables.defaultIncone'),
    'entity_plural_display_name' => config('foodTables.pluralDisplayName'),
    'entity_singular_display_name' => config('foodTables.singularDisplayName'),
    'entity_plural_name' => 'foodTables',
    'entity_singular_name' => 'foodTable',
    'fields' => config('foodTables.dashboardFields'),
);

?>
@extends('layouts.connect')

@section('content')

@include('elements.dashboard-default', ['arrayData' => $arrayData])

@endsection
