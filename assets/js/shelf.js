// Get the search input element
var searchInput = document.getElementById("search_bookInput");

// Add an input event listener to detect changes in the search input
searchInput.addEventListener("input", function () {
    // Get the search query
    var searchQuery = searchInput.value.toLowerCase();

    // Get all the book cards
    var bookCards = document.querySelectorAll(".col-md-5");

    // Loop through each book card and check if it matches the search query
    bookCards.forEach(function (bookCard) {
        var title = bookCard.querySelector("p").textContent.toLowerCase();
        var author = bookCard.querySelector("p:nth-child(2)").textContent.toLowerCase();
        var isbn = bookCard.querySelector("p:nth-child(3)").textContent.toLowerCase();

        // Show or hide the book card based on the search query
        if (
            title.includes(searchQuery) ||
            author.includes(searchQuery) ||
            isbn.includes(searchQuery)
        ) {
            bookCard.style.display = "block"; // Show the book card
        } else {
            bookCard.style.display = "none"; // Hide the book card
        }
    });
});


// Get references to the book images
const bookImages = document.querySelectorAll('.card-img-top');
const closeButton = document.getElementById('hide_Modal_Button');

// Add click event listener to the book images
bookImages.forEach(function (image) {
    image.addEventListener('click', function (event) {
        event.preventDefault();
        const BookModal = document.getElementById('BookModal');
        BookModal.style.display = 'block';
        const bookId = this.parentNode.querySelector('input[type="hidden"]').value;
        fetchBookData(bookId);
    });
});

// Add click event listener to the close button
closeButton.addEventListener('click', function () {
    const BookModal = document.getElementById('BookModal');
    BookModal.style.display = 'none'; // Hide the modal
});

document.addEventListener('DOMContentLoaded', function () {
    var bookImages = document.querySelectorAll('.card-img-top');
    for (var i = 0; i < bookImages.length; i++) {
        bookImages[i].addEventListener('click', function () {
            var bookId = this.closest('.col-md-5').querySelector('input[type="hidden"]').value;

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
            document.getElementById('title').value = data.Title;
            document.getElementById('author').value = data.Author;
            document.getElementById('isbn').value = data.ISBN;

            // Update the image source
            var bookImage = document.getElementById('levery');
            bookImage.src = data.Picture;

            // Update the hidden input value
            document.getElementById('id_hidden').value = data.ID_Book;

            // Display the modal
            var BookModal = document.getElementById('BookModal');
            BookModal.style.display = 'block';
        })
        .catch(function (error) {
            alert(error.message);
        });
}
