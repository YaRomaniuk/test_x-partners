<?php
if( !defined( 'ABSPATH')) exit();

class CitiesAndRelations
{    
    
    protected static $instance;
    
    protected static function getInstance() {
        return is_null( static::$instance ) ? new self : static::$instance;
    }
    
    public function __construct()
    {
        $this->init();        
    }
    
    public function connect_elementor(){
        if (! did_action('elementor/loaded')) {
            return false;
        }

        require_once SAR_DIR . '/classes/CitiesElementor.php';
        \Elementor\Plugin::instance()->widgets_manager->register(new \CitiesElementor());
    }
    public function init(){
        add_action( 'init', array( __CLASS__ , 'connect_elementor' ) );
    }


    public static function run() {
        self::check_site_class_loader();
        static::$instance = static::getInstance();
    }
    
    public static function check_site_class_loader()
    {
        require_once SAR_DIR . '/classes/CitiesType.php';
        require_once SAR_DIR . '/classes/Relations.php';

        $CitiesType = new CitiesType();
        $Relations = new Relations();

    }
}