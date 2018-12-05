<?php
if(class_exists('WP_Widget_Tag_Cloud')){

    add_action( 'widgets_init', 'lt_tag_cloud_widget' );

    function lt_tag_cloud_widget() {
        register_widget('LT_Widget_Tag_Cloud');
    }

    class LT_Widget_Tag_Cloud extends WP_Widget{

        /**
         * Constructor
         */
        public function __construct() {
            $widget_ops = array(
                'description' => esc_html__('A cloud of your most used tags.', 'altotheme'),
                'customize_selective_refresh' => true,
            );
            parent::__construct('lt_tag_cloud', esc_html__('LT Tag Cloud', 'altotheme'), $widget_ops);
        }
	
        /**
         * @param array $args
         * @param array $instance
         */
        public function widget( $args, $instance ) {
            $class = $data_taxonomy = '';
            if(in_array($instance['taxonomy'], array('product_cat', 'product_tag'))){
                $class = ' lt-tag-cloud';
                $class .= $instance['taxonomy'] == 'product_tag' ? ' lt-tag-products-cloud' : '';
                $data_taxonomy = ' data-taxonomy="' . $instance['taxonomy'] . '"';
            }
            $current_taxonomy = $this->_get_current_taxonomy($instance);
            if ( !empty($instance['title']) ) {
                $title = $instance['title'];
            } else {
                if ( 'post_tag' == $current_taxonomy ) {
                    $title = esc_html__('Tags', 'altotheme');
                } else {
                    $tax = get_taxonomy($current_taxonomy);
                    $title = $tax->labels->name;
                }
            }

            /** This filter is documented in wp-includes/default-widgets.php */
            $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

            echo $args['before_widget'];
            if ( $title ) {
                echo $args['before_title'] . $title . $args['after_title'];
            }
            echo '<div class="tagcloud' . $class . '"' . $data_taxonomy . '>';
            
            wp_tag_cloud( apply_filters( 'widget_tag_cloud_args', array(
                'taxonomy' => $current_taxonomy
            ) ) );

            echo "</div>\n";
            echo $args['after_widget'];
        }
        
        /**
         * Handles updating settings for the current Tag Cloud widget instance.
         *
         * @since 2.8.0
         * @access public
         *
         * @param array $new_instance New settings for this instance as input by the user via
         *                            WP_Widget::form().
         * @param array $old_instance Old settings for this instance.
         * @return array Settings to save or bool false to cancel saving.
         */
        public function update($new_instance, $old_instance) {
            $instance = array();
            $instance['title'] = sanitize_text_field($new_instance['title']);
            $instance['taxonomy'] = stripslashes($new_instance['taxonomy']);
            return $instance;
        }

        /**
         * Outputs the Tag Cloud widget settings form.
         *
         * @since 2.8.0
         * @access public
         *
         * @param array $instance Current settings.
         */
        public function form($instance) {
            $current_taxonomy = $this->_get_current_taxonomy($instance);
            $title_id = $this->get_field_id('title');
            $instance['title'] = !empty($instance['title']) ? esc_attr($instance['title']) : '';

            echo '<p><label for="' . $title_id . '">' . esc_html__('Title:', 'altotheme') . '</label>
                    <input type="text" class="widefat" id="' . esc_attr($title_id) . '" name="' . esc_attr($this->get_field_name('title')) . '" value="' . $instance['title'] . '" />
            </p>';

            $taxonomies = get_taxonomies(array('show_tagcloud' => true), 'object');
            $id = esc_attr($this->get_field_id('taxonomy'));
            $name = esc_attr($this->get_field_name('taxonomy'));
            $input = '<input type="hidden" id="' . $id . '" name="' . $name . '" value="%s" />';

            switch (count($taxonomies)) {

                // No tag cloud supporting taxonomies found, display error message
                case 0:
                    echo '<p>' . esc_html__('The tag cloud will not be displayed since there are no taxonomies that support the tag cloud widget.', 'altotheme') . '</p>';
                    printf($input, '');
                    break;

                // Just a single tag cloud supporting taxonomy found, no need to display options
                case 1:
                    $keys = array_keys($taxonomies);
                    $taxonomy = reset($keys);
                    printf($input, esc_attr($taxonomy));
                    break;

                // More than one tag cloud supporting taxonomy found, display options
                default:
                    printf(
                        '<p><label for="%1$s">%2$s</label>' .
                        '<select class="widefat" id="%1$s" name="%3$s">', $id, esc_html__('Taxonomy:', 'altotheme'), $name
                    );

                    foreach ($taxonomies as $taxonomy => $tax) {
                        printf(
                            '<option value="%s"%s>%s</option>', esc_attr($taxonomy), selected($taxonomy, $current_taxonomy, false), $tax->labels->name
                        );
                    }

                    echo '</select></p>';
            }
        }

        /**
         * Retrieves the taxonomy for the current Tag cloud widget instance.
         *
         * @since 4.4.0
         * @access public
         *
         * @param array $instance Current settings.
         * @return string Name of the current taxonomy if set, otherwise 'post_tag'.
         */
        public function _get_current_taxonomy($instance) {
            if (!empty($instance['taxonomy']) && taxonomy_exists($instance['taxonomy']))
                return $instance['taxonomy'];

            return 'post_tag';
        }
    }
}