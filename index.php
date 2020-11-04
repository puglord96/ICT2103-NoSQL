

        <?php
        // put your code here
        include "header.inc.php";
        ?>
        
      
    <div class="container">
    <h1>Search for School Information</h1>
    <h3>Information such as School name | Cut Off Points | Academic Stream</h3>
    <form name="myForm" action="process_login.php"  novalidate onsubmit="return validateForm()" method="post">
      
   
    <div class="form-group" >
      <label for="email">Search:</label>
      <input type="email" class="form-control" id="searchid" placeholder="Search for school..." name="searc">
    </div>
   
    <div id = "myDIV"> 
    <div class="form-group">
    <label for="MinCutOffPoints">Min CutOffPoints:</label>
    <select name="MinCutOffPoints" id="MinCutOffPoints">
    <option value="160">160</option>
    <option value="170">170</option>
    <option value="180">180</option>
    <option value="190">190</option>
    <option value="200">200</option>
    <option value="210">210</option>
    <option value="220">220</option>
    <option value="230">230</option>
    </select>
    
    <label for="MinCutOffPoints">Max CutOffPoints:</label>
    <select name="MaxCutOffPoints" id="Max CutOffPoints">
    <option value="160">160</option>
    <option value="170">170</option>
    <option value="180">180</option>
    <option value="190">190</option>
    <option value="200">200</option>
    <option value="210">210</option>
    <option value="220">220</option>
    <option value="230">230</option>
    </select>
    </div>
        
        
    <div class="form-group">
  <input type="checkbox" id="north" name="north" value="north"><label for="north"> north</label>    
  <input type="checkbox" id="south" name="south" value="south"><label for="south"> south</label>
  <input type="checkbox" id="east" name="east" value="east"><label for="east"> east</label>
  <input type="checkbox" id="west" name="west" value="west"><label for="west"> west</label>

    </select>
   </div>
        
        
   <div class="form-group">
    <label for="NoOfSchool">Choose number of schools:</label>
    <select name="NoOfSchool" id="NoOfSchool">
    <option value="5">5</option>
    <option value="10">10</option>
    <option value="15">15</option>
    <option value="20">20</option>
    <option value="20">25</option>
    <option value="20">30</option>
    
    </select>
   </div>
    

    </div>
    
    <button type="submit" value = "Submit now" class="btn btn-default">Submit</button>
  </form>


     <button onclick="myFunction()">Advanced Search</button>
    </body>
    
            <?php
        // put your code here
        include "footer.inc.php";
        ?>   
</html>
