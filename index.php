
<html>
<head>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<form action="index.php" method="post">
    <input  class='input_name' placeholder="Topic " name="topic" type="text">
    <textarea class="input_text" placeholder="What do you want to write about ? " name="post_body"></textarea>
    <button class="btn"  type="submit" value="Post" name="submit" >POST</button>
</form>

<?php
require_once ('ls\Sll.php');
require_once ('controller\Controller.php');
?>

<script src="js/main.js"></script>

</body>

</html>

