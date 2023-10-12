<?php

return [


    'post_title'=> 'Posts',

    'note'=> 'Note :',
    'You_must_enter'=> 'You must Enter/Upload',
    'title'=> 'Name, Content ',
    'and'=> 'and',
    'description'=> 'Featured Image',
    'submit_text'=> 'in all languages, then only it will allow to submit.',
    'feature_image_delete' => 'Are you sure you want to delete Feature Image?',
    'delete_permanently'=>'Are you sure? You really want to delete this record? You are about to permanently delete the record along with its associated data. This action can not be undone.',


        'post' => [
            'index' => [
                'id'=> 'ID',
                'name'=> 'Name',
                'image'=> 'image',
                'status'=> 'Status',
                'action'=> 'Action',
            ],
            'show' => [
                'tags'=> 'Tags',
                'comments'=> 'Comments',
            ],
            'create' => [
                'name'=> 'Name',
                'slug'=> 'Slug',
                'author_name_alias'=> 'Author Name Alias',
                'intro'=> 'Intro',
                'content'=> 'Content',
                'featured_image'=> 'Featured Image',
                'type'=> 'Type',
                'is_featured'=> 'Is Featured',
                'status'=> 'status',
                'published_at'=> 'Published At',
                'meta_title'=> 'Meta Title',
                'meta_keywords'=> 'Meta Keywords',
                'order'=> 'Order',
                'meta_description'=> 'Meta Description',
                'meta_og_image' => 'Meta Open Graph Image',
                'meta_og_url' => 'Meta Open Graph URL',

            ],
        ],

        'categories' => [
            'index' => [
                'id'=> 'ID',
                'name'=> 'Name',
                'updated_at'=> 'Updated At',
                'action'=> 'Action',
            ],
            'create' => [
                'name'=> 'Name',
                'slug'=> 'Slug',
                'order'=> 'Order',
                'description'=> 'Description',

            ],
        ],
    ];
