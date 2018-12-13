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
			<th>Employee #ID</th>
			<th>Employee Username</th>	
			<th>Employee Fname</th>
			<th>Employee Lname</th>
			<th>Employee Phone</th>	
			<th>Employee Email</th>	
			<th>Employee Salary</th>	
			<th>Employee Hiredate</th>	
			<th>Department #ID</th>	
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			foreach ($employees as $e) {
				?>
				<tr>
					<td><?php echo $e['EMP_ID'] ?></td>
					<td><?php echo $e['EMP_USERNAME'] ?></td>
					<td><?php echo $e['EMP_FNAME'] ?></td>
					<td><?php echo $e['EMP_LNAME'] ?></td>
					<td><?php echo $e['EMP_PHONE'] ?></td>
					<td><?php echo $e['EMP_EMAIL'] ?></td>
					<td><?php echo $e['EMP_SALARY'] ?></td>
					<td><?php echo $e['EMP_HIREDATE'] ?></td>
					<td><?php echo $e['DEPT_ID'] ?></td>
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