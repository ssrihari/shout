<html>
  <head>
    <?php
      include("./func.php");
      if(!isset($_POST['username'])||!isset($_POST['password']))
        {
          echo "Please <a href='./login.php'>login</a> first... <hr />";
          die;
        }
      if(is_valid_login($_POST['username'],$_POST['password']))
        {
          $curUsername = $_POST['username'];
          echo "Logged in successfully, $curUsername! | <a href='./logout.php'>Logout</a><hr />";
        }
      else
        {
          echo "Login incorrect. Please <a href='./login.php'>login</a> first...<hr />";
          die;
        }
        
    ?>
    <script type="text/javascript">
        window.setInterval(function(){
          var fr = document.getElementById('iFrame')
          var fr2 = document.getElementById('statusArea')
          var fr3 = document.getElementById('updatesIFrame')
          fr.src=fr.src
          fr2.src=fr2.src
          fr3.src=fr3.src
        }, 2000);
        
      function shout(){
        var input = document.getElementById('shoutInput')
        var text = input.value
        var d = new Date();
        var dstring = d.getDate() + "/" + d.getMonth() + " " + d.getHours() + ":"+ d.getMinutes();
        var user = "<?= $curUsername?>"
        document.getElementById('hiddenMsg').value = "<tr><td>" 
                                                     + "[<small>"
                                                     + dstring + "</small>] "
                                                     + "<b>" + user + ":&nbsp&nbsp&nbsp"+ "</b></td>"
                                                     +"<td>" + text + "</td></tr><hr>"
        document.getElementById('hiddenForm').submit()
        input.value = ""
      }
    </script>

    <style type="text/css">
      #iFrame{
        border:1px solid;
        border-radius:10px;
        -moz-border-radius:10px; /* Firefox 3.6 and earlier */
        box-shadow: 10px 10px 5px #888888;
        width:100%;
        height:100%;
        padding:10px;
        overflow:auto;
      }
      #shout{
        position:absolute;
        left:25%;
        top:6%;
        width:50%;
        height:60%;
      }
      #shoutInput{
        margin-top:3%;
        width:80%;
        height:6%;
      }
      #statusArea{
        position:absolute;
        left:80%;
        top:6%;
        width:15%;
        height:60%;
        border-style:none;
      }
      body{
        background-image:url('back.png');
      }
    </style>
  </head>
  <body onload="document.getElementById('shoutInput').focus()">
    <div id="shout">
      <form id="hiddenForm" action="./msgsent.php" target="shoutIFrame" method="post">
        <input id="hiddenMsg" type="hidden" name="msg" />
      </form>
      <iframe id="iFrame" name="shoutIFrame" src="./msgsent.php"></iframe>
      <div id="shoutText" align="center">
        <input id="shoutInput" type="text" onkeydown="if (event.keyCode == 13) shout()" />
        <button onclick="shout()">Send</button>
      </div>
    </div><!--end of shout div-->
    <iframe id="statusArea" src="./onlinenow.php">
    </iframe>
    <iframe id="updatesIFrame" src="./updates.php" style="display:none">
    </iframe>
  </body>
</html>
