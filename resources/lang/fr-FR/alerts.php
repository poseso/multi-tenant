<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Alert Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain alert messages for various scenarios
    | during CRUD operations. You are free to modify these language lines
    | according to your application's requirements.
    |
    */

    'backend' => [
        'permissions' => [
            'created' => 'Permission cr��e avec succ�s.',
            'deleted' => 'Permission successfully supprim�e avec succ�s.',

            'groups'  => [
                'created' => 'Groupe de permissions cr�� avec succ�s.',
                'deleted' => 'Groupe de permissions supprim� avec succ�s.',
                'updated' => 'Groupe de permissions mis � jour avec succ�s.',
            ],

            'updated' => 'Permission mise � jour avec succ�s.',
        ],

        'roles' => [
            'created' => 'Le r�le a �t� cr�� avec succ�s.',
            'deleted' => 'Le r�le a �t� supprim� avec succ�s.',
            'updated' => 'Le r�le a �t� mis � jour avec succ�s.',
        ],

        'users' => [
            'confirmation_email' => "Un e-mail de confirmation a �t� adress� � l'adresse indiqu�e",
            'created' => "L'utilisateur a �t� cr�� avec succ�s.",
            'deleted' => "L'utilisateur a �t� supprim� avec succ�s.",
            'deleted_permanently' => "L'utilisateur a �t� supprim� d�finitivement.",
            'restored' => "L'utilisateur a �t� r�-activ�.",
            'updated' => "L'utilisateur a �t� mis � jour avec succ�s.",
            'updated_password' => "Le mot de passe utilisateur a �t� mis � jour avec succ�s.",
        ]
    ],
];