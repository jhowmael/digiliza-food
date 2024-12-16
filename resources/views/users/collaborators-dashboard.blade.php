<?php 

$arrayData = array(
    'action_dashboard' => 'collaborators-dashboard',
    'action_filter' => 'collaborators-filter',
    'action_add' => 'collaborators-add',
    'action_view' => 'collaborators-view',
    'action_edit' => 'collaborators-edit',

    'entity' => $collaborators,
    'icone' => config('users.collaborators.defaultIncone'),
    'entity_plural_display_name' => config('users.collaborators.pluralDisplayName'),
    'entity_singular_display_name' => config('users.collaborators.singularDisplayName'),
    'entity_plural_name' => 'users',
    'entity_singular_name' => 'user',
    'fields' => config('users.collaborators.dashboardFields'),
);

?>
@extends('layouts.connect')

@section('content')

@include('elements.dashboard-default', ['arrayData' => $arrayData])

@endsection
