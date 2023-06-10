let validation_user = new JustValidate("#add_user");
validation_user
    .addField("#first_name", [
        {
            rule: "required"
        },
        {
            rule: 'minLength',
            value: 4,
        }
    ])
    .addField("#last_name", [
        {
            rule: "required"
        },
        {
            rule: 'minLength',
            value: 4,
        }
    ])
    .addField("#cin", [
        {
            rule: "required"
        },
        {
            validator: (value) => () => {
                return fetch("validate-cin.php?cin=" + encodeURIComponent(value))
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (json) {
                        return json.available;
                    });
            },
            errorMessage: "The Cin is already exist"
        }
    ])
    .addField("#phone", [
        {
            rule: "required"
        },
        {
            validator: (value) => () => {
                return fetch("validate-phone.php?phone=" + encodeURIComponent(value))
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (json) {
                        return json.available;
                    });
            },
            errorMessage: "This phone is already taken"
        },
        {
            rule: 'number',
        },
        {
            rule: 'minLength',
            value: 10,
        }
    ])
    .addField("#email", [
        {
            rule: "required"
        },
        {
            rule: "email"
        },
        {
            validator: (value) => () => {
                return fetch("validate-email.php?email=" + encodeURIComponent(value))
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (json) {
                        return json.available;
                    });
            },
            errorMessage: "This email is already taken"
        }
    ])
    .addField("#password", [
        {
            rule: "required"
        },
        {
            rule: "password"
        }
    ])
    .onSuccess((event) => {
        document.getElementById("add_user").submit();
    });