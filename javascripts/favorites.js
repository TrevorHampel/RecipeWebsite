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

function showhidecards($btnID){
    // alert($cardBtnClicked); // TEST VERIFED //

    // find out how many cards
    var numberofcards = document.getElementById("number_of_cards").innerText; //innerText, NOT - innerText.html
    // console.log(numberofcards);
    // create an array for the ids 
    let elementidsarray = [];
    // add the ids to an array
    console.log(" - - - ALL THE CARDS BY ID - - - ");
    for($i = 0; $i < numberofcards; $i++){
        elementidsarray.push("card"+$i);  
        // console.log("SOMETHING: "+elementidsarray[$i]+" MORE TEXT");
        // console.log(elementidsarray[$i]);
          
    }

    // use the id to flip the card on and off //
    for($i = 0; $i < numberofcards; $i++){
        //strip the ids to just their number value
            // button id the one passed in //
        let btnid = $btnID.substring($btnID.indexOf('n') + 1);
        console.log(btnid);
            // card id - the one using the array of card ids
        // var cardnum = elementidsarray[$i];
        let cardid = elementidsarray[$i].substring(elementidsarray[$i].indexOf('d') + 1);
        console.log(cardid);

        // see which one button matches to the card and show or hide just that one //
        if(btnid == cardid){
            // alert("this is button: " + btnid + " and this is card id: " + cardid + " end this");
            openclosecard(elementidsarray[$i]); // passing in the card id in full name as card#
        }
    }

}

function openclosecard($elementID){
    // alert("elelmemt get switched is: " + $elementID)
    if(document.getElementById($elementID).hidden == true) document.getElementById($elementID).hidden = false;
    else document.getElementById($elementID).hidden = true;
} 