var reviewAct;
var scheduleId;

window.onload = function() {
    generateInitReview();
};


function selectValue(e) {
    alert("Taken");
    // Make stars yellow
    let starValue = Number(e.getAttribute("pepega"));
    
    elements = document.getElementsByClassName("rating-stars");

    for (i = 0; i < elements.length; i++) {
        element = elements[i];
        if (element.getAttribute("pepega") <= starValue) {
            element.src = "../data/icons/star.png";
        }
        if (element.getAttribute("pepega") > starValue) {
            element.src = "../data/icons/gray_star.png";
        }
    }

    element = document.getElementById("record");
    element.value = starValue;
}

function generateInitReview() {
    let idValue = new URL(window.location.href);
    idValue = idValue.searchParams.get("button");
    idValue = idValue.split(";");
    window.scheduleId = idValue[1];
    window.reviewAct = idValue[0];

    let request = new XMLHttpRequest();
    let param = "id="+idValue[1];
    request.open("GET", "../php/ReviewTitle.php?" + param, true);
    request.send();

    request.onload = () => {
        let response = request.response;
        document.getElementById("title_test").innerHTML = response;
    }
}

function submitReview(e) {
    let form = new FormData();
    let request = new XMLHttpRequest();

    rating = document.getElementById("record").value;
    review = document.getElementById("review-textbox").value;

    form.append('scheduleId', scheduleId);
    form.append('reAction', reviewAct);
    form.append('rating', rating);
    form.append('review', review);

    request.open("POST", "../php/ReviewPage.php");
    request.send(form);

    request.onload = () => {
        window.location.replace("../html/TransactionPage.html");
    }

    e.preventDefault();
}