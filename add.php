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

        <?php require("database.php") ?>
        <?php
        $title = "";
        $author = "";
        $isbn = "";
        $quantity = "";
        $image = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_REQUEST['Title'];
            $author = $_REQUEST['Author'];
            $isbn = $_REQUEST['ISBN'];
            $quantity = $_REQUEST['Quantity'];
            $image = $_REQUEST['Picture'];
            $valid = true;

            echo '<div class="my-3">';

            if (empty($title)) {
                echo "<h6 class='alert alert-danger my-1'> Title is required </h6>";
                $valid = false;
            }
            if (empty($author)) {
                echo "<h6 class='alert alert-danger my-1'> Author is required </h6>";
                $valid = false;
            }
            if (empty($isbn)) {
                echo "<h6 class='alert alert-danger my-1'> ISBN is required </h6>";
                $valid = false;
            }
            if (empty($quantity)) {
                echo "<h6 class='alert alert-danger my-1'> Quantity is required </h6>";
                $valid = false;
            }
            if (empty($image)) {
                echo "<h6 class='alert alert-danger my-1'> Picture is required </h6>";
                $valid = false;
            }

            echo '</div>';

            if ($valid) {
                try {
                    $sql = "INSERT INTO books (Title, Author, ISBN, Quantity, Picture) VALUES ('{$title}', '{$author}', '{$isbn}', '{$quantity}', '{$image}')";
                    $conn->query($sql);
                    header("location:add.php");
                } catch (PDOException $error) {
                    echo $sql . "<br>" . $error->getMessage();
                }
            }
        }

        $conn = null;
        ?>

        <h1 class="text-center">My<span>Book</span>List</h1>
        <section class="row my-4">
            <div class="">
                <label for="title" class="p-0 col-12">Title<br><input class="col-12" type="text"
                        value="<?php echo $title; ?>" id="title"></label>
            </div>
            <div class="">
                <label for="author" class="p-0 col-12">Author<br><input class="col-12" type="text"
                        value="<?php echo $author; ?>" id="author"></label>
            </div>
            <div class="">
                <label for="isbn" class="p-0 col-12">ISBN<br><input class="col-12" type="text"
                        value="<?php echo $isbn; ?>" id="isbn"></label>
            </div>
            <div class="">
                <label for="quantity" class="p-0 col-12">Quantity<br><input class="col-12" type="text"
                        value="<?php echo $quantity; ?>" id="quantity"></label>
            </div>
            <div class="">
                <label for="image" class="p-0 col-12">Picture<br><input class="col-12" type="file"
                        value="<?php echo $image; ?>" id="image"></label>
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