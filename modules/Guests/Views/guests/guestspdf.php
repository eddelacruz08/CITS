<br>
<br>
<table border="1" style="padding: 5px;">
	<tbody>
		<tr align="center" style="background-color:#001f3f; color: white;">
			<th width="5%">#</th>
			<th width="25%">Fullname</th>
			<th width="15%">GuestType</th>
			<th width="15%">Gender</th>
			<th width="20%">Email</th>
			<th width="20%">Phone</th>
		</tr>
	</tbody>
<?php $cnt=1;?>
<?php foreach($guests as $guest):?>
	<tbody>
		<tr align="center">
			<th width="5%"><?=$cnt++?></th>
			<td width="25%"><?=ucwords($guest['lastname'].', '.$guest['firstname'])?></td>
			<td width="15%"><?=ucfirst($guest['guest_type'])?></td>
			<td width="15%"><?=ucfirst($guest['gender'])?></td>
			<td width="20%"><?=$guest['email']?></td>
			<td width="20%"><?=ucwords($guest['cellphone_no'])?></td>
		</tr>
	</tbody>
<?php endforeach;?>
</table>