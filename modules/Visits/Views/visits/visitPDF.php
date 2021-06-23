<br>
<br>
    <table border="1" style="padding: 10px;">
        <thead>
            <tr align="center" style="background-color:#001f3f; color: white;">
                <th width="5%"><b>#</b></th>
                <th width="20%"><b>Fullname</b></th>
                <th width="15%"><b>Gender</b></th>
                <th width="15%"><b>GuestType</b></th>
                <th width="15%"><b>Phone</b></th>
                <th width="15%"><b>Timein</b></th>
                <th width="15%"><b>Timeout</b></th>
            </tr>
        </thead>
        <tbody>
        <?php $cnt = 1; ?>
        <?php foreach ($visits as $visit): ?>
          <tr align="center">
            <th width="5%"><?=$cnt++;?></th>
            <td width="20%"><?=ucwords($visit['firstname'].' '.$visit['lastname'])?></td>
            <td width="15%"><?=ucwords($visit['gender'])?></td>
            <td width="15%"><?=ucwords($visit['guest_type'])?></td>
            <td width="15%"><?=ucwords($visit['cellphone_no'])?></td>
            <td width="15%"><?= date('h:m:s a', strtotime($visit['log_in'])) ?></td>
            <td width="15%"><?= date('h:m:s a', strtotime($visit['log_out'])) ?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
    </table>