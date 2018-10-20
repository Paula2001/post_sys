<?php
require_once('connect.php');
class Queries  extends Connect {
    private $comment_body ,$name , $id ;
    public $p ="This is Queries" ;
    public function __construct()
    {
        parent::__construct();
    }
    public function add_to($c_b ,$n){
        $this->comment_body = $c_b ;
        $this->name = $n ;
        $query = 'insert into `comments`(`com_body`,`name`) values(
                    ?,
                    ?
                    )';
        echo $this->execute($query ,'insert');
    }
    public function edit($id,$n,$c_b){
        $this->id = $id;
        $this->comment_body = $c_b ;
        $this->name = $n ;
        $query = "UPDATE `comments` SET `name`= ? ,com_body = ? WHERE `comment_id` = ?";
        echo $this->execute($query,'edit');
    }
    public function delete($id){
        $this->id = $id ;
        $query = 'DELETE FROM `comments` WHERE  `comment_id` = ?';
        echo $this->execute($query ,'delete');
    }
    public function fetch_results(){
        $query = 'SELECT * FROM `comments` ';
        $result = $this->con->query($query);
        return $result ;
    }

    private function execute($query, $typeOfQ){
        $stmt = $this->con->prepare($query);
        if ($stmt) {
            if ($typeOfQ == 'insert') {
                $stmt->bind_param('ss', $this->comment_body, $this->name);
            } elseif ($typeOfQ == 'delete') {
                $stmt->bind_param('i',$this->id);
            } elseif ($typeOfQ == 'edit') {
                $stmt->bind_param('ssi',$this->name,$this->comment_body,$this->id);
            }
            $stmt->execute();
        }else{
            echo "<p class='error'>"."recheck your query"."</p>";
        }
        return ($stmt->affected_rows == 1)? "<p class='success'>". $typeOfQ."Succesfuly" ."</p>" : "<p class='error'>". "Error occared" ."</p>";
    }
}
$q = new Queries();
