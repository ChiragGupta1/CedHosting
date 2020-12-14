// $(document).ready(function() {  
//     $("input").focusout(function() {  
//         if($(this).val() == '') {  
//             $(this).css('border-color', 'red');
//             $('#small-name').prop('hidden', false).css('text-color', 'red')
//         } 
//         else { 
//             // If it is not blank. 
//             $(this).css('border-color', '');     
//         }     
//     })
    
// });  
function validate(obj) {
    if(!obj.checkValidity()) {
        //alert("You have invalid input. Correct it!");
        $(obj).css('border-color', 'red')
        //obj.focus();
    } else {
        $(obj).css('border-color', '')
    }
}