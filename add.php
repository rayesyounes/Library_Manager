<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>Books Manager</title>
</head>

<body>
    <main class="container my-4">
        <h1 class="text-center">My<span>Book</span>List</h1>
        <section class="row my-4">
            <div class="">
                <label for="title" class="p-0 col-12">Title<br><input class="col-12" type="text" id="title"></label>
            </div>
            <div class="">
                <label for="author" class="p-0 col-12">Author<br><input class="col-12" type="text" id="author"></label>
            </div>
            <div class="">
                <label for="isbn" class="p-0 col-12">ISBN<br><input class="col-12" type="text" id="isbn"></label>
            </div>
            <div class="">
                <label for="quantity" class="p-0 col-12">Quantity<br><input class="col-12" type="text"
                        id="quantity"></label>
            </div>
            <div class="">
                <label for="image" class="p-0 col-12">Picture<br><input class="col-12" type="file" id="image"></label>
            </div>
            <div class="">
                <label for="add-btn" class="p-0 pt-3 col-12"><button id="add-btn" class="btn btn-primary col-2 px-0">Add
                        Book</button></label>
            </div>
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
</body>





</html>