<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Extinct Test</title>
    <link rel="stylesheet" href="phpTest.css">
</head>
<body>
<?php
    // $db_url = getenv("DATABASE_URL") ?: "postgres://user:pass@host:port/dbname";
    // echo "$db_url\n";

    // $db = pg_connect($db_url);
    // if($db) {echo "connected";} else {echo "not connected";}

    // $selectSql = "SELECT ingredient FROM ingredients";
    // $result =  pg_query($db, $selectSql);

    // while ($row = pg_fetch_row($result)) {
    //     var_dump($row);
    // }
    $db = parse_url(getenv("DATABASE_URL"));

    $pdo = new PDO("pgsql:" . sprintf(
        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
    ));
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    // $stmt = $pdo->query('SELECT * FROM ingredients');

    // while($row = $stmt->fetch()){
    //    echo $row->ingredient . '<br/>';
    // }    

    $title = 'POST ONE';
    $body = 'THIS IS A POST';
    $author = 'SCROOGE MCDUCK';

    $sql = 'INSERT INTO posts(title, body, author) VALUES (:title, :body, :author)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['title' => $title, 'body' => $body, 'author' => $author]);
    echo 'Post added!';


?>

<html>
<body>


</body>
</html>