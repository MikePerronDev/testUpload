<?php
    require 'connectDB.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/suppliersStyleSheet.css" rel="stylesheet" type="text/css" >
        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js">
            </script>
        <![endif]-->
        <title>company name - Suppliers</title>
    </head>
    <body>
        <div class="container">
            <?php include 'header.php'; ?>
             <p class="paragraph">Our Suppliers...</p>
                <form action="connectDB.php" method="post">
		            <?php
			            $query = "SELECT*FROM Suppliers ORDER BY Suppliers.suppID ASC  LIMIT 30" ;
			            $result = mysqli_query($db, $query); 
			            if ($result->num_rows > 0){
				            echo "<table>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>City</th>
                                            <th>Contact</th>
                                        </tr>";
				            while($row = $result->fetch_assoc()){
					            echo "<tr>
                                        <td>".$row["suppID"]."</td>
                                        <td>".$row["suppName"]."</td>
                                        <td>".$row["suppCity"]."</td>
                                        <td>".$row["suppContact"]."</td>
                                        </tr>";
			                }
				            echo "</table>";
		                }
			            else{
				            echo "Aucun résultat...";
			            }
                    ?>
                </form>
            <?php include 'footer.php'; ?>
        </div>
    </body>
</html>
