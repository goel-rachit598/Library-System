var flag = [0,0,0,0];
function change_div(x)
{
    document.getElementById('first').setAttribute("style","display: none;");
    document.getElementById('signupclick').setAttribute("style","display: none;");
    document.getElementById('signingup').setAttribute("style","display: none;");
    document.getElementById('signingup').setAttribute("style","display: none;");
      document.getElementById('aboutus').setAttribute("style","display: none;");
    document.getElementById('logging').setAttribute("style","display: none;");
    document.getElementById(x).setAttribute("style","display: block;");
}
function validateName()
{
  var name = document.getElementById('signupName').value;
  reg = /^[a-zA-Z]+\s[a-zA-Z]+$/;
  if(!reg.test(name))
  {
    document.getElementById('nameDone').innerHTML = "clear";
    document.getElementById('nameDone').setAttribute("style","color:#C21807;");
    flag[0] = 0;
  }
  else {
    document.getElementById('nameDone').innerHTML = "done";
    document.getElementById('nameDone').setAttribute("style","color:lime;");
    flag[0] = 1;
  }
}
function validateEnroll() {
  var enroll = document.getElementById('enrollNo').value;
  reg = /^([1-9]{1}[0-9]{7})$/;
  if(!reg.test(enroll))
  {
    document.getElementById('enrollExist').innerHTML = "";
    document.getElementById('enrollDone').innerHTML = "clear";
    document.getElementById('enrollDone').setAttribute("style","color:#C21807;");
    flag[1] = 0;
  }
  else {
    document.getElementById('enrollDone').innerHTML = "done";
    document.getElementById('enrollDone').setAttribute("style","color:lime;");
    flag[1] = 1
    check_id();
  }
  //console.log(enroll);
}
function validateEmail() {
  var email = document.getElementById('signupEmail').value;
  reg = /^[a-zA-Z0-9]{1}[a-zA-Z0-9\._\$\-]+@[a-z]+\.[a-z]+[\.]{0,1}[a-z]+$/;
  if(!reg.test(email))
  {
    document.getElementById('emailDone').innerHTML = "clear";
    document.getElementById('emailDone').setAttribute("style","color:#C21807;");
    flag[2] = 0;
  }
  else{
  document.getElementById('emailDone').innerHTML = "done";
  document.getElementById('emailDone').setAttribute("style","color:lime;");
  flag[2] = 1;
  }
}
function validatePass()
{
  var passW = document.getElementById('signupPassword').value;
  var reg = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
  if(!reg.test(passW))
  {

    document.getElementById('passDone').innerHTML = "clear";
    document.getElementById('passDone').setAttribute("style","color:#C21807;");
    flag[3] = 0;
  }
  else {
    document.getElementById('passDone').innerHTML = "done";
    document.getElementById('passDone').setAttribute("style","color:lime;");
    flag[3] = 1;
  }
}
function check_id()
{
    var id = document.getElementById('enrollNo').value;
    //console.log(id);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
      //alert("state changed"+this.readyState+" "+this.status)
      if(this.readyState==4 && this.status==200)
      {
        //alert(this.responseText);
        if(this.responseText == "false")
        {
          document.getElementById('enrollExist').innerHTML = "*Already &nbsp&nbspExists";
          document.getElementById('enrollDone').innerHTML = "clear";
          document.getElementById('enrollDone').setAttribute("style","color:#C21807;");
          flag[1] = 0;
        }
        else if(this.responseText=="true")
        {
          document.getElementById('enrollExist').innerHTML = "";
          //document.getElementById('enrollDone').innerHTML = "clear";
          //document.getElementById('enrollDone').setAttribute("style","color:#C21807;");
        }
      }
    }
      xmlhttp.open("POST","connect.php",true);
      xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      xmlhttp.send("id="+id);
}
function check_signup(){
  console.log(2);
  if(flag[0]==1 && flag[1]==1 && flag[2]==1 && flag[3]==1)
  {
    enterDB();
  }
}
function enterDB()
{
    console.log(1);
  var enroll = document.getElementById('enrollNo').value;
  var name = document.getElementById('signupName').value;
  var email = document.getElementById('signupEmail').value;
  var password = document.getElementById('signupPassword').value;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    //alert(this.responseText)
    //alert(this.responseText);
    if(this.readyState == 4 && this.status == 200)
    {
      if(this.responseText == "Yes"){
      //alert(this.responseText);
      document.getElementById('myForm').reset();
      document.getElementById('nameDone').innerHTML = "";
      document.getElementById('emailDone').innerHTML = "";
      document.getElementById('enrollDone').innerHTML = "";
      document.getElementById('passDone').innerHTML = "";
      change_div("signupclick");
    }
    }
  }
    xmlhttp.open("POST","entry.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("enroll="+enroll+"&name="+name+"&email="+email+"&password="+password);
}
function validateLogin()
{
  var enroll = document.getElementById("loginEnroll").value;
  var password = document.getElementById("loginPassword").value;
  console.log(enroll);
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200)
    {
      if(this.responseText == "Yes"){
        document.getElementById("loginform").submit();
      }
      else
      {
        alert("Wrong Password");
      }
    }
  }
    xmlhttp.open("POST","initLoginCheck.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("enroll="+enroll+"&password="+password);
}
