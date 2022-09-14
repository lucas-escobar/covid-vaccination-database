<!DOCTYPE html>
<html>

    <head>
        <title>
            Covid
        </title>
        <link href="../css/covid.css" type="text/css" rel="stylesheet">
        <script src="../components/header.js" type="text/javascript" defer></script>
    </head>

    <body>
        <header-component></header-component>
        <?php
            include '../connectdb.php';
        ?>
        <section class="container">
            <section class="column">
                <h2>Patient Information</h2>
                <?php
                    $query = "SELECT POHIP FROM patient";
                    $vaccines = $connection->query($query);
                    $string = '<form action="view_patient_info.php" method="POST">
                                <label for="ohip">Select patient\'s OHIP number</label><br>
                                <select name="ohip" id="ohip">';
                    while ($row = $vaccines->fetch()){
                        $num = $row["POHIP"];
                        $string .= '<option value="' . $num . '">' . $num . '</option>';
                    }
                    $string .= '</select><br>
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