<?php
    require "header.php"
?>

<div class="content">
    
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
        
        <h2>Admin Login</h2>
    <form id="loginForm" method="POST" action="logincode.php">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    
    </div>
      </div>
    </div>

  </div>
  

    
    <?php
    require "footer.php"
?>