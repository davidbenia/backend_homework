<?php declare(strict_types=1); include("db_operations.php");

    $users = new UsersDatabase("127.0.0.1", "root", NULL, "uni_db", "USERS");

    if(isset($_POST['name'], $_POST['surname'], $_POST['birthday'], $_POST['registered_at']))
    {
        $birthday_html_format = $_POST['birthday'];
        $birthday_mysql_format = date("Y-m-d",strtotime($birthday_html_format));

        $users->insert_into_table($_POST['name'], $_POST['surname'], $birthday_mysql_format, $_POST['registered_at']);
    }
    else
    {
        die("missing data");
    }

?>