


function ajaxTest(){
    // ajax post
    $.post("TrevorScript.php", 
    {action: "GetText",
    textToReturn: "This is some cool text"}, 
    function(result){
        alert(result);
    });
}


function ajaxTest2(){
    // ajax post
    var TrevorsVar = "This is a string";
    $.post("TrevorScript.php", 
    {action: "GetSecondThing",
    number: 9,
    ThisIsJustAVar: TrevorsVar}, 
    function(result){
        alert(result);
    });
}