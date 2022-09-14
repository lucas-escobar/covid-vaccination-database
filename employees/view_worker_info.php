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
                $clinic = $_POST["clinic"];
                $query = "SELECT healthcareworker.FirstName, healthcareworker.LastName FROM healthcareworker, nurseassignment 
                    WHERE healthcareworker.ID=nurseassignment.ID AND nurseassignment.VCName='$clinic'";
                $nurses = $connection->query($query);
                $query = "SELECT FirstName, LastName FROM healthcareworker, docassignment 
                    WHERE healthcareworker.ID=docassignment.ID AND docassignment.VCName='$clinic'";
                $doctors = $connection->query($query);
                echo '<h2>Employees located at '.$clinic.'</h2>';
                    echo '<table>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Profession</th>
                        </tr>';
                    while ($row = $doctors->fetch()){
                        echo '<tr>
                            <td>'.$row["FirstName"].'</td>
                            <td>'.$row["LastName"].'</td>
                            <td>Doctor</td>
                        </tr>';
                        }
                    while ($row = $nurses->fetch()){
                        echo '<tr>
                            <td>'.$row["FirstName"].'</td>
                            <td>'.$row["LastName"].'</td>
                            <td>Nurse</td>
                        </tr>';
                    }
                    echo '</table>';
                ?>
            <form action="workers.php">
                    <input type="submit" value="Return">
            </form>
            </section>
        </section>
        <?php
            $connection = NULL;
        ?>
    </body>
    
</html>