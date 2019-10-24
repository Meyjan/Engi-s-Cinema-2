"use strict";

var booked = false;
var init_exist = false;
var seat_num = -1;
var scheduleId;

window.onload = function() {
    this.alert("Called");
    instantiateTable();
};

function openModal() {
    let modal = document.getElementById("modal-container");
    modal.style.display = "block";
}

function closeModal() {
    window.location.replace("../html/TransactionPage.html")
}

let modal = document.getElementById("modal-container");
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function instantiateTable() {
    let url = new URL(window.location.href);
    window.scheduleId = url.searchParams.get("id");

    let request = new XMLHttpRequest();
    let param = "id=" + scheduleId;
    request.open("GET", "../php/BookingPage.php?" + param, true);
    request.send();

    request.onload = () => {
        let response = request.response;
        let arr_response = response.split(";");

        // Getting user seat number
        window.seat_num = arr_response[0];
        all_seat = JSON.parse(arr_response[1]);

        // Disabling buttons
        for (let i = 0; i < all_seat.length; i++) {
            document.getElementById("button"+all_seat[i].seat_number).disabled = true;
        }

        if (seat_num != -1) {
            document.getElementById("button"+seat_num).className = "seat-selected";
            init_exist = true;
        }

        document.getElementById("price-tag").innerHTML = "Rp " + arr_response[2] + ",-";

        document.getElementById("title-test").innerHTML = arr_response[4];
        document.getElementById("date-test").innerHTML = arr_response[3];

        checkSeatNum();
    }
}

function changeDisplay(e) {
    if (seat_num != -1) {
        document.getElementById("button"+seat_num).disabled = false;
        document.getElementById("button"+seat_num).className = "seat";
    }

    window.seat_num = e.innerHTML;

    document.getElementById("button"+seat_num).disabled = true;
    document.getElementById("button"+seat_num).className = "seat-selected";

    checkSeatNum();
}

function checkSeatNum() {
    if (seat_num != -1) {
        document.getElementById("empty-summary").style.display = "none";
        document.getElementById("filled-summary").style.display = "flex";
    } else {
        document.getElementById("empty-summary").style.display = "flex";
        document.getElementById("filled-summary").style.display = "none";
    }
}

function submitSeat() {
    let req = new XMLHttpRequest();

    let data = new FormData();
    data.append('id', scheduleId);
    data.append('seat', seat_num);
    data.append('exist', init_exist);

    req.open("POST", "../php/BookingCreate.php", true);
    req.send(data);

    req.onload = () => {
        response = req.response;

        if (req.status == 200) {
            openModal();
        }
    };
}