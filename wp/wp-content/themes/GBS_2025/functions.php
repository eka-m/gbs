<?php
    add_theme_support( 'title-tag' );
    // add_theme_support( 'post-thumbnails' );



    function theme_enqueue_assets() {
        // Load CSS (in <head>)
        wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.css', array(), filemtime(get_template_directory() . '/css/style.css'));
        wp_enqueue_style('media-style', get_template_directory_uri() . '/css/media.css', array('main-style'), filemtime(get_template_directory() . '/css/media.css'));

        // Load JS (after DOM, in footer)
        // wp_enqueue_script('jquery-cdn', 'https://code.jquery.com/jquery-3.7.1.min.js', array(), null, true);
        // wp_enqueue_script('page-specific', get_template_directory_uri() . '/js/homepage.js', array('jquery-cdn', 'swiper'), filemtime(get_template_directory() . '/js/homepage.js'), true);

        if ( is_page_template( 'templates/home.php' ) ) {

        }

        if ( is_post_type_archive( 'vacancy' ) || is_post_type_archive( 'vacancy-ru' ) || is_singular( array( 'vacancy', 'vacancy-ru' ) ) ) {
            wp_enqueue_script('vacancy-form', get_template_directory_uri() . '/js/vacancy-form.js', array('global'), filemtime(get_template_directory() . '/js/vacancy-form.js'), true);
            wp_localize_script('vacancy-form', 'vacancy_form_ajax_object', [
                'ajax_url' => admin_url('admin-ajax.php')
            ]);
        }

    }
    add_action('wp_enqueue_scripts', 'theme_enqueue_assets');



    function gtf_group_register_menus() {
        register_nav_menus(
            array(
                'menu-en' => __( 'Menu EN', 'GBS_2025' ),
                'menu-ru' => __( 'Меню RU', 'GBS_2025' ),
            )
        );
    }
    add_action( 'after_setup_theme', 'gtf_group_register_menus' );



    function get_current_path() {
        $request = trim( wp_parse_url( add_query_arg( [] ), PHP_URL_PATH ), '/' );
        return $request;
    }



    # Set the language based on the current url path
    function multiple_langs( ...$args ) {
        $currentPath = get_current_path();
        if ( strpos( $currentPath, 'ru/' ) === 0 || $currentPath === 'ru' ) {
            return $args[1]; // Arg 1 is in Russian
        } else {
            return $args[0]; // Arg 0 is in English
        }
    }



    # Switch to the same url, but in a different language
    function switch_lang( $lang ) {
        $currentPath = get_current_path();
        if ( strpos( $currentPath, 'ru/' ) === 0 || $currentPath === 'ru' ) {
            $modifiedPath = preg_replace('/^ru(\/?)/', $lang, $currentPath);
        } else {
            $modifiedPath = '/' . $lang . $currentPath;
        }
        return $modifiedPath;
    }



    # Get the page name from its URL
    function get_page_name_from_url( $url ) {
        return esc_html( get_the_title( url_to_postid( $url ) ) );
    }



    function handle_contacts_form_submit() {
        $company = sanitize_text_field($_POST['company']);
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_text_field($_POST['email']);
        $message = sanitize_text_field($_POST['message']);
        $email_office = sanitize_text_field($_POST['email_office']);

        // Email setup
        $to = $email_office;
        $subject = 'New Request';

        $body = "Company: $company\n";
        $body .= "Name: $name\n";
        $body .= "Email: $email\n";
        $body .= "Message: $message\n";

        $headers = ['From: GTF Group Contacts Form'];

        if (wp_mail($to, $subject, $body, $headers)) {
            wp_send_json_success('Message sent!');
        } else {
            wp_send_json_error('Email failed to send.');
        }
    }
    add_action('wp_ajax_contacts_form_submit', 'handle_contacts_form_submit');
    add_action('wp_ajax_nopriv_contacts_form_submit', 'handle_contacts_form_submit');



    // function addUniqueStringToArray( $array, $string ) {
    //     if ( !in_array( $string, $array ) ) {
    //         $array[] = $string;
    //     }
    //     return $array;
    // }

?>