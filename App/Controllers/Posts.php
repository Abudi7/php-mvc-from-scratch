<?php
namespace App\Controllers;

use \Core\View;
use \App\Models\Post;
/**
 * Posts controller
 *
 * PHP version 8.1
 */
class Posts extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
           
        //echo 'Hello from the index action in the Posts controller!';
        // echo '<p>Query string parameters: <pre>' .
        //      htmlspecialchars(print_r($_GET, true)) . '</pre></p>';
        $posts = Post::getAll();

        View::renderTemplate('Posts/index.html', [
            'posts' => $posts
        ]);
    
    }

    /**
     * Show the add new page
     *
     * @return void
     */
    public function addNewAction()
    {
        echo 'Hello from the addNew action in the Posts controller!';
    }

    /**
     * Show the edit page
     * @return  void
     */
    public function editAction()
    {
        # code...
        echo 'Hello From the edit action in the Posts controller';
        echo '<p>Query string parameters: <pre>' .
             htmlspecialchars(print_r($this->routeParams, true)) . '</pre></p>';;
    }
}