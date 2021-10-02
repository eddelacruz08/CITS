
  <br>
  <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <h3><?=$function_title;?></h3>
        </div>
      </div>
    </section>
    <br>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header bg-dark">
          <h3 class="card-title"><?=$function_title;?></h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
              <div class="row">
                <div class="col-12">
                  <?php $ctr = 1; ?>
                  <?php foreach($logs as $log): ?>
                    <div class="post">
                        <div class="row">
                          <div class="col-md-1 text-center">
                            <span><?= $ctr++; ?></span>
                          </div>
                          <div class="col-md-5">
                            <span class="username">
                              <a><?=ucwords($log['username']);?></a>
                            </span><br>
                            <span class="description"><?=date('F d, Y h:i:s a', strtotime($log['created_date']))?></span>
                          </div>
                          <div class="col-md-6">
                            <!-- /.user-block -->
                            <span><?=ucwords($log['activity']);?></span>
                          </div>
                        </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-6 offset-md-6">
              <?php paginater('activity%20logs', count($all_items), PERPAGE, $offset) ?>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->