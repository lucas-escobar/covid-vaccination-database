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
                <h2>Clinic Employee Information</h2>
                <?php
                    $query = "SELECT VCName FROM vaxclinic";
                    $vaccines = $connection->query($query);
                    $string = '<form action="view_worker_info.php" method="POST">
                                <label for="clinic">Select vaccination clinic</label><br>
                                <select name="clinic" id="clinic">';
                    while ($row = $vaccines->fetch()){
                        $clinic = $row["VCName"];
                        $string .= '<option value="' . $clinic . '">' . $clinic . '</option>';
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