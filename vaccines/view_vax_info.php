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
                <?php
                $company = $_POST["company"];
                $query = "SELECT s.VCName, SUM(s.Doses) as 'Total Doses' FROM 
                    (SELECT VCName, shipment.Doses FROM shipment, vaccine WHERE shipment.Lot=vaccine.Lot AND CName='$company') s 
                    GROUP BY s.VCName";
                $result = $connection->query($query);
                echo '<h2>Vaccination shipment information for '.$company.'</h2>';
                    echo '<table>
                        <tr>
                            <th>Vaccination Clinic</th>
                            <th>Total Doses Shipped</th>
                        </tr>';
                    while ($row = $result->fetch()){
                        echo '<tr>
                            <td>'.$row["VCName"].'</td>
                            <td>'.$row["Total Doses"].'</td>
                        </tr>';
                    }
                    echo '</table>';
                ?>
            <form action="vaccine.php">
                    <input type="submit" value="Return">
            </form>
            </section>
        </section>
        <?php
            $connection = NULL;
        ?>
    </body>
    
</html>