<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];

    $image_name = "";
    if (isset($_FILES["image"])) {
        $image_name = uniqid() . ".jpg";
        $save_image = $_SERVER["DOCUMENT_ROOT"] . "/images/" . $image_name;
        move_uploaded_file($_FILES["image"]["tmp_name"], $save_image); //зберігаємо фото на сервер
    }
    include($_SERVER["DOCUMENT_ROOT"] . "/config/connection_database.php");
    global $pdo;
    $sql = "INSERT INTO categories (name, image, description) VALUES (?, ?, ?)";
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
    <title>Create category</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="container">
        <?php
        $path = $_SERVER["DOCUMENT_ROOT"];
        include($path . "/_header.php");
        ?>

        <?php echo "<h1 class='text-center'>Add new</h1>" ?>

        <form class="offset-md-3 col-md-6 w-50" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>

            <div class="mb-3 d-flex justify-content-center w-100">
                <img id="preview" class="w-100 pointer" onclick="chooseImage()">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" rows="5" id="description" name="description"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
        </form>


    </div>

    <script src="/js/previewImage.js"></script>

    <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>