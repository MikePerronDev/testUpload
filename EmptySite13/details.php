<?php
    require 'connectDB.php';       

    $ID= mysqli_escape_string($db, $_GET['ID']);
	$query = "SELECT*FROM Products WHERE prodID ='$ID' " ;
	$result = mysqli_query($db, $query); 
    $row = mysql_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/detailsStyleSheet.css" rel="stylesheet" type="text/css" >
        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js">
            </script>
        <![endif]-->
        <title>company name - Wine details</title>
    </head>
    <body>
        <?php include 'header.php'; ?> 
        <p class="paragraph">
            <?php
                while($row = $result->fetch_assoc()){
					echo "<tr><td>".$row["prodName"]."</td></tr>";
			    }
            ?>
        </p>
        <form action="connectDB.php" method="post">
		    <?php
			    $result = mysqli_query($db, $query); 
			    if ($result->num_rows > 0){
				    echo "<table>
                            <tr>
                                <th>Product ID</th>
                                <th>Name</th>
                                <th>Bottle Charge</th> 
                                <th>Price</th> 
                                <th>Format(ml)</th> 

                            </tr>";
			    while($row = $result->fetch_assoc()){
				    echo "  <tr>
                                <td>".$row["prodID"]."</td>
                                <td>".$row["prodName"]."</td>
                                <td>".$row["prodBottleCharge"]."</td>
                                <td>".$row["prodSellPrice"]."</td>
                                <td>".$row["prodFormat"]."</td>
                            </tr>";
			    }
				    echo "</table>";
		        }
			    else{
				    echo "mmm something went wrong...";
			    }
            ?>
        </form>
        <?php include 'footer.php'; ?>
    </body>
</html>
