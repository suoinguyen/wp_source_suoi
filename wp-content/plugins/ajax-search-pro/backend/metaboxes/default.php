<?php
/* Prevent direct access */
defined('ABSPATH') or die("You can't access this file directly.");

/**
 * Calls the class on the post edit screen.
 */
function call_WD_ASP_DefaultMetaBox() {
    new WD_ASP_DefaultMetaBox();
}

add_action('admin_print_styles', 'asp_meta_print_type_styles');
function asp_meta_print_type_styles() {
    wp_register_style('wpdreams-style', ASP_URL . 'backend/settings/assets/style.css', array(), ASP_CURR_VER_STRING);
    wp_enqueue_style('wpdreams-style');
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'call_WD_ASP_DefaultMetaBox' );
    add_action( 'load-post-new.php', 'call_WD_ASP_DefaultMetaBox' );
}

/**
 * The Class.
 */
class WD_ASP_DefaultMetaBox {

    private $asp_default_metadata = array(
        "asp_suggested_phrases" =>"",
        "asp_suggested_instances" => 0
    );

    /**
     * Hook into the appropriate actions when the class is constructed.
     */
    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
        add_action( 'save_post', array( $this, 'save' ) );
    }

    /**
     * Adds the meta box container.
     */
    public function add_meta_box( $post_type ) {
        $post_types = array('post', 'page', 'product');     //Allow only for certain post types
        if ( in_array( $post_type, $post_types )) {
            add_meta_box(
                'asp_metadata'
                ,__( 'Ajax Search Pro settings', 'ajax-search-pro' )
                ,array( $this, 'render_meta_box_content' )
                ,$post_type
                ,'advanced'
                ,'high'
            );
        }
    }

    /**
     * Save the meta when the post is saved.
     *
     * @param int $post_id The ID of the post being saved.
     */
    public function save( $post_id ) {

        /*
         * We need to verify this came from the our screen and with proper authorization,
         * because save_post can be triggered at other times.
         */
        // Check if our nonce is set.
        if ( ! isset( $_POST['asp_meta_custom_box_nonce'] ) )
            return $post_id;

        $nonce = $_POST['asp_meta_custom_box_nonce'];

        // Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $nonce, 'asp_meta_custom_box' ) )
            return $post_id;

        // If this is an autosave, our form has not been submitted,
        //     so we don't want to do anything.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
            return $post_id;

        // Check the user's permissions.
        if ( 'page' == $_POST['post_type'] ) {

            if ( ! current_user_can( 'edit_page', $post_id ) )
                return $post_id;

        } else {

            if ( ! current_user_can( 'edit_post', $post_id ) )
                return $post_id;
        }

        $posted = array();
        // Gather the posted data, but only the ones related to ASP
        foreach ( $this->asp_default_metadata as $k => $v) {
            if ( isset($_POST[$k]) )
                $posted[$k] = $_POST[$k];
        }

        update_post_meta( $post_id, '_asp_metadata', $posted );

        return $post_id;
    }


    /**
     * Render Meta Box content.
     *
     * @param WP_Post $post The post object.
     */
    public function render_meta_box_content( $post ) {

        // Add an nonce field so we can check for it later.
        wp_nonce_field( 'asp_meta_custom_box', 'asp_meta_custom_box_nonce' );

        // Use get_post_meta to retrieve an existing value from the database.
        $asp_metadata = get_post_meta( $post->ID, '_asp_metadata', true );

        if ( !is_array($asp_metadata) )
            $asp_metadata = array();

        $asp_metadata = array_merge($this->asp_default_metadata, $asp_metadata);

        ?>
        <style>
        #wpdreams .asp_sugg_meta {
            display: flex;
            justify-content: flex-end;
            align-items: baseline;
        }
        #wpdreams .asp_sugg_meta>textarea {
            height: 50px;
        }
        </style>
        <div id='wpdreams' class='wpdreams wrap'>
            <div class='wpdreams-box'>
                <div class="item asp_sugg_meta" style="vertical-align: top;">
                    <label style="vertical-align: top;">Custom suggested phrases for this post (comma separated)</label>
                    <textarea style="    background-image: none;background-position: 0% 0%;background-repeat: repeat;" name="asp_suggested_phrases"><?php echo $asp_metadata['asp_suggested_phrases']; ?></textarea>
                    <label style="vertical-align: top;">for</label>
                    <select name="asp_suggested_instances" style="vertical-align: top;">
                        <option value="0"<?php echo $asp_metadata['asp_suggested_instances'] == 0 ? " selected" : ""; ?>>All search instances</option>
                        <?php foreach( wd_asp()->instances->getWithoutData() as $id=>$data ): ?>
                            <option value="<?php echo $id; ?>"<?php echo $asp_metadata['asp_suggested_instances'] == $id ? " selected" : ""; ?>><?php echo $data['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <?php
    }
}