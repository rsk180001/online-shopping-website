var validateField = function(fieldElem, infoMessage, validateFn) {
  // if the associated span does not exist, add it in.
  if (fieldElem.is(':last-child')) {
    fieldElem.parent().append("<span></span>");
  }

  var formStatus = fieldElem.next();
  var inputValue = fieldElem.val();
  formStatus.removeClass();

  // separate case for gaining focus
  if (fieldElem.is(':focus')) {
    formStatus.text(infoMessage);
    formStatus.addClass("info");
    return;
  }

  // check empty string, valid, or invalid when losing focus.
  if (!inputValue) {
    formStatus.text("");
  } else if (validateFn(fieldElem.val())) {
    formStatus.text("OK");
    formStatus.addClass("ok");
  } else {
    formStatus.text("Error");
    formStatus.addClass("error");
  }
};

$(document).ready(function() {
  var createFormHandler = function(field, text, method) {
    return function() {
      validateField(field, text, method);
    }
  }

  // create event methods for each call. Specifies validation functions.
  var userHandler = createFormHandler(
    $('#username'),
    "Alphanumeric characters only.",
    function(input) {
      usernameRegex = /^[a-z0-9]+$/i;
      return input.match(usernameRegex);
    }
  );

  var passwordHandler = createFormHandler(
    $('#password'),
    "Must contain a combination of Upper case, Lower case, numeric and special characters.",
    function(input) {
      return /^[A-Za-z0-9\d=!\-@._*]*$/.test(input) // consists of only these
    && /[a-z]/.test(input) // has a lowercase letter
    && /\d/.test(input) // has a digit ;
    && input.length > 8
    && /[A-Z]/.test(input)
    }
  );

  var emailHandler = createFormHandler(
    $('#email'),
    "Must have '@' character in it.",
    function(input) {
      return input.indexOf('@') !== -1;
    }
  );

  // activate event handlers.
  $('#username').focus(userHandler);
  $('#password').focus(passwordHandler);
  $('#email').focus(emailHandler);
  $('#username').blur(userHandler);
  $('#password').blur(passwordHandler);
  $('#email').blur(emailHandler);
});
