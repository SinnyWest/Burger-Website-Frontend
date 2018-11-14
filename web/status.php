<?php
// Get Query String
    $db = parse_url(getenv("DATABASE_URL"));

    $conn = new PDO("pgsql:" . sprintf(
        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
    ));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    $stmt3 = $conn->query('select count(*) from orders where burgerstate like \'new\'');

    $stat = "";

    while($row = $stmt3->fetch(PDO::FETCH_ASSOC)){
        $stat = 'Your order number is <b>' . $row['ordernumber'];
    }

    echo $stat;
?>