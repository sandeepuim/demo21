<?php
/**
 * Plugin Name: IHTC Custom Content
 * Description: Registers Custom Post Types and Taxonomies for the IHTC web app.
 * Version: 1.1
 * Author: Your Name
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Register Custom Post Types and Taxonomies.
 */
function ihtc_register_content_types() {

    /**
     * Post Type: Guideline (for hierarchical content)
     */
    $labels_guideline = [
        "name" => "Guidelines",
        "singular_name" => "Guideline",
    ];

    $args_guideline = [
        "label" => "Guidelines",
        "labels" => $labels_guideline,
        "description" => "For hierarchical content like Introduction, Pharmacology, etc.",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "guidelines",
        "has_archive" => true,
        "show_in_menu" => true,
        "capability_type" => "page", // Allows for parent/child relationships
        "hierarchical" => true,
        "rewrite" => [ "slug" => "guidelines", "with_front" => true ],
        "query_var" => true,
        "menu_icon" => "dashicons-book-alt",
        "supports" => [ "title", "editor", "page-attributes" ], // page-attributes enables parent selection
    ];

    register_post_type( "guideline", $args_guideline );

    /**
     * Post Type: Product (for Factor Cards, Drugs, etc.)
     */
    $labels_product = [
        "name" => "Products",
        "singular_name" => "Product",
    ];

    $args_product = [
        "label" => "Products",
        "labels" => $labels_product,
        "description" => "For all drugs and factor cards.",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "products",
        "has_archive" => true,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "hierarchical" => false,
        "rewrite" => [ "slug" => "products", "with_front" => true ],
        "query_var" => true,
        "menu_icon" => "dashicons-info-outline",
        "supports" => [ "title", "editor", "thumbnail" ],
    ];

    register_post_type( "product", $args_product );

    /**
     * Taxonomy: Product Categories
     */
    $labels_product_cat = [
        "name" => "Product Categories",
        "singular_name" => "Product Category",
    ];

    $args_product_cat = [
        "label" => "Product Categories",
        "labels" => $labels_product_cat,
        "public" => true,
        "show_in_rest" => true,
        "hierarchical" => true,
        "rewrite" => [ 'slug' => 'product-category', 'with_front' => true ],
    ];

    register_taxonomy( "product_category", [ "product" ], $args_product_cat );

}

add_action( 'init', 'ihtc_register_content_types' );

?>
