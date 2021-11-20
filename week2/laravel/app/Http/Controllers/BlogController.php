<?php 
namespace App\Http\Controllers;
use App\Http\Api\BlogDatabase;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function showBlog(Request $request){
        $data = null;

        $blogs = new BlogDatabase();
        $data = $blogs->get_blogs();

        return view('pages.blog', ['data' => $data]);
    }

    public function showPost(Request $request){
        $blog_id = $request->slug;
        $data = null;
        $blog_name = null;

        $blogs = new BlogDatabase();
        $data = $blogs->get_posts($blog_id);
        $blog_name = $blogs->get_blog_by_id($blog_id);

        return view('pages.post', ['data' => $data, 'name' => $blog_name, 'id' => $blog_id]);
    }

    public function insertPost(Request $request){
        $blogs = new BlogDatabase();
        $blogs->insert_post($request->slug, $_POST['title'], $_POST['content']);

        return view('pages.result');
    }

    public function updatePost(){
        $blogs = new BlogDatabase();
        $blogs->update_post($_POST['post_id'], $_POST['title'], $_POST['content']);

        return view('pages.result');
    }

    public function deletePost(){
        $blogs = new BlogDatabase();
        $blogs->delete_post($_POST['post_id']);

        return view('pages.result');
    }
}
