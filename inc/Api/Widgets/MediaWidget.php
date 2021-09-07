<?php
/*
 * @package BenzeePlugin
 */

namespace Inc\Api\Widgets;

use WP_Widget;
class MediaWidget extends WP_Widget {

    public $widget_ID;
    public $widget_name;
    public $widget_options = [];
    public $control_options= [];

    public function __construct()
    {

        $this->widget_ID = 'benzee_media_widget';
        $this->widget_name  = 'Benzee Media Widget';
        $this->widget_options = [
            'classname' => $this->widget_ID,
            'description' => 'This is the media Handler',
            'customize_selective_refresh' => true,
        ];
        $this->control_options = [
            'width' => 400,
            'height' => 350
        ];
    }
    public function register(){
        parent::__construct($this->widget_ID, $this->widget_name, $this->widget_options, $this->control_options);
        add_action('widgets_init', array($this, 'widgetInit'));
    }

    public function widgetInit(){
        register_widget($this);
//        var_dump("DONE");
//        die;
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        echo $args['after_widget'];
    }
    public function form($instance){

        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Custom Text','Benzee_Plugin');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title</label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php esc_attr($this->get_field_name('title'))?>" value="<?php esc_attr($title)?>">
        </p>
        <?php

    }
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );

        return $instance;
    }
}