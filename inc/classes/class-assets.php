<?php

/**
 * Enque theme assets
 * @package Aquila
 */

namespace Aquila_Theme\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Assets
{
    use Singleton;
    protected function __construct()
    {
        // load class
        $this->set_hooks();
    }

    protected function set_hooks()
    {
        // actions
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);

        //filtes
    }

    public function register_styles()
    {
        // register styles
        wp_register_style('style-css', get_stylesheet_uri(), [], filemtime(AQUILA_DIR_PATH . '/style.css'), 'all');
        wp_register_style('bootstrap-css', AQUILA_DIR_PATH . '/assets/src/library/css/bootstrap/min.css', [], '6.4.2', 'all');

        // enqueue styles
        wp_enqueue_style('style-css');
        wp_enqueue_style('bootstrap-css');
    }

    public function register_scripts()
    {

        // register scripts
        wp_register_script('main-js', AQUILA_DIR_PATH . '/assets/main.js', [], filemtime(AQUILA_DIR_PATH . '/assets/main.js'), true);
        wp_register_script('bootstrap-js', AQUILA_DIR_PATH . '/assets/src/library/js/bootstrap.min.js', ['jquery'], '6.4.2', true);


        // enqueue scripts
        wp_enqueue_script('jquery');
        wp_enqueue_script('main-js');
        wp_enqueue_script('bootstrap-js');
    }
}
