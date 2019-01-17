<?php session_start();
$id=$_SESSION['id'];
$conn = new mysqli("localhost","root","","project");
$sql="SELECT * FROM students WHERE id=$id;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<html>
<head>
  <link rel="stylesheet" href="afterLogin.css">
  <script src="afterLogin.js"></script>
</head>
<body>
  <div class="header">
    <p class="head">Learning Resource Center</p>
    <p id="hello">Hello <?php echo $_SESSION['name']; ?>,</p>
  </div>


  <div class="sidemenu">
    <ul class="content">
          <li onclick=editProfile("editprofile")><a href="#">Edit Profile</a></li>
          <li onclick="mybooks()"><a href="#">My Books</a></li>
          <li onclick=changeDivision("dashboard")><a href="#">Dashboard</a></li>
          <li onclick = changeDivision("aboutus")><a href="#">About Us</a></li>
          <li><a href="logout.php">Logout</a></li>
</ul>
  </div>

  <!--Explore Div-->

  <div class="explore" id = "dashboard" style="display:block">
    <form name="searchToolbar">
      <input type = "text" id="search" oninput ="submitSearch()">
      <input type = "button" value="Search" id = "click" onclick="submitSearch()">
      <select name="categories" id="categories">
        <option value="All">All</option>
        <option value="title">Title</option>
        <option value="author">Author</option>
        <option value="publisher">Publisher</option>
      </select>
      <p id="book_not_avail"></p>
    </form>
    <table class="searchTable">
    <tr>
      <th>Hold</th>
      <th align="center">Title</th>
      <th>Author</th>
      <th>Available</th>
      <th>Rating</th>
    </tr>
    <tr>
      <td id="check_1"></td>
      <td id="title_1"></td>
      <td id="author_1"></td>
      <td id="avail_1"></td>
      <td id="rating_1"></td>
    </tr>
    <tr>
      <td id="check_2"></td>
      <td id="title_2"></td>
      <td id="author_2"></td>
      <td id="avail_2"></td>
      <td id="rating_2"></td>
    </tr>
    <tr>
      <td id="check_3"></td>
      <td id="title_3"></td>
      <td id="author_3"></td>
      <td id="avail_3"></td>
      <td id="rating_3"></td>
    </tr>
    <tr>
      <td id="check_4"></td>
      <td id="title_4"></td>
      <td id="author_4"></td>
      <td id="avail_4"></td>
      <td id="rating_4"></td>
    </tr>
  </table>
  <button id='hold' onclick = hold_book(<?php echo $_SESSION['id'];?>) >HOLD</button>
    </div>
      <div class="explore" id = "editprofile" style = "display:none">
        <form>
        <div class="after">
        Name <input type="text"  id="form_1"  name = "form_1" value=<?php echo $row['name'];?>  disabled readonly><br>
        </div>
        <div class="after1">
         Enroll <input type="text" name = "form_2" value=<?php echo $row['id'];?>  disabled  readonly   ><br>
        </div>
        <div class="after2">
        Email <input type="text"  id="form_2" name = "form_3" value=<?php echo $row['email'];?>   disabled readonly> <br>
        </div>
        <div class="after3">
        DOB <input type="date"  id="form_3" name = "form_dob" value = <?php echo $row['dob'];?> readonly><br>
        </div>
        <div class="after4">
        Gender <input type="text" id="form_gender"  name = "form_gender" value=<?php echo $row['gender'];?> required><br>
        </div>
        <div class="after5">
        Hosteller <input type="text"  id="form_hosteller" name = "form_hosteller" value=<?php echo $row['hostller'];?> required><br>
        </div>
        <div class="after6">
        Batch <input type="text"  id="form_batch" name = "form_batch" value=<?php echo $row['batch'];?> required><br>
        </div>
        <div class="after7">
        Address <input type="text"  id="form_address"  name = "form_address" value=<?php echo $row['address'];?> required ><br>
        </div>
        <div class="after8">
        Groups <input type="text"   id="form_groups" name = "form_groups" value=<?php echo $row['groups'];?> required><br>
        </div>
        <div class="after9">
        Phone <input type="text"  id="form_phone" name = "form_phone" value=<?php echo $row['phone'];?> required><br><br>
      </div>
        <input type="button" value="Submit" onclick = 'saveData()' id="hidd">
      </form>
      </div>
      <div class = 'explore' id='issueholdbooks' style="display:none">
        <p id = 'held_books'>HELD BOOKS</p>
        <table id = "hold_table">
        </table>
        <p id = 'issued_books'>ISSUED BOOKS</p>
        <table id = 'issue_book'>
          </table>
      </div>
      <div class="explore" id="aboutus" style="display:none">
        <div class="box1">
          <h1 class="text1">Anubhav Sinha</h1>
          <br>
          <h1 class="enroll1">17103135</h1>
          <br>
          <a href="https://github.com/anubhavsinha98" class="profile1" target="_blank">Github Profile</a>
        </div>
        <div class="box2">
          <h1 class="text2">Astitva Singhal</h1>
          <br>
          <h1 class="enroll2">17103136</h1>
          <br>
          <a href="https://github.com/AstitvaSinghal" class="profile2" target="_blank">Github Profile</a>
        </div>
        <div class="box3">
          <h1 class="text3">Rachit Goel</h1>
          <br>
          <h1 class="enroll3">17103146</h1>
          <br>
          <a href="https://github.com/goel-rachit598" class="profile3" target="_blank">Github Profile</a>
        </div>
        <div class="box4">
          <h1 class="text4">Prajwal Singla</h1>
          <br>
          <h1 class="enroll4">17103162</h1>
          <br>
          <a href="https://github.com/prj1999" class="profile4" target="_blank">Github Profile</a>
        </div>
      </div>


</body>
</html>
