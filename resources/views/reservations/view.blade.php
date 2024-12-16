<?php 

$arrayData = array(
    'entity' => $reservation,
    'icone' => config('reservations.defaultIncone'),
    'entity_plural_display_name' => config('reservations.pluralDisplayName'),
    'entity_singular_display_name' => config('reservations.singularDisplayName'),
    'entity_plural_name' => 'reservations',
    'entity_singular_name' => 'reservation',
    'fields' => config('reservations.viewFields'),
);

?>

@extends('layouts.connect')

@section('content')

@include('elements.view-default', ['arrayData' => $arrayData])

@endsection
