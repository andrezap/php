<?php require('validar.php')?>
<html>
    <body>
        <form method="POST" action="welcome.php">
            Name: <input type="text" name="name">
            <span> <?php echo $nameErr ?> </span>
            <br><br>
            E-mail: <input type="text" name="email">
            <span> <?php echo $emailErr ?> </span>
            <br><br>
            <input type="submit">
        </form>
    </body>
</html>