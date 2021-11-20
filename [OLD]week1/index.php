<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('db_operations.php') ?>
    <meta charset="UTF-8">
    <title>Week1</title>
</head>
<style type="text/css">
    div{
        margin-bottom: 30px;
    },
    input{
        margin-bottom: 5px;
    },
    table,tr,td,th{
		border: 1px solid black;
		border-collapse: collapse;
		padding: 8px;
    },
	td{
		width: 50px;
	}
</style>

<body>
    <div>
        <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>

        <div id="select_div">
            <?php $users = new UsersDatabase("127.0.0.1", "root", NULL, "uni_db", "USERS") ?>

            <table>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>surname</th>
                    <th>birthday</th>
                    <th>registered at</th>
                </tr>

                <?php foreach($users->display_table() as $data_row): ?>
                    <tr>
                        <td><?php echo $data_row["id"] ?></td>
                        <td><?php echo $data_row["name"] ?></td>
                        <td><?php echo $data_row["surname"] ?></td>
                        <td><?php echo $data_row["birthday"] ?></td>
                        <td><?php echo $data_row["registered_at"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
            <?php unset($users) ?>
        </div>

        <div id="insert_div">
            <p>Insert a new row:</p>
            <form action="insert.php", method="POST", target="dummyframe">
                <input type="text", name="name", placeholder="name">
                <input type="text", name="surname", placeholder="surname">
                <input type="date", name="birthday">
                <input type="text", name="registered_at", placeholder="registered at">
                <input type="submit", value="insert row">
            </form>
        </div>

        <div id="update_div">
            <p>Update a row:</p>
            <form action="update.php", method="POST", target="dummyframe">
                <input type="number", name="id", min="1", placeholder="id">
                <input type="text", name="name", placeholder="name">
                <input type="text", name="surname", placeholder="surname">
                <input type="date", name="birthday">
                <input type="text", name="registered_at", placeholder="registered at">
                <input type="submit", value="update row">
            </form>
        </div>

        <div id="delete_div">
            <p>Delete a row:</p>
            <form action="delete.php", method="POST", target="dummyframe">
                <input type="number", name="id", min="1", placeholder="id">
                <input type="submit", value="delete row">
            </form>
        </div>
    </div>
</body>
</html>