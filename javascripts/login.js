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
    window.location.href = "CreateAccount.php";
}

function CreateAccount(){
    var first = $("#first_name_id").val();
    var last = $("#last_name_id").val();   
    var username = $("#username_id").val();
    var password = $("#password_id").val();
    
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