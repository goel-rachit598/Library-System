<?php
  $conn = new mysqli("localhost","root","","project");
  session_start();
  $id = $_SESSION['id'];
  $type = $_POST['type'];
  $sql = "SELECT * FROM hold_book WHERE id = $id;";
  $result = $conn->query($sql);
  if($result->num_rows == 1)
  {
    $sql_1 = "DELETE FROM hold_book WHERE id = $id;";
    $conn->query($sql_1);
    echo 'DONE';
  }
  elseif($result->num_rows > 1){
    $row_1 = $result->fetch_assoc();
    $book_isbn_1 = $row_1['isbn'];
    $row_1 = $result->fetch_assoc();
    $book_isbn_2 = $row_1['isbn'];
  if($type == '1')
  {
    $sql_1 = "DELETE FROM hold_book WHERE id = $id AND isbn = $book_isbn_1;";
    $conn->query($sql_1);
  }
  elseif ($type == '2') {
    $sql_2 = "DELETE FROM hold_book WHERE id=$id AND isbn = $book_isbn_2;";
    $conn->query($sql_2);
  }
  echo "DONE";
}
?>
