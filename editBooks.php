<?php
  $conn = new mysqli("localhost","root","","project");
  $id = $_POST['id'];
  $id_1 = $_POST['id_1'];
  $id_2 = $_POST['id_2'];
  $id_3 = $_POST['id_3'];
  $id_4 = $_POST['id_4'];
  $sql_1 = "UPDATE BOOKS b SET b.no_of_books_avail = b.no_of_books_avail - 1 WHERE title = '$id_1' OR title = '$id_2' OR title = '$id_3' OR title = '$id_4';";
  //echo $sql_1;
  $conn->query($sql_1);
  $sql_2 = "SELECT * FROM BOOKS WHERE title = '$id_1' OR title = '$id_2' OR title = '$id_3' OR title = '$id_4';";
  //echo $sql_2;
  $result = $conn->query($sql_2);
  while($row = $result->fetch_assoc())
  {  $a = $row['isbn'];
    $sql_3 = "INSERT INTO hold_book (id,isbn) values ($id,$a);";
    $conn->query($sql_3);
  }
  echo "DONE";
?>
