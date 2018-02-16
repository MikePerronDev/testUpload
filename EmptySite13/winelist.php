<?php
    require 'connectDB.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/wineListStyleSheet.css" rel="stylesheet" type="text/css" >
        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js">
            </script>
        <![endif]-->
        <title>company name - Wine List</title>
    </head>
    <body>
        <div class="container">
            <?php include 'header.php'; ?>
             <p class="paragraph">Our wines...</p>
                <form action="connectDB.php" method="post">
		            <?php
			            $query = "SELECT*FROM Products INNER JOIN colorProd ON Products.prodColorID = colorProd.colprodID 
                                 AND Products.prodSellPrice>0 ORDER BY Products.prodSellPrice ASC  LIMIT 30" ;
			            $result = mysqli_query($db, $query); 

			                if ($result->num_rows > 0){
				                echo "<table>
                                            <tr>
                                                <th>Name</th>
                                                <th>Color</th> 
                                                <th>Price</th> 
                                                <th>Price</th> 
                                            </tr>";
				                while($row = $result->fetch_assoc()){
					                echo "<tr>
                                            <td><a href='details.php?ID={$row['prodID']}'>".$row["prodName"]."</a></td>
                                            <td>".$row["colprodDesc"]."</td>
                                            <td>".$row["prodSellPrice"]."</td>
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
