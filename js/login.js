
function checkLogin() {
  var account  = document.getElementById('_account').value
  var password = document.getElementById('_password').value
  if (account == "" || password == "") {
    window.alert('欄位不得為空')
    return false;
  }

}