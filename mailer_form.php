<div class="wrap">
    <h1 style="line-height: 1.5 !important;">
        <span class="dashicons dashicons-email-alt" style="font-size: 1.5em; margin-right: 20px"></span>
        Send Email
    </h1>

    <hr>

    <form method="post" action="" id="mailer-form">
        <input type="hidden" name="recipient-type" value="user" id="recipient-type">

        <table id="amp-form-table">
            <tr>
                <td><label for="from">From</label></td>
                <td>
                    <input type="text" name="from"
                           value="<?php echo get_option('blogname') ?><<?php echo wp_get_current_user()->user_email ?>>"
                           id="from" readonly>
                    <div><small>The name of the website and current user email address.</small></div>
                </td>
            </tr>
            <tr>
                <td><label for="">Recipient group</label></td>
                <td>
                    <select name="user" id="user-list">
                        <option value="">Select User</option>
                        <?php
                        foreach (get_users() as $user) {
                            echo "<option value='$user->user_email'>$user->user_email</option>";
                        }
                        ?>
                    </select>
                    <strong>or</strong>
                    <select name="role" id="role-list">
                        <option value="">Select Role</option>
                        <?php
                        foreach (get_editable_roles() as $role) {
                            echo '<option value="' . $role['name'] . '">' . $role['name'] . '</option>';
                        }
                        ?>
                    </select>
                    <div><small>Choose the user emails or roles where the email will be sent.</small></div>
                </td>
            </tr>
            <tr>
                <td><label for="email-recipients">To <span>*</span></label></td>
                <td>
                    <input type="text" id="email-recipients" name="recipients" multiple value="" readonly>
                    <div><small>Email address of selected users or roles, separated by commas.</small></div>
                </td>
            </tr>
            <tr>
                <td><label for="subject">Subject <span>*</span></label></td>
                <td>
                    <input type="text" name="subject" id="subject">
                    <div><small>Subject of the email.</small></div>
                </td>
            </tr>
            <tr>
                <td><label for="message">Message <span>*</span></label></td>
                <td>
                    <!-- @todo
                        - tinymce editor integration
                    -->
                    <?php
                    $content = '';
                    $editor_id = 'message';
                    $settings = array(
                        'wpautop' => true,
                        'media_buttons' => false,
                        'textarea_name' => $editor_id,
                        'textarea_rows' => 20,
                        'tabindex' => 5,
                        'tabfocus_elements' => ':prev,:next',
                        'editor_css' => '',
                        'editor_class' => '',
                        'teeny' => false,
                        'dfw' => false,
                        'tinymce' => false,
                        'quicktags' => true,
                        'drag_drop_upload' => true
                    );;

                    wp_editor($content, $editor_id, $settings);
                    ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><?php submit_button('Send Email'); ?></td>
            </tr>
        </table>

    </form>

</div>
<?php
// phpmailer config
require_once plugin_dir_path(__FILE__) . 'config.php';
// email sending actions
require_once plugin_dir_path(__FILE__) . 'actions.php';

