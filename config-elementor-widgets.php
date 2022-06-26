<?php
/**
 * Plugin Name: Weboost Elementor Widgets
 * Description: Elementor custom widgets from Eessential Weboost Web Apps.
 * Plugin URI:  https://weboost.pt/
 * Version:     1.0.0
 * Author:      Rafael H Souza
 * Author URI:  https://rafaelhsouza.com.br/
 * Text Domain: weboost-elementor-widgets
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//Registra Widgetssd
function register_weboost_elementor_widgets( $widgets_manager ) {

    require_once( __DIR__ . '/widgets/teste1/card-widget.php' );
    require_once( __DIR__ . '/widgets/teste2/teste.php' );

    $widgets_manager->register( new \Essential_Elementor_Card_Widget() );
    $widgets_manager->register( new \Teste_Elementor_Card_Widget() );

}
add_action( 'elementor/widgets/register', 'register_weboost_elementor_widgets' );


//remove widgets pro elementor
function remove_widgets_elementor_pro() {
    echo "
    <style>#elementor-panel-category-pro-elements, #elementor-panel-category-woocommerce-elements, #elementor-panel-category-theme-elements, #elementor-panel-get-pro-elements, .elementor-nerd-box{display: none !important;}</style>
    ";
}
add_action( 'elementor/widgets/widgets_registered', 'remove_widgets_elementor_pro' );


//Cria categoria de widgets elementor
function add_elementor_widget_categories( $elements_manager ) {
    $categories = [];
    $categories['weboost'] =
        [
            'title' => 'Weboost',
            'icon'  => 'fas fa-star'
        ];
    $old_categories = $elements_manager->get_categories();
    $categories = array_merge($categories, $old_categories);

    $set_categories = function ( $categories ) {
        $this->categories = $categories;
    };
    $set_categories->call( $elements_manager, $categories );
}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories') ;