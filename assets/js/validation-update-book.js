let validation_update_book = new JustValidate("#update_book");
validation_update_book
    .addField("#update_title", [
        {
            rule: "required"
        }
    ])
    .addField("#update_author", [
        {
            rule: "required"
        }
    ])
    .addField("#update_isbn", [
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
        }
    ])
    .addField("#update_quantity", [
        {
            rule: "required"
        },
        {
            rule: 'number',
        }
    ])
    .onSuccess((event) => {
        document.getElementById("update_book").submit();
    });