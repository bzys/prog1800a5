<?php
	include("connection.php");

	global $connection;
	$connection = ConnectToDatabase();

	if(isset($_POST["vendorNo2"])){
		global $vendorNo2;
		$vendorNo2 = $_POST["vendorNo2"];

		if(isset($_POST["vendorName"])){
			global $vendorName;
			$vendorName = $_POST["vendorName"];

			if(isset($_POST["address1"])){
				global $address1;
				$address1 = $_POST["address1"];
				
				if(isset($_POST["address2"]) && $_POST["address2"] != ""){
					global $address2;
					global $address2used;
					$address2 = $_POST["address2"];
					$address2used = true;
				} else {
					global $address2used;
					global $address2;
					$address2 = "n/a";
					$address2used = false;
				}

				if(isset($_POST["city"])){
					global $city;
					$city = $_POST["city"];

					if(isset($_POST["postalCode"])){
						global $postalCode;
						$postalCode = $_POST["postalCode"];

						if(isset($_POST["province"])){
							global $province;
							$province = $_POST["province"];
	
							if(isset($_POST["country"])){
								global $country;
								$country = $_POST["country"];
		
								if(isset($_POST["phoneNum"])){
									global $phoneNum;
									$phoneNum = $_POST["phoneNum"];
			
									if(isset($_POST["faxNum"]) && $_POST["faxNum"] != ""){
										global $faxNumUsed;
										global $faxNum;
										$faxNum = $_POST["faxNum"];	
										$faxNumUsed = true;
									} else {
										global $faxNumUsed;
										global $faxNum;
										$faxNum = "n/a";
										$faxNumUsed = false;	
									}

									echo('<p>You have decided to add the following information into the Vendors table:</p><br>');
									echo('<table><tr><td>VendorNo:</td><td>VendorName</td><td>Address1</td><td>Address2</td><td>City</td><td>Prov</td><td>PostCode</td><td>Country</td><td>Phone</td><td>Fax</td></tr>');
									echo("<tr><td>$vendorNo2</td><td>$vendorName</td><td>$address1</td><td>$address2</td><td>$city</td><td>$postalCode</td><td>$province</td><td>$country</td><td>$phoneNum</td><td>$faxNum</td></tr></table>");

									global $insert;

									if($address2used == true){
										$insert = "INSERT INTO Vendors (VendorNo, VendorName, Address1, Address2, City, Prov, PostCode, Country, Phone) VALUES ('$vendorNo2' , '$vendorName', '$address1', '$address2', '$city', '$postalCode', '$province', '$country', '$phoneNum')";
									} else if ($faxNumUsed == true){
										$insert = "INSERT INTO Vendors (VendorNo, VendorName, Address1, City, Prov, PostCode, Country, Phone, Fax) VALUES ('$vendorNo2' , '$vendorName', '$address1', '$city', '$postalCode', '$province', '$country', '$phoneNum', '$faxNum')";
									} else if ($address2used == true && $faxNumUsed == true){
										$insert = "INSERT INTO Vendors (VendorNo, VendorName, Address1, Address2, City, Prov, PostCode, Country, Phone, Fax) VALUES ('$vendorNo2' , '$vendorName', '$address1', '$address2', '$city', '$postalCode', '$province', '$country', '$phoneNum', '$faxNum')";
									} else{
										$insert = "INSERT INTO Vendors (VendorNo, VendorName, Address1, City, Prov, PostCode, Country, Phone) VALUES ('$vendorNo2' , '$vendorName', '$address1', '$city', '$postalCode', '$province', '$country', '$phoneNum')";
									}

									try{
										$preparedQuerySelect = $connection -> prepare($insert);
										$preparedQuerySelect -> execute();
										echo("<br><p>You have succesfully added the information into the Vendors table.</p>");
									}catch(Exception $e){
										echo $insert . "<br>" . $e->getMessage();
									}
								}
							}
						}
					}
				}
			}
		}
	}

?>
