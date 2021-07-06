<br>
<br>
    <table border="1" style="padding: 10px;">
        <thead>
            <tr align="center" style="background-color:#001f3f; color: white;">
                <th width="5%"><b>#</b></th>
                <th width="20%"><b>Fullname</b></th>
                <th width="15%"><b>Gender</b></th>
                <th width="15%"><b>GuestType</b></th>
                <th width="15%"><b>Timein</b></th>
                <th width="15%"><b>Timeout</b></th>
                <th width="15%"><b>No. of hours</b></th>
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
            <td width="15%"><?= date('h:i:s a', strtotime($visit['log_in'])) ?></td>
            <?php if($visit['log_out']==null):?>
              <td width="15%">NO DATA</td>
              <td width="15%">NO DATA</td>
            <?php else:?>
              <td width="15%"><?= date('h:i:s a', strtotime($visit['log_out'])) ?></td>
              <?php
                $start = new \DateTime($visit['log_in']);
                $end   = new \DateTime($visit['log_out']);
                $interval = $end->diff($start);

                $time = sprintf(
                    '%d:%02d:%02d',
                    ($interval->d * 24) + $interval->h,
                    $interval->i,
                    $interval->s
                );
              ?>
              <td width="15%"><?=$time;?></td>
            <?php endif;?>
          </tr>
        <?php endforeach; ?>
        </tbody>
    </table>