<?php
/*
Plugin Name: Baca Juga
Description: Menampilkan rekomendasi "Baca Juga" setiap 2 paragraf dengan font mengikuti tema dan kategory.
Version: 1.3
Author: NusaCloudHost.Com
*/

if (!defined('ABSPATH')) exit;

function tampilkan_baca_juga_berulang($content) {
    if (!is_single() || is_admin()) {
        return $content;
    }

    global $post;
    $categories = get_the_category($post->ID);
    
    if (!$categories) return $content;

    $category_ids = wp_list_pluck($categories, 'term_id');

    $related_posts = get_posts(array(
        'category__in'   => $category_ids,
        'post__not_in'   => array($post->ID),
        'posts_per_page' => 10, 
        'orderby'        => 'rand'
    ));

    if (empty($related_posts)) return $content;

    $closing_p = '</p>';
    $paragraphs = explode($closing_p, $content);
    $new_content = '';
    $post_index = 0;

    foreach ($paragraphs as $index => $paragraph) {
        if (trim($paragraph)) {
            $new_content .= $paragraph . $closing_p;
        }

        $current_p_number = $index + 1;
        
        if ($current_p_number % 2 == 0 && isset($related_posts[$post_index])) {
            
            $link = get_permalink($related_posts[$post_index]->ID);
            $title = get_the_title($related_posts[$post_index]->ID);

            // HTML dengan CSS minimal agar mengikuti style tema
            $insert_html = '
            <div class="baca-juga-wrapper" style="margin: 10px 0; padding: 5px 10px; border-left: 4px solid #d32f2f; background: rgba(0,0,0,0.03); clear: both;">
                <div style="color: #d32f2f; opacity: 0.8;">
                    Baca Juga:
                </div>
                <a href="' . $link . '" style="text-decoration: none; color: inherit; display: block; line-height: 1.4;">
                    ' . $title . '
                </a>
            </div>';

            $new_content .= $insert_html;
            $post_index++; 
        }
    }

    return $new_content;
}

add_filter('the_content', 'tampilkan_baca_juga_berulang');
