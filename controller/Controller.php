<?php
require_once ('C:\wamp64\www\CommentS\index.php');
require_once ('C:\wamp64\www\CommentS\model\Queries.php');
require_once ('C:\wamp64\www\CommentS\components\Components.php');
require_once ('C:\wamp64\www\CommentS\ls\Sll.php');
class Controller extends Queries {
    public $comObj ;
    public $Sll ;
    public function __construct()
    {
        $this->Sll = new Sll();
        $this->comObj = new Components();
        parent::__construct();
    }

    private function insert_controller(){

        $topic = htmlentities($_POST['topic']);
        $post_body = htmlentities($_POST['post_body']);
        $this->add_to($post_body,$topic);
    }
    public function valid_topic_body(){
        if(empty($_POST['topic']) || empty($_POST['post_body'] )){
            echo $_POST['topic'];
            echo $this->comObj->empty_error();
        }else{
            $this->insert_controller();

        }
    }
}
$c = new Controller();
$c->Sll->print_results();
if(isset($_POST['submit'])){
    $c->valid_topic_body();
}
if(isset($_POST['like'])){
    $c->like_dislike($_POST['like'],true);
}
if(isset($_POST['dislike'])){
    $c->like_dislike($_POST['dislike'],false);
}
if (isset($_POST['delete'])){
    $c->delete($_POST['delete']);
}



