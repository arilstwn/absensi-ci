<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center><button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button></center>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="https://e1.pxfuel.com/desktop-wallpaper/489/973/desktop-wallpaper-anime-screencap-and-for-classroom-of-the-elite-anime-youkoso-jitsuryoku-shijou-shugi.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username:</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>
      <label for="email"><b>Email:</b></label>
      <input type="text" placeholder="Enter email" name="email" required>

      

      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">gender?</a></span>
    </div>
  </form>
</div>

<script>
var modal = document.getElementById('id01');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</body>
</html>