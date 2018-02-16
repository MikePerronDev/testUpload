<?php
    require 'connectDB.php';

    if (isset($_POST['addWine'])) 
    {
    $name = $_POST['prodName'];
    $color = $_POST['prodColorID'];
    $pack = $_POST['prodPack'];
    $format = $_POST['prodFormat'];
    $price = $_POST['prodPriceBuy'];

     $query = "SELECT * FROM Products WHERE prodName ='$name'";
		$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results)!= 0){
				echo "this name is already taken...";
			}
            else{			
			    $query = "INSERT INTO Products (prodName, prodColorID, prodPack, prodFormat, prodPriceBuy) 
					                        VALUES('$name','$color', '$pack', '$format', '$price')";
                    if ($db->query($query) === TRUE){
                        echo "Your wine was submitted successfully!";
                    } 
                    else{
                        echo "Error: " . $query . "<br>" . $db->error;
                    }
                }
	        }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/formStyleSheet.css" rel="stylesheet" type="text/css" >
        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js">
            </script>
        <![endif]-->
        <title>company name - Add your wine</title>
    </head>
    <body>
        <div class="container">
            <?php include 'header.php'; ?>
             <p class="paragraph">Submit your wine!</p>
        </form>
                <div class="addWineForm">
                    <h2>Please fill the form below to submit your wine to our list</h2>
                    <form method="post" action="form.php">
                        <p>Wine's Name</p>
                        <input type="text" name="prodName" placeholder="Your wine's name" required>
                        <p>Color</p>
                        <select name="prodColorID" required>
                            <option value="1">red</option>
                            <option value="2">white</option>
                            <option value="3">rosé</option>
                            <option value="4">other</option>
                        </select>
                        <p>Pack size</p>
                        <input type="text" name="prodPack" placeholder="number of bottles in a pack" required>
                        <p>Format</p>
                        <input type="text" name="prodFormat" placeholder="Format (ml)" required>
                        <p>Product Price</p>
                        <input type="text" name="prodPriceBuy" placeholder="Price" required>
                        <input type="submit" name="addWine" value="Submit" required>
                
                 </form>
                </div>
            <?php include 'footer.php'; ?>
        </div>
    </body>
</html>
