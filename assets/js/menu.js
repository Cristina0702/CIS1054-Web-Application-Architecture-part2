function validateAndChangeButton(btn){
    if (btn.innerHTML == "Add to Favourites"){
      postData();
      btn.innerHTML = "Remove from Favourites";
    }else if(btn.innerHTML == "Remove from Favourites"){
      btn.innerHTML = "Add to Favourites";
    }
  }