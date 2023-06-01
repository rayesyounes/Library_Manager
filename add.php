<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- <script src="script.js" defer></script> -->
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
            $title = $_REQUEST['title'];
            $author = $_REQUEST['author'];
            $isbn = $_REQUEST['isbn'];
            $quantity = $_REQUEST['quantity'];
            $image = $_REQUEST['image'];
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
        ?>

        <h1 class="text-center">My<span>Book</span>List</h1>
        <section class="row my-4">
            <form method="POST">
                <div class="">
                    <label for="title" class="p-0 col-12">Title<br><input class="col-12" type="text"
                            value="<?php echo $title; ?>" name="title" id="title"></label>
                </div>
                <div class="">
                    <label for="author" class="p-0 col-12">Author<br><input class="col-12" type="text"
                            value="<?php echo $author; ?>" name="author" id="author"></label>
                </div>
                <div class="">
                    <label for="isbn" class="p-0 col-12">ISBN<br><input class="col-12" type="text"
                            value="<?php echo $isbn; ?>" name="isbn" id="isbn"></label>
                </div>
                <div class="">
                    <label for="quantity" class="p-0 col-12">Quantity<br><input class="col-12" type="text"
                            value="<?php echo $quantity; ?>" name="quantity" id="quantity"></label>
                </div>
                <div class="">
                    <label for="image" class="p-0 col-12">Picture<br><input class="col-12" type="file"
                            value="<?php echo $image; ?>" name="image" id="image"></label>
                </div>
                <div class="">
                    <label for="add-btn" class="p-0 pt-3 col-12"><button type="submit" id="add-btn"
                            class="btn btn-primary col-2 px-0">Add
                            Book</button></label>
                </div>
            </form>
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
                        
                    </tr>
                </thead>
                <tbody id="tbody">

                    <?php

                    $stmt = $conn->query("SELECT Title, Author, ISBN, Quantity, Picture FROM books");
                    // while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                    //     echo "<tr>
                    //         <td>{$row->nom}</td>
                    //         <td>{$row->prenom}</td>
                    //         <td>{$row->email}</td>
                    //         <td>{$row->telephone}</td>
                    //         <td><a class='btn btn-info my-1' href='edit.php?id={$row->id}'>Modifier</a></td>
                    //         <td><a class='btn btn-danger my-1' href='delete.php?id={$row->id}'>Supprimer</a></td>
                    //     </tr>";
                    // }
                    
                    $data = $stmt->fetchAll(PDO::FETCH_OBJ);
                    foreach ($data as $row) {
                        echo "<tr>
                        <td>{$row->Title}</td>
                        <td>{$row->Author}</td>
                        <td>{$row->ISBN}</td>
                        <td>{$row->Quantity}</td>
                        <td><img src=\"{$row->Picture}\" style=\"max-width:150px;\"></td>

                        <td><a class='btn btn-info my-1' href='edit.php?id={$row->ID_Book}'>Modifier</a></td>
                        <td><a class='btn btn-danger my-1' href='delete.php?id={$row->ID_Book}'>Supprimer</a></td>
                    </tr>";
                    }

                    $conn = null;
                    ?>

                </tbody>
            </table>
    </main>
</body>





</html>