var acc = document.getElementsByClassName("Edit");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
function selects(chk){  
  if(document.getElementsByName('select_all').checked==true){
for (i = 0; i < chk.length; i++)
chk[i].checked = false ;
document.getElementsByName('select_all').checked=false;
}else{

for (i = 0; i < chk.length; i++)
chk[i].checked = true ;
document.getElementsByName('select_all').checked=true;
}  
}
function direction(){
  window.location.href = '/wordpress/wp-admin/admin.php?page=tikets&tab=Admin-replay';
}
function direction1(){
  window.location.href = '/wordpress/wp-admin/admin.php?page=wallet-users&tab=ConfirmedW';
}
function direction2(){
  window.location.href = '/wordpress/wp-admin/admin.php?page=wallet-users&tab=NConfirmedW';
}