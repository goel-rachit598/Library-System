<html>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="home.css">
  <script src="home.js"></script>
</head>
<body>
  <div>
  <a href="" onclick=change_div("first")><img src="logo(1).png"></img></a>
  <h2>Jaypee Institute Of Information Technology</h2>
  <div class = "items">
  <ul>
    <li><a onclick = change_div("first")>HOME</a></li>
    <li><a onclick = change_div("logging")>LOG IN</a></li>
    <li><a onclick = change_div("signingup")>SIGN UP</a></li>
    <li><a onclick = change_div("aboutus")>ABOUT US</a></li>
  </ul>
  </div>
  <div class="main">
    <div id="first">
    <div class="boxes b1" style="display:block">
      <span class="boxtext"><blink>*New Books Arrived*</blink><br><br>C++ By K.C Gupta<br><br>Python By A.K Sharma<br><br>CSS By Prajwal Singla<br><br>HTML By Rachit Goel</span>
    </div>
    <div class = "boxes b2" style="display:block">
      <span class="boxtext"><span style="color:194ccb; font-size:22px;"><u>EVENTS</u> :</span><br><br>i. LRC Meetup 2K19<br><br>ii. ICTAC Summit 2K19<br><br>iii. ICSC Conference
        </span>
      </div>
    <div class = "boxes b3" style="display:block">
    <span class="boxtext" style="color: #1a5276"><marquee direction="up" scrollamount=3>"I have always imagined that Paradise will be a kind of library."- Jorge Luis Borges<br><br>
      "A university is just a group of buildings gathered around a library."- Shelby Foote</marquee></span>
    </div>
  </div>


    <div class="login" id="logging" style="display:none">
      <form id="loginform" method="post" action="login.php">
     <input autocomplete="off" type="text" name="enroll" placeholder="Enrollment No." class="input_user" id="loginEnroll">
     <input autocomplete="off" type="password" name="password" placeholder="Password" class="input_pass" id="loginPassword">
      <div class="submit">
        <div class="log_in" onclick="validateLogin()">
        LOG IN
      </div>
      <div class="register">
        <span id="not_reg">Not registered? </span><span id="create" onclick=change_div("signingup")>Create an account</span>
        <br><span id="forgot">Forgot Password?</span>
      </div>
      </div>
    </div>
  </form>

  <div class = "signup" id="signingup" style="display:none;">
    <form id="myForm">
     <input autocomplete="off" type="text" placeholder="Enrollment No." class="signup2 sign_enroll" id="enrollNo" oninput="validateEnroll()"><i class="material-icons" id="enrollDone"></i><p id="enrollExist"></p>
     <input autocomplete="off" type="text" placeholder="Name" class="signup2 sign_name" oninput="validateName()" id="signupName"><i class="material-icons" id="nameDone"></i>
     <input autocomplete="off" type="text" placeholder="Email" class="signup2 sign_email" oninput="validateEmail()" id="signupEmail"><i class="material-icons" id="emailDone"></i>
     <input autocomplete="off" type="password" placeholder="Password" class="signup2 sign_pass" oninput="validatePass();" id="signupPassword"><i class="material-icons" id="passDone"></i>
      <div class="sign_up">
      <div class="signup1" onclick="check_signup()">SIGN UP</div>
    </div>
    <div class="signkrlo">
      <span id="signkrtext" onclick=change_div("logging")>
      Log In?
    </span>
    </div>
    </form>
  </div>
  <div id="signupclick" style="display:none;">
 <div class="image">
   <div class="image1">
     <img src="rightmark1.gif"></img>
   </div>
 </div>
   <div class="he">
   <p>ACCOUNT CREATED</p>
 </div>
 <div class="he1" >
   <p  onclick=change_div("logging")>Want To Login?</p>
 </div>
</div>
<div  id='aboutus' style = "display:none">
<div class="text1">
      <h1 class="name1">Anubhav Sinha</h1>
      <h1 class="enroll1">17103135</h1>
      <h1 class="batch1">B3</h1>
    </div>
    <div class="text2">
      <h1 class="name2">Astitva Singhal</h1>
      <h1 class="enroll2">17103136</h1>
      <h1 class="batch2">B3</h1>
    </div>
    <div class="text3">
      <h1 class="name3">Rachit Goel</h1>
      <h1 class="enroll3">17103146</h1>
      <h1 class="batch3">B3</h1>
    </div>
    <div class="text4">
      <h1 class="name4">Prajwal Singla</h1>
      <h1 class="enroll4">17103162</h1>
      <h1 class="batch4">B3</h1>
    </div>
  </div>
  <div class="foot">
        <span class="footer"><ul><li onclick=change_div("first")>HOME</li><li onclick = change_div("aboutus")>ABOUT US</li><li><a href = "https://webkiosk.jiit.ac.in/" target = '_blank'>WEB KIOSK</li></span>
  </div>
</div>
</body>
</html>
