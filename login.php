
<?php
        include "header.inc.php";
        ?>

    <body>
    <div class="container">
  <h2>Member Registration</h2>
  <h4>For existing members, Please go to the login page</h4>
  <form name="myForm" action="process_login.php"  novalidate onsubmit="return validateForm()" method="post">
      
      
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
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