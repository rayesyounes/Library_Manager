// Get references to the button, modal, and hide button
const addBookButton = document.getElementById('addBookButton');
const addBookModal = document.getElementById('addBookModal');
const hide_addModal_Button = document.getElementById('hide_addModal_Button');

// Add click event listener to the button
addBookButton.addEventListener('click', function (event) {
    event.preventDefault(); // Prevent the default behavior of the hyperlink

    addBookModal.style.display = 'block'; // Show the modal
});

// Add click event listener to the hide button
hide_addModal_Button.addEventListener('click', function () {
    addBookModal.style.display = 'none'; // Hide the modal
});


// Get references to the button, modal, and hide button
const updateBookButtons = document.querySelectorAll('.updateBookButton');
const updateBookModal = document.getElementById('updateBookModal');
const hide_updateModal_Button = document.getElementById('hide_updateModal_Button');

// Add click event listener to the button
updateBookButtons.forEach(function (button) {
    button.addEventListener('click', function (event) {
        event.preventDefault();
        updateBookModal.style.display = 'block';
    });
});

// Add click event listener to the hide button
hide_updateModal_Button.addEventListener('click', function () {
    updateBookModal.style.display = 'none'; // Hide the modal
});

document.addEventListener('DOMContentLoaded', function () {
    var buttons = document.getElementsByClassName('updateBookButton');
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener('click', function () {
            var bookId = this.getAttribute('id');
            fetchBookData(bookId);
        });
    }
});

function fetchBookData(bookId) {
    fetch('fetch_book_data.php?id=' + bookId)
        .then(function (response) {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Error occurred while fetching book data');
            }
        })
        .then(function (data) {
            // Populate the form fields with the received data
            document.getElementById('update_title').value = data.Title;
            document.getElementById('update_author').value = data.Author;
            document.getElementById('update_isbn').value = data.ISBN;
            document.getElementById('update_quantity').value = data.Quantity;

            document.getElementById('levery').src = data.Picture;

            document.getElementById('id_hidden').value = data.ID_Book;

        })
        .catch(function (error) {
            alert(error.message);
        });
}

document.getElementById("search_bookInput").addEventListener("input", searchBooks);

function searchBooks() {

    var searchValue = document.getElementById("search_bookInput").value.toLowerCase();
    var rows = document.querySelectorAll("table tbody tr");

    rows.forEach(function (row) {
        var title = row.querySelector("td:nth-child(1)").textContent.toLowerCase();
        var author = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
        var isbn = row.querySelector("td:nth-child(3)").textContent.toLowerCase();

        if (title.includes(searchValue) || author.includes(searchValue) || isbn.includes(searchValue)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
}

const showEntriesSelect = document.getElementById("showEntriesSelect");
const borrowersTable = document.querySelector("tbody");
const msgSpan = document.getElementById("msg");

function updateTable() {
    const selectedValue = showEntriesSelect.value;

    let numRowsToShow;
    if (selectedValue === "all") {
        numRowsToShow = borrowersTable.getElementsByTagName("tr").length;
    } else {
        numRowsToShow = parseInt(selectedValue);
    }

    const tableRows = borrowersTable.getElementsByTagName("tr");
    for (let i = 0; i < tableRows.length; i++) {
        if (i < numRowsToShow) {
            tableRows[i].style.display = "table-row";
        } else {
            tableRows[i].style.display = "none";
        }
    }

    msgSpan.textContent = numRowsToShow.toString();
}

showEntriesSelect.addEventListener("change", updateTable);