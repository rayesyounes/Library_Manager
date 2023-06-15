
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


document.getElementById('statusFilter').addEventListener('change', filterTable);
document.getElementById('searchInput').addEventListener('input', filterTable);

function filterTable() {
    const selectedStatus = document.getElementById('statusFilter').value.toLowerCase();
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    const tableRows = document.querySelectorAll('#dataTable tbody tr');

    tableRows.forEach(function (row) {
        const rowStatus = row.dataset.status.toLowerCase();
        const bookTitle = row.cells[0].textContent.toLowerCase();
        const userEmail = row.cells[1].textContent.toLowerCase();
        const issueDate = row.cells[2].textContent.toLowerCase();
        const returnDate = row.cells[3].textContent.toLowerCase();

        if (
            (selectedStatus === 'all' || selectedStatus === rowStatus) &&
            (
                bookTitle.includes(searchInput) ||
                userEmail.includes(searchInput) ||
                issueDate.includes(searchInput) ||
                returnDate.includes(searchInput)
            )
        ) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

