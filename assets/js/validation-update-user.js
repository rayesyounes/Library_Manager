let validation_update_user = new JustValidate("#update_user");
validation_update_user
    .addField("#update_first_name", [
        {
            rule: "required"
        },
        {
            rule: 'minLength',
            value: 4,
        }
    ])
    .addField("#update_last_name", [
        {
            rule: "required"
        },
        {
            rule: 'minLength',
            value: 4,
        }
    ])
    .addField("#update_cin", [
        {
            rule: "required"
        }
    ])
    .addField("#update_phone", [
        {
            rule: "required"
        },
        {
            rule: 'number',
        },
        {
            rule: 'minLength',
            value: 10,
        }
    ])
    .addField("#update_email", [
        {
            rule: "required"
        },
        {
            rule: "email"
        }
    ])
    .addField("#update_password", [
        {
            rule: "required"
        },
        {
            rule: "password"
        }
    ])
    .onSuccess((event) => {
        document.getElementById("update_user").submit();
    });