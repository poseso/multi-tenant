<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Menus Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in menu items throughout the system.
    | Regardless where it is placed, a menu item can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'title' => 'Gestion des accès',

            'roles' => [
                'all' => 'Tous les Rôles',
                'create' => 'Créer un Rôle',
                'edit' => 'Éditer un Rôle',
                'management' => 'Gestion des Rôles',
                'main' => 'Rôles',
            ],

            'users' => [
                'all' => 'Tous les Utilisateurs',
                'change-password' => 'Changer le mot de passe',
                'create' => 'Créer un Utilisateur',
                'deactivated' => 'Utilisateurs désactivés',
                'deleted' => 'Utilisateurs supprimés',
                'edit' => 'Éditer un Utilisateur',
                'main' => 'Utilisateurs',
            ],
        ],

        'log-viewer' => [
            'main' => 'Consulter Logs',
            'dashboard' => 'Tableau de bord',
            'logs' => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Tableau de bord',
            'general' => 'Général',
        ],
    ],

    'language-picker' => [
        'language' => 'Langue',
        /**
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar' => 'العربية (Arabic)',
            'da' => 'Danois (Danish)',
            'de' => 'Allemand (German)',
            'en' => 'Anglais (English)',
            'es' => 'Espagnol  (Spanish)',
            'fr' => 'Français (French)',
            'it' => 'Italien (Italian)',
            'pt-BR' => 'Portugais (Brazilian Portuguese)',
            'sv' => 'Suédois (Swedish)',
        ],
    ],
];
