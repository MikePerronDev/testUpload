<?php
    require 'connectDB.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/regionsStyleSheet.css" rel="stylesheet" type="text/css" >
        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js">
            </script>
        <![endif]-->
        <title>company name - Regions</title>
    </head>
    <body>
        <div class="container">
            <?php include 'header.php'; ?>
                <p class="paragraph">Where it comes from...</p>
                
        <form action="connectDB.php" method="post">
		<?php
			$query = "SELECT*FROM Country INNER JOIN Regions ON Country.CountryID = Regions.regionCountryID";
			$result = mysqli_query($db, $query); 

			    if ($result->num_rows > 0)
			    {
				    echo "<table>
                                <tr>
                                    <th>regions</th>
                                    <th>Country</th> 
                                </tr>";
				    while($row = $result->fetch_assoc())
				    {
					    echo "<tr>
                                <td>".$row["regionName"]."</td>
                                <td>".$row["CountryName"]."</td>
                              </tr>";
			    }
				    echo "</table>";
		        }
			    else
			    {
				    echo "Aucun résultat...";
			    }
        ?>
        </form>


            <?php include 'footer.php'; ?>
        </div>
    </body>
</html>
