let validation_user = new JustValidate("#add_user");
validation_user
    .addField("#add_first_name", [
        {
            rule: "required"
        },
        {
            rule: 'minLength',
            value: 4,
        }
    ])
    .addField("#add_last_name", [
        {
            rule: "required"
        },
        {
            rule: 'minLength',
            value: 4,
        }
    ])
    .addField("#add_cin", [
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
    .addField("#add_phone", [
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
    .addField("#add_email", [
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
    .addField("#add_password", [
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