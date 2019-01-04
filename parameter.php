<?php
	include("connection.php");
	global $connection;
	global $dbName;
	global $dbField1;
	global $dbField2;
	global $dbField3;
	global $dbField4;
	global $dbField5;
	global $dbField6;
	global $queryInfo;
	global $tableBodyText;
	global $queryField;
	global $querySelect;
	global $preparedQuerySelect;
	$connection = ConnectToDatabase();

	if(isset($_POST["queryInfo"])){
		$queryInfo = $_POST["queryInfo"];
	} else {
		$queryInfo = "";
	}
	if(isset($_POST["queryField"])){
		$queryField = $_POST["queryField"];

		if ($queryField === 'pVendorNoDescription'){
			$dbName = 'Parts';
			$dbField1 = 'VendorNo';
			$dbField2 = 'Description';
		} elseif ($queryField === 'partIDDescription'){
			$dbName = 'Parts';
			$dbField1 = 'PartID';
			$dbField2 = 'Description';
		} elseif ($queryField === 'vVendorNoName'){
			$dbName = 'Vendors';
			$dbField1 = 'VendorNo';
			$dbField2 = 'VendorName';
		} elseif ($queryField === 'nameAddress'){
			$dbName = 'Vendors';
			$dbField1 = 'VendorName';
			$dbField2 = 'Address1';
			$dbField3 = 'City';
			$dbField4 = 'Prov';
			$dbField5 = 'PostCode';
			$dbField6 = 'Country';
		} elseif ($queryField === 'nameContact'){
			$dbName = 'Vendors';
			$dbField1 = 'VendorName';
			$dbField2 = 'Phone';
			$dbField3 = 'Fax';
		} else {
			$dbName = false;
		}

		if($queryField === 'nameAddress'){
			$querySelect = "SELECT $dbField1, $dbField2, $dbField3, $dbField4, $dbField5, $dbField6 FROM $dbName";
		} elseif ($queryField === 'nameContact'){
			$querySelect = "SELECT $dbField1, $dbField2, $dbField3 FROM $dbName";
		} else {
			$querySelect = "SELECT $dbField1, $dbField2 FROM $dbName";
		}

		$preparedQuerySelect = $connection -> prepare($querySelect);
		$preparedQuerySelect -> execute();

		if($dbName != false && $queryInfo === ""){
			
			echo("<table>");
			echo("<tr><th>$dbField1</th><th>$dbField2</th>");

			if($queryField == 'nameAddress'){
				echo("<th>$dbField3</th><th>$dbField4</th><th>$dbField5</th><th>$dbField6</th>");
			}
			if($queryField == 'nameContact'){
				echo("<th>$dbField3</th>");
			}

			echo("</tr>");

			while ($row = $preparedQuerySelect -> fetch())
			{
				$field1 = $row["$dbField1"];
				$field2 = $row["$dbField2"];

				if(is_numeric($field1)){
					$field1 = (int)$field1;
				}

				$tableBodyText .= "<tr>";
				$tableBodyText .= "<td>$field1</td>";
				$tableBodyText .= "<td>$field2</td>";

				if($queryField === 'nameAddress'){
					$field3 = $row["$dbField3"];
					$field4 = $row["$dbField4"];
					$field5 = $row["$dbField5"];
					$field6 = $row["$dbField6"];
					$tableBodyText .= "<td>$field3</td>";
					$tableBodyText .= "<td>$field4</td>";
					$tableBodyText .= "<td>$field5</td>";
					$tableBodyText .= "<td>$field6</td>";
				}
				if($queryField === 'nameContact'){
					$field3 = $row["$dbField3"];
					$tableBodyText .= "<td>$field3</td>";
				}

				$tableBodyText .= "</tr>";

			}

			echo $tableBodyText;

			echo("</table>");
		}

		if($dbName != false && $queryInfo != ""){
			
			global $matchFound;
			$matchFound = false;

			$tableBodyText = "Your search for $queryInfo in the $dbName yeilded the following results:<br>";
			
			echo("<table>");
			//echo("<tr><th>$dbField1</th><th>$dbField2</th>");
			$tableBodyText .= "<tr><th>$dbField1</th><th>$dbField2</th>";
			if($queryField == 'nameAddress'){
				//echo("<th>$dbField3</th><th>$dbField4</th><th>$dbField5</th><th>$dbField6</th>");
				$tableBodyText .= "<tr><th>$dbField1</th><th>$dbField2</th><th>$dbField3</th><th>$dbField4</th><th>$dbField5</th><th>$dbField6</th>";
			}
			if($queryField == 'nameContact'){
				//echo("<th>$dbField3</th>");
				$tableBodyText .= "<tr><th>$dbField1</th><th>$dbField2</th><th>$dbField3</th>";
			}

			//echo("</tr>");
			$tableBodyText .= "</tr>";

			while ($row = $preparedQuerySelect -> fetch())
			{
				$field1 = $row["$dbField1"];
				$field2 = $row["$dbField2"];

				if(is_numeric($field1)){
					$field1 = (int)$field1;
				}

				if($queryField != 'nameAddress' && $queryField != 'nameContact'){
					if(strpos($field1, $queryInfo) !== false || strpos($field2, $queryInfo) !== false){
						$matchFound = true;
						$tableBodyText .= "<tr>";
						$tableBodyText .= "<td>$field1</td>";
						$tableBodyText .= "<td>$field2</td>";
						$tableBodyText .= "</tr>";
					}
				} elseif ($queryField === 'nameAddress'){
					$field3 = $row["$dbField3"];
					$field4 = $row["$dbField4"];
					$field5 = $row["$dbField5"];
					$field6 = $row["$dbField6"];
					if(strpos($field1, $queryInfo) !== false 
						|| strpos($field2, $queryInfo) !== false
						|| strpos($field3, $queryInfo) !== false
						|| strpos($field4, $queryInfo) !== false
						|| strpos($field5, $queryInfo) !== false
						|| strpos($field6, $queryInfo) !== false
						)
					{
						$matchFound = true;
						$tableBodyText .= "<tr>";
						$tableBodyText .= "<td>$field1</td>";
						$tableBodyText .= "<td>$field2</td>";
						$tableBodyText .= "<td>$field3</td>";
						$tableBodyText .= "<td>$field4</td>";
						$tableBodyText .= "<td>$field5</td>";
						$tableBodyText .= "<td>$field6</td>";
						$tableBodyText .= "</tr>";
					}
				} elseif ($queryField === 'nameContact'){
					$field3 = $row["$dbField3"];
					if(strpos($field1, $queryInfo) !== false 
						|| strpos($field2, $queryInfo) !== false
						|| strpos($field3, $queryInfo) !== false
						)
					{
						$matchFound = true;
						$tableBodyText .= "<tr>";
						$tableBodyText .= "<td>$field1</td>";
						$tableBodyText .= "<td>$field2</td>";
						$tableBodyText .= "<td>$field3</td>";
						$tableBodyText .= "</tr>";
					}
				}
			}

			if($matchFound === false){
				$tableBodyText = "<tr><td>No matches in $dbName for fields matching $queryInfo.</td></tr>";
			}

			echo $tableBodyText;

			echo("</table>");
		}
	}
?>