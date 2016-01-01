<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Exception Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in Exceptions thrown throughout the system.
    | Regardless where it is placed, a button can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'permissions' => [
                'create_error' => 'Un probl�me est survenu lors de la cr�ation de la permission. Veuillez r�essayer.',
                'delete_error' => 'Un probl�me est survenu lors de la suppression de la permission. Veuillez r�essayer.',

                'groups' => [
                    'associated_permissions' => 'You can not delete this group because it has associated permissions.',
                    'has_children' => 'You can not delete this group because it has child groups.',
                    'name_taken' => 'There is already a group with that name',
                ],

                'not_found' => "Cette permission n'existe pas.",
                'system_delete_error' => 'Vous ne pouvez pas supprimer une permission administrateur.',
                'update_error' => 'Un probl�me est survenu lors de la mise � jour de la permission. Veuillez r�essayer.',
            ],

            'roles' => [
                'already_exists' => 'Un r�le portant ce nom existe d�j�.',
                'cant_delete_admin' => 'Le r�le Administrator ne peut �tre supprim�.',
                'create_error' => 'Un probl�me est survenu lors de la cr�ation du r�le. Veuillez r�essayer.',
                'delete_error' => 'Un probl�me est survenu lors de la suppression du r�le. Veuillez r�essayer.',
                'has_users' => 'Ce r�le est associ� � des utilisateurs et ne peut �tre supprim�.',
                'needs_permission' => 'Vous devez s�lectionner au moins une permission pour ce r�le.',
                'not_found' => "Ce r�le n'existe pas.",
                'update_error' => 'Un probl�me est survenu lors de la mise � jour du r�le. Veuillez r�essayer.',
            ],

            'users' => [
                'cant_deactivate_self' => 'Vous ne pouvez pas vous d�sactiver vous m�me.',
                'cant_delete_self' => 'Vous ne pouvez pas vous supprimer vous m�me.',
                'create_error' => "Un probl�me est survenu lors de la cr�ation de l'utilisateur. Veuillez r�essayer.",
                'delete_error' => "Un probl�me est survenu lors de la suppression de l'utilisateur. Veuillez r�essayer.",
                'email_error' => 'Cette adresse email appartient � un autre utilisateur.',
                'mark_error' => "Un probl�me est survenu lors de la mise � jour de l'utilisateur. Veuillez r�essayer.",
                'not_found' => "Cet utilisateur n'existe pas.",
                'restore_error' => "Un probl�me est survenu lors de la restauration de l'utilisateur. Veuillez r�essayer.",
                'role_needed_create' => "Vous devez s�lectionner au moins un r�le. L'utilisateur a �t� cr�� mais d�sactiv�.",
                'role_needed' => 'Vous devez s�lectionner au moins un r�le.',
                'update_error' => "Un probl�me est survenu lors de la mise � jour de l'utilisateur. Veuillez r�essayer.",
                'update_password_error' => "Un probl�me est survenu lors du changement du mot de passe de l'utilisateur. Veuillez r�essayer.",
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Votre compte est d�j� confirm�.',
                'confirm' => 'Confirmez votre compte !',
                'created_confirm' => 'Votre compte a �t� cr�� avec succ�s.  Un email de confirmation vous a �t� envoy�.',
                'mismatch' => 'Votre code de confirmation est invalide.',
                'not_found' => "Votre code de confirmation n'existe pas.",
                'resend' => 'Votre compte n\'est pas confirm�. Veuillez utiliser le lien qui vous a �t� envoy� par mail, ou <a href="' . route('account.confirm.resend', ':token') . '">cliquez ici </a> pour recevoir un mail de nouveau.',
                'success' => "Votre compte est dor�navant confirm� !",
                'resent' => "Un nouveau mail a �t� adress� � l'adresse enregistr�e.",
            ],

            'deactivated' => 'Votre compte a �t� d�sactiv�.',
            'email_taken' => 'Cet email est d�j� utilis�.',

            'password' => [
                'change_mismatch' => "L'ancien mot de passe dst invalide.",
            ],


        ],
    ],
];