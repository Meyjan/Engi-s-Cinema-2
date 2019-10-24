window.onload = function() {
    'use strict';
    this.identifyUser();
    this.showMovies();
}

function identifyUser() {
    let request = new XMLHttpRequest();
    request.open("GET", "../php/HomePageUser.php");
    request.send();

    request.onload = () => {
        let response = request.response;

        if (response == "-999") {
            alert("Need to login first");
            window.location.replace('../html/LoginPage.html');
        }
        else {
            document.getElementById("BlueEngiNotSoBold").innerHTML = response;
        }
    }
}

function logout() {
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

function showMovies() {
    let request = new XMLHttpRequest();
    request.open("GET", "../php/HomePage.php");
    request.send();

    request.onload = () => {
        let response = request.response;
        if (response == "No movies at the moment") {
            // Action if there's no movie
            alert ("No movie showing today. Sorry for your inconvinience");
        }
        else {
            response = response.split(";;");

            container = document.getElementById("movie-container");

            for (let i = 0; i < (response.length - 1); i++){
                movie_data = response[i].split(";");

                // Add new movies div
                let newElement = document.createElement('div');
                newElement.className = "movie-item";

                // Create new element minions
                let photo = document.createElement('img');
                photo.src = movie_data[1];

                let title = document.createElement('div');
                title.className = "movie-name";
                title.innerHTML = movie_data[0];

                let movie_rating = document.createElement('div');
                movie_rating.className = "movie-rating";

                let star = document.createElement('img');
                star.src = "../data/icons/star.png";
                let rating = document.createElement('div');
                rating.className = "rate-num";
                rating.innerHTML = movie_data[2];

                // Elements assembly
                movie_rating.appendChild(star);
                movie_rating.appendChild(rating);

                newElement.appendChild(photo);
                newElement.appendChild(title);
                newElement.appendChild(movie_rating);

                container.appendChild(newElement);
            }
        }
    };
}