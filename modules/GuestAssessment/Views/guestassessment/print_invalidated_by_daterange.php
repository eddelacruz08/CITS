<br>
<br>
    <table border="1" style="padding: 10px;">
        <thead>
            <tr align="center" style="background-color:#001f3f; color: white;">
                <th width="10%"><b>#</b></th>
                <th width="20%"><b>Fullname</b></th>
                <th width="15%"><b>Gender</b></th>
                <th width="15%"><b>GuestType</b></th>
                <th width="20%"><b>Phone</b></th>
                <th width="20%"><b>Email</b></th>
            </tr>
        </thead>
        <tbody>
        <?php $cnt = 1; ?>
        <?php foreach ($generateInvalidatedByDateranges as $generateInvalidatedByDaterange): ?>
          <tr align="center">
            <th width="10%"><?=$cnt++;?></th>
            <td width="20%"><?=ucwords($generateInvalidatedByDaterange['firstname'].' '.$generateInvalidatedByDaterange['lastname'])?></td>
            <td width="15%"><?=ucwords($generateInvalidatedByDaterange['gender'])?></td>
            <td width="15%"><?=ucwords($generateInvalidatedByDaterange['guest_type'])?></td>
            <td width="20%"><?=ucwords($generateInvalidatedByDaterange['cellphone_no'])?></td>
            <td width="20%"><?=ucwords($generateInvalidatedByDaterange['email'])?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
    </table>