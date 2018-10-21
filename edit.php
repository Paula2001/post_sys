<html>
<head>
    <link rel="stylesheet" href="css/main.css">
</head>
<?php
require_once ('ls/Sll.php');
require_once ('components/Components.php');
setcookie('id',$_GET['edit'],0);
class Edit extends Sll {
    public $id ;
    public $Comp ;

    public function edit_post($id, $topic, $post_body)
    {
        $this->edit($id, $topic, $post_body);
    }
}
$e = new Edit();
echo $_COOKIE['id'];
if(isset($_POST['edit'])) {
    if (isset($_COOKIE['id'])) {
        $e->edit($_COOKIE['id'], $_POST['topic_edit'], $_POST['post_edit']);
        header('Location: index.php');
        die();
    }else{
        echo $e->Comp->error('Cookie Expired !',': the system is build on cookies however go back 
        and be faster this time ;) ');
    }
}
?>
    <form action="edit.php" method="post">

    <input type="text" placeholder="Topic " class='input_name'  name="topic_edit">
    <textarea class='input_text' placeholder="What do you want to write about ? " name="post_edit"></textarea>
    <input name="edit" class="btn" type="submit">

</form>
<script src="js/main.js"></script>

</html>
