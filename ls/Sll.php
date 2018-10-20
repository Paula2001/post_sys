<?php
define('ROOT',dirname(__FILE__));
echo ROOT ;
require_once('Node.php');
require_once ('C:\wamp64\www\CommentS\Queries.php');

class Sll extends Queries
{
    public $head = NULL;
    private $size = 0;

    public function insert($id, $name, $comment)
    {
        $newNode = new Node($id, $name, $comment);
        if ($this->head == NULL) {
            $this->head = $newNode;
        } else {
            $newNode->next = $this->head;
            $this->head = $newNode;
        }
    }

    public function insert_into_linked()
    {
        foreach ($this->fetch_results() as $re) {
            $this->insert($re['name'], $re['com_body'], $re['comment_id']);
        }
    }

    public function delete($id)
    {
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

    public function print()
    {
        $pointer = $this->head;
        while ($pointer) {
            echo $pointer->id . " " . $pointer->name . " " . $pointer->comment . "<br>";
            $pointer = $pointer->next;
        }
            
        echo $this->size();
    }

}
    $s = new Sll();
    $s->insert_into_linked();
    $s->print();