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
			<th>Room Number</th>
			<th>Room Type</th>
			<th>Room Price</th>
			<th>Room Details</th>	
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			foreach ($rooms as $r) {
				?>
				<tr>
					<td><?php echo $r['ROOM_NUMBER'] ?></td>
					<td><?php echo $r['ROOM_TYPE'] ?></td>
					<td><?php echo $r['ROOM_PRICE'] ?></td>
                    <td><?php echo $r['ROOM_DETAILS'] ?></td>
					<td>
						<a href="<?php echo URL; ?>room/add/<?php echo $r['ROOM_NUMBER'] . '/' . $_POST['CHECKIN_DATE'] . '/' . $_POST['CHECKOUT_DATE'] ?>">Reserve</a>
					</td>
				</tr>
				<?php
				
			}
		?>
		<tr></tr>
	</tbody>
</table>