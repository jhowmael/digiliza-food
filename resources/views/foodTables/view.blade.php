<?php 

$arrayData = array(
    'entity' => $foodTable,
    'icone' => config('foodTables.defaultIncone'),
    'entity_plural_display_name' => config('foodTables.pluralDisplayName'),
    'entity_singular_display_name' => config('foodTables.singularDisplayName'),
    'entity_plural_name' => 'foodTables',
    'entity_singular_name' => 'foodTable',
    'fields' => config('foodTables.viewFields'),
);

?>

@extends('layouts.connect')

@section('content')

@include('elements.view-default', ['arrayData' => $arrayData])

@endsection
