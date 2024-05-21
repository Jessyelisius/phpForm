<?php
    require "header.php";
?>
<div class="content">
  
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        
      <h2>Admin Registration</h2>
    <form id="registerForm" method="POST" action="regcode.php">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Register">
        <a href="login.php" style="color: black;" >Login if you have an Account!</a>
    </form>

  </div>
    </div>
  </div>

</div>
   

    
    <?php
    require "footer.php";
    ?>