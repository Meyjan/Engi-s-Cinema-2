let getImageName = function() {
    document.getElementById('fileinput').onchange = function () {
        let str = this.value;
        document.getElementById("image-name").value = str.split(/(\\|\/)/g).pop();
    }
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return " ";
}

function requestId(uname) {
    var data = "username="+uname;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "home/request_id", false);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.send(data);
    if (xhr.status == 200 && xhr.readyState == 4) {
        return xhr.response;
    }
}

function changeLink() {
    var a = document.getElementById("transactions")
    a.setAttribute("href", "/engima/public/history/show/" + requestId(getCookie('username')));
    alert(a.getAttribute('href'))
}

function setStar(rating) 
{
    for (i = 1; i <= 10-rating+1; i++) {
        var star = document.getElementById("star"+i);
        star.checked = true;
      }
}


var a = document.createElement('a');
a.setAttribute('href', "/engima/public/history/show/" + requestId(getCookie('username')));
a.innerHTML = "Transactions";
a.id = "transactionlogoutfont";
document.getElementsByTagName('li')[3].appendChild(a);
var div = document.getElementById("dom-target");
var myData = div.textContent;
setStar(myData);