window.onload = function() {
    this.alert("Load");
}

function beginSearch(e) {
    let searchValue = document.getElementById("SearchInputTextBox").value;


    let request = new XMLHttpRequest();
    let param = "search=" + searchValue;
    request.open("GET", "../php/SearchBar.php"+"?"+param, true);
    request.send();

    request.onload = () => {
        window.location.replace('../html/SearchPage.html');

        let response = request.response;
        let titleElement = document.getElementById("return-text");
        alert("Test");
        alert(titleElement.innerHTML);
        document.getElementById("return-text").innerHTML = "asdfasodifn";

        alert("Test 2");
        alert("Test 2");
    }
}

document.getElementById("SearchInput").addEventListener("submit", beginSearch);

function showResult() {
    let request = new XMLHttpRequest();
    request.open();
    request.send();

    request.onload = () => {
        let response = request.response;

        if (response == "No movies") {
            alert ("No movie");
        }
        else {
            alert("Resource get");
            response = response.split(";;");

            container = document.getElementById("return-list");

            document.getElementById("num-count").innerHTML = response.length;

            for (let i = 0; i < (response.length-1); i++) {
                movie_data = response[i].split(";");

                let newElement = document.createElement('li')
                newElement.className = "return-container";

                let poster = document.createElement('img');
                poster.src = movie_data[1];
                poster.className = "movie-poster";

                let desc_box = document.createElement('div');
                desc_box.className = "desc-box";

                let title = document.createElement('p');
                title.className = "return-title";
                title.innerhtml = movie_data[0];

                let movie_rating = document.createElement('div');
                movie_rating.className = "movie-rating";

                let star = document.createElement('img');
                star.src = "../data/icons/star.png";
                let rating = document.createElement('p');
                rating.className = "score-rating";
                rating.innerHTML = movie_data[2];

                let desc = document.createElement('p');
                desc.className = "movie-desc";
                desc.innerHTML = movie_data[3];

                let dtl_btn = document.createElement('button');
                dtl_btn.className = "detail-btn";

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
            }
        }
    }
}

