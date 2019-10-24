var result;
var curr_page;
var total_page;

window.onload = function() {
    curr_page = 1;
    this.beginSearch(event);
}


function beginSearch(e) {
    let searchValue = new URL(window.location.href)
    searchValue = searchValue.searchParams.get("searchVal");

    let request = new XMLHttpRequest();
    let param = "search=" + searchValue;
    request.open("GET", "../php/SearchBar.php"+"?"+param, true);
    request.send();

    obj = null;

    request.onload = () => {
        let response = request.response;
        window.result = JSON.parse(response);
        obj = JSON.parse(response);
        window.result = obj;

        document.getElementById("return-text").innerHTML = "Showing search result for keyword \"" + searchValue + "\"";
        document.getElementById("num-count").innerHTML = obj.length;

        let container = document.getElementById("return-list-container");

        let arrayLength = Math.min((obj.length - (curr_page - 1) * 5), 5);
        
        for (let i = 0; i < arrayLength; i++) {
            let newElement = document.createElement('li');
            newElement.className = "return-container";

            let poster = document.createElement('img');
            poster.src = obj[i].photo_link;
            poster.className = "movie-poster";

            let desc_box = document.createElement('div');
            desc_box.className = "desc-box";

            let title = document.createElement('p');
            title.id = "return-title";
            title.innerHTML = obj[i].title;

            let movie_rating = document.createElement('div');
            movie_rating.className = "movie-rating";

            let star = document.createElement('img');
            star.src = "../data/icons/star.png";
            star.id = "star";
            let rating = document.createElement('p');
            rating.id = "score-rating";
            rating.innerHTML = obj[i].rating;

            let desc = document.createElement('p');
            desc.id = "movie-desc";
            desc.innerHTML = obj[i].summary;

            let dtl_btn = document.createElement('button');
            dtl_btn.className = "detail-btn";
            dtl_btn.id = obj[i].id;
            dtl_btn.addEventListener('click', function() {
                window.location = "MovieDetails.html?id=" + dtl_btn.id;
            });

            let dtl_txt = document.createElement('a');
            dtl_txt.innerHTML = "View details";

            let dtl_ico = document.createElement('img');
            dtl_ico.src = "../data/icons/detail_btn.png";

            dtl_btn.appendChild(dtl_txt);
            dtl_btn.appendChild(dtl_ico);

            movie_rating.appendChild(star);
            movie_rating.appendChild(rating);

            desc_box.appendChild(title);
            desc_box.appendChild(movie_rating);
            desc_box.appendChild(desc);

            newElement.appendChild(poster);
            newElement.appendChild(desc_box);
            newElement.appendChild(dtl_btn);

            container.appendChild(newElement);

            if (i != (obj.length - 1)) {
                newElement = document.createElement('hr');
                container.appendChild(newElement);
            }
        }

        window.total_page = Math.ceil(obj.length / 5);
        
        buttonsContainer = document.getElementById("p-container");
        newElement = document.createElement("button");
        newElement.className = "page-element";
        newElement.innerHTML = "Back";
        newElement.id = "Back";
        newElement.disabled = true;
        newElement.addEventListener('click', function() {
            pageSwap(this);
        });
        buttonsContainer.appendChild(newElement);


        for (let i = 1; i <= total_page; i++) {
            newElement = document.createElement("button");
            newElement.className = "page-element";
            newElement.innerHTML = i;
            newElement.id = "button" + i;
            newElement.addEventListener('click', function() {
                pageSwap(this);
            });
            if (newElement.innerHTML == 1) {
                newElement.disabled = true;
            }
            buttonsContainer.appendChild(newElement);
        }

        newElement = document.createElement("button");
        newElement.className = "page-element";
        newElement.innerHTML = "Next";
        newElement.id = "Next";
        newElement.addEventListener('click', function() {
            pageSwap(this);
        });
        if (total_page == 1) {
            newElement.disabled = true;
        }
        buttonsContainer.appendChild(newElement);
    }
    e.preventDefault();
}

function pageSwap(e) {
    if (e.innerHTML == "Back") {
        window.curr_page -= 1;
    }
    else if (e.innerHTML == "Next") {
        window.curr_page += 1;
    }
    else {
        window.curr_page = e.innerHTML;
    }

    // Empty the container
    let container = document.getElementById("return-list-container");
    let child = container.lastElementChild;
    while (child) { 
        container.removeChild(child); 
        child = container.lastElementChild; 
    }

    // Fill the container
    let arrayLength = Math.min((obj.length - (curr_page - 1) * 5), 5);
        
    for (let i = ((curr_page - 1) * 5); i < arrayLength + ((curr_page - 1) * 5); i++) {
        let newElement = document.createElement('li');
        newElement.className = "return-container";

        let poster = document.createElement('img');
        poster.src = obj[i].photo_link;
        poster.className = "movie-poster";

        let desc_box = document.createElement('div');
        desc_box.className = "desc-box";

        let title = document.createElement('p');
        title.id = "return-title";
        title.innerHTML = obj[i].title;

        let movie_rating = document.createElement('div');
        movie_rating.className = "movie-rating";

        let star = document.createElement('img');
        star.src = "../data/icons/star.png";
        star.id = "star";
        let rating = document.createElement('p');
        rating.id = "score-rating";
        rating.innerHTML = obj[i].rating;

        let desc = document.createElement('p');
        desc.id = "movie-desc";
        desc.innerHTML = obj[i].summary;

        let dtl_btn = document.createElement('button');
        dtl_btn.className = "detail-btn";
        dtl_btn.id = obj[i].id;
        dtl_btn.addEventListener('click', function() {
            window.location = "MovieDetails.html?id=" + dtl_btn.id;
        });

        let dtl_txt = document.createElement('a');
        dtl_txt.innerHTML = "View details";

        let dtl_ico = document.createElement('img');
        dtl_ico.src = "../data/icons/detail_btn.png";

        dtl_btn.appendChild(dtl_txt);
        dtl_btn.appendChild(dtl_ico);

        movie_rating.appendChild(star);
        movie_rating.appendChild(rating);

        desc_box.appendChild(title);
        desc_box.appendChild(movie_rating);
        desc_box.appendChild(desc);

        newElement.appendChild(poster);
        newElement.appendChild(desc_box);
        newElement.appendChild(dtl_btn);

        container.appendChild(newElement);

        if (i != (arrayLength + ((curr_page - 1) * 5) - 1)) {
            newElement = document.createElement('hr');
            container.appendChild(newElement);
        }
    }

    currButton = document.getElementById("button" + curr_page);
    if (currButton.innerHTML == 1) {
        document.getElementById("Back").disabled = true;
    } else {
        document.getElementById("Back").disabled = false;
    }
    if (currButton.innerHTML == total_page) {
        document.getElementById("Next").disabled = true;
    } else {
        document.getElementById("Next").disabled = false;
    }
    for (let i = 1; i <= total_page; i++) {
        document.getElementById("button" + i).disabled = false;
    }
    document.getElementById("button" + curr_page).disabled = true;
}

function logout() {
    alert(result.length);
    let request = new XMLHttpRequest();
    request.open("GET", "../php/Logout.php");
    request.send();

    request.onload = () => {
        let response = parseInt(request.response);

        if (response != 200) {
            alert("Server is not right at the moment");
        }
        else {
            window.location.replace('../html/LoginPage.html');
        }
    }
}

function gotoPage(id) {
    alert("Clicked");
}