<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Books Manager</title>
</head>

<body>
    <main class="container my-4">
        <h1 class="text-center">My<span>Book</span>List</h1>
        <section class="row my-4">
            <label for="title" class="p-0">Title<br><input class="col-12" type="text" id="title" required></label>
            <label for="author" class="p-0">Author<br><input class="col-12" type="text" id="author" required></label>
            <label for="isbn" class="p-0">ISBN<br><input class="col-12" type="text" id="isbn" required></label>
            <label for="quantity" class="p-0">Quantity<br><input class="col-12" type="text" id="quantity"
                    required></label>
            <label for="image" class="p-0">Picture<br><input class="col-12" type="file" id="image" required></label>
            <label for="add" class="p-0 pt-3"><button onclick="valider()" id="add"
                    class="btn btn-primary col-2 px-0">Add Book</button></label>
        </section>
        <section class="row py-3">
            <table class="table table-striped col-12">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>ISBN</th>
                        <th>Quantity</th>
                        <th>Picture</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
            </table>
    </main>
    <script src="script.js"></script>
</body>





</html>