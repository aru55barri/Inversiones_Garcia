$(function(){
    var mayus = new RegExp("^(?=.*[A-Z])");
    var special = new RegExp("^(?=.*[.!@#$%&*])");
    var numbers = new RegExp("^(?=.*[0-9])");
    var lower = new RegExp("^(?=.*[a-z])");
    var len  = new RegExp("^(?=.{4,})");
    

    var regExp=[mayus,special,numbers,lower,len];
    var elementos=[$("#mayus"),$("#special"),$("#numbers"),$("#lower"),$("#len")];
    $("#ncontraseña").on("keyup",function(){
        document.querySelector('#button').disabled = true;
       
         var pass=$("#ncontraseña").val();
         var check=0;
         for(var i=0; i<5; i++){
            if(regExp[i].test(pass)){
                elementos[i].hide();
                check++;
            }else{
                elementos[i].show();
           }
         }

        if(check>=1 && check<=2){
            $("#contramensaje").text("Muy Insegura").css("color","red");
        }else if(check>=3 && check<=4){
            $("#contramensaje").text("Poco Segura").css("color","orange");
            document.querySelector('#button').disabled = true;
        }else if(check ==5){
            $("#contramensaje").text("Muy Segura").css("color","green");
            document.querySelector('#button').disabled = false;
             
            
        }
                                                                              
    });

});