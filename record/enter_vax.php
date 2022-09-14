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
        <section class="container">
            <section class="column">
                <?php
                    $ohip = $_POST["ohip"];
                    $query = 'INSERT INTO patient (POHIP, FirstName, LastName, BDate) VALUES ("' . $ohip .'","'. $_POST["fname"] .'","'. $_POST["lname"] .'","'.
                            $_POST["bdate"] .'")';
                    $connection->query($query);
                    $query = "SELECT VCName FROM vaxclinic";
                    $vaxclinic = $connection->query($query);
                    $query = "SELECT FirstName, LastName FROM patient WHERE POHIP=$ohip";
                    $patient = $connection->query($query);
                    while ($row = $patient->fetch()) {
                        $fname = $row["FirstName"];
                        $lname = $row["LastName"];
                    }
                    echo '<h2>Enter vaccination information for ' . $fname . ' ' . $lname . '</h2>';
                    $string = '<form action="view_history.php" method="POST">
                                <input type="hidden" name="ohip" value='.$ohip.'>
                                <label for="clinics">Select vaccination clinic</label><br>
                                <select name="clinics" id="clinics">';
                    while ($row = $vaxclinic->fetch()){
                        $clinic = $row["VCName"];
                        $string .= '<option value="' . $clinic . '">' . $clinic . '</option>';
                    }
                    $string .= '</select><br>
                            <label for="lot">Enter vaccine lot number</label><br>
                            <input type="text" id="lot" name="lot"><br>
                            <input type="submit" value="Submit">
                            </form>';
                    echo $string;
                ?>
            </section>
        </section>
        <?php
            $connection = NULL;
        ?>
    </body>
</html>