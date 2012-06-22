<html>
  <head>
    <style>
      tr{
          cursor: pointer;
        }
    </style>
    <?php 
      include("./func.php");
      $current_user = current_username();
    ?>
    <script type="text/javascript">
      function username_click_handler(receiver){
        var sender = "<?= $current_user ?>" 
        document.getElementById('senderInput').value = sender
        document.getElementById('receiverInput').value = receiver
        document.getElementById('private-chat-form').submit()
      } 
    </script>
  </head>
  <body>
  <?php 
    echo "Online now:<hr />";
    echo who_is_online();
  ?>
    <form id="private-chat-form" method="post" action="private_chat.php">
       <input id="senderInput" type="hidden" name="sender" />
       <input id="receiverInput" type="hidden" name="receiver" />
    </form>
  </body>
</html>
