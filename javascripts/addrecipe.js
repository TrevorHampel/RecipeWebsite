function addRecipe() {
    var name = $("#recipe-name").val();
    var typeId = $("recipe-type").val();
    var areaId = $("recipe-area").val();
    var image = $("recipe-image").val();
    var source = $("recipe-source").val();
    var video = $("recipe-video").val();
    var instructions = $("textarea").val();

    $.post("T_ActionHandler.php", 
    {
        action: "AddRecipe",
        name: name,
        typeId: typeId,
        areaId: areaId,
        image: image,
        source: source,
        video: video,
        instructions: instructions
    }, 
    function(result){
        if(result === "false"){
            
            alert("This recipe already exists!");
        }
    });
}