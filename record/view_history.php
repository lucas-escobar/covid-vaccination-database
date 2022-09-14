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
                    date_default_timezone_set("America/Toronto");
                    $ohip = $_POST["ohip"];
                    $dateTime = explode(" ", date('Y-m-d H:i:s'));
                    $date = $dateTime[0];
                    $time = $dateTime[1];
                    $query = 'INSERT INTO vaccination VALUES ("' .$ohip. '","' .$_POST["clinics"]. '","' .$_POST["lot"]. '","' .$date. '","' .$time. '")';
                    $connection->query($query);
                    $query = "SELECT * FROM vaccination WHERE VOHIP=$ohip";
                    $vax = $connection->query($query);
                    $query = "SELECT FirstName, LastName FROM patient WHERE POHIP=$ohip";
                    $patient = $connection->query($query);
                    while ($row = $patient->fetch()){
                        $fname = $row["FirstName"];
                        $lname = $row["LastName"];
                    }
                    echo '<h2>Vaccination history for '.$fname.' '.$lname.'</h2>';
                    echo '<table>
                        <tr>
                            <th>Clinic</th>
                            <th>Lot Number</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>';
                    while ($row = $vax->fetch()){
                        echo '<tr>
                            <td>'.$row["VCName"].'</td>
                            <td>'.$row["Lot"].'</td>
                            <td>'.$row["Date"].'</td>
                            <td>'.$row["Time"].'</td>
                        </tr>';
                    }
                    echo '</table>';
                ?>
                <form action="record.php">
                    <input type="submit" value="Return">
                </form>
            </section>
        </section>
        <?php
            $connection = NULL;
        ?>
    </body>
</html>