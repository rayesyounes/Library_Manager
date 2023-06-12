const changePhotoBtn = document.getElementById("changePhotoBtn");
const photoInput = document.getElementById("photoInput");
const profileImage = document.getElementById("profileImage");
const nav_profileImage = document.getElementById("nav_profileImage");

function submitForm() {
    const formData = new FormData();
    formData.append("id", document.getElementById("id_hidden").value);
    formData.append("photoInput", photoInput.files[0]);

    // Send an AJAX request to the server to update the avatar
    fetch("update_avatar.php", {
        method: "POST",
        body: formData,
    })
        .then((response) => response.text())
        .then((data) => {
            console.log(data);
        })
        .catch((error) => {
            console.error(error);
        });
}

changePhotoBtn.addEventListener("click", () => {
    photoInput.click();
});

photoInput.addEventListener("change", () => {
    const file = photoInput.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            profileImage.src = e.target.result;
            nav_profileImage.src = e.target.result;
            submitForm();
        };
        reader.readAsDataURL(file);
    }
});
