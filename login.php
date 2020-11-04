
<?php
        include "header.inc.php";
        ?>

    <body>
    <div class="container">
  <h2>Log In</h2>
 
  <form name="myForm" action="process_login.php"  novalidate onsubmit="return validateForm()" method="post">
      
      
    <div class="form-group">
      <label for="nric">NRIC:</label>
      <input type="text" class="form-control" id="nric" placeholder="Enter NRIC" name="nric">
    </div>
      
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
      
    <button type="submit" value = "Submit now" class="btn btn-default">Submit</button>
  </form>
  
  
    </div>
    </body>
<?php
        include "footer.inc.php";
        ?>

</html>