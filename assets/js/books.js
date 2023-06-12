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