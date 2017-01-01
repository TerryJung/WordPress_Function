<?php
        //use example : [recent-posts-by-category category="slug-name"]
        function recent_posts_by_category($category_slug) {
                extract(shortcode_atts(array(
                                'category' => 't'
                        ),$category_slug));

                $before = '<div class="posts-loop">';
                $post_template = xmag_archive_post_template();

                query_posts(array('category_name' => $category));
                if (have_posts()):

                        while (have_posts()) : the_post();
                                $return_string .= get_template_part('template-parts/' . $post_template);
                        endwhile;

                endif;
                $after = '</div>';
                wp_reset_query();

                return $before.$return_string.$after;
        }

        function register_shortcodes() {
                add_shortcode('recent-posts-by-category', 'recent_posts_by_category');
        }

        add_action('init', 'register_shortcodes');
?>





