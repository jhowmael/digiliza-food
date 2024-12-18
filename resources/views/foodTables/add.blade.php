<?php 

$arrayData = array(
    'icone' => config('foodTables.defaultIncone'),
    'entity_plural_display_name' => config('foodTables.pluralDisplayName'),
    'entity_singular_display_name' => config('foodTables.singularDisplayName'),
    'entity_plural_name' => 'foodTables',
    'entity_singular_name' => 'foodTable',
    'fields' => config('foodTables.addFields'),
);

?>

@extends('layouts.connect')

@section('content')

@include('elements.default-side-actions', ['arrayData' => $arrayData])

@endsection
