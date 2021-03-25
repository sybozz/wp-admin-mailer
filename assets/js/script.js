jQuery( document ).ready( function( $ ) {
    $recipients = $("#email-recipients");
    $userList = $("#user-list");
    $roleList = $("#role-list");
    $recipientType = $("#recipient-type");

    $userList.change( function() {
        $roleList.attr('disabled', 'disabled');

        if ($recipients.val()) {
            $recipients.val( $recipients.val() + ',' + $(this).find("option:selected").attr("value") );
        } else {
            $recipients.val( $(this).find("option:selected").attr("value") );
        }

        $(this).find("option:selected").attr("disabled","disabled");
    });

    $roleList.change(function () {
        $userList.attr('disabled', 'disabled');

        $recipientType.val('role');

        if ($recipients.val()) {
            $recipients.val( $recipients.val() + ',' + $(this).find("option:selected").attr("value") );
        } else {
            $recipients.val( $(this).find("option:selected").attr("value") );
        }

        $(this).find("option:selected").attr("disabled","disabled");
    })
} );