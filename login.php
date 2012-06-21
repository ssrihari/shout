<html>
  <head>
    <style type="text/css">
      #loginDiv{
        width:40%;
        height:20%;
        position:absolute;
        left:30%;
        top:20%;
      }
    </style>
  </head>
  <body onload="document.getElementById('username').focus()">
    <div id="loginDiv">
      <form method="post" action="index.php">
        <table align="center">
          <tr><td>Username:</td><td><input type="text" id="username" name="username" /></td></tr>
          <tr><td>Password:</td><td><input type="password" name="password" /></td></tr>
          <tr><td colspan="2"><input style="width:100%" type="submit" value="Login" /></td></tr>
        </table>
      </form>
    </div>
  </body>
</html>
