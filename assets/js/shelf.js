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