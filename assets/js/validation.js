// validation

const first_name = document.getElementById("first_name");
const last_name = document.getElementById("last_name");
const phone = document.getElementById("phone");
const cin = document.getElementById("cin");
const email = document.getElementById("email");
const password = document.getElementById("password");
const password2 = document.getElementById("password_confirm");
const form = document.getElementById("register_form");

form.addEventListener("submit", function (e) {
    e.preventDefault();
    validate();
});

function validate() {
    let first_name_value = first_name.value;
    let last_name_value = last_name.value;
    let phone_value = phone.value;
    let cin_value = cin.value;
    let email_value = email.value;
    let password_value = password.value;
    let password2_value = password2.value;
    let valid = true;


    if (first_name_value === "") {
        AfficherErreur(first_name, "FirstName Required");
        valid = false
    } else AfficherSucces(first_name);

    if (last_name_value === "") {
        AfficherErreur(last_name, "LastName Required");
        valid = false
    } else AfficherSucces(last_name);

    if (phone_value === "") {
        AfficherErreur(phone, "Phone Required");
        valid = false
    } else AfficherSucces(phone);

    if (cin_value === "") {
        AfficherErreur(cin, "Cin Required");
        valid = false
    } else AfficherSucces(cin);

    if (email_value === "") {
        AfficherErreur(email, "Email ");
        valid = false
    } else if (!email_value.match(/^[a-zA-Z0-9\.\-\_]+@[a-zA-Z0-9\-\_]+\.[a-z]{2,}$/)) {
        AfficherErreur(email, "Email n'est pas valide");
        valid = false
    } else AfficherSucces(email);

    if (password_value === "") {
        AfficherErreur(password, "Password ne peut pas être vide");
        valid = false
    } else if (!password_value.match(/^[a-zA-Z0-9]{6,}$/)) {
        AfficherErreur(password, "Password est trop court. Minimum 6 caractères");
        valid = false
    } else AfficherSucces(password);

    if (password2_value === "") {
        AfficherErreur(password2, "Password Check ne peut pas être vide");
        valid = false
    } else if (password_value !== password2_value) {
        AfficherErreur(password2, "Les mots de passe ne sont pas identiques");
        valid = false
    } else AfficherSucces(password2);

    if (valid) {
        document.getElementById("register_form").submit();
        console.log("valid");
    }
}

function AfficherErreur(input) {
    //Ajouter la classe error à la div form-control du input
    //Ajouter le message à la balise small adjacente
    input.classList.add("error-sign");
}

function AfficherSucces(input) {
    //Ajouter la classe success à la div form-control du input
    input.classList.remove("error-sign");
}
