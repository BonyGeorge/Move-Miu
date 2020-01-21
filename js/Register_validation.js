
var fullname=true;
var Email=true;
var Username=true;
var uniID=false;
var password=true;






function check(){

    if(fullname == false ||   Email==false ||  Username==false  || uniID==false || password==false ){

        return false;

    }

    else return true;
}

function validateFName(text){
    var regex=/^[0-9]+$/;

    if(text.value==""){

        document.getElementById("name").innerHTML="full name can't be empty";
        fullname= false;



    }

    else if(text.value.match(regex)){

        document.getElementById("name").innerHTML="name must be letters only";
        fullname= false;
    }
    else
    { document.getElementById("name").innerHTML="";
     fullname= true;
    }
}



function validateUniID(text){
    if (text.value==""){

        document.getElementById("uniID").innerHTML="ID can't be empty";
        uniID= false;
    }

   
    else {

        document.getElementById("uniID").innerHTML="";
        uniID= true;
    }

}

function checkuserr() { 
    jQuery.ajax({
        url: "ajaxValidation.php",
        data:'username='+$("#UserNamee").val(),
        type:"POST",

        success:function(data)
        {
            $("#usernamE").html(data);

            if(data=="valid username"){
                Username=true;
            }
            else{
                Username=false;
            }
        }
    });

}


function checkmail() { 
    jQuery.ajax({
        url: "ajaxValidation.php",
        data:'mail='+$("#Email").val(),
        type:"POST",

        success:function(data)
        {
            $("#mail").html(data);

            if(data=="valid mail"){
                Email=true;
            }
            else{
                Email=false;
            }
        }
    });

}




function validatepassword(text){
    if (text.value==""){

        document.getElementById("password").innerHTML="password can't be empty";
        password= false;
    }

    else if(text.value.length<6){
        document.getElementById("password").innerHTML="password must be at least 6 digits";
        password= false;
    }
    else {

        document.getElementById("password").innerHTML="";
        password= true;
    }

}



