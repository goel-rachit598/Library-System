var removehold = 0;
function searchColor()
{
  document.getElementById('search').setAttribute("style","border-color:blue;");
}
function submitSearch()
{
  var count = 1;
  var i;
  for (i=0;i<16;i+=4)
  {
    document.getElementById('check_'+count).innerHTML = "";
    document.getElementById('title_'+count).innerHTML = "";
    document.getElementById('author_'+count).innerHTML = "";
    document.getElementById('avail_'+count).innerHTML = "";
    document.getElementById('rating_'+count).innerHTML = "";
    count++;
  }
  var a = document.getElementById('search').value;
  var x = document.getElementById('categories').value;
  console.log(a);
  console.log(x);
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200)
    {
      if(this.responseText == "NO")
      {
        document.getElementById('book_not_avail').innerHTML = 'Book Not Found !';
      }
      else {
        document.getElementById('book_not_avail').innerHTML = '';
        var list = this.responseText.split(",");
        //alert(list);
        var len = list.length - 1;
        var i;
        var count =  1;
        for (i=0;i<len;i+=4)
        {

          var x = document.createElement('input');
          x.type = 'checkbox';
          x.id = 'id_' + count;
          x.value = list[i];
          if(list[i+2] == '0')
          {
            x.disabled = true;
          }
          document.getElementById('check_'+count).appendChild(x);
          document.getElementById('title_'+count).innerHTML = list[i];
          document.getElementById('author_'+count).innerHTML = list[i+1];
          document.getElementById('avail_'+count).innerHTML = list[i+2];
          document.getElementById('rating_'+count).innerHTML = list[i+3];
          count++;
        }
      }
    }
  }
    xmlhttp.open("POST","afterLogin.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("search="+a+"&categories="+x);
}
function checkSession(y)
{
  //var a = document.getElementById('search').value;
  console.log(y);
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
  if(this.readyState == 4 && this.status == 200)
  {
      alert(this.responseText);
  }
  }
  xmlhttp.open("POST","afterLogin.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("search="+y);
}
function hold_book(id)
{
  var c = 0;
  var id = id;
  console.log(id);
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
  if(this.readyState == 4 && this.status == 200)
  {
      c = parseInt(this.responseText);
      //  alert(c);
      var str = 'id='+id;
      console.log(c);
      try {
        if(document.getElementById("id_1").checked == true)
        {
          str = str + "&id_1=" +document.getElementById('id_1').value;
          console.log(document.getElementById('id_1').value);
          c++;
        }
      }
      catch(err) {
        str = str + '&id_1=';
      }
      try
      {
        if(document.getElementById("id_1").checked == true)
        {
          str = str + "&id_1=" +document.getElementById('id_1').value;
          console.log(document.getElementById('id_1').value);
          c++;
        }
      }
      catch(err)
      {
        str = str + "&id_1=1";
      }
      try{
        if(document.getElementById("id_2").checked == true)
        {
          c++;
          str = str + "&id_2=" +document.getElementById('id_2').value;
          console.log(document.getElementById('id_2').value);
        }
      }
      catch(err)
      {
        str = str + "&id_2=2";
        //Hold 	Title 	Author 	Available 	Rating
      }
      try {
      if(document.getElementById("id_3").checked == true)
      {
        c++;
        str = str + "&id_3=" +document.getElementById('id_3').value;
        console.log(document.getElementById('id_3').value);
      }
    }
      catch(err) {
        str = str + "&id_3=3";
      }
      try
      {
        if(document.getElementById("id_4").checked == true)
        {
          c++;
          str = str + "&id_4=" +document.getElementById('id_4').value;
          console.log(document.getElementById('id_4').value);
        }
      }
      catch(err)
      {
        str = str + "&id_4=4";
      }
      console.log(str);
      if(c > 2)
      {
        alert("Can't hold more than 2 books");
      }
      else {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200)
        {
            alert(this.responseText);
        }
        }
        xmlhttp.open("POST","editBooks.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send(str);
      }
      submitSearch();
  }
  }
  xmlhttp.open("POST","hold.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("search="+id);

  //submitSearch();
}

function saveData()
{
  gender = document.getElementById('form_gender').value;
  hosteller = document.getElementById('form_hosteller').value;
  batch = document.getElementById('form_batch').value;
  address = document.getElementById('form_address').value;
  groups = document.getElementById('form_groups').value;
  phone = document.getElementById('form_phone').value;
  if(gender == '' || hosteller == '' || batch == '' || address == '' || groups == '' || phone == '')
  {
    alert('Fill all the entries');
  }
  else{
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
  if(this.readyState == 4 && this.status == 200)
  {
      alert(this.responseText);
  }
  }
  xmlhttp.open("POST","updateProfile.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("form_gender="+gender+"&form_hosteller="+hosteller+"&form_batch="+batch+"&form_address="+address+"&form_groups="+groups+"&form_phone="+phone);
}
}

function editProfile(x)
{
  console.log(1);
  changeDivision(x);
}

function changeDivision(x)
{
  document.getElementById('issueholdbooks').setAttribute("style","display:none");
  document.getElementById('editprofile').setAttribute("style","display:none");
  document.getElementById('dashboard').setAttribute("style","display:none");
  document.getElementById('aboutus').setAttribute("style","display:none");
  document.getElementById(x).setAttribute("style","display:block");
}

function mybooks()
{
  document.getElementById('hold_table').innerHTML='';
  changeDivision('issueholdbooks');
  //console.log(removehold);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200)
      {
        var l = this.responseText.split('*');
        //alert(l.length);
        //alert(l);
        var table = document.getElementById('hold_table');
        if(l.length == 3)
        {
          //alert(l);
          var row = table.insertRow(0);
          var cell0 = row.insertCell(0);
          var cell1 = row.insertCell(1);
          var cell2 = row.insertCell(2);
          cell0.innerHTML = l[0];
          cell1.innerHTML = l[1];
          cell2.innerHTML = '<button onclick = remove_hold("0")>UNHOLD</button>';
        }
        else if(l.length == 5)
        {
          var row0 = table.insertRow(0);
          var cell0 = row0.insertCell(0);
          var cell1 = row0.insertCell(1);
          var cell2 = row0.insertCell(2);
          var row1 = table.insertRow(0);
          var cell3 = row1.insertCell(0);
          var cell4 = row1.insertCell(1);
          var cell5 = row1.insertCell(2);
          cell0.innerHTML = l[0];
          cell1.innerHTML = l[1];
          cell2.innerHTML = '<button onclick= remove_hold("1")>UNHOLD</button>';
          cell3.innerHTML = l[2];
          cell4.innerHTML = l[3];
          cell5.innerHTML = '<button onclick=remove_hold("2")>UNHOLD</button>';
        }
        else if(l.length == 1)
        {
          var row = table.insertRow(0);
          var cell = row.insertCell(0);
          cell.innerHTML = 'NO BOOKS ON HOLD';
        }

  }
  }
    xmlhttp.open("POST","holdedBooks.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("seacrh="+1);
    removehold = 1;
    document.getElementById('issue_book').innerHTML='';
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200)
      {
        //alert(this.responseText);
        var l = this.responseText.split('*');
        //alert(l);
        var table = document.getElementById('issue_book');
        if(l.length == 1)
        {
          var row = table.insertRow(0);
          var cell = row.insertCell(0);
          cell.innerHTML = 'NO ISSUED BOOKS';
        }
        else {
          count = 0;
          for(i=0;i<l.length-1;i++)
          {

            var row = table.insertRow(count);
            var cell_1 =  row.insertCell(0);
            var cell_2 =  row.insertCell(1);
            cell_1.innerHTML = l[i];
            cell_2.innerHTML = l[i+1];
            i = i + 2;
            count++;
          }
        }
  }
  }
    xmlhttp.open("POST","issuedBooks.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("seacrh="+1);
}
function remove_hold(x)
{
  console.log(x);
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
  if(this.readyState == 4 && this.status == 200)
  {
      //alert(this.responseText);
      document.getElementById("hold_table").innerHTML = "";
      removehold = 0;
      mybooks();
  }
  }
  xmlhttp.open("POST","removeHold.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("type="+x);
}
