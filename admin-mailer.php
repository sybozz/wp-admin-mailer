<?php
/**
 * @package AdminMailer
 */
/*
Plugin Name: Admin Mailer
Plugin URI: http://sharifio.com/wordpress-plugins/
Description: A simple plugin for sending email to User or users under a specific Role.
Version: 1.0.0
Author: Sharif Ahmed
Author URI: http://sharifio.com/
License: GPLv2 or later
Text Domain: admin-mailer
*/

defined('ABSPATH') or die('Hey! Nothing here.');

if (!class_exists('AdminMailer')) {
    class AdminMailer
    {
        protected $plugin;

        public function __construct()
        {
            $this->plugin = plugin_basename(__FILE__);
        }

        public function register()
        {
            add_action('admin_menu', [$this, 'add_admin_pages']);
            add_action('admin_enqueue_scripts', [$this, 'enqueue']);
        }

        public function add_admin_pages()
        {
            add_menu_page('Admin Mailer', 'Admin Mailer', 'list_users', 'admin_mailer', array(
                $this, 'admin_index'
            ), 'dashicons-email-alt', 20);
        }

        public function admin_index()
        {
            require_once plugin_dir_path(__FILE__). 'mailer_form.php';
        }

        function enqueue()
        {
            wp_enqueue_style('admin-mailer-style', plugins_url('/assets/css/style.css', __FILE__));
            wp_enqueue_script('admin-mailer-script', plugins_url('/assets/js/script.js', __FILE__));
        }

    }

    $adminMailer = new AdminMailer();
    $adminMailer->register();
}