// Get references to the button, modal, and hide button
const addUserButton = document.getElementById('addUserButton');
const addUserModal = document.getElementById('addUserModal');
const hide_addModal_Button = document.getElementById('hide_addModal_Button');

// Add click event listener to the button
addUserButton.addEventListener('click', function (event) {
    event.preventDefault(); // Prevent the default behavior of the hyperlink

    addUserModal.style.display = 'block'; // Show the modal
});

// Add click event listener to the hide button
hide_addModal_Button.addEventListener('click', function () {
    addUserModal.style.display = 'none'; // Hide the modal
});



// Get references to the button, modal, and hide button
const updateUserButtons = document.querySelectorAll('.updateUserButton');
const updateUserModal = document.getElementById('updateUserModal');
const hide_updateModal_Button = document.getElementById('hide_updateModal_Button');

// Add click event listener to the button

updateUserButtons.forEach(function (button) {
    button.addEventListener('click', function (event) {
        event.preventDefault();
        updateUserModal.style.display = 'block';
    });
});


// Add click event listener to the hide button
hide_updateModal_Button.addEventListener('click', function () {
    updateUserModal.style.display = 'none'; // Hide the modal
});



document.addEventListener('DOMContentLoaded', function () {
    var buttons = document.getElementsByClassName('updateUserButton');
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener('click', function () {
            var userId = this.getAttribute('id');
            fetchUserData(userId);
        });
    }
});

function fetchUserData(userId) {
    fetch('fetch_user_data.php?id=' + userId)
        .then(function (response) {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Error occurred while fetching user data');
            }
        })
        .then(function (data) {
            // Populate the form fields with the received data
            document.getElementById('update_first_name').value = data.First_Name;
            document.getElementById('update_last_name').value = data.Last_Name;
            document.getElementById('update_cin').value = data.Cin;
            document.getElementById('update_phone').value = data.Phone_Number;
            document.getElementById('update_email').value = data.Email;
            // document.getElementById('update_password').value = data.Pass_key;

            document.getElementById('id_hidden').value = data.ID_User;

            // Set the admin access checkbox
            document.getElementById('update_formCheck').checked = (data.Is_Admin === '1');
        })
        .catch(function (error) {
            alert(error.message);
        });
}

