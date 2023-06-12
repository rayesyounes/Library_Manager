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
