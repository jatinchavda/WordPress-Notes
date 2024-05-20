<?php
// All Types of Rules define
// https://pastebin.com/jbaDANYr

// Generic : www.example.com/child/parent_post/child_post
// https://stackoverflow.com/questions/52144868/how-to-set-permalink-to-fetch-all-children-custom-posts-with-parent-post-in-word

// Add Custom Fields to a Taxonomy
// https://rudrastyh.com/wordpress/add-custom-fields-to-taxonomy-terms.html

// Taxonomy Pagination generate rules
function generate_taxonomy_rewrite_rules( $wp_rewrite ) {
    $rules = array();
    $post_types = get_post_types( array( 'public' => true, '_builtin' => false ), 'objects' );
    $taxonomies = get_taxonomies( array( 'public' => true, '_builtin' => false ), 'objects' );

    foreach ( $post_types as $post_type ) {
        $post_type_name = $post_type->name;
        $post_type_slug = $post_type->rewrite['slug'];

        foreach ( $taxonomies as $taxonomy ) {
            if ( $taxonomy->object_type[0] == $post_type_name ) {
                $terms = get_categories( array( 'type' => $post_type_name, 'taxonomy' => $taxonomy->name, 'hide_empty' => 0 ) );
                foreach ( $terms as $term ) {
                    $rules[$post_type_slug . '/' . $term->slug . '/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug;
                    $rules[$post_type_slug . '/' . $term->slug . '/page/?([0-9]{1,})/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug . '&paged=' . $wp_rewrite->preg_index( 1 );
                }
            }
        }
    }
    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
add_action('generate_rewrite_rules', 'generate_taxonomy_rewrite_rules');

// https://wordpress.org/plugins/custom-fonts/
// Custom Fonts Supported in Redux Frameworks
if ( !function_exists("tmpcoder_theme_custom_fonts") ){
  function tmpcoder_theme_custom_fonts( $custom_fonts ) {
    if ( class_exists('Bsf_Custom_Fonts_Render') ){
      if ( method_exists('Bsf_Custom_Fonts_Render', 'get_existing_font_posts') ){
        $custom_fonts = new Bsf_Custom_Fonts_Render();
        $all_fonts = $custom_fonts->get_existing_font_posts();

        if ( ! empty( $all_fonts ) ) {
          foreach ( $all_fonts as $key => $post_id ) {
            $font_data = get_post_meta( $post_id, 'fonts-data', true );
            $font_type = get_post_meta( $post_id, 'font-type', true );
            if ( 'google' !== $font_type ) {
              $fonts[ $font_data['font_name'] ] = $font_data['font_name'];
            }
          }
          return array(
            'Custom Fonts' => $fonts
          );
        }
      }
    }
  }
  add_filter( 'redux/tmpcoder_pizzon/field/typography/custom_fonts', 'tmpcoder_theme_custom_fonts' );
}
