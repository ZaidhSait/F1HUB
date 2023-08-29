<!DOCTYPE html>
<html>
<head>
	<title>Sales Report</title>
</head>
<body>
<div class="card card-outline card-primary">
<div class="card-header">
		<h3 class="card-title">Sales Report</h3>
</div>
<div class="card-body">
		<div class="container-fluid">
        
	<form method="post" action="">
	
		<label for="start_date">Start Date:</label>
		<input type="date" id="start_date" name="start_date">
		<label for="end_date">End Date:</label>
		
		<input type="date" id="end_date" name="end_date">
		<input type="submit" value="Generate Report">
	</form>
	
	<table class="table table-bordered table-stripped">
		<colgroup>
					<col width="5%">
					<col width="5%">
					<col width="25%">
					<col width="25%">
					</colgroup>
					<thead>
					<tr>
						<th>Date</th>
						<th>Order Id</th>
						<th>Product Name</th>
						<th>Amount</th>
						</tr>
				</thead>
				<tbody id="mytbody">
					
				</tbody>
		</table>
		
		</div>
		</div>
		
		
		

</div>

	
</div>
<!-- <script>
	function generateSalesReport() {
		var startDate = document.getElementById("start_date").value;
		var endDate = document.getElementById("end_date").value;
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "generate_sales_report.php", true);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.onreadystatechange = function() {
			if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
				var response = JSON.parse(this.responseText);
				if (response.status === "success") {
					var link = document.createElement("a");
					link.href = response.url;
					link.download = "sales_report.csv";
					link.click();
					document.getElementById("sales_report_message").innerHTML = "";
				} else {
					document.getElementById("sales_report_message").innerHTML = "Error generating sales report.";
				}
			}
		};
		xhr.send("start_date=" + startDate + "&end_date=" + endDate);
	}
</script> -->

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$startDate = $_POST["start_date"];
		$endDate = $_POST["end_date"];
		$filename = "sales_report_" . $startDate . "_" . $endDate . ".csv";
		$data = array(
			array("Date", "Order ID", "Product Name", "Total Amount")
		);
		
		// Connect to MySQL database
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "fishykart";
		
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		// Fetch sales data from database and populate the $data array
		$sql = "SELECT date_created, total_amount FROM sales WHERE date_created BETWEEN '$startDate' AND '$endDate'";
		$result = mysqli_query($conn, $sql);
		
	
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$date_created = $row["date_created"];
				$sql1 = "SELECT id FROM orders WHERE date_created = '$date_created'";
				$result1=mysqli_query($conn,$sql1);
				
				if (mysqli_num_rows($result1) > 0) {
					while ($row1 = mysqli_fetch_assoc($result1)) {
						$order_id = $row1["id"];
						$sql2="SELECT product_id FROM order_list WHERE order_id = '$order_id'";
						$result2=mysqli_query($conn,$sql2);
						
						if (mysqli_num_rows($result2) > 0) {
							while ($row2 = mysqli_fetch_assoc($result2)) {
								$product_id = $row2["product_id"];
								$sql3="SELECT product_name FROM products WHERE id = '$product_id'";
								$result3=mysqli_query($conn,$sql3);
								if (mysqli_num_rows($result3) > 0) {
									while ($row3 = mysqli_fetch_assoc($result3)) {
										$productname=$row3["product_name"];
										$data[] = array($date_created,$order_id, $productname, $row["total_amount"]);
									}
								}
							}
						}
					}
				}
				
			}
			
			mysqli_close($conn);
			
			// Send data to JavaScript
			echo '<script>';
			echo 'var data = ' . json_encode($data) . ';';
			echo '</script>';
		}
	}
?>

<!-- $data[] = array($row["date_created"], $row["total_amount"]); -->

<!-- Create a download button if data is available -->
<?php if (isset($data) && count($data) > 1) : ?>
	<button onclick="downloadCSV()">Download CSV</button>
<?php endif; ?>

<!-- Display table using JavaScript -->


<script>
	// Create table using data
	function createTable() {
		var tbody = document.getElementById('mytbody');
		var rows = '';
		for (var i = 1; i < data.length; i++) {
			rows += '<tr><td>' + data[i][0] + '</td><td>' + data[i][1] + '</td><td>' + data[i][2] + '</td><td>' + data[i][3] + '</td></tr>';
		}
		tbody.innerHTML = rows;
		
	}
	
	// Download CSV file
	function downloadCSV() {
    var csv = 'Date,OrderID,Product Name,Amount, Grand Total\n';
	var grandTotal = 0;
    for (var i = 1; i < data.length; i++) {
        var date = new Date(data[i][0]); // parse the date string
        var formattedDate = date.toLocaleDateString(); // format the date
		
        csv += formattedDate + ',' + data[i][1] +',' + data[i][2] +',' + data[i][3] +  '\n';
		grandTotal += parseInt(data[i][3]); // add the value to the total amount
    }
	csv += ',,,,' + grandTotal + '\n'; // write the grand total in the third column, one row below the last row of data
    var link = document.createElement('a');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv));
    link.setAttribute('download', '<?php echo $filename; ?>');
    link.style.display = 'none';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

	
	// Call createTable function on page load
	window.onload = createTable;
</script>
</body>
</html>