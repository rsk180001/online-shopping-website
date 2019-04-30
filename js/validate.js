$(document).ready(function() {
 var email_format = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}(\.[a-zA-Z]{2,3})?$/;
 var user_n_format = /^[A-Za-z0-9]+$/;
 var pass_format = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;

 $("#username").after("<span class = 'info' id = 'user'>Please enter the username</span>");
 $("#password").after("<span class = 'info' id = 'pass'>Please enter the password</span>");
 $("#email").after("<span class = 'info' id = 'mail'>Please enter the email id</span>");
 $("#user,#pass,#mail").hide();
 $( "#username" ).focus(function() {
 $("#user").show();
 });
$( "#password" ).focus(function() {
$("#pass").show();
});
$( "#email" ).focus(function() {
$("#mail").show();
});


//*************USERNAME VALIDATION****************************
$( "#username" ).blur(function() {
$("#user").removeClass().addClass("info");
$("#user").text("Please enter the username");
var user_n = $("#username").val();
var is_user_n = user_n_format.test(user_n);
if(user_n.length == 0)
    {
        $("#user").hide();
    }
else if(!is_user_n){
    $("#user").removeClass().addClass("error");
    $("#user").text("Incorrect Format");

}
else{

    $("#user").removeClass().addClass("ok");
    $("#user").text("OK");
}

});


//*************VALIDATING PASSWORD****************************
$( "#password" ).blur(function() {
$("#pass").removeClass().addClass("info");
$("#pass").text("Please enter the Password");
var passwd = $("#password").val();
if(passwd.length == 0)
    {
        $("#pass").hide();
    }
else if(!pass_format.test(passwd)){
    $("#pass").removeClass().addClass("error");
    $("#pass").text("Minimum eight characters, at least one letter, one number and one special character:");
    $("#password").val('');

}

else{

    $("#pass").removeClass().addClass("ok");
    $("#pass").text("OK");
}
//$("#pass").hide();
});


//*************VALIDATING EMAIL****************************

$( "#email" ).blur(function() {
$("#mail").removeClass().addClass("info");
$("#mail").text("Please enter the email id");
var email_id = $("#email").val();
var is_email = email_format.test(email_id);
if(email_id.length == 0)
    {
        $("#mail").hide();
    }
else if(!is_email){
    $("#mail").removeClass().addClass("error");
    $("#mail").text("This is not a valid email address format");
    $("#email").val('');
}
else{

    $("#mail").removeClass().addClass("ok");
    $("#mail").text("OK");
}
//$("#pass").hide();
});
// your js code goes here...
});
