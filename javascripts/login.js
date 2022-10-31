function login(){
    var password = $("#inputPassword").val();
    var email = $("#inputEmail").val();

    $.post("T_ActionHandler.php", 
    {
        action: "CheckLogin",
        username: email,
        password: password
    }, 
    function(result){
        if(result == "false")
        {
            alert("Username or password is wrong");
        }
        else
        {
            window.location.href = "viewrecipes.php";
        }
    });
}

function signUp(){
    window.location.href = "SignUp.php";
}

function GoToLogin(){
    window.location.href = "Login.php";
}

function CreateAccount(){
    var first = $("#first_name_id").val();
    var last = $("#last_name_id").val();   
    var username = $("#username_id").val();
    var email = $("#email_id").val();
    var password = $("#password_id").val();
    var confirmPassword = $("#confirm_password_id").val();

    if (confirmPassword != password)
    {
        return;
    }
    
    // Jared: I wasn't sure how to add the email to the php
    //        so I left it as is for now but you can add it if you want.

    $.post("T_ActionHandler.php", 
    {
        action: "CreateAccount",
        username: username,
        password: password,
        first: first,
        last: last
    }, 
    function(result){
        if(result === "UserTaken")
        {
            alert("Username is taken");
        }
        else
        {
            window.location.href = "viewrecipes.php";
        }
    });
}