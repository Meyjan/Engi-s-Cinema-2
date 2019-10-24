window.onload = function () {
    showHistory();
};

function showHistory() {
    let request = new XMLHttpRequest();
    request.open("GET", "../php/TransactionPage.php");
    request.send();

    request.onload = () => {
   
        let temp = JSON.parse(request.response);

        let great_container = document.getElementById("movie-container");

        for (let i = 0; i < (temp.length); i++) {

            let container = document.createElement('div');
            if (i == 0) {
                container.className = "movie-item-top";
            } else {
                container.className = "movie-item";
            }

            let img = document.createElement('img');
            img.className = "movie-image";
            img.src = temp[i].photo_link;

            let detail = document.createElement('div');
            detail.className = "movie-details";

            let title = document.createElement('div');
            title.className = "details-title";
            title.innerHTML = temp[i].title ;


            let datetimecon = document.createElement('span');
            datetimecon.className = "details-details";
                 
            let datetime = document.createElement('span');
            //datetime.className = "details-details";
            datetime.innerHTML = temp[i].date + " " + temp[i].time ;

            let schedule = document.createElement('span');
            schedule.className = "blue-text";
            schedule.innerHTML = "Schedule: ";
                 
            let buttoncon = document.createElement('form');
            buttoncon.className = "details-buttons";

            let delbut = document.createElement('button');
            delbut.className = "button-delete";
            delbut.innerHTML = "Delete Review";
            delbut.type = "record";
            delbut.value = temp[i].id;
            delbut.name = "button";
            delbut.addEventListener('click', function() {
                deleteTransaction(delbut.value);
            });

            let edbut = document.createElement('button');
            edbut.formAction = "../html/ReviewPage.html";
            edbut.formMethod = "get";
            edbut.className = "button-edit";
            edbut.type = "submit";
            edbut.innerHTML = "Edit Review";
            edbut.value = "edit;" + temp[i].id;
            edbut.name = "button";

            let adbut = document.createElement('button');
            adbut.formAction = "../html/ReviewPage.html";
            adbut.formMethod = "get";
            adbut.className = "button-add";
            adbut.type = "submit";
            adbut.innerHTML = "Add Review";
            adbut.value = "add;" + temp[i].id;
            adbut.name = "button";

            if (temp[i].review != null) {
                buttoncon.appendChild(delbut);
                buttoncon.appendChild(edbut);
            } else {
                let sqlDateStr = temp[i].date + " " + temp[i].time;

                sqlDateStr = sqlDateStr.replace(/:| /g,"-");
                var YMDhms = sqlDateStr.split("-");
                var sqlDate = new Date();
                sqlDate.setFullYear(parseInt(YMDhms[0]), parseInt(YMDhms[1])-1,
                                                        parseInt(YMDhms[2]));
                sqlDate.setHours(parseInt(YMDhms[3]), parseInt(YMDhms[4]), 
                                                    parseInt(YMDhms[5]), 0);

                if (Date.now() > sqlDate.getTime()) {
                    buttoncon.appendChild(adbut);
                }
            }

            datetimecon.appendChild(schedule);
            datetimecon.appendChild(datetime);

            detail.appendChild(title);
            detail.appendChild(datetimecon);
            detail.appendChild(buttoncon);

            container.appendChild(img);
            container.appendChild(detail);

            great_container.appendChild(container);
        }
    }
}

function deleteTransaction(deleteId) {
    let request = new XMLHttpRequest();
    let param = "id=" + deleteId;

    request.open("GET", "../php/ReviewDelete.php?" + param, true);
    request.send();

    request.onload = () => {
        let response = request.response;
        if (response == 200) {
            location.reload();
        } else {
            alert("Failed deleting review");
        }
    }
}