function refresh(again) {
  var chatbox;

  if (window.XMLHttpRequest) {
    chatbox = new XMLHttpRequest();
  }
  else {
    chatbox = new ActiveXObject("Microsoft.XMLHTTP");
  }

  var time = new Date().getTime();

  chatbox.abort();
  chatbox.open("GET", "answer.php?time="+time, true);
  chatbox.onreadystatechange = function() {
    if(chatbox.readyState == 4) {
    document.getElementById('chat').innerHTML = chatbox.responseText;
    }
  }
  chatbox.send(null);

  if (again) {
    setTimeout('refresh(true)',2000);
  }
}

function pressing_enter(e) {
  var charCode;
  if (e && e.which) {
    charCode = e.which;
  }
  else if(window.event){
    e = window.event;
    charCode = e.keyCode;
  }
  if(charCode == 13) {
    ajax_runs('main_di.php','itcango=1&text='+document.getElementById('chat').value);
    document.getElementById('chat').value='';
    refresh(false);
    document.getElementById('chat').focus();
  }
}