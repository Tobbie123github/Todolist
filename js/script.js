const checkbox = document.querySelectorAll('input[type=checkbox]');
 checkbox.forEach(check =>{
   check.onclick = function(){
     this.parentNode.submit();
   }
 })