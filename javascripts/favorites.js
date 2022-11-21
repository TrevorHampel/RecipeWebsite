function addToFavoritesList(recipeID, userID){
    $.post("T_ActionHandler.php", 
    {
        action: "AddToFavorites",
        recipeID: recipeID,
        userID: userID
    }, 
    function(result){
        
    });
}