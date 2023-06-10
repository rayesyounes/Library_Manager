let validation_login = new JustValidate("#login_form");
validation_login
    .addField("#email", [
        {
            rule: "required"
        },
        {
            rule: "email"
        }
    ])
    .addField("#password", [
        {
            rule: "required"
        }
    ])
    .onSuccess((event) => {
        document.getElementById("login_form").submit();
    });

