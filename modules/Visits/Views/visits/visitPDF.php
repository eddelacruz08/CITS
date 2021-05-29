<div class="row">
  <div class="col-md-12">
      <p><?= date('F d, Y h:m a', strtotime(date('Y-m-d'))) ?></p>
      <?php foreach ($visits as $visit): ?>
      <table>
        <tr>
          <td><?=$visit['id']?></td>
          <td><?=$visit['user_id']?></td>
          <td><?= date('F d, Y h:m a', strtotime($visit['created_date'])) ?></td>
        </tr>
      </table>
    <?php endforeach; ?>
  </div>
</div>
