<hr>
<div class="row">
  <div class="col-md-12">
    <div class="card border-success" style="border-radius: 0px;">
      <div class="card-body">
        <h4><?= $function_title?></h4>
        <form action="<?= base_url('guidelines')?>/<?= $edit ? 'edit/'.esc($id): 'add'?>" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col">
              <label class="form-label" for="content">Content</label>
              <input type="text" class="form-control <?= isset($errors['content']) ? 'is-invalid':'is-valid' ?>" placeholder="Content" name="content" value="<?= isset($value['content']) ? esc($value['content']) : '' ?>" >
              <?php if (isset($errors['content'])) : ?>
                <p class="text-danger"><?= esc($errors['content']) ?>
                <p>
                <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">    
              <label class="form-label" for="image">Image</label>
                <div class="mb-3">
                  <input type="file" class="form-control <?= isset($errors['image']) ? 'is-invalid':'is-valid' ?>" placeholder="Image" id="Formimage" name="image" onchange="readURL(this);">
                </div>
                <?php if(isset($errors['image'])):?>
                  <p class="text-danger"><?=esc($errors['image'])?><p>
                <?php endif;?>
            </div>
            <div class="form-group col-md-6">
              <label class="form-label" for="image">Preview</label>
              <div class="input-group mb-3">
                <img id="uploaded" src="<?= $edit ? base_url().'public/uploads/guidelines/'.$value['image'] : '//www.tutsmake.com/wp-content/uploads/2019/01/no-image-tut.png'?>" class="img-thumbnail" width="200" height="200" class="img-thumbnail"/>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button class="float-end btn btn-primary mt-5" id="btn-submit-announcements" type="submit"> Submit </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<br>

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
                    .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
 }
</script>