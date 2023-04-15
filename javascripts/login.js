function login(){
    var password = $("#inputPassword1").val();
    if (password === ''){
        alert("Please Enter a password");
        return;
    }
    var email = $("#inputEmail1").val();
    if (email === ''){
        alert("Please Enter a username");
        return;
    }

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
    //var email = $("#email_id").val();  // commented this variable out since it isn't used
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
            GoToLogin();
        }
    });
}

// The following code let's the user press enter to login or create an account after entering their password on the login page or the signup page
// check which page it is
    console.log( "ready!" );
    if (document.getElementById("inputPassword1") != null)
    {
        inputid = "inputPassword1";
        btnid = "btnLogin";
    }
    else if (document.getElementById("confirm_password_id") != null)
    {
        inputid = "confirm_password_id";
        btnid = "btnCreateAccount";
    }

    // assign the input variable to the correct input field
    var input = document.getElementById(inputid);

// Execute a function when the user presses a key on the keyboard
input.addEventListener("keypress", function(event) {
// If the user presses the "Enter" key on the keyboard
if (event.key === "Enter") {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById(btnid).click();
}
}); 