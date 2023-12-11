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
        include($path . "/config/connection_database.php");

        global $pdo;

        $stmt = $pdo->prepare('SELECT id, Name, Description, Image FROM list');
        $stmt->execute();

        $result = $stmt->fetchAll();
        ?>

        <?php echo "<h1 class='text-center'>List</h1>" ?>

        <a href="/create.php" class="btn btn-primary mb-3">Add new</a>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($result as $item) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $item["id"]?></th>
                        <td>
                            <img src="/images/<?php echo $item["Image"]?>" alt="Cat with laptop" width="100">
                        </td>
                        <td><?php echo $item["Name"]?></td>
                        <td><?php echo $item["Description"]?></td>
                        <td>
                            <a href="#" class="btn btn-info">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>

                <?php } ?>

            </tbody>
        </table>

    </div>

    <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>