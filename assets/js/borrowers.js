// Get references to the button, modal, and hide button
const addBorrowerButton = document.getElementById('addBorrowerButton');
const addBorrowerModal = document.getElementById('addBorrowerModal');
const hide_addModal_Button = document.getElementById('hide_addModal_Button');

// Add click event listener to the button
addBorrowerButton.addEventListener('click', function (event) {
    event.preventDefault(); // Prevent the default behavior of the hyperlink

    addBorrowerModal.style.display = 'block'; // Show the modal
});

// Add click event listener to the hide button
hide_addModal_Button.addEventListener('click', function () {
    addBorrowerModal.style.display = 'none'; // Hide the modal
});