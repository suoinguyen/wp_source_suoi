<?php
if (!function_exists('template_scripts')) {
    /**
     * Enqueue scripts and styles.
     */
    function template_scripts()
    {
        #CSS
        wp_enqueue_style('bootstrap', _SU_THEME_HOST_PATCH . '/assets/lib/bootstrap/css/bootstrap.min.css', array(), _SU_THEME_VERSION);
        wp_enqueue_style('font-awesome', _SU_THEME_HOST_PATCH . '/assets/lib/font-awesome/css/font-awesome.min.css', array(), _SU_THEME_VERSION);
        wp_enqueue_style('select2', _SU_THEME_HOST_PATCH . '/assets/lib/select2/css/select2.min.css', array(), _SU_THEME_VERSION);
        wp_enqueue_style('bx-slider', _SU_THEME_HOST_PATCH . '/assets/lib/jquery.bxslider/jquery.bxslider.css', array(), _SU_THEME_VERSION);
        wp_enqueue_style('carousel', _SU_THEME_HOST_PATCH . '/assets/lib/owl.carousel/owl.carousel.css', array(), _SU_THEME_VERSION);
        wp_enqueue_style('jquery-ui-css', _SU_THEME_HOST_PATCH . '/assets/lib/jquery-ui/jquery-ui.css', array(), _SU_THEME_VERSION);
//        wp_enqueue_style('animate-css', _SU_THEME_HOST_PATCH . '/assets/css/animate.css', array(), _SU_THEME_VERSION);
        wp_enqueue_style('reset-css', _SU_THEME_HOST_PATCH . '/assets/css/reset.css', array(), _SU_THEME_VERSION);
//        wp_enqueue_style('style-css', _SU_THEME_HOST_PATCH . '/assets/css/style.css', array(), _SU_THEME_VERSION);
        wp_enqueue_style('style.min-css', _SU_THEME_HOST_PATCH . '/assets/css/style.min.css', array(), _SU_THEME_VERSION);
//        wp_enqueue_style('responsive', _SU_THEME_HOST_PATCH . '/assets/css/responsive.css', array(), _SU_THEME_VERSION);
        wp_enqueue_style('responsive.min', _SU_THEME_HOST_PATCH . '/assets/css/responsive.min.css', array(), _SU_THEME_VERSION);
//        wp_enqueue_style('option-5', _SU_THEME_HOST_PATCH . '/assets/css/option5.css', array(), _SU_THEME_VERSION);
        wp_enqueue_style('option-5.min', _SU_THEME_HOST_PATCH . '/assets/css/option5.min.css', array(), _SU_THEME_VERSION);
//        wp_enqueue_style('hover-css', _SU_THEME_HOST_PATCH . '/assets/lib/hover-css/hover-css.css', array(), _SU_THEME_VERSION);
        wp_enqueue_style('hover-css.min', _SU_THEME_HOST_PATCH . '/assets/lib/hover-css/hover-css.min.css', array(), _SU_THEME_VERSION);
//        wp_enqueue_style('main-css', _SU_THEME_HOST_PATCH . '/assets/css/main.css', array(), _SU_THEME_VERSION);
        wp_enqueue_style('main.min-css', _SU_THEME_HOST_PATCH . '/assets/css/main.min.css', array(), _SU_THEME_VERSION);

        #JS
//        wp_enqueue_script('js-1.1.2',  _SU_THEME_HOST_PATCH . '/assets/lib/jquery/jquery-1.11.2.min.js', array(), _SU_THEME_VERSION, false);
        wp_enqueue_script('bootstrap-js',  _SU_THEME_HOST_PATCH . '/assets/lib/bootstrap/js/bootstrap.min.js', array(), _SU_THEME_VERSION, true);
        wp_enqueue_script('select-2-js',  _SU_THEME_HOST_PATCH . '/assets/lib/select2/js/select2.min.js', array(), _SU_THEME_VERSION, true);
        wp_enqueue_script('bx-slider-js',  _SU_THEME_HOST_PATCH . '/assets/lib/jquery.bxslider/jquery.bxslider.min.js', array(), _SU_THEME_VERSION, true);
        wp_enqueue_script('carousel-js',  _SU_THEME_HOST_PATCH . '/assets/lib/owl.carousel/owl.carousel.min.js', array(), _SU_THEME_VERSION, true);
        wp_enqueue_script('jquery-actual-js',  _SU_THEME_HOST_PATCH . '/assets/js/jquery.actual.min.js', array(), _SU_THEME_VERSION, true);
//        wp_enqueue_script('theme-script',  _SU_THEME_HOST_PATCH . '/assets/js/theme-script.js', array(), _SU_THEME_VERSION, true);
        wp_enqueue_script('theme-script.min',  _SU_THEME_HOST_PATCH . '/assets/js/theme-script.min.js', array(), _SU_THEME_VERSION, true);
        wp_enqueue_script('jquery-ui-js',  _SU_THEME_HOST_PATCH . '/assets/lib/jquery-ui/jquery-ui.min.js', array(), _SU_THEME_VERSION, true);

        if(is_single()){
            wp_enqueue_style('royal-slider-css', _SU_THEME_HOST_PATCH . '/assets/lib/royalslider/royalslider.css', array(), _SU_THEME_VERSION);
            wp_enqueue_style('rs-royal-slider-css', _SU_THEME_HOST_PATCH . '/assets/lib/royalslider/skins/default/rs-default.css', array(), _SU_THEME_VERSION);
            wp_enqueue_script('royal-slider-js',  _SU_THEME_HOST_PATCH . '/assets/lib/royalslider/jquery.royalslider.min.js', array(), _SU_THEME_VERSION, true);
        }

        //Always after all
//        wp_enqueue_script('main-script',  _SU_THEME_HOST_PATCH . '/assets/js/main.js', array(), _SU_THEME_VERSION, true);
        wp_enqueue_script('main-script.min',  _SU_THEME_HOST_PATCH . '/assets/js/main.min.js', array(), _SU_THEME_VERSION, true);

        # js for threaded comments
        if ( is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
}
add_action('wp_enqueue_scripts', 'template_scripts');