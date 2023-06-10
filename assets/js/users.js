// Get references to the button, modal, and hide button
const addUserButton = document.getElementById('addUserButton');
const addUserModal = document.getElementById('addUserModal');
const hideModalButton = document.getElementById('hideModalButton');

// Add click event listener to the button
addUserButton.addEventListener('click', function (event) {
    event.preventDefault(); // Prevent the default behavior of the hyperlink

    addUserModal.style.display = 'block'; // Show the modal
});

// Add click event listener to the hide button
hideModalButton.addEventListener('click', function () {
    addUserModal.style.display = 'none'; // Hide the modal
});

function editUser(userId) {
    // Handle edit button click event
    console.log("Edit user with ID: " + userId);
    // Add your logic for editing the user here
}

function deleteUser(userId) {
    // Handle delete button click event
    console.log("Delete user with ID: " + userId);
    // Add your logic for deleting the user here
}