<?php
if($_SERVER["REQUEST_METHOD"]=="POST") {
    $name = $_POST["Name"];
    $description = $_POST["Description"];
    
    $image_name="";
    if(isset($_FILES["Image"])) {
        $image_name = uniqid().".jpg";
        $save_image = $_SERVER["DOCUMENT_ROOT"]."/images/".$image_name;
        move_uploaded_file($_FILES["Image"]["tmp_name"], $save_image); //зберігаємо фото на сервер
    }
    include($_SERVER["DOCUMENT_ROOT"]."/config/connection_database.php");
    global $pdo;
    $sql = "INSERT INTO list (Name, Image, Description) VALUES (?, ?, ?)";
    $command = $pdo->prepare($sql);
    $command->execute([$name, $image_name, $description]);

    header("Location: ../");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <?php
        $path = $_SERVER["DOCUMENT_ROOT"];
        include($path . "/_header.php");
        ?>

        <?php echo "<h1 class='text-center'>Add new</h1>" ?>

        <form class="offset-md-3 col-md-6" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="Name" name="Name" required>
            </div>

            <div class="mb-3">
                <label for="Image" class="form-label">Image</label>
                <input type="file" class="form-control" id="Image" name="Image" required>
            </div>

            <div class="mb-3">
                <label for="Description" class="form-label">Description</label>
                <textarea class="form-control" rows="5" id="Description" name="Description"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
        </form>

    </div>

    <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>