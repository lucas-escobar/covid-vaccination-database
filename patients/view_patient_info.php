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
                    $ohip = $_POST["ohip"];
                    $query = "SELECT FirstName, LastName FROM patient WHERE POHIP=$ohip";
                    $result = $connection->query($query);
                    while ($row = $result->fetch()) {
                        $fname = $row["FirstName"];
                        $lname = $row["LastName"];
                    }
                    $query = "SELECT Lot, Date, Time FROM vaccination WHERE VOHIP=$ohip";
                    $result = $connection->query($query);
                    echo '<h2>Vaccination status for '.$fname.' '.$lname.' ('.$ohip.')</h2>';
                    echo '<table>
                        <tr>
                            <th>Company</th>
                            <th>Lot</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>';
                    while ($row = $result->fetch()){
                        $lot = $row["Lot"];
                        $query2 = "SELECT CName FROM vaccine WHERE Lot='$lot'";
                        $result2 = $connection->query($query2);
                        while($row2 = $result2->fetch()){
                            $company = $row2["CName"];
                        }
                        echo '<tr>
                            <td>'.$company.'</td>
                            <td>'.$row["Lot"].'</td>
                            <td>'.$row["Date"].'</td>
                            <td>'.$row["Time"].'</td>
                        </tr>';
                    }
                    echo '</table>';
                ?>
            <form action="patients.php">
                    <input type="submit" value="Return">
            </form>
            </section>
        </section>
        <?php
            $connection = NULL;
        ?>
    </body>
    
</html>