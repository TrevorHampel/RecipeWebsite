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
        if(result === false)
        {
            alert("Username or password is wrong");
        }
        else
        {
            window.location.href = "TrevorScript.php";
        }
    });
}