<?php
function themeslug_enqueue_style() {
    wp_enqueue_style( 'login-styles', get_template_directory_uri() . '/css/login-style.css', false );
}

// function themeslug_enqueue_script() {
// 	wp_enqueue_script( 'my-js', 'filename.js', false );
// }

add_action( 'login_enqueue_scripts', 'themeslug_enqueue_style', 10 );
// add_action( 'login_enqueue_scripts', 'themeslug_enqueue_script', 1 );

// function wpstxmas_login_form_top ($param) {
//     $param = '<h1 class="site-title"><a href="'.site_url().'" rel="home">'.get_bloginfo('name').'</a></h1>';
//     return $param;
// }
// add_filter('login_message', 'wpstxmas_login_form_top');


function wpstxmas_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'wpstxmas_login_logo_url' );

function wpstxmas_login_logo_url_title() {
    return get_bloginfo('name');
}
add_filter( 'login_headertext', 'wpstxmas_login_logo_url_title' );




add_action( 'register_form', 'wpstxmas_add_registration_fields' );

function wpstxmas_add_registration_fields() {

    //Get and set any values already sent
    // $agree_terms = ( isset( $_POST['agree_terms'] ) ) ? $_POST['agree_terms'] : '';
    ?>

    <p class="select_role">

        <label for="select_role">Registration Preference</label>
        <select name="select_role" id="select_role">
                <option value="">Select</option>
                <option value="subscriber">Subscriber - Notify me of snippets</option>
                <option value="contributor">Contributor - Contribute a snippet</option>
        </select>

    </p>

    <p class="agree_terms">

        <label for="agree_terms">
            <input name="agree_terms" type="checkbox" id="agree_terms" class="checkbox" value="1"> I understand & agree to the <a href="/privacy-policy/" target="_blank">Pricacy Policy</a>
        </label>
        
    </p>

    <?php
}



//2. Add validation. In this case, we make sure first_name is required.
add_filter( 'registration_errors', 'wpstxmas_registration_errors', 10, 3 );
function wpstxmas_registration_errors( $errors, $sanitized_user_login, $user_email ) {
    
    if ( empty( $_POST['agree_terms'] ) || ! empty( $_POST['agree_terms'] ) && trim( $_POST['agree_terms'] ) == '' ) {
        $errors->add( 'agree_terms_error', sprintf('<strong>%s</strong>: %s',__( 'ERROR', 'mydomain' ),__( 'You must include agree to terms.', 'adventninteen' ) ) );
    }
    if ( empty( $_POST['select_role'] ) || ! empty( $_POST['select_role'] ) && trim( $_POST['select_role'] ) == '' ) {
        $errors->add( 'select_role_error', sprintf('<strong>%s</strong>: %s',__( 'ERROR', 'mydomain' ),__( 'Please select your registration role.', 'adventninteen' ) ) );
    }

    return $errors;
}

// Fill the meta 'foo_privacy_policy' with the value of the checkbox
add_action( 'personal_options_update', 'wpstxmas_user_register' );
add_action( 'edit_user_profile_update', 'wpstxmas_user_register' );
add_action( 'user_register', 'wpstxmas_user_register' );
function wpstxmas_user_register( $user_id ) {
    if ( ! empty( $_POST['agree_terms'] ) ) {
        update_user_meta( $user_id, 'agree_terms', sanitize_text_field( $_POST['agree_terms'] ) );
    }
    if ( ! empty( $_POST['select_role'] ) ) {
        update_user_meta( $user_id, 'select_role', sanitize_text_field( $_POST['select_role'] ) );
    }
}


add_filter( 'wp_mail_from_name', 'wpstxmas_wp_mail_from_name' );
function wpstxmas_wp_mail_from_name( $original_email_from ) {
    return get_bloginfo('name');
}

add_filter( 'wp_mail_from', 'wpstxmas_wp_mail_from' );
function wpstxmas_wp_mail_from( $original_email_address ) {
	//Make sure the email is from the same domain 
	//as your website to avoid being marked as spam.
	return get_option('admin_email');
}

?>