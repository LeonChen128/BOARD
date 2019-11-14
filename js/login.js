
function checkLogin() {
  var account  = document.getElementById('_account').value
  var password = document.getElementById('_password').value
  if (account.trim() == "" || password.trim() == "") {
    window.alert('欄位不得為空')
    return false;
  }
}

function over(demo) {
  document.getElementById(demo).style.background="rgba(24,99,91,1)";
}

function out(demo) {
  document.getElementById(demo).style.background="rgba(33,132,122,1)"; 
}