const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");
        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });       
const togglePassword1 = document.querySelector("#togglePassword1");
        const password1 = document.querySelector("#password1");
        togglePassword1.addEventListener("click", function () {
            // toggle the type attribute
            const type = password1.getAttribute("type") === "password" ? "text" : "password";
            password1.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });
let goback_sign_in =document.querySelector("#goback-sign-in");
goback_sign_in.addEventListener("click", function (){

    document.getElementById("create-acount-form").style.display = "none";
    document.getElementById("login-form").style.display = "inline";
    // clear all textboxes in the page
    var allInputs = document.querySelectorAll('input');
    allInputs.forEach(singleInput => singleInput.value = '');

});
let go_create_account =document.querySelector("#bnt-create-account");
go_create_account.addEventListener("click", function (){

    document.getElementById("create-acount-form").style.display = "inline";
    document.getElementById("login-form").style.display = "none";
    // clear all textboxes in the page
    var allInputs = document.querySelectorAll('input');
    allInputs.forEach(singleInput => singleInput.value = '');

});

let go_forgot_ps =document.querySelector("#forget-ps");
go_forgot_ps.addEventListener("click", function (){

    document.getElementById("forget-password").style.display = "inline";
    document.getElementById("login-form").style.display = "none";
    // clear all textboxes in the page
    var allInputs = document.querySelectorAll('input');
    allInputs.forEach(singleInput => singleInput.value = '');

});
let goback_sign_in1 =document.querySelector("#goback-sign-in1");
goback_sign_in1.addEventListener("click", function (){

    document.getElementById("forget-password").style.display = "none";
    document.getElementById("login-form").style.display = "inline";
    // clear all textboxes in the page
    var allInputs = document.querySelectorAll('input');
    allInputs.forEach(singleInput => singleInput.value = '');

});
let goback_sign_in2 =document.querySelector("#goback-sign-in2");
goback_sign_in2.addEventListener("click", function (){

    document.getElementById("email-number").style.display = "none";
    document.getElementById("login-form").style.display = "inline";
    // clear all textboxes in the page
    var allInputs = document.querySelectorAll('input');
    allInputs.forEach(singleInput => singleInput.value = '');

});

let goback_sign_in3 =document.querySelector("#goback-sign-in3");
goback_sign_in3.addEventListener("click", function (){

    document.getElementById("new-password").style.display = "none";
    document.getElementById("login-form").style.display = "inline";
    // clear all textboxes in the page
    var allInputs = document.querySelectorAll('input');
    allInputs.forEach(singleInput => singleInput.value = '');

});
window.onbeforeunload = function() {
    localStorage.setItem(email, $('#email').val());
    localStorage.setItem(password, $('#password').val());

}
window.onload = function() {
    var email = localStorage.getItem(email);
    var password = localStorage.getItem(password);
    if (email !== null) $('#email').val(email); if (password !== null) $('#password').val(password);
    // ...
}
function ValidateEmail(a) {

    var validRegex =/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (a.match(validRegex)) {
        return true;
    } else {
        return false;
    }
}
function validatePass(pass){
    // Validate numbers
    var numbers = /[0-9]/g;
    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if(pass.match(numbers) && pass.match(upperCaseLetters) && pass.match(lowerCaseLetters) ){
        return true;

    } else {
        return false;
    }

}
function IsNum(x){
    var numbers = /[0-9]/g;
    if(x.match(numbers)){
        return true;
    }
    else{
        return false;
    }
}
function getSavedValue(v){
    if (!localStorage.getItem(v)) {
        return "";// You can change this to your defualt value. 
    }
    return localStorage.getItem(v);
}
function validateAll(x){
    
    if(x=="sign in"){
        let email = document.getElementById("email").value;
        let password = document.getElementById("password").value;
        localStorage.setItem("email", email);
        localStorage.setItem("password", password);

        if(email.trim()!=""){
            if(ValidateEmail(email)){
                if(password.trim()!=""){
                    localStorage.setItem("password", "");
                    document.getElementById('login-form').submit();
                }
                else{
                    window.location.replace("index.php?error=Password sign in invalid");
                }
            }
            else{
                
                window.location.replace("index.php?error=Email sign in invalid");
                
            }
        }
    }
}
document.getElementById("email").value = getSavedValue("email");
document.getElementById("password").value = getSavedValue("password");

function validateForCr(){
    let firstname = document.getElementById("firstname").value;
    let lastname = document.getElementById("lastname").value;
    let email = document.getElementById("email-create-acc").value;
    let password = document.getElementById("password1").value;
    localStorage.setItem("firstname", firstname);
    localStorage.setItem("lastname", lastname);
    localStorage.setItem("email-create-acc", email);
    localStorage.setItem("password1", password);

    let pass=true;
    let link = "index.php?cr-back=true";
    if(firstname.length<2 || firstname.trim()=="" || IsNum(firstname)){
        link+="&error-fr=Firstname invalid";
        pass=false;
        
    }
    if(lastname.length<2 || lastname.trim()=="" || IsNum(lastname)){
        link+="&error-ls=Lastname invalid";
        pass=false;
    }

    if(ValidateEmail(email)==false || email.trim()==""){
        link+="&error=Email invalid";    
        pass=false;
    }

    if(validatePass(password)==false || password.trim()=="" || password.length<6){
        link+="&error-ps=Password invalid";    
        pass=false;
    }
    if(pass){
        document.getElementById('create-acount-form').submit();
    }
    else{
        document.getElementById("firstname").value = firstname;
        document.getElementById("lastname").value = lastname;
        document.getElementById("email-create-acc").value = email;
        document.getElementById("password1").value = password;
        window.location.replace(link);
    }


}
document.getElementById("firstname").value = getSavedValue("firstname");
document.getElementById("lastname").value = getSavedValue("lastname");
document.getElementById("email-create-acc").value = getSavedValue("email-create-acc");
document.getElementById("password1").value = getSavedValue("password1");

function confirm_pass(){
    let pass=document.getElementById("new-password-input").value;
    let confirm=document.getElementById("Confirm-password-input").value;
    if(pass==confirm){
        if(validatePass(pass)==true && pass.trim()!="" && pass.length>=6){
            document.getElementById('new-password').submit();
        }
        else{
            document.getElementById("error2").style.display="inline";
            document.getElementById("br2").style.display="none";
        }
    }
    else{
        document.getElementById("error1").style.display="inline";
        document.getElementById("br1").style.display="none";
    }


}




        