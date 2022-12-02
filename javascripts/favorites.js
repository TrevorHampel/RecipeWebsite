function addToFavoritesList(recipeID, userID){
    $.post("T_ActionHandler.php", 
    {
        action: "AddToFavorites",
        recipeID: recipeID,
        userID: userID
    }, 
    function(result){
        if(result === "false"){
            
            alert("You have already favorited this recipe");
        }
    });
}

function removeFromFavorites(recipeID, userID){
    $.post("T_ActionHandler.php", 
    {
        action: "RemoveFromFavorites",
        recipeID: recipeID,
        userID: userID
    }, 
    function(result){
        location.reload();
    });
}