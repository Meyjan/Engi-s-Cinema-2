window.onload = function() {
    this.loadMovie(event);
    this.loadSchedule(event);
    this.loadReview(event);
}

function loadMovie(e) {
    alert("Test called");
    let idValue = new URL(window.location.href);
    idValue = idValue.searchParams.get("id");

    let request = new XMLHttpRequest();
    let param = "id=" + idValue;
    request.open("GET", "../php/MovieDetails.php"+"?"+param, true);
    request.send();

    obj = null;

    request.onload = () => {
        let response = request.response;
        window.result = JSON.parse(response);
        obj = JSON.parse(response);
        window.result = obj;

        document.getElementById("movie-title").innerHTML = obj.title;
        document.getElementById("movie-poster").src = obj.photo_link;
        document.getElementById("genre").innerHTML = obj.genre;
        document.getElementById("runtime").innerHTML = obj.length;
        document.getElementById("release-date").innerHTML = obj.release_date;
        document.getElementById("desc-content").innerHTML = obj.summary;
    }
}

function loadSchedule(e) {
    let idValue = new URL(window.location.href);
    idValue = idValue.searchParams.get("id");

    let request = new XMLHttpRequest();
    let param = "id=" + idValue;
    request.open("GET", "../php/LoadSchedule.php"+"?"+param, true);
    request.send();

    obj = null;

    request.onload = () => {
        let response = request.response;
        window.result = JSON.parse(response);
        obj = JSON.parse(response);
        window.result = obj;

        let container = document.getElementById("schedule-list");

        for (let i = 0; i < obj.length; i++) {
            let newRow = document.createElement('tr');
            
            let scheduleDate = document.createElement('td');
            scheduleDate.innerHTML = obj[i].date;

            let scheduleTime = document.createElement('td');
            scheduleTime.innerHTML = obj[i].time;

            let scheduleSeat = document.createElement('td');
            scheduleSeat.innerHTML = obj[i].seat_count;

            let scheduleBook = document.createElement('td');
            scheduleBook.className = "book-btn";
            

            let bookButton = document.createElement('button');
            if (obj[i].seat_count == 0) {
                bookButton.className = "not-avail";
            } else {
                bookButton.className = "avail";
            }
            bookButton.id = obj[i].schedule_id
            bookButton.addEventListener('click', function() {
                window.location = "BookingPage.html?id=" + bookButton.id;
            })

            let buttonIco = document.createElement('img');
            buttonIco.src = "../data/icons/detail_btn.png";
            
            bookButton.appendChild(buttonIco);

            scheduleBook.appendChild(bookButton);

            newRow.appendChild(scheduleDate);
            newRow.appendChild(scheduleTime);
            newRow.appendChild(scheduleSeat);
            newRow.appendChild(scheduleBook);

            container.appendChild(newRow);
        }
    }
}

function loadReview(e) {
    let idValue = new URL(window.location.href);
    idValue = idValue.searchParams.get("id");

    let request = new XMLHttpRequest();
    let param = "id=" + idValue;
    request.open("GET", "../php/LoadReview.php"+"?"+param, true);
    request.send();

    obj = null;

    request.onload = () => {
        let response = request.response;
        window.result = JSON.parse(response);
        obj = JSON.parse(response);
        window.result = obj;

        let container = document.getElementById("movie-review");
        
        for (let i = 0; i < obj.length; i++) {
            let userReview = document.createElement('div');
            userReview.className = "user-review";

            let profPic = document.createElement('img');
            profPic.src = obj[i].profile_pic;
            profPic.className = "avatar";

            let reviewContent = document.createElement('div');
            reviewContent.className = "review-content";

            let userName = document.createElement('p');
            userName.innerHTML = obj[i].username;
            userName.style.color = "#818181";
            userName.id = "username";

            let userRating = document.createElement('div');
            userRating.className = "user-rating";

            let star = document.createElement('img');
            star.src = "../data/icons/star.png";

            let userScore = document.createElement('span');
            userScore.innerHTML = obj[i].rating;
            userScore.className = "user-score";
            
            // document.getElementById('user-score').innerHTML = obj[i].rating;

            let review_desc = document.createElement('div');
            review_desc.className = "review-desc";
            review_desc.innerHTML = obj[i].review;

            userRating.appendChild(star);
            userRating.appendChild(userScore);

            reviewContent.appendChild(userName);
            reviewContent.appendChild(userRating);
            reviewContent.appendChild(review_desc);

            userReview.appendChild(profPic);
            userReview.appendChild(reviewContent);

            container.appendChild(userReview);
        }
    }
}