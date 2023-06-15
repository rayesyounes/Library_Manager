
const addBorrowerButton = document.getElementById('addBorrowerButton');
const addBorrowerModal = document.getElementById('addBorrowerModal');
const hide_addModal_Button = document.getElementById('hide_addModal_Button');


addBorrowerButton.addEventListener('click', function (event) {
    event.preventDefault(); 

    addBorrowerModal.style.display = 'block';
});


hide_addModal_Button.addEventListener('click', function () {
    addBorrowerModal.style.display = 'none'; 
});


document.getElementById("book_isbn").addEventListener("input", function () {
    var isbn = this.value;
    fetchBookTitle(isbn);
    fetchBookID(isbn);
});

document.getElementById("user_cin").addEventListener("input", function () {
    var cin = this.value;
    fetchUserEmail(cin);
    fetchUserID(cin);
});

function fetchBookTitle(isbn) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var title = xhr.responseText;
                document.getElementById("book_title").value = title;
            } else {
                console.log("Error: " + xhr.status);
            }
        }
    };

    var url = "fetch-book-title.php?isbn=" + encodeURIComponent(isbn);
    xhr.open("GET", url, true);
    xhr.send();
}

function fetchBookID(isbn) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var id = xhr.responseText;
                document.getElementById("book_id").value = id;
            } else {
                console.log("Error: " + xhr.status);
            }
        }
    };

    var url = "fetch-book-id.php?isbn=" + encodeURIComponent(isbn);
    xhr.open("GET", url, true);
    xhr.send();
}

function fetchUserEmail(cin) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var email = xhr.responseText;
                document.getElementById("user_email").value = email;
            } else {
                console.log("Error: " + xhr.status);
            }
        }
    };

    var url = "fetch-user-email.php?cin=" + encodeURIComponent(cin);
    xhr.open("GET", url, true);
    xhr.send();
}

function fetchUserID(cin) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var id = xhr.responseText;
                document.getElementById("user_id").value = id;
            } else {
                console.log("Error: " + xhr.status);
            }
        }
    };

    var url = "fetch-user-id.php?cin=" + encodeURIComponent(cin);
    xhr.open("GET", url, true);
    xhr.send();
}

document.getElementById('statusFilter').addEventListener('change', function () {
    const selectedStatus = this.value;
    const tableRows = document.querySelectorAll('#dataTable tbody tr');

    tableRows.forEach(function (row) {
        const rowStatus = row.dataset.status;

        if (selectedStatus === 'all' || selectedStatus === rowStatus || (selectedStatus === 'not returned' && rowStatus === 'Not Returned')) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});