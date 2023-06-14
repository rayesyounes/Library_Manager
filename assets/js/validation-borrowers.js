let validation = new JustValidate("#add_borrower");
validation
    .addField("#user_cin", [
        {
            validator: (value) => {
                return () => {
                    return new Promise((resolve, reject) => {
                        fetch("validate-cin.php?cin=" + encodeURIComponent(value))
                            .then(function (response) {
                                return response.json();
                            })
                            .then(function (json) {
                                // If the CIN is available in the database, resolve with false
                                resolve(!json.available);
                            })
                            .catch(function (error) {
                                reject(error);
                            });
                    });
                };
            },
            errorMessage: "The Cin is not exist"
        },
        {
            rule: "required"
        }
    ])
    .addField("#book_isbn", [
        {
            rule: "required"
        },
        {
            validator: (value) => {
                return () => {
                    return new Promise((resolve, reject) => {
                        fetch("validate-isbn.php?isbn=" + encodeURIComponent(value))
                            .then(function (response) {
                                return response.json();
                            })
                            .then(function (json) {
                                // If the ISBN is available in the database, resolve with false
                                resolve(!json.available);
                            })
                            .catch(function (error) {
                                reject(error);
                            });
                    });
                };
            },
            errorMessage: "The ISBN is not exist"
        }
    ])


    .addField("#return_date", [
        {
            rule: "required"
        }
    ])
    .onSuccess((event) => {
        document.getElementById("add_borrower").submit();
    });
