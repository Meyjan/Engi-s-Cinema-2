var current_page = 1;
var records_per_page = 3;

var imgsearch =  document.getElementsByClassName("imagesearch")
var title = document.getElementsByClassName("filmtitlesearch")
var film = document.getElementsByClassName("ratingsearch")
var desc = document.getElementsByClassName("descriptionsearch")
var viewdetail = document.getElementsByClassName("view-detail")
var lcs = document.getElementsByClassName("leftcontentsearch")
var rcs = document.getElementsByClassName("rightcontentsearch")
var list = document.getElementsByClassName("listing_table")

var objLength = title.length

function prevPage()
{
    if (current_page > 1) {
        current_page--;
        this.document.getElementById("page-id").innerHTML = current_page
        changePage(current_page);
    }
}

function nextPage()
{
    if (current_page < numPages()) {
        current_page++;
        this.document.getElementById("page-id").innerHTML = current_page
        changePage(current_page);
    }
}

function changePage(page)
{
    var btn_next = document.getElementById("btn_next");
    var btn_prev = document.getElementById("btn_prev");
    var listing_table = document.getElementById("listingTable");
    var page_span = document.getElementById("page");

    // Validate page
    if (page < 1) page = 1;
    if (page > numPages()) page = numPages();

    var i = (page-1) * records_per_page; i < (page * records_per_page); i++
    for (var i = 0; i < objLength; i++) {
        if (i >= (page-1) * records_per_page && i < page * records_per_page) {
            title[i].style.display="block";
            film[i].style.display="block";
            imgsearch[i].style.display="block";
            desc[i].style.display="block";
            viewdetail[i].style.display="block";
            rcs[i].style.display="block";
            lcs[i].style.display="block";
            list[i].style.borderBottom = "1px solid #bdbdbd";
        }
        else {
            title[i].style.display="none";
            film[i].style.display="none";
            imgsearch[i].style.display="none";
            desc[i].style.display="none";
            viewdetail[i].style.display="none";
            list[i].style.borderBottom = "none";
            lcs[i].style.display="none";
            rcs[i].style.display="none";
            
        }
    }

    if (page == 1) {
        btn_prev.style.visibility = "hidden";
    } else {
        btn_prev.style.visibility = "visible";
    }

    if (page == numPages()) {
        btn_next.style.visibility = "hidden";
    } else {
        btn_next.style.visibility = "visible";
    }
}

function numPages()
{
    return Math.ceil(objLength / records_per_page);
}


window.onload = function() {
    changePage(1);
    this.document.getElementById("page-id").innerHTML = 1
};