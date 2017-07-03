$("div.alert").delay(5000).slideUp();

const MODES = {
  UPER_CASE: true,
  LOWER_CASE: true,
  NUMBER: true,
  SYMBOL: true
};
const CHARS = {
  LOWER_CASE: 'abcdefghijklmnopqrstuvwxyz',
  NUMBER: '1234567890',
  SYMBOL: '!@#$%^&*()-+<>',
  UPER_CASE: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
}
var IS_SHOW = false;

var password = '';
var chars = Object.values(CHARS).sort();
var length = 16;

function findIndex(str) {
  for (let i = 0; i < chars.length; i++) {
    if (chars[i] === str) {
      return i;
    }
  }
}

$(document).ready(function() {
  password = $('#password').val();
  length = $('#Length').val(length);
  IS_SHOW ? $('#ShowPassword').text('hide') : $('#ShowPassword').text('show');
  $('#ModeUpercase').prop('checked', MODES.UPER_CASE);
  $('#ModeLowercase').prop('checked', MODES.LOWER_CASE);
  $('#ModeNumber').prop('checked', MODES.NUMBER);
  $('#ModeSymbol').prop('checked', MODES.SYMBOL);

});

$('#ModeLowercase').click(function() {
  if (this.checked) {
    MODES.LOWER_CASE = true;
    chars.push(CHARS.LOWER_CASE);
    chars.sort();
  } else {
    MODES.LOWER_CASE = false;
    chars.splice(findIndex(CHARS.LOWER_CASE), 1);
  }
});
$('#ModeNumber').click(function() {
  if (this.checked) {
    MODES.NUMBER = true;
    chars.push(CHARS.NUMBER);
    chars.sort();
  } else {
    MODES.NUMBER = false;
    chars.splice(findIndex(CHARS.NUMBER), 1);
  }
});
$('#ModeSymbol').click(function() {
  if (this.checked) {
    MODES.SYMBOL = true;
    chars.push(CHARS.SYMBOL);
    chars.sort();
  } else {
    MODES.SYMBOL = false;
    chars.splice(findIndex(CHARS.SYMBOL), 1);
  }
});
$('#ModeUpercase').click(function() {
  if (this.checked) {
    MODES.UPER_CASE = true;
    chars.push(CHARS.UPER_CASE);
    chars.sort();
  } else {
    MODES.UPER_CASE = false;
    chars.splice(findIndex(CHARS.UPER_CASE), 1);
  }
});

$('#ShowPassword').click(function() {
  IS_SHOW = !IS_SHOW;
  if (IS_SHOW) {
    $('#ShowPassword').text('hide');
    $('#password').prop('type', 'text');
  } else {
    $('#ShowPassword').text('show');
    $('#password').prop('type', 'password');
  }
});

function randomPassword(length) {
  password = '';
  var charsStr = chars.join('');

  for (let i = 0; i < length; i++) {
    var index = Math.floor(Math.random() * charsStr.length);
    password += charsStr.charAt(index);
  }
}

$('#Copy').click(function() {
  // Create a dummy input to copy the string array inside it
 var dummy = document.createElement("input");
 // Add it to the document
 document.body.appendChild(dummy);
 // Set its ID
 dummy.setAttribute("id", "dummy_id");
 // Output the array into it
 document.getElementById("dummy_id").value = password;
 // Select it
 dummy.select();
 // Copy its contents
 document.execCommand("copy");
 // Remove it as its not needed anymore
 document.body.removeChild(dummy);
});

$('#random').click(function() {
  length = $('#Length').val();
  randomPassword(length);
  $('#password').val(password);
});
