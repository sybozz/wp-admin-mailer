<div class="wrap">
    <h1 style="line-height: 1.5 !important;">
        <span class="dashicons dashicons-email-alt" style="font-size: 1.5em; margin-right: 20px"></span>
        Send Email
    </h1>

    <hr>

    <form method="post" action="" id="mailer-form">
        <input type="hidden" name="recipient-type" value="user" id="recipient-type">

        <table>
            <tr>
                <td><label for="from">From</label></td>
                <td>
                    <input type="text" name="from" value="<?php echo get_option('blogname') ?><<?php echo get_bloginfo('admin_email') ?>>"
                           id="from" readonly>
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
                </td>
            </tr>
            <tr>
                <td><label for="email-recipients">To <span>*</span></label></td>
                <td>
                    <input type="text" id="email-recipients" name="recipients" multiple value="">
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
                    <textarea name="message" id="message" cols="30" rows="10" style="width: 100%"></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><?php submit_button('Send'); ?></td>
            </tr>
        </table>

    </form>

</div>

<?php
// phpmailer config
require_once plugin_dir_path(__FILE__) . 'config.php';
// email sending actions
require_once plugin_dir_path(__FILE__) . 'actions.php';

