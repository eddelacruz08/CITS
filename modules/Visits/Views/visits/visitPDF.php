<p align="center">Date: <?= date('F d, Y')?></p>
<br>
<br>
    <table border="1">
        <thead>
            <tr align="center">
                <th width="5%"><b>#</b></th>
                <th width="20%"><b>Fullname</b></th>
                <th width="10%"><b>Gender</b></th>
                <th width="15%"><b>GuestType</b></th>
                <th width="25%"><b>Login</b></th>
                <th width="25%"><b>Logout</b></th>
            </tr>
        </thead>
        <tbody>
        <?php $cnt = 1; ?>
        <?php foreach ($visits as $visit): ?>
          <tr align="center">
            <th width="5%"><?=$cnt++;?></th>
            <td width="20%"><?=ucwords($visit['firstname'].' '.$visit['lastname'])?></td>
            <td width="10%"><?=ucwords($visit['gender'])?></td>
            <td width="15%"><?=ucwords($visit['guest_type'])?></td>
            <td width="25%"><?= date('F d, Y h:m a', strtotime($visit['log_in'])) ?></td>
            <td width="25%"><?= date('F d, Y h:m a', strtotime($visit['log_out'])) ?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
    </table>