<?php
/**
 * @package AdminMailer
 */
/*
Plugin Name: Admin Mailer
Plugin URI: http://sharifio.com/wordpress-plugins/
Description: Send emails to target Users or Role.
Version: 1.0.0
Author: Sharif Ahmed
Author URI: http://sharifio.com/
License: GPLv2 or later
Text Domain: admin-mailer
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
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

        /**
         * Register hooks and actions
         */
        public function register()
        {
            add_action('admin_menu', [$this, 'add_admin_pages']);
            add_action('admin_enqueue_scripts', [$this, 'enqueue']);
        }

        /**
         * Add menu and pages in admin panel
         */
        public function add_admin_pages()
        {
            add_menu_page('Admin Mailer', 'Admin Mailer', 'list_users', 'admin_mailer', array(
                $this, 'admin_index'
            ), 'dashicons-email-alt', 20);
        }

        /**
         * index page for the plugin
         */
        public function admin_index()
        {
            require_once plugin_dir_path(__FILE__). 'mailer_form.php';
        }

        /**
         * Enqueue css and js
         */
        function enqueue()
        {
            wp_enqueue_style('admin-mailer-style', plugins_url('/assets/css/style.css', __FILE__));
            wp_enqueue_script('admin-mailer-script', plugins_url('/assets/js/script.js', __FILE__));
        }

    }

    // init
    $adminMailer = new AdminMailer();
    $adminMailer->register();
}