<style>
	table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #346CE9;
  color: white;
}
</style>
<table>
	<thead>
		<tr>
			<th>Customer #ID</th>
			<th>Customer Fname</th>
			<th>Customer Lname</th>
			<th>Customer Phone</th>	
			<th>Customer Email</th>	
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			foreach ($customers as $c) {
				?>
				<tr>
					<td><?php echo $c['CUSTOMER_ID'] ?></td>
					<td><?php echo $c['CUSTOMER_FNAME'] ?></td>
					<td><?php echo $c['CUSTOMER_LNAME'] ?></td>
					<td><?php echo $c['CUSTOMER_PHONE'] ?></td>
					<td><?php echo $c['CUSTOMER_EMAIL'] ?></td>
					<td>
						<a href="">Edit</a>
						<a href="">Remove</a>
						<a href="">Details</a>
					</td>
				</tr>
				<?php
				
			}
		?>
		<tr></tr>
	</tbody>
</table>