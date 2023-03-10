function validateInput() {
    var name = $("#recipe-name").val();
    var typeId = $("#recipe-type").val();
    var areaId = $("#recipe-area").val();
    var image = $("#recipe-image").val();
    var source = $("#recipe-source").val();
    var video = $("#recipe-video").val();
    var instructions = $("#textarea").val();
    var alertMessage = "";

    if (name == "") {
        alertMessage = "Please enter a recipe name";
    }
    if (typeId == "") {
        alertMessage = "Please enter a recipe type";
    }
    if (areaId == "") {
        alertMessage = "Please enter a recipe area";
    }
    if (image == "") {
        alertMessage = "Please upload an image";
    }
    if (source == "") {
        alertMessage = "Please enter a recipe source";
    }
    if (video == "") {
        alertMessage = "Please enter a recipe video link";
    }if (instructions == "") {
        alertMessage = "Please enter instructions for your recipe";
    }
    if (alertMessage != "") {
        alert(alertMessage);
    }
}

function test() {
            //console.log($_POST['textarea']);
            console.log($_POST);
        }