<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'general' => [
        'all' => 'Tous',
        'actions' => 'Actions',
        'buttons' => [
            'save' => 'Sauvegarder',
            'update' => 'Mettre � jour',
        ],
        'hide' => 'Cacher',
        'none' => 'Aucun',
        'show' => 'Voir',
        'toggle_navigation' => 'Navigation',
    ],

    'backend' => [
        'access' => [
            'permissions' => [
                'create' => 'Cr�er Permission',
                'dependencies' => 'D�pendances',
                'edit' => '�diter Permission',

                'groups' => [
                    'create' => 'Cr�er Groupe',
                    'edit' => '�diter Groupe',

                    'table' => [
                        'name' => 'Nom',
                    ],
                ],

                'grouped_permissions' => 'Permissions group�es',
                'label' => 'permissions',
                'management' => 'Gerstion des Permissions',
                'no_groups' => "Il n'y a pas de groupes de permission.",
                'no_permissions' => 'Pas de permission s�lectionn�e.',
                'no_roles' => 'Pas de r�le s�lectionn�',
                'no_ungrouped' => "Il n'y a pas de permissions non group�es.",

                'table' => [
                    'dependencies' => 'D�pendances',
                    'group' => 'Groupe',
                    'group-sort' => 'Tri Groupe',
                    'name' => 'Nom',
                    'permission' => 'Permission',
                    'roles' => 'R�les',
                    'system' => 'Syst�me',
                    'total' => 'permissions(s) total',
                    'users' => 'Utilisateurs',
                ],

                'tabs' => [
                    'general' => 'G�neral',
                    'groups' => 'Groupes',
                    'dependencies' => 'D�pendances',
                    'permissions' => 'Permissions',
                ],

                'ungrouped_permissions' => 'Permissions non group�es',
            ],

            'roles' => [
                'create' => 'Cr�er R�le',
                'edit' => 'Editer R�le',
                'management' => 'Gestion R�le',

                'table' => [
                    'number_of_users' => "Nombre d'utilisateurs",
                    'permissions' => 'Permissions',
                    'role' => 'R�le',
                    'sort' => 'Tri',
                    'total' => 'r�les(s) total',
                ],
            ],

            'users' => [
                'active' => 'Utilisateurs actifs',
                'all_permissions' => 'Toutes les Permissions',
                'change_password' => 'Modifier le mot de passe',
                'change_password_for' => 'Modifier le mot de passe pour :user',
                'create' => 'Cr�er Utilisateur',
                'deactivated' => 'Utilisateurs d�sactiv�s',
                'deleted' => 'Utilisateurs supprim�s',
                'dependencies' => 'D�pendances',
                'edit' => '�diter Utilisateur',
                'management' => 'Gestion utilisateurs',
                'no_other_permissions' => "Pas d'autres Permissions",
                'no_permissions' => 'Pas de Permissions',
                'no_roles' => 'Pas de R�le � affecter.',
                'permissions' => 'Permissions',
                'permission_check' => "V�rifier une permission v�rifie aussi ses d�pendances s'il y en a.",

                'table' => [
                    'confirmed' => 'Confirm�',
                    'created' => 'Cr��',
                    'email' => 'E-mail',
                    'id' => 'ID',
                    'last_updated' => 'Mise � jour le',
                    'name' => 'Nom',
                    'no_deactivated' => "Pas d'utilisateurs d�sactiv�s",
                    'no_deleted' => "Pas d'utilisateurs supprim�s",
                    'other_permissions' => 'Autres Permissions',
                    'roles' => 'R�les',
                    'total' => 'utilisateur(s) total',
                ],
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title' => 'identifiant',
            'login_button' => 'OK',
            'login_with' => 'Login with :social_media',
            'register_box_title' => 'Register',
            'register_button' => 'Register',
            'remember_me' => 'Remember Me',
        ],

        'passwords' => [
            'forgot_password' => 'Vous avezz oubli� votre mot de passe ?',
            'reset_password_box_title' => 'R�initialisation du mot de passe',
            'reset_password_button' => 'R�initialiser le mot de passe',
            'send_password_reset_link_button' => 'Envoyer le lien de r�initialisation',
        ],

        'macros' => [
            'country' => [
                'alpha' => 'Pays Alpha Codes',
                'alpha2' => 'Pays Alpha 2 Codes',
                'alpha3' => 'Pays Alpha 3 Codes',
                'numeric' => 'Pays Num�ros Codes',
            ],

            'macro_examples' => 'Examples Macros',

            'state' => [
                'mexico' => 'Mexico State List',
                'us' => [
                    'us' => 'US States',
                    'outlying' => 'US Outlying Territories',
                    'armed' => 'US Armed Forces',
                ],
            ],

            'territories' => [
                'canada' => 'Canada Province & Territories List',
            ],

            'timezone' => 'Fuseau horaire',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Modifier le mot de passe',
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => 'Cr�� le ',
                'edit_information' => '�diter les informations',
                'email' => 'e-mail',
                'last_updated' => 'Mise � jour le',
                'name' => 'Nom',
                'update_information' => 'Mettre � jour les informations',
            ],
        ],

    ],
];