
function checkRegister() {
  var name       = document.getElementById('_name').value;
  var account    = document.getElementById('_account').value;
  var password   = document.getElementById('_password').value;
  var repassword = document.getElementById('_repassword').value;
  if (name == '' || account == '' || password =='' || repassword =='') {
    window.alert('欄位不得為空');
    return false;
  }
  if (name.length > 10) {
    window.alert('名稱字數須小於10');
    return false;
  }  
  if (account.length > 12) {
    window.alert('帳號字數須小於12');
    return false;
  }
  if (password.length > 12) {
    window.alert('密碼字數須小於12');
    return false;
  }
  if (password !== repassword) {
    window.alert('密碼確認錯誤');
    return false;
  }
}
