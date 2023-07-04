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


// Get references to the modals
const bookModal = document.getElementById("BookModal");
const borrowerModal = document.getElementById("addBorrowerModal");

// Get references to the buttons in the modals
const orderButton = document.querySelector("#BookModal .modal-content .btn[name='order_book']");
const cancelButton = document.getElementById("hide_addModal_Button");

// Add click event listener to the "Order" button
orderButton.addEventListener("click", function () {
    // Hide the book modal
    bookModal.style.display = "none";

    // Display the add borrower modal
    borrowerModal.style.display = "block";
});

// Add click event listener to the "Cancel" button in the add borrower modal
cancelButton.addEventListener("click", function () {
    // Hide the add borrower modal
    borrowerModal.style.display = "none";

    // Display the book modal
    bookModal.style.display = "block";
});

const addBorrowerModal = document.getElementById("addBorrowerModal");

orderButton.addEventListener("click", function () {
    // Hide the book modal
    bookModal.style.display = "none";

    // Get the book ID, ISBN, and title
    const bookID = document.getElementById("id_hidden").value;
    const bookISBN = document.getElementById("isbn").value;
    const bookTitle = document.getElementById("title").value;

    // Fill the addBorrowerModal fields with the book ID, ISBN, and title
    document.getElementById("book_id").value = bookID;
    document.getElementById("book_isbn").value = bookISBN;
    document.getElementById("book_title").value = bookTitle;

    // Display the add borrower modal
    addBorrowerModal.style.display = "block";
});


let validation = new JustValidate("#add_borrower");
validation.addField("#return_date", [
    {
        rule: "required"
    }
])
    .onSuccess((event) => {
        document.getElementById("add_borrower").submit();
    });


const showEntriesSelect = document.getElementById("showEntriesSelect");
showEntriesSelect.addEventListener("change", function () {

    const selectedValue = this.value;

    const bookElements = document.querySelectorAll("#bookSection .book");

    for (let i = 0; i < bookElements.length; i++) {
        if (selectedValue === "all" || i < selectedValue) {
            bookElements[i].style.display = "block";
        } else {
            bookElements[i].style.display = "none";
        }
    }
});
