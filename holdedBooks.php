  <?php
  session_start();
  $id = $_SESSION['id'];
  $conn = new mysqli("localhost","root","","project");
  $sql = "SELECT * FROM BOOKS WHERE isbn IN (SELECT isbn FROM hold_book WHERE id = 17103135);";
  $result = $conn->query($sql);
  $state = '';
  if($result->num_rows > 0)
  {
    while($row = $result->fetch_assoc())
    {
      $state .= $row['title'] .'*'. $row['author'] .'*';
    }
  }
  echo $state;

?>
