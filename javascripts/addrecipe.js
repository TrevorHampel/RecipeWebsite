

function validateInput() {
    var name = $("#recipe-name").val();
    var typeId = $("#recipe-type").val();
    var areaId = $("#recipe-area").val();
    var image = $("#recipe-image").val();
    var source = $("#recipe-source").val();
    var video = $("#recipe-video").val();
    var instructions = $("#tinymce").html();
    var alertMessage = "";
    goodToGo = true;
    if (name == "") {
        alertMessage = "Please enter a recipe name";
       goodToGo = false;
    }
    if (typeId == "") {
        alertMessage = "Please enter a recipe type";
        goodToGo = false;
    }
    if (areaId == "") {
        alertMessage = "Please enter a recipe area";
        goodToGo = false;
    }
    if(image.match(/\.(jpeg|jpg|png)$/) == null)
    {
        alertMessage = "Please image url must end in jpeg, jpg, or png";
        goodToGo = false;
    }
    if (image == "" ) {
        alertMessage = "Please upload an image";
        goodToGo = false;
    }
    if (source == "") {
        alertMessage = "Please enter a recipe source";
        goodToGo = false;
    }
    if (video == "") {
        alertMessage = "Please enter a recipe video link";
        goodToGo = false;
    }if (instructions == "") {
        alertMessage = "Please enter instructions for your recipe";
        goodToGo = false;
    }
    if (alertMessage != "") {
        alert(alertMessage);
    }
    return goodToGo;
}


function test() {
    //console.log($_POST['textarea']);
    console.log($_POST);
}

document.addEventListener("DOMContentLoaded", () => {
    $('#myform').submit(function() 
    {
        return validateInput();
    // your code here
    });
});

