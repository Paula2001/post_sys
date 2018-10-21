<?php
    class Node{
        public $topic ,$comment ,$id ,$likes;
        public $next ;
        public function __construct($id ,$topic ,$comment ,$likes)
        {
            $this->topic = $topic;
            $this->likes = $likes;
            $this->comment = $comment ;
            $this->id = $id ;
            $next = NULL ;
        }
    }