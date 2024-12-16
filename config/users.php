<?php

return [
    'types' => [
        'customer' => 'CLIENTE',
        'collaborator' => 'COLABORADOR',
    ],

    'status' => [
        'enabled' => 'ATIVO',
        'deleted' => 'DELETADO',
    ],

    'autoTypeRegister' => 'customer',

    'autoStatusRegister' => 'enabled',
    
    'collaborators' => [
        'defaultIncone' => 'fa-solid fa-helmet-safety',
    
        'pluralDisplayName' => 'Colaboradores',
    
        'singularDisplayName' => 'Colaborador',
    
        'dashboardFields' => [
            'id' => 'Id', 
            'type' => 'Tipo',
            'name' => 'Nome',
            'email' => 'Email',
            'phone' => 'Telefone',
            'status' => 'Status',  
            'birthday' => 'Aniversário', 
        ],
    
        'editFields' => [
            'name' => 'Nome',
            'email' => 'Email',
            'phone' => 'Telefone',
            'status' => 'Status',  
            'birthday' => 'Aniversário', 
        ],
    
        'filterFields' => [
            'id' => 'Id', 
            'type' => 'Tipo',
            'name' => 'Nome',
            'email' => 'Email',
            'phone' => 'Telefone',
            'status' => 'Status',  
            'birthday' => 'Aniversário', 
        ],
    
        'viewFields' => [
            'id' => 'Id', 
            'type' => 'Tipo',
            'name' => 'Nome',
            'email' => 'Email',
            'phone' => 'Telefone',
            'status' => 'Status',  
            'birthday' => 'Aniversário', 
        ],
    
        'addFields' => [
            'name' => 'Nome',
            'email' => 'Email',
            'phone' => 'Telefone',
            'status' => 'Status',  
            'birthday' => 'Aniversário', 
        ],
    ],
];