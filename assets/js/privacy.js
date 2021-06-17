function checkPriv(){
  alert("Went in");
    var box = document.getElementById("checkbox")
    if(!box.checked) {
      alert("Please accept the Privacy Policy first");
    }else{
        alert("Booked");
    }
}