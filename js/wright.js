
function checkWright() {
  var title   = document.getElementById('_title').value;
  var content = document.getElementById('_content').value;
  if (title == "" || content =="") {
    window.alert('欄位不得空白');
    return false;
  }
  if (title.length > 30) {
    window.alert('標題字數須小於30');
    return false;
  }
}

function over(demo) {
  document.getElementById(demo).style.background="rgba(24,99,91,1)";
}

function out(demo) {
  document.getElementById(demo).style.background="rgba(33,132,122,1)"; 
}