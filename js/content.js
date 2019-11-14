
function checkMessage() {
  var message = document.getElementById('_message').value;
  if (message.trim() == "") {
    window.alert('留言欄位不得空白');
    return false;
  }
  if (message.length > 20) {
    window.alert('留言字數須小於20');
    return false;
  }
}

function over(demo) {
  document.getElementById(demo).style.background="rgba(24,99,91,1)";
}

function out(demo) {
  document.getElementById(demo).style.background="rgba(33,132,122,1)"; 
}