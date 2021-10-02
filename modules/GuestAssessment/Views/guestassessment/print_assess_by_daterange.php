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
                <th width="20%"><b>Guest Status</b></th>
            </tr>
        </thead>
        <tbody>
        <?php $cnt = 1; ?>
        <?php foreach ($generateAssessByDateranges as $generateAssessByDaterange): ?>
          <tr align="center">
            <th width="5%"><?=$cnt++;?></th>
            <td width="20%"><?=ucwords($generateAssessByDaterange['firstname'].' '.$generateAssessByDaterange['lastname'])?></td>
            <td width="15%"><?=ucwords($generateAssessByDaterange['gender'])?></td>
            <td width="20%"><?=ucwords($generateAssessByDaterange['guest_type'])?></td>
            <td width="20%"><?=ucwords($generateAssessByDaterange['cellphone_no'])?></td>
            <td width="20%">
                <?php if($generateAssessByDaterange['status_defined'] == 'ws'):?>
                    <?php echo '<span style="color:red;">With Symptoms</span>';?>
                <?php endif;?>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
    </table>