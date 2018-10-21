function close1(){
    document.getElementById('success').style.display = 'none';

}
function close2(){
    document.getElementById('error').style.display = 'none';
}
var flag = true ;
document.getElementById('edit').style.display = 'none';

function convert(){
    document.getElementById('edit').style.display = 'none';
    let num = document.getElementsByClassName('edit')
     if(flag) {

         alert(document.getElementsByClassName('edit_btn')[1].value);
         document.getElementById('edit').style.display = 'block';
         flag = false;
     }else{
         document.getElementById('edit').style.display = 'none';
         flag = true ;
     }
     return false ;
}