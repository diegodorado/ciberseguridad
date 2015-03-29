<?php

return [
    'auth' => [
        'title' => 'Zone d\'administration'
    ],
    'field' => [
        'invalid_type' => 'Type de champ invalide :type.',
        'options_method_not_exists' => 'La classe modèle :model doit définir une méthode :method() renvoyant des options pour le champ de formulaire ":field".',
    ],
    'widget' => [
        'not_registered' => "La classe ':name' du widget non enregistrée",
        'not_bound' => "La classe ':name' du widget n'a pas pu s'authentifier avec le contrôleur",
    ],
    'page' => [
        'untitled' => "Sans titre",
        'access_denied' => [
            'label' => "Accès refusé",
            'help' => "Vous n'avez pas l'autorisation pour visualiser cette page.",
            'cms_link' => "Retour à l'administration",
        ],
    ],
    'partial' => [
        'not_found_name' => "Le partial ':name' est introuvable.",
    ],
    'account' => [
        'sign_out' => 'Déconnexion',
        'login' => 'Identifiant',
        'reset' => 'Réinitialiser',
        'restore' => 'Restaurer',
        'login_placeholder' => 'Identifiant',
        'password_placeholder' => 'Mot de passe',
        'forgot_password' => "Mot de passe oublié ?",
        'enter_email' => "Entrez votre email",
        'enter_login' => "Entrez votre identifiant",
        'email_placeholder' => "email",
        'enter_new_password' => "Entrez votre nouveau mot de passe",
        'password_reset' => "Réinitialiser le mot de passe",
        'restore_success' => "Un email contenant les instructions de réinitialisation de mot de passe a été envoyé sur l'email de votre compte.",
        'restore_error' => "L'identifiant ':login' ne correspond à aucun utilisateur",
        'reset_success' => "Mot de passe réinitialisé avec succès. Vous pouvez maintenant vous connecter.",
        'reset_error' => "Données de réinitialisation du mot de passe invalides. Veuillez réessayer !",
        'reset_fail' => "Réinitialisation du mot de passe impossible!",
        'apply' => 'Appliquer',
        'cancel' => 'Annuler',
        'delete' => 'Delete',
        'ok' => 'OK',
    ],
    'dashboard' => [
        'menu_label' => 'Tableau de bord',
        'widget_label' => 'Widget',
        'widget_width' => 'Taille',
        'full_width' => 'Plein écra',
        'add_widget' => 'Ajouter un widget',
        'widget_inspector_title' => 'Configuration du Widget',
        'widget_inspector_description' => 'Configurer le widget',
        'widget_columns_label' => 'Width :columns',
        'widget_columns_description' => 'La longueur du widget, a nombre entre 1 et 10.',
        'widget_columns_error' => 'Veuillez définir la longueur du widget, un nombre entre 1 et 10.',
        'columns' => '{1} colonne|[2,Inf] colonnes',
        'widget_new_row_label' => 'Forcer une nouvelle ligne',
        'widget_new_row_description' => 'Placer le widget sur une nouvelle ligne.',
        'widget_title_label' => 'Titre du Widget',
        'widget_title_error' => 'Le titre du Widget est obligatoire.',
        'status' => [
            'widget_title_default' => 'Etat du système',
            'online' => 'en ligne',
            'maintenance' => 'en cours de maintenance',
            'update_available' => '{0} mise à jour disponible!|{1} mise à jour disponible!|[2,Inf] mises à jour disponibles!'
        ]
    ],
    'user' => [
        'name' => 'Administrateur',
        'menu_label' => 'Administrateurs',
        'menu_description' => 'Gérer les utilisateurs, groupes et permissions de l\'administration.',
        'list_title' => 'Gérer les administrateur',
        'new' => 'Ajouter un administrateur',
        'login' => "Identifiant",
        'first_name' => "Prénom",
        'last_name' => "Nom",
        'full_name' => "Nom complet",
        'email' => "Email",
        'groups' => "Groupes",
        'groups_comment' => "Précisez à quel(s) groupe(s) cette personne appartient.",
        'avatar' => "Avatar",
        'password' => "Mot de passe",
        'password_confirmation' => "Confirmer le mot de passe",
        'permissions' => 'Permissions',
        'superuser' => "Super Utilisateur",
        'superuser_comment' => "Cochez cette case pour autoriser cet utilisateur à accéder a l'ensemble des zones.",
        'send_invite' => 'Envoyer une invitation par email',
        'send_invite_comment' => 'Cochez cette case pour envoyer une invitation aux utilisateurs par email.',
        'delete_confirm' => 'Voulez-vous vraiment supprimer cet administrateurr?',
        'return' => 'Retour à la liste des administrateurs',
        'allow' => 'Autoriser',
        'inherit' => 'Hériter',
        'deny' => 'Interdire',
        'group' => [
            'name' => 'Groupe',
            'name_field' => 'Nom',
            'description_field' => 'Description',
            'is_new_user_default_field' => 'Inclure les nouveaux administrateurs dans ce groupe, par défaut.',
            'code_field' => 'Code',
            'code_comment' => 'Entrer un code d\'accès unique si vous souhaitez accéder a ce groupe via une API.',
            'menu_label' => 'Groupes',
            'list_title' => 'Gérer les groupes',
            'new' => 'Ajouter un groupe administrateur',
            'delete_confirm' => 'Voulez-vous vraiment supprimer ce groupe d\'administrateurs ?',
            'return' => 'Retour à la liste des groupes',
        ],
        'preferences' => [
            'not_authenticated' => 'Il n\'y a aucun utilisateur identifié à qui charger ou changer les préférences.'
        ]
    ],
    'list' => [
        'default_title' => 'Liste',
        'search_prompt' => 'Rechercher...',
        'no_records' => 'Il n\'y a aucun résultat dans cette vue.',
        'missing_model' => 'La liste utilisée dans la classe :class n\'a pas de modèle défini.',
        'missing_column' => 'Il n\'y a pas de définition pour la colonne :columns.',
        'missing_columns' => 'La liste utilisée dans la classe :class n\'a pas de colonne de liste définie.',
        'missing_definition' => 'La liste utilisée ne contient de pas de colonne pour le champ \':field\'.',
        'behavior_not_ready' => 'La liste utilisée n\'a pas été initialisée, vérifiez que vous avez appellé la méthode makeLists() dans votre contrôleur.',
        'invalid_column_datetime' => 'La valeur de la colonne \':column\' n\'est pas un object DateTime, est-ce qu\'il vous manque une référence de \$dates dans votre Modèle ?',
        'pagination' => 'Enregistrements affichés: :from-:to sur :total',
        'prev_page' => 'Page précédente',
        'next_page' => 'Page suivante',
        'loading' => 'Chargement...',
        'setup_title' => 'Installation de la liste',
        'setup_help' => 'Cochez les colonnes que vous souhaitez voir dans la liste. Vous pouvez modifier l\'ordre des colonnes en les glissant vers le haut ou le bas.',
        'records_per_page' => 'Enregistrements par page',
        'records_per_page_help' => 'Choisissez le nombre d\'enregistrements à afficher. Notez qu\'un nombre d\'enregistrements trop élevé sur une seule page peut réduire les performances.',
        'delete_selected' => 'Supprimer la sélection',
        'delete_selected_empty' => 'Il n\'y a aucun enregistrement a supprimer',
        'delete_selected_confirm' => 'Supprimer les enregistrements sélectionnés ?',
        'delete_selected_success' => 'Les enregistrements ont bien été supprimés.',
    ],
    'fileupload' => [
        'attachment' => 'Pièce-jointe',
        'help' => 'Ajouter un titre et une description pour cette pièce-jointe.',
        'title_label' => 'Titre',
        'description_label' => 'Description'
    ],
    'form' => [
        'create_title' => "Nouveau :name",
        'update_title' => "Éditer :name",
        'preview_title' => "Aperçu :name",
        'create_success' => 'Le :name a été créé avec succès',
        'update_success' => 'Le :name a été modifié avec succès',
        'delete_success' => 'Le :name a été supprimé avec succès',
        'missing_id' => "L'ID de l'enregistrement du formulaire n'est pas précisé.",
        'missing_model' => 'Le formulaire utilisé dans la classe :class n\'a pas de modèle défini.',
        'missing_definition' => "Le formulaire utilisé n'a pas de champ pour ':field'.",
        'not_found' => 'Aucun enregistrement ne correspond a l\'ID :id.',
        'action_confirm' => 'Êtes-vous certain(e) ?',
        'create' => 'Créer',
        'create_and_close' => 'Créer et fermer',
        'creating' => 'Création en cours...',
        'creating_name' => 'Création de :name en cours...',
        'save' => 'Enregistrer',
        'save_and_close' => 'Enregistrer et fermer',
        'saving' => 'Enregistrement en cours...',
        'saving_name' => 'Enregistrement de :name en cours...',
        'delete' => 'Supprimer',
        'deleting' => 'Suppression en cours...',
        'deleting_name' => 'Suppression de :name en cours...',
        'reset_default' => 'Restaurer les valeurs par défaut',
        'resetting' => 'Restauration',
        'resetting_name' => 'Restauration de :name',
        'undefined_tab' => 'Divers',
        'field_off' => 'Désactivé',
        'field_on' => 'Activé',
        'add' => 'Ajouter',
        'apply' => 'Appliquer',
        'cancel' => 'Annuler',
        'close' => 'Fermer',
        'confirm' => 'Confirmer',
        'reload' => 'Recharger',
        'ok' => 'OK',
        'or' => 'ou',
        'confirm_tab_close' => 'Voulez-vous vraiment fermer cet onglet? Les modifications que vous avez faites seront perdues.',
        'behavior_not_ready' => 'Le formulaire n\' a pas encore été initialisé, vérifiez que vous avez bien appellé la méthode initForm() dans votre contrôleur.',
        'preview_no_files_message' => 'Les fichiers ne sont pas envoyés.',
        'select' => 'Sélectionner',
        'select_all' => 'tout',
        'select_none' => 'aucun',
        'select_placeholder' => 'Sélectionnez une valeur',
        'insert_row' => 'Insérer une ligne',
        'delete_row' => 'Supprimer une ligne',
        'concurrency_file_changed_title' => 'Le fichier à été modifié',
        'concurrency_file_changed_description' => "Le fichier que vous êtes en train d'éditer à été modifié sur le disque par un autre utilisateur. Vous pouvez soit recharger le fichier depuis le disque (en perdant donc vos propres changements) ou bien écraser ce fichier avec vos propres modifications.."
    ],
    'relation' => [
        'missing_config' => "La relation n'a pas de configuration pour ':config'.",
        'missing_definition' => "La relation n'a pas de définition pour le champ ':field'.",
        'missing_model' => "La relation utilisée dans la classe :class n'a pas de modèle défini.",
        'invalid_action_single' => "Cette action ne peut être effectuée sur une relation singulière.",
        'invalid_action_multi' => "Cette action ne peut être effectuée sur une relation multiple.",
        'help' => "Cliquez sur un élément pour ajouter",
        'related_data' => "Donnée liée :name",
        'add' => "Ajouter",
        'add_a_new' => "Ajouter un nouveau :name",
        'add_selected' => "Ajouter la sélection",
        'link_selected' => "Lier la sélection",
        'link_a_new' => "Lier un nouveau :name",
        'cancel' => "Annuler",
        'close' => "Fermer",
        'add_name' => "Ajouter :name",
        'create' => "Créer",
        'create_name' => "Création de :name",
        'update' => "Mettre à jour",
        'update_name' => "Mise à jour de :name",
        'preview' => "Aperçu",
        'preview_name' => "Aperçu de :name",
        'remove' => "Retirer",
        'remove_name' => "Retirer :name",
        'delete' => "Supprimer",
        'delete_name' => "Suppression de :name",
        'delete_confirm' => "Êtes vous certain(e) ?",
        'link' => "Lier",
        'link_name' => "Lier :name",
        'unlink' => "Séparer",
        'unlink_name' => "Séparer :name",
        'unlink_confirm' => "Êtes vous certain(e) ?",
    ],
    'model' => [
        'name' => "Modèle",
        'not_found' => "Aucun modèle ':class' ne correspond à l'ID :id",
        'missing_id' => "Il manque l'ID de l'enregistrement.",
        'missing_relation' => "Le modèle ':class' ne contient pas de définition ':relation'.",
        'missing_method' => "Le modèle ':class' ne contient pas de méthode ':method'.",
        'invalid_class' => "Le modèle :model utilisé dans la classe :class est invalide, il doit hériter la classe \Model.",
        'mass_assignment_failed' => "L'assignement de masse a échoué pour l'attribut de modèle ':attribute'.",
    ],
    'warnings' => [
        'tips' => 'Conseils de configuration système',
        'tips_description' => 'Il y a des éléments a prendre en compte pour configurer le système proprement.',
        'permissions'  => 'Le répertoire :name ou ses sous-dossiers n\'ont pas les droits d\'écriture pour PHP. Veuillez modifier les droits de ce répertoire pour le serveur web.',
        'extension' => 'L\'extension PHP :name n\'est pas installée. Veuillez installer la librairie et activer l\'extension.'
    ],
    'editor' => [
        'menu_label' => 'Préférences de l\'éditeur de code',
        'menu_description' => 'Visualiser et personnaliser la configuration de l\'éditeur de code.',
        'font_size' => 'Taille de police',
        'tab_size' => 'Taille de tabulation',
        'use_hard_tabs' => 'Indentation par tabulation',
        'code_folding' => 'Masquage du code',
        'word_wrap' => 'Retour à la ligne',
        'highlight_active_line' => 'Sélectionner la ligne active',
        'show_invisibles' => 'Afficher les caractères invisibles',
        'show_gutter' => 'Afficher les numéros de ligne',
        'theme' => 'Schéma de couleurs',
    ],
    'tooltips' => [
        'preview_website' => 'Aperçu du site'
    ],
    'mysettings' => [
        'menu_label' => 'Mes paramètres',
        'menu_description' => 'Paramètres en relation avec votre compte',
    ],
    'myaccount' => [
        'menu_label' => 'Mon compte',
        'menu_description' => 'Modifier les informations de votre compte comme le nom, l\'email ou le mot de passe.',
        'menu_keywords' => 'sécurité compte'
    ],
    'branding' => [
        'menu_label' => 'Personnalisation de l\'interface d\'administration',
        'menu_description' => 'Personnaliser l\'interface d\'administration comme le nom, les couleurs ou le logo.',
        'brand' => 'Marque',
        'logo' => 'Logo',
        'logo_description' => 'Envoyer un logo personnalisé pour utiliser dans le interface d\'administration.',
        'app_name' => 'Nom de l\'application',
        'app_name_description' => 'Ce nom est affiché comme titre dans le interface d\'administration.',
        'app_tagline' => 'Slogan de l\'application',
        'app_tagline_description' => 'Ce slogan est affiché sur la page d\'inscription à l\'interface d\'administration.',
        'colors' => 'Couleurs',
        'primary_light' => 'Primaire (Claire)',
        'primary_dark' => 'Primaire (Foncée)',
        'secondary_light' => 'Secondaire (Claire)',
        'secondary_dark' => 'Secondaire (Foncée)',
        'styles' => 'Styles',
        'custom_stylesheet' => 'Feuille de style personnalisée (CSS)'
    ],
    'backend_preferences' => [
        'menu_label' => 'Préférences de l\'administration',
        'menu_description' => 'Gérer la langue de préférence et l\'apparence de l\'administration.',
        'locale' => 'Langue',
        'locale_comment' => 'Choisir une langue.',
    ],
    'access_log' => [
        'hint' => 'Ce log affiche une liste d\'inscriptions en attente d\'approbation par un administrateur. Les enregistrements sont sauvegardés pendant :days jours.',
        'menu_label' => 'Log des accès',
        'menu_description' => 'Affiche la liste des utilisateurs connectés avec succès à l\'administration.',
        'created_at' => 'Date & heure',
        'login' => 'Identifiant',
        'ip_address' => 'Addresse IP',
        'first_name' => 'Prénom',
        'last_name' => 'Nom',
        'email' => 'Email',
    ],
    'filter' => [
      'all' => 'tous'
    ],
];
