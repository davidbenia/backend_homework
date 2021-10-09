<?php declare(strict_types=1); include("db_operations.php");

    $users = new UsersDatabase("127.0.0.1", "root", NULL, "uni_db", "USERS");

    if(isset($_POST['id']))
    {
        $users->delete_from_table($_POST['id']);
    }
    else
    {
        die("missing data");
    }

?>