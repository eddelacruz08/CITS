
<?php if(empty($requestguestsAssess)):?>
    <p class="h5 text-center">No data available</p>
<?php else:?>
    <?php $cnt = 1; ?>
    <?php foreach($requestguestsAssess as $patientRequest): ?>
        <div class="row">
            <div class="col-md-6">
                <span class="text-muted username">
                    Name: <?= ucwords($patientRequest['firstname'].' '.$patientRequest['lastname']) ?>
                    <span class="text-muted float-right"><?= date('F d, Y h:i:s a', strtotime($patientRequest['created_date'])) ?></span>
                </span>
                <br>
                <span class="text-muted username">
                    Email: <?= $patientRequest['email'] ?>
                </span>
                <br>
                <span class="text-muted username">
                    <?php if($patientRequest['email_status']==1):?>
                        Guidelines request:<br> <b>Automatically sent email for guidelines.</b>
                    <?php else:?>
                        <form action="<?= base_url() ?>guest%20assessment/<?='email_resend/'.$patientRequest['id']?>" method="post">
                            <input hidden type="text" name="email" value="<?= ucwords($patientRequest['email'])?>">
                            <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-envelope"></i> Resend Email</button>
                        </form>
                    <?php endif;?>
                </span>
                <!-- /.username -->
            </div>
            <div class="col-md-3 text-center">
                <?php if($patientRequest['func_action'] == 1):?>
                    <span class="bell fa fa-bell"></span>
                    <audio src="<?=base_url()?>public/css/notification_up.mp3" autoplay></audio>
                    <span class="badge badge-danger">Reason requested: </span>
                    <p><?= ucwords($patientRequest['reason']) ?></p>
                <?php elseif($patientRequest['func_action'] == 2):?>
                    <span class="bell fa fa-bell"></span>
                    <audio src="<?=base_url()?>public/css/notification_up.mp3" autoplay></audio>
                    <span class="badge badge-danger">Reason requested: </span>
                    <p><?= ucwords($patientRequest['reason']) ?></p>
                    <!-- <span class="badge">System Cancelled Request.</span> -->
                <?php else:?>
                    <span class="badge">No reason request.</span>
                <?php endif;?>
            </div>
            <div class="col-md-3 text-center">
                <?php if($patientRequest['func_action'] == 1):?>
                    <a href="#invalidateModal<?=$patientRequest['id']?>" class="btn btn-outline-danger" data-toggle="modal">
                        <i class="fas fa-exclamation-circle"></i> Invalidate
                    </a>
                <?php elseif($patientRequest['func_action'] == 2):?>
                    <a href="#invalidateModal<?=$patientRequest['id']?>" class="btn btn-outline-danger" data-toggle="modal">
                        <i class="fas fa-exclamation-circle"></i> Invalidate
                    </a>
                <?php else:?>
                    <!-- No Button For Invalidation -->
                <?php endif;?><br>
                <button type="button" class="btn btn-outline-success success btn-md mt-2" data-toggle="modal" data-target="#assessment<?=$patientRequest['id']?>">
                    <i class="fas fa-clipboard-check"></i> Check Data
                </button>
            </div>
        </div>
        <hr>
    <?php endforeach; ?>
<?php endif;?>