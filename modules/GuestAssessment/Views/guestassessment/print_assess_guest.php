
<?php foreach ($guestsAssess as $patient): ?>
<br>
<br>
    <table style="padding: 5px;">
        <thead>
            <tr>
                <th>
                    <b>Fullname:</b> <?= ucwords($patient['firstname'].' '.$patient['middlename'].' '.$patient['lastname']) ?>
                </th>
                <th>
                    <b>Birthdate:</b> <?=date('F d, Y', strtotime($patient['birthdate']))?>
                </th>
            </tr>
            <tr>
                <th>
                    <b>Phone:</b> <?= ucwords($patient['cellphone_no'])?><br>
                    <b>Landline:</b> <?= ucwords($patient['landline_no'])?><br>
                    <b>Address:</b> <?= ucwords($patient['address'].', '.$patient['city'].', '.$patient['province'].', '.$patient['postal'])?><br>
                </th>
                <th>
                    <b>Gender:</b> <?= ucwords($patient['gender'])?><br>
                    <b>Guest Type:</b> <?= ucwords($patient['guest_type'])?><br>
                    <b>Email:</b> <?= $patient['email']?><br>
                </th>
            </tr>
        </thead>
    </table>
    <table border="1" style="padding: 10px;">
        <thead>
            <tr align="center">
                <th width="10%"><b>#</b></th>
                <th width="70%"><b>Questions</b></th>
                <th width="20%"><b>Answers</b></th>
            </tr>
        </thead>
        <tbody>
        <?php $cnt = 1; ?>
        <?php foreach ($questions as $question): ?>
            <tr>
                <td align="center" width="10%"><?= $cnt++;?></td>
                <td width="70%"><?= $question['q_one']?></td>
                <td align="center" width="20%"><?= ucfirst($patient['q_one'])?></td>
            </tr>
            <tr>
                <td align="center" width="10%"><?= $cnt++;?></td>
                <td width="70%"><?= $question['q_two']?></td>
                <td align="center" width="20%"><?= ucfirst($patient['q_two'])?></td>
            </tr>
            <tr>
                <td align="center" width="10%"><?= $cnt++;?></td>
                <td width="70%"><?= $question['q_three']?></td>
                <td align="center" width="20%"><?= ucfirst($patient['q_three'])?></td>
            </tr>
            <tr>
                <td align="center" width="10%"><?= $cnt++;?></td>
                <td width="70%"><?= $question['q_four']?></td>
                <td align="center" width="20%"><?= ucfirst($patient['q_four'])?></td>
            </tr>
            <tr>
                <td align="center" width="10%"><?= $cnt++;?></td>
                <td width="70%"><?= $question['q_five']?></td>
                <td align="center" width="20%"><?= ucfirst($patient['q_five'])?></td>
            </tr>
            <tr>
                <td width="100%">
                        <b>Result: </b> This guest was defined for symptoms
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endforeach; ?>