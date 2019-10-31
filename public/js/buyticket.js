function modal(){
    var modal = document.querySelector(".modal");
    var trigger = document.querySelector(".trigger");
    var closeButton = document.querySelector(".close-button");

    function toggleModal() {
        modal.classList.toggle("show-modal");
    }

    function windowOnClick(event) {
        if (event.target === modal) {
            toggleModal();
        }
    }

    trigger.addEventListener("click", toggleModal);
    closeButton.addEventListener("click", toggleModal);
    window.addEventListener("click", windowOnClick);
}

function beforeclick(){
    var classes =  document.querySelectorAll('.contentbooking');
    i = 0;
    l = classes.length;
    for (i; i<1; i++){
        classes[i].style.visibility = "hidden";
    }
}

function afterclick(){
    document.getElementById('beforebooking').innerHTML = "";
    var classes =  document.querySelectorAll('.contentbooking');
    i = 0;
    l = classes.length;
    for (i; i<1; i++){
        classes[i].style.visibility = "visible";
    }
    var btn = document.getElementsByName('seats');
    var seat = 0;
    for(var i=0 ; i < btn.length ; i++){
        if(btn[i].checked==true){
            seat=btn[i].value;
        }
        document.getElementById('seat-booking').innerHTML = "Seat #".concat(seat);
    }
}

// function insertWatch() {
//         var id_user = 1;
//         var id_schedule = document.getElementById['idschedule'];
//         var chair_number = document.forms["form-seats"]["name"].value;
//         let xhr = new XMLHttpRequest();
        
//         xhr.onreadystatechange = function() {
//             if (this.readyState == 4 && this.status == 200) {
//                 if (xhr.responseText != "null"){
//                     document.getElementById("username_error").innerHTML = "Username " + err_username + " is exist! Please use another username.";
//                     document.getElementById("username_error").style.display = "block";
//                 }
//                 else 
//                 {
//                     document.getElementById("username_error").style.display = "none";
//                     document.getElementById("username").style.border  = "1px solid green";
//                 }
//             }
//         };
        
//         xhr.open("POST", "buyticket/insert_watches", false);
//         var data = JSON.stringify({ "id_user": id_user, "id_schedule": id_schedule, "chair": chair_number });

//         xhr.setRequestHeader("Content-Type", "application/json");
//         xhr.send(data);
        
//         if (xhr.status != 200) {
//             alert(`Error ${xhr.status}: ${xhr.statusText}`);
//             return false;
//         } 
//         else 
//         {
            
//         }
//         return true;  
//     }
    
