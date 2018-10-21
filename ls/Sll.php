<?php
require_once('Node.php');
require_once ('C:\wamp64\www\CommentS\model\Queries.php');

class Sll extends Queries
{
    public $head = NULL;
    private $size = 0;
    public function __construct()
    {
        parent::__construct();
        foreach ($this->fetch_results() as $re) {
            $this->insert($re['post_id'], $re['topic'], $re['post_body'], $re['post_likes']);
        }

    }

    public function insert($id, $topic, $post,$likes)
    {
        $newNode = new Node($id, $topic, $post,$likes);
        if ($this->head == NULL) {
            $this->head = $newNode;
        } else {
            $newNode->next = $this->head;
            $this->head = $newNode;
        }
    }

    public function likeFunction($id ,$bool){
        $this->like_dislike($id ,$bool);
    }

    public function insert_into_linked($post_body,$topic,$likes)
    {
        $this->add_to($post_body,$topic,$likes);
        foreach ($this->fetch_results() as $re) {
            $this->insert($re['post_id'], $re['post_body'], $re['topic'] ,$re['post_likes']);
        }
    }

    public function delete_entry($id)
    {
        $this->delete($id);
        $pointer = $this->head;
        if ($pointer == NULL) {
            echo "No posts to be deleted";
        } else if ($id == 1) {
            $this->head = $this->head->next;
        } else {
            for ($i = 0; $i < $id - 2; $i++) {
                $pointer = $pointer->next;
            }
            $pointer->next = $pointer->next->next;
        }
    }

    public function size()
    {
        $pointer = $this->head;
        while ($pointer) {
            $this->size++;
            $pointer = $pointer->next;
        }
        return $this->size;
    }

    public function print_results()
    {
        $pointer = $this->head;
        while ($pointer) {
            echo '<comment_body>'.
            '<p id="id">'.$pointer->id.'</p>'.
            '<p  class="topic">' .$pointer->topic. '</p>'.
            '<p  class="comment">' .$pointer->comment. '</p>'.
            '<form  action="edit.php" method="get">'.
            '<input value="'.$pointer->id.'" type="hidden" name="id">'.
            '<button  type="submit" value="' .$pointer->id.'" name="edit" class="btns">Edit</button>'.
            '</form>'.
            '<form method="post" action="index.php">'.
                '<button  type="submit" value="'.$pointer->id.'" name="like" class="btns">LIKE</button>'.
                '<button  type="submit" value="'.$pointer->id.'" name="dislike" class="btns">DISLIKE</button>'.
                '<button  type="submit" value="'.$pointer->id.'" name="delete" class="btns">DELETE</button>'.
            '</form>'.
            '<p class="likes">'.$pointer->likes. '</p>'.
            '</comment_body>';
            $pointer = $pointer->next;
        }
        echo "Total of the posts : ".$this->size() ;
    }

}
