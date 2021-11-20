<?php declare(strict_types=1);

    final class UsersDatabase
    {
        private $server_address;
        private $username;
        private $password;
        private $db_name;
        private $table_name;
        private $db_connection;

        function __construct($server_address, $username, $password, $db_name, $table_name)
        {
            $this->server_address = $server_address;
            $this->username = $username;
            $this->password = $password;
            $this->db_name = $db_name;
            $this->table_name = $table_name;
        }

        private function establish_connection() : void
        {
            $this->db_connection = new mysqli($this->server_address, $this->username, $this->password, $this->db_name);

            if($this->db_connection->connect_error)
            {
                die($this->db_connection->connect_error);
            }
        }

        public function display_table() : array
        {
            $this->establish_connection();

            $select_statement = "SELECT * FROM $this->table_name";
            $select_query = $this->db_connection->query($select_statement);
            $results = array();

            while($row = $select_query->fetch_assoc())
            {
                array_push($results, $row);
            }

            $this->db_connection->close();
            return $results;
        }

        public function insert_into_table($name, $surname, $birthday, $registered_at) : void
        {
            $this->establish_connection();

            $a = "'".$name."'";
            $b = "'".$surname."'";
            $c = "'".$birthday."'";
            $d = "'".$registered_at."'";

            $insert_statement = "INSERT INTO USERS (name, surname, birthday, registered_at) VALUES ($a, $b, $c, $d)";

            $this->db_connection->query($insert_statement);

            $this->db_connection->close();
        }

        public function update_table($id, $name, $surname, $birthday, $registered_at) : void
        {
            $this->establish_connection();

            $a = "'".$name."'";
            $b = "'".$surname."'";
            $c = "'".$birthday."'";
            $d = "'".$registered_at."'";

            $update_statement = "UPDATE $this->table_name SET name=$a, surname=$b, birthday=$c, registered_at=$d WHERE id=$id";

            $this->db_connection->query($update_statement);

            $this->db_connection->close();
        }

        public function delete_from_table($id) : void
        {
            $this->establish_connection();

            $delete_statement = "DELETE FROM $this->table_name WHERE id=$id";

            $this->db_connection->query($delete_statement);

            $this->db_connection->close();
        }
    }

?>