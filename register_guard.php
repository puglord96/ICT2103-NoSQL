
<?php
        include "header.inc.php";
        ?>

    <body>
    <div class="container" id="RegForm">
  <h2>Parent/Guardian Registration</h2>
  <h4>For existing members, Please go to the login page</h4>
  <form name="myForm" id="myForm" action="process_register_guard.php" novalidate onsubmit="return validateForm()" method="post">
      
    <div class="form-group">
      <label for="fname">Full Name:</label>
      <input type="text" class="form-control" id="fname" placeholder="Enter full name" pattern="^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$" name="fname" required>
      <!--//pattern for name only accept 1 space but not 2 or more and doesn't include number-->
    </div>
      
   <div class="form-group">
      <label for="dob">Date of Birth:</label>
      <input type="date" class="form-control" id="dob" placeholder="Enter your Date of Birth" name="dob" required>
    </div>
      
     <div class="form-group">
      <label for="nationality">Nationality:</label>
      <input type="text" class="form-control" id="nationality" placeholder="Enter your Nationality" name="nationality" required>
    </div>
      
     <div class="form-group">
      <label for="nric">NRIC: (Login ID)</label>
      <input type="text" class="form-control" id="nric" placeholder="Enter email" pattern="(?i)^[STFG]\d{7}[A-Z]$" name="nric" required>
    </div>
      

       <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,50}$" name="pwd" required>
      <!--//pattern is for one uppercase, lowercase, symbol, min 8 max 50 characters-->
    </div>
      
           <div class="form-group">
      <label for="cpwd">Confirm Password:</label>
      <input type="password" class="form-control" id="cpwd" placeholder="Confirm password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,50}$" name="cpwd" required>
    </div>
      
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" name="email" required>
    </div>
      
    <div class="form-group">
      <label for="cname">Child's/Ward's Name: </label>
      <input type="text" class="form-control" id="cname" placeholder="Enter Child's Name"  name="cname" required>
    </div> 
      
            <div class="form-group">
      <label for="cnric">Child's/Ward's NRIC: </label>
      <input type="text" class="form-control" id="cnric" placeholder="Enter Child's NRIC" pattern="(?i)^[STFG]\d{7}[A-Z]$" name="cnric" required>
    </div> 
      
      <div class="form-group">
      <label for="relate">Relationship to Child/Ward: </label>
      <input type="text" class="form-control" id="relate" placeholder="" name="relate" required>
    </div> 
      
      <div class="form-group">
      <label for="contact">Contact No:</label>
      <input type="number" class="form-control" id="contact" placeholder="Enter contact number" name="contact" required>
    </div>
      
      
      <div class="form-group">
      <label for="occupy">Occupation:</label>
      <input type="text" class="form-control" id="occupy" placeholder="Enter your occupation" name="occupy" required>
    </div>
      
      <div class="form-group">
      <label for="add1">Address Line 1:</label>
      <input type="text" class="form-control" id="add1" placeholder="Enter your address" name="add1" required>
    </div>
      
      <div class="form-group">
      <label for="add2">Address Line 2:</label>
      <input type="text" class="form-control" id="add1" placeholder="Enter your address" name="add2" required>
    </div>
      
      
    <div class="checkbox">
      <label><input type="checkbox" required name="remember"> Remember me</label>
    </div>
    <button type="submit" value = "Submit now" class="btn btn-default">Submit</button>
  </form>
  
  
    </div>
    </body>
<?php
        include "footer.inc.php";
        ?>

</html>