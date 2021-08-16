
<br>
  <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
  <div class="row">
    <div class="col-md-12">
      <div class="card bg-light ">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
                <h4><?= $function_title_active?></h4>
            </div>
            <div class="col-md-6">
              <span><?php maintenance_detail_add_link('guidelines', $_SESSION['userPermmissions']) ?></span>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-striped table-hover index-table">
                  <thead class="thead-dark">
                    <tr class="text-center">
                      <th>#</th>
                      <th>Title Name</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $ctr = 1?>
                    <?php if(empty($guidelines)): ?>
                      <tr>
                        <td colspan="6" class="text-center"> No Data Available </td>
                      </tr>
                    <?php else: ?>
                      <?php foreach($guidelines as $guideline): ?>
                        <tr class="text-center">
                          <td><?=esc($ctr)?></td>
                          <td><?=esc($guideline['content'])?></td>
                          <td>
                            <img id="uploaded" src="<?= $guideline['image'] ? base_url().'public/uploads/guidelines/'.$guideline['image'] : '//www.tutsmake.com/wp-content/uploads/2019/01/no-image-tut.png'?>" class="img-thumbnail" width="200" height="100" class="img-thumbnail"/>
                          </td>
                          <td>
                            <?php maintenance_action('guidelines', $_SESSION['userPermmissions'], $guideline['id']); ?>
                            <a class="btn btn-outline-dark" onclick="confirmDelete('<?=base_url().'guidelines/delete/' . $guideline['id']?>')" ><i class="fas fa-trash-alt"></i></a>
                          </td>
                        </tr>
                        <?php $ctr++?>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
       </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
  function readURL(input, id) {
    id = id || '#uploaded';
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(id)
                    .attr('src', e.target.result)
                    .width(200)
                    .height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
 }
</script>