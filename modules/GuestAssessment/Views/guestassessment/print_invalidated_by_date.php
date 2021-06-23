<br>
<br>
    <table border="1" style="padding: 10px;">
        <thead>
            <tr align="center" style="background-color:#001f3f; color: white;">
                <th width="5%"><b>#</b></th>
                <th width="20%"><b>Fullname</b></th>
                <th width="15%"><b>Gender</b></th>
                <th width="20%"><b>GuestType</b></th>
                <th width="20%"><b>Phone</b></th>
                <th width="20%"><b>Reasons</b></th>
            </tr>
        </thead>
        <tbody>
        <?php $cnt = 1; ?>
        <?php foreach ($generateInvalidatedByDates as $generateInvalidatedByDate): ?>
          <tr align="center">
            <th width="5%"><?=$cnt++;?></th>
            <td width="20%"><?=ucwords($generateInvalidatedByDate['firstname'].' '.$generateInvalidatedByDate['lastname'])?></td>
            <td width="15%"><?=ucwords($generateInvalidatedByDate['gender'])?></td>
            <td width="20%"><?=ucwords($generateInvalidatedByDate['guest_type'])?></td>
            <td width="20%"><?=ucwords($generateInvalidatedByDate['cellphone_no'])?></td>
            <td width="20%"><?=ucwords($generateInvalidatedByDate['reason'])?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
    </table>