
<?php $cnt = 1; ?>
<?php foreach($visitsHistory as $visit): ?>
    <tr class="text-center">
        <th scope="row"><?= $cnt++ ?></th>
        <td><?= ucwords($visit['firstname'].' '.$visit['middlename'].' '.$visit['lastname'].' '.$visit['extension']) ?></td>
        <td><?= ucwords($visit['gender'])?></td>
        <td><?= ucwords($visit['guest_type'])?></td>
        <td><?= date('F d, Y h:i a', strtotime($visit['log_in'])) ?></td>
        <td><?= date('F d, Y h:i a', strtotime($visit['log_out'])) ?></td>
        <td class="text-center">
            <?php
                guest_detail_link('guests', 'show-guest', $_SESSION['userPermmissions'], $visit['user_id']);
            ?>
        </td>
    </tr>
<?php endforeach; ?>