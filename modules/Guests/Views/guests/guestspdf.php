

<table border="1">
	<tbody>
		<tr align="center" style="background-color:#001f3f; color: white;">
			<th>ID</th>
			<th>Fullname</th>
			<th>Guest Type</th>
			<th>Gender</th>
			<th>Email Address</th>
			<th>Contact Number</th>
		</tr>
	</tbody>
<?php $cnt=1;?>
<?php foreach($guests as $guest):?>
	<tbody class="thead-dark">
		<tr align="center">
			<th><?=$cnt++?></th>
			<td><?=ucwords($guest['firstname'].' '.$guest['lastname'])?></td>
			<td><?=ucfirst($guest['guest_type'])?></td>
			<td><?=ucfirst($guest['gender'])?></td>
			<td><?=$guest['email']?></td>
			<td><?=ucwords($guest['cellphone_no'])?></td>
		</tr>
	</tbody>
<?php endforeach;?>
</table>