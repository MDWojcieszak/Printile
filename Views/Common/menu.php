<form action="?page=board" method="POST">
<div id="myNav" class="overlay"onclick="closeNav()">
  </div>
<div id="mySidenav" class="sidenav">
  
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <?php if($_SESSION['role'] == 1){?>
  <a><button class="button3" type="submit" name="submit" value="admin-panel">Accepting Orders</button></a>
  <a><button class="button3" type="submit" name="submit" value="admin-panel-ordered">Printing Orders</button></a>
  <a><button class="button3" type="submit" name="submit" value="admin-panel-users">Users</button></a>
  <a><button class="button3" type="submit" name="submit" value="dataBase">Data Base</button></a>
  <a><button class="button3" type="submit" name="submit" value="printServer">Print Server</button></a>
  <?php 
  }
  else{?>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
  <?php
  }?>
</div>
</form>
<script src="../Public/js/menu.js"></script>
