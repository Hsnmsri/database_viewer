<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Bootstrap 5 -->

    <?php

    require_once("config.php");

    // DataBase config
    $db_Connection = mysqli_connect(
        APP_CONFIG["database_config"]["host"],
        APP_CONFIG["database_config"]["username"],
        APP_CONFIG["database_config"]["password"],
        APP_CONFIG["database_config"]["database"]
    );

    if (isset($_POST['table_name']) && (!empty($_POST['table_name']))) {
        $table_name = trim($_POST['table_name']);
        require("components/datashow.component.php");
    } else {
        require("components/TableList.component.php");
    }
    ?>

</body>

</html>