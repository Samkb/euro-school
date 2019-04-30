<?php 

/**
 * Registers the event post type.
 */
function uep_custom_post_type(){
    $labels = array(
        'name'                  =>   __( 'Events', 'euro-school' ),
        'singular_name'         =>   __( 'Event', 'euro-school' ),
        'add_new_item'          =>   __( 'Add New Event', 'euro-school' ),
        'all_items'             =>   __( 'All Events', 'euro-school' ),
        'edit_item'             =>   __( 'Edit Event', 'euro-school' ),
        'new_item'              =>   __( 'New Event', 'euro-school' ),
        'view_item'             =>   __( 'View Event', 'euro-school' ),
        'not_found'             =>   __( 'No Events Found', 'euro-school' ),
        'not_found_in_trash'    =>   __( 'No Events Found in Trash', 'euro-school' )
    );
 
    $supports = array(
        'title',
        'editor'
       
    );
 
    $args = array(
        'label'         =>   __( 'Events', 'euro-school' ),
        'labels'        =>   $labels,
        'description'   =>   __( 'A list of upcoming events', 'euro-school' ),
        'public'        =>   true,
        'show_in_menu'  =>   true,
        'menu_icon'     => 'dashicons-calendar-alt',
        'has_archive'   =>   true,
        'rewrite'       =>   true,
        'supports'      =>   $supports
    );
 
    register_post_type( 'event', $args );
}
add_action( 'init', 'uep_custom_post_type' );


function uep_add_event_info_metabox() {
    add_meta_box(
        'uep-event-info-metabox',
        __( 'Event Info', 'euro-school' ),
        'uep_render_event_info_metabox',
        'event',
        'side',
        'core'
    );
}
add_action( 'add_meta_boxes', 'uep_add_event_info_metabox' );


function uep_render_event_info_metabox( $post ) {
 
    // generate a nonce field
    wp_nonce_field( basename( __FILE__ ), 'uep-event-info-nonce' );
 
    // get previously saved meta values (if any)
    $event_date = get_post_meta( $post->ID, 'event-start-date', true );
    $event_venue = get_post_meta( $post->ID, 'event-venue', true );
 
    // if there is previously saved value then retrieve it, else set it to the current time
    $event_date = ! empty( $event_date ) ? $event_date : time();

    ?>
 
<label for="uep-event-date"><?php _e( 'Event Date:', 'euro-school' ); ?></label>
        <input class="widefat uep-event-date-input" id="uep-event-date" type="date" name="uep-event-date" placeholder="Format:Monday February 18, 2014" value="<?php echo date( 'l, F j, Y', $event_date ); ?>" required />
 
<label for="uep-event-venue"><?php _e( 'Event Venue:', 'euro-school' ); ?></label>
        <input class="widefat" id="uep-event-venue" type="text" name="uep-event-venue" placeholder="eg. Times Square" value="<?php echo $event_venue; ?>" />
 
    <?php } 

    function uep_custom_columns_head( $defaults ) {
    unset( $defaults['date'] );
 
    $defaults['event_date'] = __( 'Date', 'euro-school' );
    $defaults['event_venue'] = __( 'Venue', 'euro-school' );
 
    return $defaults;
}
add_filter( 'manage_edit-event_columns', 'uep_custom_columns_head', 10 );

   function uep_save_event_info( $post_id ) {
 
  
 
    // checking for the 'save' status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST['uep-event-info-nonce'] ) && ( wp_verify_nonce( $_POST['uep-event-info-nonce'], basename( __FILE__ ) ) ) ) ? true : false;
 
    // exit depending on the save status or if the nonce is not valid
    if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
        return;
    }
 
    // checking for the values and performing necessary actions
    if ( isset( $_POST['uep-event-date'] ) ) {
        update_post_meta( $post_id, 'event-start-date', strtotime( $_POST['uep-event-date'] ) );
    }
 
 
    if ( isset( $_POST['uep-event-venue'] ) ) {
        update_post_meta( $post_id, 'event-venue', sanitize_text_field( $_POST['uep-event-venue'] ) );
    }
}
add_action( 'save_post', 'uep_save_event_info' );

function uep_custom_columns_content( $column_name, $post_id ) {
 
    if ( 'event_date' == $column_name ) {
        $start_date = get_post_meta( $post_id, 'event-start-date', true );
        echo date( 'l, F j, Y', $start_date );
    }
  
    if ( 'event_venue' == $column_name ) {
        $venue = get_post_meta( $post_id, 'event-venue', true );
        echo $venue;
    }
}
add_action( 'manage_event_posts_custom_column', 'uep_custom_columns_content', 10, 2 );

