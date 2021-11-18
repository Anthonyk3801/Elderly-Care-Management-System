<?php
    include 'db_connection.php';
    $sql = "SELECT * FROM Roles;";

    $result = $conn->query($sql);
?>
​
<form action="patientDoctor.php" method="POST">
        <label for="role">Choose a role:</label>
        <select id="role" name="role">
            <?php
            while($res = mysqli_fetch_array($result)) {
            ?>
                 <option value="<?php echo $res['role'];?>"><?php echo $res['role'];?></option>;
            <?php
            }
            ?>
        </select>
    <br>
​
    <input type="submit" value="Submit">
  
</form>
​
<form action="home.php">
    <label for="fName">First Name</label>
    <input type="text" id="fName" name="fName">
​
    <br>
​
    <label for="lName">Last Name:</label>
    <input type="text" id="lName" name="lName">
​
    <br>
​
    <label for="email">Email:</label>
    <input type="text" id="email" name="email">
    
    <br>
​
    <label for="phone#">Phone #:</label>
    <input type="text" id="phone#" name="phone#">
​
    <br>
​
    <label for="password">Password:</label>
    <input type="text" id="password" name="password">
​
    <br>
​
    <label for="DOB">D.O.B:</label>
    <input type="text" id="DOB" name="DOB">
    
    <br>
​
    <div id='patientOnly' hidden>
        <label for="familyCode">Family Code:</label>
        <input type="text" id="familyCode" name="familyCode">
​
        <br>
​
        <label for="EmerContactName">Emergency Contact Name:</label>
        <input type="text" id="EmerContactName" name="EmerContactName">
    
        <br>
​
        <label for="EmerContact#">Emergency Contact #:</label>
        <input type="text" id="EmerContact#" name="EmerContact#">
​
        <br>
​
        <label for="EmerContactRelation">Emergency Contact Relation:</label>
        <input type="text" id="EmerContactRelation" name="EmerContactRelation">
    </div>
    
    <br>
​
    <input type="submit" value="Submit">
​
</form>