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
			<th>Reservation #ID</th>
			<th>Check-In Date</th>
			<th>Check-Out Date</th>
			<th>Reservation Date</th>	
			<th>Price</th>	
			<th>Status</th>
			<th>Customer #ID</th>
			<th>Employee #ID</th>
			<th>Room Number</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			foreach ($reservations as $r) {
				?>
				<tr>
					<td><?php echo $r['RSV_ID'] ?></td>
					<td><?php echo $r['CHECKIN_DATE'] ?></td>
					<td><?php echo $r['CHECKOUT_DATE'] ?></td>
					<td><?php echo $r['RSV_DATE'] ?></td>
					<td><?php echo $r['RSV_PRICE'] ?></td>
					<td><?php echo $r['RSV_STATUS'] ?></td>
					<td><?php echo $r['CUSTOMER_ID'] ?></td>
					<td><?php echo $r['EMP_ID'] ?></td>
					<td><?php echo $r['ROOM_NUMBER'] ?></td>
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