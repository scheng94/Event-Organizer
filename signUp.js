window.onsubmit=validateForm;

function validateForm(){
    var phone1 = document.getElementById("phoneFirstPart").value;
    var phone2 = document.getElementById("phoneSecondPart").value;
    var phone3 = document.getElementById("phoneThirdPart").value;
    var age = document.getElementById("age").value;
    
    var invalid = "";
    if(String(parseInt(phone1)) !== phone1 || (String(parseInt(phone2)) !== phone2) || (String(parseInt(phone3)) !== phone3)){
        invalid += "Invalid phone number\n";
    }
    
    if(String(phone1).length < 3 || String(phone2).length < 3 || String(phone3).length < 4){
        invalid += "Invalid phone number\n";
    }
    
    if(String(parseInt(age)) !== age){
        invalid += "Invalid age\n";
    }
    
    if(invalid !== ""){
        alert(invalid);
        return false;
    } else{
        if(window.confirm("Do you want to submit the form data?")){
            return true;
        } else{
            return false;
        }
    }
}