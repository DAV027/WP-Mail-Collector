<?php
/*
Plugin Name: Mail Collector
Description: A simple plugin to collect email addresses.
Author: Akhil
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Register activation hook to create a table to store emails
register_activation_hook(__FILE__, 'mail_collector_create_table');

function mail_collector_create_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'mail_collector';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        email varchar(255) NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// Shortcode to display the form
add_shortcode('mail_collector_form', 'mail_collector_form_shortcode');

function mail_collector_form_shortcode() {
    ob_start();
    ?>
    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
        <input type="email" name="email" required placeholder="Enter your email">
        <input type="hidden" name="action" value="mail_collector_form">
        <button type="submit">Submit</button>
    </form>
    <?php
    return ob_get_clean();
}

// Handle form submission
add_action('admin_post_nopriv_mail_collector_form', 'mail_collector_form_handler');
add_action('admin_post_mail_collector_form', 'mail_collector_form_handler');

function mail_collector_form_handler() {
    if (!isset($_POST['email']) || !is_email($_POST['email'])) {
        wp_redirect(home_url('/?invalid_email'));
        exit;
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'mail_collector';
    $email = sanitize_email($_POST['email']);

    $wpdb->insert($table_name, array('email' => $email));

    wp_redirect(home_url('/?success'));
    exit;
}
?>
