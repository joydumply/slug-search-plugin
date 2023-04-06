<?php
/*
Plugin Name: Slug Search Plugin
Description: Allows searching posts/pages/post_types by slug in /wp-admin area
Version: 1.0
Author: Nikita Babichev
*/

add_action( 'pre_get_posts', 'slug_search_filter' );
function slug_search_filter( $query ) {
    if ( ! is_admin()) {
        return;
    }
    $search = $query->get( 's' );
    if ( strpos( $search, 'slug:' ) !== false ) {
        $slug = str_replace( 'slug:', '', $search );
        $query->set( 's', '' );
        $query->set( 'name', $slug );
        $query->set( 'post_status', 'publish' );
    }
}   