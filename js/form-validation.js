

function ValidateInput(input){

    if( input == 'website' ){
        var regex = /^(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)$/; 
    }else if( input == 'email' ){ 
        var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
    }else if( input == 'phone' ){
        var regex = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4,5})[-. ]?([0-9]{4,5})$/; 
    }else{ 
        return true;
    }


    var res = $('#'+input).val().match(regex);


    if(res == null){
        //incorrect input
        $('#'+input).css('border','1px solid #ae2a4d'); 
        return false;
    }else{
        //success
        $('#'+input).css('border','1px solid #4caf50');  
        return true;
    }
}
/*
        $('#website').keyup(function(){
            var res = $('#website').val().match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
            if(res == null){
                //incorrect input
                $('#website').css('border','1px solid #ae2a4d'); 
            }else{
                //success
                $('#website').css('border','1px solid #4caf50'); 
            }
        });*/
function DeleteImage(input){


    var deleteMe = input;

    $.post('../php/delete-image.php',{'deleteMe':deleteMe}, function(result) { 
        if(result == 'success'){
            $('#'+deleteMe).parent().parent().css('display','none');
        }else{
            $('#'+deleteMe).parent().parent().css('border','2px solid #fe200');
        }
                   
    });
}
