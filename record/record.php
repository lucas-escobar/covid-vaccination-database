<!DOCTYPE html>
<html>
    <head>
        <title>Covid</title>
        <link href="../css/covid.css" type="text/css" rel="stylesheet">
        <script src="../components/header.js" type="text/javascript" defer></script>
    </head>
    <body>
        <?php
            include '../connectdb.php';
        ?>
        <header-component></header-component>
        <section class="column">
            <form action="find_patient.php" method="post">
                <label for="ohip">Enter patient's OHIP number</label><br>
                <input type="text" id="ohip" name="ohip"><br>
                <input type="submit" value="Submit">
            </form>
        </section>
        <?php
            $connection = NULL;
        ?>
    </body>
</html>