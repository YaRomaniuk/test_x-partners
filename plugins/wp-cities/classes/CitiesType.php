<?php
class CitiesType
{
    public function __construct() {
        add_action( 'init', [$this,'register_cities_types'] );
    }
    public function register_cities_types(){

        register_post_type( 'cities', [
            'label'  => null,
            'labels' => [
                'name'               => 'Города',
                'singular_name'      => 'Город',
                'add_new'            => 'Добавить Город',
                'add_new_item'       => 'Добавление Города',
                'edit_item'          => 'Редактирование Города',
                'new_item'           => 'Новый Город',
                'view_item'          => 'Смотреть Город',
                'search_items'       => 'Искать Город',
                'not_found'          => 'Не найдено',
                'not_found_in_trash' => 'Не найдено в корзине',
                'parent_item_colon'  => '',
                'menu_name'          => 'Города',
            ],
            'description'            => '',
            'public'                 => true,
            'show_in_menu'           => null,
            'show_in_rest'        => null,
            'rest_base'           => null,
            'menu_position'       => null,
            'menu_icon'           => null,
            'hierarchical'        => false,
            'supports'            => [ 'title', 'editor','thumbnail' ],
            'taxonomies'          => [],
            'has_archive'         => true,
            'rewrite'             => true,
            'query_var'           => true,
        ] );
    }

}