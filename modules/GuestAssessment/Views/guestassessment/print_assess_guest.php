
<?php foreach ($guestsAssess as $patient): ?>
<br>
<br>
    <table>
        <thead>
            <tr>
                <th>
                    <span style="font-weight:bold;">Fullname:</span> <?= ucwords($patient['firstname'].' '.$patient['middlename'].' '.$patient['lastname']) ?>
                </th>
                <th>
                    <span style="font-weight:bold;">Birthdate:</span> <?=date('F d, Y', strtotime($patient['birthdate']))?>
                </th>
            </tr>
            <tr>
                <th>
                    <span style="font-weight:bold;">Phone:</span> <?= ucwords($patient['cellphone_no'])?><br>
                    <span style="font-weight:bold;">Landline:</span> <?= ucwords($patient['landline_no'])?><br>
                    <span style="font-weight:bold;">Address:</span> <?= ucwords($patient['address'].', '.$patient['city'].', '.$patient['province'].', '.$patient['postal'])?><br>
                </th>
                <th>
                    <span style="font-weight:bold;">Gender:</span> <?= ucwords($patient['gender'])?><br>
                    <span style="font-weight:bold;">Guest Type:</span> <?= ucwords($patient['guest_type'])?><br>
                    <span style="font-weight:bold;">Email:</span> <?= $patient['email']?><br>
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
                    <span style="font-weight: bold;">For defined/with symptoms/identified.</span>
                    <br>
                    <br>
                    <span style="font-weight: bold;">Comments: </span>
                        Based on the collected data from your Health Declaration, we regret to inform you that your answer equate 
                        or was associated to one of the symptoms of Covid-19. Please stay at home, and follow the quarantine guidelines.
                    <p style="color:red;font-style:italic;">Note: Please see the sent email for further recommendation.</p>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endforeach; ?>