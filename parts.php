<?php
	include("connection.php");

	global $connection;
	$connection = ConnectToDatabase();

	if(isset($_POST["vendorNo1"])){
		global $vendorNo1;
		$vendorNo1 = $_POST["vendorNo1"];

		if(isset($_POST["partDesc"])){
			global $partDesc;
			$partDesc = $_POST["partDesc"];

			if(isset($_POST["qtyOnHand"])){
				global $qtyOnHand;
				$qtyOnHand = $_POST["qtyOnHand"];
				
				if(isset($_POST["qtyOnOrder"])){
					global $qtyOnOrder;
					$qtyOnOrder = $_POST["qtyOnOrder"];

					if(isset($_POST["partCost"])){
						global $partCost;
						$partCost = $_POST["partCost"];

						if(isset($_POST["listPrice"])){
							global $listPrice;
							$listPrice = $_POST["listPrice"];

							echo('<p>You have decided to add the following information into the Parts table:</p><br>');
							echo('<table><tr><td>VendorNo:</td><td>Description</td><td>OnHand</td><td>OnOrder</td><td>Cost</td><td>ListPrice</td></tr>');
							echo("<tr><td>$vendorNo1</td><td>$partDesc</td><td>$qtyOnHand</td><td>$qtyOnOrder</td><td>$partCost</td><td>$listPrice</td></tr></table>");

							global $insert;
							$insert = "INSERT INTO Parts (VendorNo, Description, OnHand, OnOrder, Cost, ListPrice) VALUES ('$vendorNo1' , '$partDesc', '$qtyOnHand', '$qtyOnOrder', '$partCost', '$listPrice')";

							try{
								$preparedQuerySelect = $connection -> prepare($insert);
								$preparedQuerySelect -> execute();
								echo("<br><p>You have succesfully added the information into the Parts table.</p>");
							}catch(Exception $e){
								echo $insert . "<br>" . $e->getMessage();
							}
						}
					}
				}
			}
		}
	}

	
?>