<?php
    include 'db_connection.php';
    if(isset($_GET['error'])){
        echo "<P>Incorrect Email or Password.</p>";
    }
?>
<html>
    <head>

    </head>
    <body>
        <form action="route.php" method="post">
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" required>
            <label for="password">Password: </label>
            <input type="text" name="password" id="password" required>
            <input type="submit" name="login" id="login" value="LOGIN">
        </form>
    </body>

</html>