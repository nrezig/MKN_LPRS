document.addEventListener("DOMContentLoaded", ()=>{
   document.getElementById("company").addEventListener("change", ()=>{
       if (document.getElementById("company").checked){
           document.getElementById("company_form").style.visibility="visible";
       }
       else {
           document.getElementById("company_form").style.visibility="hidden"
       }
   })
});
