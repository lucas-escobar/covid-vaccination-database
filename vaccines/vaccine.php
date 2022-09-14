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
                <h2>Vaccination Information</h2>
                <?php
                    $query = "SELECT CName FROM company";
                    $vaccines = $connection->query($query);
                    $string = '<form action="view_vax_info.php" method="POST">
                                <label for="company">Select vaccine type</label><br>
                                <select name="company" id="company">';
                    while ($row = $vaccines->fetch()){
                        $company = $row["CName"];
                        $string .= '<option value="' . $company . '">' . $company . '</option>';
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