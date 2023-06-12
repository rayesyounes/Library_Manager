let validation_add_book = new JustValidate("#add_book");
validation_add_book
    .addField("#add_title", [
        {
            rule: "required"
        }
    ])
    .addField("#add_author", [
        {
            rule: "required"
        }
    ])
    .addField("#add_isbn", [
        {
            rule: "required"
        },
        {
            rule: 'minLength',
            value: 8,
        },
        {
            rule: 'maxLength',
            value: 10,
        },
        {
            validator: (value) => () => {
                return fetch("validate-isbn.php?isbn=" + encodeURIComponent(value))
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (json) {
                        return json.available;
                    });
            },
            errorMessage: "The ISBN is already exist"
        }
    ])
    .addField("#add_quantity", [
        {
            rule: "required"
        },
        {
            rule: 'number',
        }
    ])
    .addField("#add_picture", [
        {
            rule: "required"
        }
    ])
    .onSuccess((event) => {
        document.getElementById("add_book").submit();
    });