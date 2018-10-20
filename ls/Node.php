<?php
    class Node{
        public $name ,$comment ,$id ;
        public $next ;
        public function __construct($id ,$name ,$comment)
        {
            $this->name = $name;
            $this->comment = $comment ;
            $this->id = $id ;
            $next = NULL ;
        }
    }