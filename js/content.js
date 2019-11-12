
function checkMessage() {
  var message = document.getElementById('_message').value;
  if (message == "") {
    window.alert('留言欄位不得空白');
    return false;
  }
  if (message.length > 20) {
    window.alert('留言字數須小於20');
    return false;
  }
}