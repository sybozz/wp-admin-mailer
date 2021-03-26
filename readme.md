# Admin Mailer

A WordPress plugin for sending emails to the chosen target Users or Role.

This repository contains the source code of the plugin.

## Table of Contents

- [Background](#background)
- [Install](#install)
- [Setup](#Setup)
- [Usage](#usage)
- [Maintainers](#maintainers)
- [License](#license)

## Background

This plugin is developed for an assignment of a job interview selection.

## Install

To install this plugin just download the repo as zip and upload it into your WordPress project. This guide could help to [install a plugin manually](https://www.dummies.com/web-design-development/wordpress/templates-themes-plugins/how-to-install-wordpress-plugins-manually/).

## Setup

This plugin needs `SMTP` configuration either from the `wp-config.php` or via other third party plugin like [WP Mail SMTP by WPForms](https://wordpress.org/plugins/wp-mail-smtp/).

- If you choose to set up SMTP in `wp-config.php`, Set the following constants in `wp-config.php`. These should be added somewhere BEFORE the constant `ABSPATH` is defined.

```
/*
* WordPress SMTP Config
*/

define( 'SMTP_USER',   'user@example.com' );    // Username to use for SMTP authentication
define( 'SMTP_PASS',   'smtp password' );       // Password to use for SMTP authentication
define( 'SMTP_HOST',   'smtp.example.com' );    // The hostname of the mail server
define( 'SMTP_FROM',   'website@example.com' ); // SMTP From email address
define( 'SMTP_NAME',   'e.g Website Name' );    // SMTP From name
define( 'SMTP_PORT',   '25' );                  // SMTP port number - likely to be 25, 465 or 587
define( 'SMTP_SECURE', 'tls' );                 // Encryption system to use - ssl or tls
define( 'SMTP_AUTH',    true );                 // Use SMTP authentication (true|false)
define( 'SMTP_DEBUG',   0 );                    // for debugging purposes only set to 1 or 2
```

### OR

- If you choose third party plugins please follow the instruction there to set up your SMTP.

_These settings are mandatory for sending emails from this plugin._

## Usage

Go to the `Admin Mailer` menu in the dashboard. Then select the `Recipeint Group` from the `Select User` or `Select Role` list. All emails and roles are listed from your current WordPress admin panel.

- `Select User` list will allow you to choose multiple users' email. All the selected emails will automatically fill up in the `To` filed as the email receiver group.

- `Select Role` list will let you choose the group of users and their emails underneath.

- Write down the email subject in `Subject` field.

- Put the email message in `Message` area.

- Hit the `Send` button to send the email to the target Users or Role.

This email sending action trigger the `wp_mail` function to send all the emails.

## Maintainers

[@sybozz](https://github.com/sybozz)

## License

[GPLv2 or later](https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html)