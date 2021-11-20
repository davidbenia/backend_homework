<?php declare(strict_types=1);
    namespace App\Http\Api;
    use Illuminate\Support\Facades\DB;

    final class BlogDatabase
    {
        private $db_connection;

        function __construct()
        {
            $this->establish_connection();
        }

        private function establish_connection() : void
        {
            try
            {
                $this->db_connection = DB::connection();
            }
            catch(Exception $e)
            {
                die("Database connection error.");
            }
        }

        public function get_blogs() : array
        {
            $select_statement = "SELECT * FROM blogs";
            $query_results = DB::select($select_statement);

            return $query_results;
        }

        public function get_posts($blog_id) : array
        {
            $select_statement = "SELECT * FROM posts WHERE id=?";
            $query_results = DB::select($select_statement, [$blog_id]);

            return $query_results;
        }

        public function get_blog_by_id($blog_id) : string
        {
            $select_statement = "SELECT * FROM blogs where id=?";
            $query_results = DB::select($select_statement, [$blog_id])[0]->blog_name;

            return $query_results;
        }

        public function insert_post($blog_id, $title, $content) : void
        {
            $insert_statement = "INSERT INTO posts (id, title, content) VALUES (?, ?, ?)";
            DB::insert($insert_statement, [$blog_id, $title, $content]);
        }

        public function update_post($post_id, $title, $content) : void
        {
            DB::update("UPDATE posts SET title=?, content=? WHERE id=?", [$title, $content, $post_id]);
        }

        public function delete_post($post_id) : void
        {
            DB::delete("DELETE FROM posts WHERE id=?", [$post_id]);
        }
    }

?>