// add email to database
function addEmail() {
    $("#message-modal #submit").click(function() {
        $.post(
            window.location.host + '/send_mail/',
            { "name" : $("#message-modal #name"   ).val(),
              "email": $("#message-modal #email"  ).val(),
              "msg"  : $("#message-modal #message").val() }
        );
        debugger;

//        alert($("#message-modal #name"   ).val());
    });
}

window.onload = function() {
    addEmail();
};