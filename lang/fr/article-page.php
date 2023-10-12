<?php

return [

    'post_title'=> 'Des postes',


    'note'=> 'Note :',
    'You_must_enter'=> 'Vous devez saisir/télécharger',
    'title'=> 'Nom, contenu',
    'and'=> 'et',
    'description'=> "L'image sélectionnée",
    'submit_text'=> 'dans toutes les langues, alors seulement il permettra de soumettre.',
    'feature_image_delete' => 'Êtes-vous sûr de vouloir supprimer Feature Image ?',
    'delete_permanently'=>'Es-tu sûr? Vous voulez vraiment supprimer cet enregistrement ? Vous êtes sur le point de supprimer définitivement l enregistrement ainsi que ses données associées. Cette action ne peut pas être annulée.',
        'post' => [
            'index' => [
                'id'=> 'IDENTIFIANT',
                'name'=> 'Nom',
                'image'=> 'image',
                'status'=> 'Statut',
                'action'=> 'Action',
            ],
            'show' => [
                'tags'=> 'Mots clés',
                'comments'=> 'commentaires',
            ],
            'create' => [
                'name'=> 'Nom',
                'slug'=> 'Limace',
                'author_name_alias'=> "Nom de l'auteur Alias",
                'intro'=> 'Introduction',
                'content'=> 'Contenu',
                'featured_image'=> "L'image sélectionnée",
                'type'=> 'Taper',
                'is_featured'=> 'Est en vedette',
                'status'=> 'statut',
                'published_at'=> 'Publié à',
                'meta_title'=> 'Méta-titre',
                'meta_keywords'=> 'Méta-mots clés',
                'order'=> 'Commande',
                'meta_description'=> 'Meta Description',
                'meta_og_image' => 'Meta Open Graph Image',
                'meta_og_url' => 'URL Meta Open Graph',

            ],
        ],

        'categories' => [
            'index' => [
                'id'=> 'IDENTIFIANT',
                'name'=> 'Nom',
                'updated_at'=> 'Mis à jour à',
                'action'=> 'Action',
            ],
            'create' => [
                'name'=> 'Nom',
                'slug'=> 'Limace',
                'order'=> 'Commande',
                'description'=> 'Description',

            ],
        ],
    ];
