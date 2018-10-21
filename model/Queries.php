<?php
require_once('connect.php');
require_once ('C:\wamp64\www\CommentS\components\Components.php');
class Queries  extends Connect {
    private $compObj ;
    private $post_body ,$topic , $id ;
    public $p ="This is Queries" ;
    public function __construct()
    {
        $this->compObj = new Components();
        parent::__construct();
    }
    public function add_to($post_body ,$topic){
        $this->post_body = $post_body ;
        $this->topic = $topic ;
        $query = 'insert into `posts`(`post_body`,`topic`) values(
                    ?,
                    ?
                    )';
        echo $this->execute($query ,'insert');
    }
    public function edit($id,$topic,$post_body){
        $this->id = $id;
        $this->post_body = $post_body ;
        $this->topic = $topic ;
        $query = "UPDATE `posts` SET `topic`= ? ,post_body = ? WHERE `post_id` = ?";
        echo $this->execute($query,'edit');
    }
    public function delete($id){
        $this->id = $id ;
        $query = 'DELETE FROM `posts` WHERE  `post_id` = ?';
        echo $this->execute($query ,'delete');
    }
    public function fetch_results(){
        $query = 'SELECT * FROM `posts` ORDER BY `post_id` ';
        $result = $this->con->query($query);
        return $result ;
    }
    private function get_likes($id){
        $get_like = 'SELECT `post_likes` FROM `posts` where `post_id` = ? ';
        $stmt = $this->con->prepare($get_like);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->bind_result($like);
        while ($stmt->fetch()) {
            return $like;
        }
    }
    public function like_dislike($id,$bool){
        $query = 'UPDATE `posts` SET `post_likes`= ?  WHERE `post_id` = ?';
        $stmt = $this->con->prepare($query);
        if($bool){
            $likeAct = $this->get_likes($id) + 1 ;
        }else{
            $likeAct = $this->get_likes($id) - 1 ;
        }
        $stmt->bind_param('ii',$likeAct,$id);
        $stmt->execute();
    }

    private function execute($query, $typeOfQ){
        $stmt = $this->con->prepare($query);
        if ($stmt) {
            if ($typeOfQ == 'insert') {
                $stmt->bind_param('ss', $this->post_body, $this->topic);
            } elseif ($typeOfQ == 'delete') {
                $stmt->bind_param('i',$this->id);
            } elseif ($typeOfQ == 'edit') {
                $stmt->bind_param('ssi',$this->topic,$this->post_body,$this->id);
            }
            $stmt->execute();
        }else{
            echo "<p class='error'>"."recheck your query"."</p>";
        }
        return ($stmt->affected_rows)? $this->compObj->success($typeOfQ ,"Successfully") :$this->compObj->error($typeOfQ ,"Error") ;
    }
}


