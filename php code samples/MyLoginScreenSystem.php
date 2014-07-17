<?php

// This first if statement checks to see if we have a username/pass submited by the form, if it does then it attempts to validate it. 
if($username && $password) { 
  mysql_connect() or die ("Whoops Something Here is MOT right!!");    // Connect to the database, or if connection fails print error message. 
  $password = md5($password);          // encode submited password with MD5 encryption and store it back in the same variable. If not on a windows box, I 
suggest you use crypt() 
  $sql = "select * from login where username='$username'";   // query statment that gets the username/password from 'login' where the username is the same as 
the one you 
submited 
  $r = mysql_db_query("register",$sql);  // Execute Query 

  // if no rows for that database come up, redirect. 
  if(!mysql_num_rows($r)) 
    header("Location: $SCRIPT_NAME");  // This is the redirection, notice it uses $SCRIPT_NAME which is a predefined variable with the name of the script in it. 

  $user = mysql_fetch_array($r);  // if we got passed the last if statment means we have a registered username, get the rest of the info and put it in an array 
named $user 
  if($user["password"] == $password) {   // If the password stored in the database is the same as the password the user entered (which is now encryped with MD5) 
    $password = serialize($password);  // if we get this far we know we have a registered username, and the password matches. 
                                                      // serialize() the already incrypted password just for fun and mabey some extra security for when we 
store it in a cookie 
    setcookie("candle_login","$username $password");  // Set the cookie named 'candle_login' with the value of the username (in plain text) and the password 
(which has been 
encrypted and serialized.) 

// set variable $msg with an HTML statement that basically says redirect to the next page. The reason we didn't use header() is that using setcookie() and 
header() at the same 
time isn't 100% compatible with all browsers, this is more compatible. 

    $msg = "<meta http-equiv=\"Refresh\" content=\"0;url=./nextpage.php\">"; 
  }else{ 
     header("Location: $SCRIPT_NAME");  //If the password didn't match, redirect to this page in which $username and $password are reset therefore the first if 
() never gets executed
     
  } 
} 
if($msg) echo $msg;  //if $msg is set echo it, resulting in a redirect to the next page. 
?>




// This is the login screen
<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="utf-8" />  
<title>Login</title>
</head>
<body bgcolor="yellow" text="black"> 
<form method="post" action="<?echo $SCRIPT_NAME;?>"> // submit form data to this page 

<center><font size=+5><b>Welcome!</b></font></center> 
<br> 
<br> 
<br> 
<table cellspacing=0 cellpadding=0 width=320 align="center"> 
<tr><td> 
Username: 
</td><td> 
<input name="username" type="text" width=10> 
</td>
</tr>

<tr>
  <td> Password: </td>
  <td><input name="password" type="password" width=10></td>
</tr>

<tr>
  <td colspan=2 align="center"> 
  <input name="login" type="submit"> 
  </td>
</tr> 
</table> 
</form> 
</html> 


/* That was the login page 
    Next is some code you can put into a different file (named 'login_check.inc' or something) 
    that you include() on each page you want protected on your site. 
    It uses the cookie from the first script to verify user has already been there. 
*/




<?php
// if the cookie doesn't exsist means the user hasn't been verified by the login page so send them back to the login page. 
if(!$candle_login) 
  header("Location: ./login.php"); 

if($phpcoders) {     // if the cookie does exsist 
  mysql_connect() or die ("Whoops Somthing Here is MOT right!!");  //connect to db 
  $user = explode(" ","$phpcoders");   //explode cookie value (which is the '$username $password (note seperated by space)) and store values in $user. Check 
manual for more info 
on explode() 

  $sql = "select * from login where username='$user[0]'";  //sql statment that uses the username from the cookie. 
  $r = mysql_db_query("register",$sql);  //execute sql 

  if(!mysql_num_rows($r)) {    // if there are no rows, means no matches for that username 
    header("Location: ./login.php");   // so go back to the login page 
  } 

  $chkusr = mysql_fetch_array($r); //if we got passed the last part, then get the username/password set that match that username 
  if(unserialize($user[1]) != $chkusr[1]) //if the password from cookie (notice we have to unserialize it) doesn't match the one from the database 
    header("Location: ./login.php");       // go back to the login page 
}                                                     // if it did match then continue on to page and this ends up doing nothing :) 

?>

