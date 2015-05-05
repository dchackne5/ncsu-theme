<?php

/* Add Image Size */

add_image_size( 'fullwidth-featured', 1170, 410, true );


/* Add Widget Areas */

function extend_ncsu_widgets_init() {

	register_sidebar( array(
    	   'name' => 'Footer Left',
           'id' => 'footer_left',
           'before_widget' => '<div class="sb-section %2$s">',
	   'after_widget' => '</div>',
    	   'before_title' => '<p class="footer-widget-title">',
           'after_title' => '</p>',
        ) );

	register_sidebar( array(
    	   'name' => 'Footer Center-Left',
           'id' => 'footer_center-left',
           'before_widget' => '<div class="sb-section %2$s">',
	   'after_widget' => '</div>',
    	   'before_title' => '<p class="footer-widget-title">',
           'after_title' => '</p>',
        ) );
        
        register_sidebar( array(
            'name' => 'Footer Center-Right',
            'id' => 'footer_center-right',
            'before_widget' => '<div class="sb-section %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<p class="footer-widget-title">',
            'after_title' => '</p>',
        ) );
        
        register_sidebar( array(
            'name' => 'Footer Right',
            'id' => 'footer_right',
            'before_widget' => '<div class="sb-section %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<p class="footer-widget-title">',
            'after_title' => '</p>',
        ) );
    }

add_action( 'widgets_init', 'extend_ncsu_widgets_init' );


/* Add Child Page Menu Widget */

// register Child_Menu widget
function register_child_menu_widget() {
    register_widget( 'Child_Menu' );
}
add_action( 'widgets_init', 'register_child_menu_widget' );

/**
 * Adds Child_Menu widget.
 */
class Child_Menu extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'child_menu', // Base ID
			__( 'Widget Title', 'text_domain' ), // Name
			array( 'description' => __( 'Displays menu for the child pages of the current page.', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
	
     	        echo $args['before_widget'];
		/*if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}*/

		echo '<div class="oit-child-menu-widget">';

		global $wp_query;
		$page_id = $wp_query->post->ID;
		$parent_id = $wp_query->post->post_parent;
		$page_name = get_the_title($page_id);
		$parent_name = get_the_title($parent_id);
		$parent_url = get_the_permalink($parent_id);

		$children = get_pages('child_of='.$page_id); 

		$menu_args = array(
			'authors'      => '',
			'child_of'     => $page_id,
			'date_format'  => get_option('date_format'),
			'depth'        => 1,
			'echo'         => 1,
			'exclude'      => '',
			'include'      => '',
			'link_after'   => '',
			'link_before'  => '',
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'show_date'    => '',
			'sort_column'  => 'menu_order, post_title',
		        'sort_order'   => '',
			'title_li'     => '', 
			'walker'       => ''
			);

		if ($parent_id != 0) {
			echo '<div class="oit-child-menu-parent-name"><a href="'.$parent_url.'" class="oit-child-menu-parent-link">'.$parent_name.'</a></div>';
		} /*else {
			echo '<div class="oit-child-menu-parent-name"><span class="oit-child-menu-parent-link">'.$page_name.'</span></div>';
		} */

		echo wp_list_pages($menu_args);

		echo '</div> <!-- .oit-child-menu-widget -->';

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
     	        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Child Pages', 'text_domain' );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class Child_Menu

?>