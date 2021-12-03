<?php
session_start();
/*if(!isset($_SESSION['level'])) header('location:home.php');
if(isset($_SESSION['level'])){
    if($_SESSION['level'] != 1 || $_SESSION['level'] != 2) header('location:extras/transfer.php');
};
*/
include 'db_connection.php';
echo "Admin Report";


?>

<html>
    <head>
        <link rel="stylesheet" href="CSS/patientStyles.css">
    </head>
    <body>
        <form action="adminReport.php" method="post">
            <label for="date">Date: </label>
            <input type="date" name="date" id="date" value=<?php if(isset($_POST['search'])) echo $_POST['date'];?>>
            <input type="submit" name="search" id="search" value="SEARCH">
        </form>

        <table>
            <th>Patient Name</th>
            <th>Doctor Name</th>
            <th>Caregiver Name</th>
            <th>Doctor Appointment</th>
            <th>Breakfast</th>
            <th>Morning Med</th>
            <th>Lunch</th>
            <th>Lunch Med</th>
            <th>Dinner</th>
            <th>Night Med</th>
                    
            </tr>
                   
            <tr>
            <td>Hello</td>
            <td>Hello</td>
            <td>Hello</td>
            <td>Hello</td>
            <td>Hello</td>
            <td>Hello</td>
            <td>Hello</td>
            <td>Hello</td>
            <td>Hello</td>
            <td>Hello</td>

        </table>
    </body>
</html>