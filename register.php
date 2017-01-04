<?php include 'header.php'; ?>


<div id="wrap">
<div id="results">
<h2>Register</h2>
<form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="form-signup">
 <table>
    <tr>
      <td>Select Your Firstname:</td>
      <td> <input type="text" name="firstname" size="20" placeholder="First name"><span class="required">*</span></td>
    </tr>
 
 <tr>
      <td>Select Your Lastname:</td>
      <td> <input type="text" name="lastname" size="20" placeholder="Last name"><span class="required">*</span></td>
    </tr>
  
    <tr>
      <td>Select Your Username:</td>
      <td> <input type="text" name="username" size="20" placeholder="User name"><span class="required">*</span></td>
    </tr>
             
    <tr>
      <td>Select Your Password:</td>
      <td><input type="password" name="password" size="20" placeholder="Password"><span class="required">*</span></td>
     </tr>
     
  <tr>
      <td>Select Your Email:</td>
      <td> <input type="text" name="email" size="20" placeholder="Email"><span class="required">*</span></td>
    </tr>
  <tr>
       <td><input type="submit" value="Sign Up" class="btn btn-large btn-primary"></td>
        
     </tr>
 </table>
</form>
</div>
</div>

<?php include 'footer.php'; ?>