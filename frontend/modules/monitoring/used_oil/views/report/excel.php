<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table border="1">
	<thead style="background-color: #ff9900;">
	<th class="th_table">No</th>
		<th class="th_table">Group</th>
                            <th class="th_table">Branch</th>
                            <th class="th_table">Customer Name</th>
                            <th class="th_table">Lab Number</th>
                            <th class="th_table">Sample Date</th>
                            <th class="th_table">Receive Date</th>
                            <th class="th_table">Report Date</th>
                            <th class="th_table">Unit Number</th>
                            <th class="th_table">Component</th>
                            <th class="th_table">Model</th>
                            <th class="th_table">Serial No.</th>
                            <th class="th_table">Oil Chg</th>
                            <th class="th_table">Status</th>
	</thead>
	<tbody><?php $i=1; ?>
		<?php foreach ($data as $dat) {?>
		<tr style="background-color:">
		<td><?php echo $i++; ?></td>
			<td><?php echo $dat['grouploc'];?></td>
			<td><?php echo $dat['branch'];?></td>
			<td><?php echo $dat['customer_name'];?></td>
			<td><?php echo $dat['lab_no'];?></td>
			<td><?php echo $dat['sample_date'];?></td>
			<td><?php echo $dat['receive_date'];?></td>
			<td><?php echo $dat['report_date'];?></td>
			<td><?php echo $dat['unit_number'];?></td>
			<td><?php echo $dat['component_name'];?></td>
			<td><?php echo $dat['model'];?></td>
			<td><?php echo $dat['lab_no'];?></td>
			<td><?php echo $dat['oil_change'];?></td>
			<td><?php echo $dat['eval_code'];?></td>
		</tr>

		<?php } ?>
	</tbody>
</table>
</body>
</html>