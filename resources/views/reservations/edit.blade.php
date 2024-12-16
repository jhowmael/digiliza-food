<?php 

$arrayData = array(
    'entity' => $reservation,
    'icone' => config('reservations.defaultIncone'),
    'entity_plural_display_name' => config('reservations.pluralDisplayName'),
    'entity_singular_display_name' => config('reservations.singularDisplayName'),
    'entity_plural_name' => 'reservations',
    'entity_singular_name' => 'reservation',
    'fields' => config('reservations.editFields'),
);

?>

@extends('layouts.connect')

@section('content')

@include('elements.edit-default', ['arrayData' => $arrayData])

@endsection
