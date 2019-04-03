<!DOCTYPE HTML>
<html>
<head>
  <title>PHP: Array</title>
</head>
<body>

<?php
 public function data_connection()
    {
        $this->conn=new mysqli("localhost", "dot_user", "Vb5YDh4m00!hjtNY7*^", "DOTs");
        if ($this->conn->connect_errno) {
            echo "Failed to connect to database...";
            exit;
        }
    }
?>



</body>
</html>

