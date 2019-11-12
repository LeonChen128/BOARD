
function checkUpdate() {
  var title   = document.getElementById('_title').value
  var content = document.getElementById('_content').value
  if (title =="" || content =="") {
    window.alert('欄位不得為空');
    return false;
  }
  if (title.length > 30) {
    window.alert('標題字數須小於30');
    return false;
  }
}