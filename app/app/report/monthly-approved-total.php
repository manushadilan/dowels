
	<?php 
	include("report-head.php");
	
		echo"<h4 align='center'>Monthly Approved Total</h5>";

		if ($result = $mysqli->query("SELECT DATE_FORMAT(PayDate, '%m-%Y') AS Month, sum(Amount) AS Total FROM payment WHERE Approved='1' GROUP BY DATE_FORMAT(PayDate, '%m-%Y') " ))
		{
			if ($result->num_rows > 0)
			{
			// display records in a table
			echo "<table class='table table-bordered' id='table'>";

			// set table headers
			echo "<tr><th>MONTH</th><th>Total</th></tr>";

			while ($row = $result->fetch_object())
			{
				// set up a row for each record
				echo "<tr>";
				echo "<td >" . $row->Month . "</td>";
				echo "<td>" . $row->Total . "</td>";
				
				echo "</tr>";
			}

			echo "</table>";
		}
		else
		{
		echo "No results to display!<br />";
		}
	}

include("report-footer.php");

	?>