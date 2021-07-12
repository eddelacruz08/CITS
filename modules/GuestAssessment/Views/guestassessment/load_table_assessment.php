<?php if(empty($guestsAssess)):?>
    <tr class="text-center">
        <td colspan="6">No data available</td>
    </tr>
<?php else:?>
    <?php $cnt = 1; ?>
    <?php foreach($guestsAssess as $patient): ?>
    <tr class="text-center">
        <th scope="row"><?= $cnt++ ?></th>
        <td><?= ucwords($patient['firstname'].' '.$patient['lastname']) ?></td>
        <td><?= $patient['email'] ?></td>
        <td>
            <?php if($patient['email_status']==1):?>
                <span class="badge">Automatically sent email for guidelines.</span>
            <?php else:?>
                <form action="<?= base_url() ?>guest%20assessment/<?='email_resend/'.$patient['id']?>" method="post">
                    <input hidden type="text" name="email" value="<?= ucwords($patient['email'])?>">
                    <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-envelope"></i> Resend Email</button>
                </form>
            <?php endif;?>
        </td>
        <td>
            <?php if($patient['func_action'] == 1):?>
                <span class="bell fa fa-bell"></span>
                <audio src="<?=base_url()?>public/css/notification_up.mp3" autoplay></audio>
                <span class="badge badge-danger">Reason requested: </span>
                <p><?= ucwords($patient['reason']) ?></p>
            <?php elseif($patient['func_action'] == 2):?>
                <span class="badge">System Cancelled Request.</span>
            <?php else:?>
                <span class="badge">No reason request.</span>
            <?php endif;?>
        </td>
        <td style="width:25%;"> 
            <?php if($patient['func_action'] == 1):?>
                <a href="#invalidateModal<?=$patient['id']?>" class="btn btn-outline-danger" data-toggle="modal">
                    <i class="fas fa-exclamation-circle"></i> Invalidate
                </a>
            <?php else:?>
                <!-- No Button For Invalidation -->
            <?php endif;?>
            <button type="button" class="btn btn-outline-success success btn-md" data-toggle="modal" data-target="#assessment<?=$patient['id']?>">
                <i class="fas fa-clipboard-check"></i> Check Data
            </button>
        </td>
    </tr>
    <?php endforeach; ?>
<?php endif;?>