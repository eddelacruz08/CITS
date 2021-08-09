
<br>
  <?php foreach ($student_total as $student){
    $student_count = $student['COUNT(u.id)'];
  }
  ?>
  <?php foreach ($faculty_total as $faculty){
    $faculty_count = $faculty['COUNT(u.id)'];
  }
  ?>
  <?php foreach ($employee_total as $employee){
    $employee_count = $employee['COUNT(u.id)'];
  }
  ?>
  <?php foreach ($outsider_total as $outsider){
    $outsider_count = $outsider['COUNT(u.id)'];
  }
  ?>

  <div class="card">
    <div class="card-body"style="padding: 20px;">
      <div class="row">
        <div class="col-md-6">
          <h4 class="text-dark"><i class="fas fa-tachometer-alt"> </i> <?=$function_title?> </h4>
        </div>
        <div class="col-md-6">
        <button onclick="window.print();" type="button" class="btn float-right" id="print-btn">
          <i class="fas fa-print"></i> Print Dashboard
        </button>
        </div>
      </div>
    </div>
  </div>
                
  <div class="card card-primary card-outline">
    <div class="card-header">
        <h2 class="card-title">Bar Chart For Total Guest Assessment</h2>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">
              <div class="callout callout-success info-box">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                  <?php foreach($totalAssessPerDays as $totalAssessPerDay):?>
                    <span class="info-box-number h1 text-muted">
                      <?= $totalAssessPerDay['totalAssessPerDays']; ?>
                    </span>
                  <?php endforeach;?>
                  <span class="info-box-text">Assessment Of <?=date('F d, Y')?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">
              <div class="callout callout-danger info-box">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                  <?php foreach($totalInvalidatedPerDays as $totalInvalidatedPerDay):?>
                    <span class="info-box-number h1 text-muted">
                      <?= $totalInvalidatedPerDay['totalInvalidatedPerDays']; ?>
                    </span>
                  <?php endforeach;?>
                  <span class="info-box-text">Invalidated Of <?=date('F d, Y')?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">
              <div class="callout callout-info info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                  <?php foreach($totalAssessments as $totalAssessment):?>
                    <span class="info-box-number h1 text-muted">
                      <?= $totalAssessment['totalAssessments']; ?>
                    </span>
                  <?php endforeach;?>
                  <span class="info-box-text">Total Guest Assessment</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">
              <div class="callout callout-warning info-box">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                  <?php foreach($totalInvalidated as $totalInvalid):?>
                    <span class="info-box-number h1 text-muted">
                      <?= $totalInvalid['totalInvalidated']; ?>
                    </span>
                  <?php endforeach;?>
                  <span class="info-box-text">Total Guest Invalidated</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="chart" style="margin: 10px;">
          <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8">
      <!-- PIE CHART -->
      <div class="card">
        <div class="card-header">
            <h2 class="card-title"><i class="fas fa-chart-pie"> </i> Pie Chart</h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="d-md-flex">
            <div class="flex-fill">
              <!-- Map will be created here -->
              <div class="row">
              <div class="card-body col-md-8">
                <canvas id="pieChart" style="min-height: 230px; height: 230px; max-height: 250px; max-width: 100%; margin: 0;"></canvas>
              </div>
              <div class="card-body col-md-4">
                <div class="small-box bg-gray" style="margin-bottom: 5px; padding: 10px;">
                  <?php foreach ($user_total as $users){
                    $users_count = $users['COUNT(u.id)'];
                  }
                  ?>
                  <center><h2><?= $users_count?></h2>
                  <h4>Total of Guest(s)</h4></center>
                  <div class="icon">
                    <i class="fas fa-users"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.d-md-flex -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <div class="col-md-4">
    <!-- /.info-box -->
    <div class="info-box mb-3 bg-info">
      <span class="info-box-icon"><i class="fas fa-user-graduate"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total of Student(s)</span>
        <span class="info-box-number"><?=$student_count?></span>
      </div>
      <!-- /.info-box-content -->
    </div>

    <!-- /.info-box -->
    <div class="info-box mb-3 bg-danger">
      <span class="info-box-icon"><i class="fas fa-chalkboard-teacher"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total of Faculty(s)</span>
        <span class="info-box-number"><?=$faculty_count?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    <div class="info-box mb-3 bg-success">
      <span class="info-box-icon"><i class="fas fa-user-tie"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total of Employee(s)</span>
        <span class="info-box-number"><?=$employee_count?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- Info Boxes Style 2 -->
    <div class="info-box mb-3 bg-warning">
      <span class="info-box-icon"><i class="fas fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total of Visitor(s)</span>
        <span class="info-box-number"><?=$outsider_count?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
  <!-- /.info-box -->
  </div>
</div>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-3 text-center">
              <div class="card-body text-blue"> Student's Gender
              </div>
              <canvas id="donutChart" style="min-height: 150px; height: 150px; max-height: 150px; max-width: 100%;"></canvas>
            </div>
            <div class="col-md-3 text-center">
              <div class="card-body text-danger"> Faculty's Gender
              </div>
              <canvas id="donutChart2" style="min-height: 150px; height: 150px; max-height: 150px; max-width: 100%;"></canvas>
            </div>
            <div class="col-md-3 text-center">
              <div class="card-body text-success"> Employee's Gender
              </div>
              <canvas id="donutChart3" style="min-height: 150px; height: 150px; max-height: 150px; max-width: 100%;"></canvas>
            </div>
            <div class="col-md-3 text-center">
              <div class="card-body text-yellow"> Visitor's Gender
              </div>
              <canvas id="donutChart4" style="min-height: 150px; height: 150px; max-height: 150px; max-width: 100%;"></canvas>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

<!-- <section class="content"> -->
  <!-- Info boxes -->
  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <div class="info-box-content">
          <span class="info-box-text bg-info text-center">Student</span>
          <?php foreach ($student_male as $male):?>
              <span class="info-box-text"><i class="text-info fas fa-mars"></i> Male: <?php echo $male['COUNT(u.id)'] ?></span>
            <?php endforeach;?>
          <?php foreach ($student_female as $female):?>
          <span class="info-box-text"><i class="text-danger fas fa-venus"></i> Female: <?php echo $female['COUNT(u.id)'] ?></span>
            <?php endforeach;?>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <div class="info-box-content">
          <span class="info-box-text bg-danger text-center">Faculty</span>
          <?php foreach ($faculty_male as $male):?>
              <span class="info-box-text"><i class="text-info fas fa-mars"></i> Male: <?php echo $male['COUNT(u.id)'] ?></span>
            <?php endforeach;?>
          <?php foreach ($faculty_female as $female):?>
          <span class="info-box-text"><i class="text-danger fas fa-venus"></i> Female: <?php echo $female['COUNT(u.id)'] ?></span>
            <?php endforeach;?>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <div class="info-box-content">
          <span class="info-box-text bg-success text-center">Employee</span>
          <?php foreach ($employee_male as $male):?>
              <span class="info-box-text"><i class="text-info fas fa-mars"></i> Male: <?php echo $male['COUNT(u.id)'] ?></span>
            <?php endforeach;?>
          <?php foreach ($employee_female as $female):?>
          <span class="info-box-text"><i class="text-danger fas fa-venus"></i> Female: <?php echo $female['COUNT(u.id)'] ?></span>
            <?php endforeach;?>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <div class="info-box-content">
          <span class="info-box-text bg-warning text-center">Visitor</span>
          <?php foreach ($outsider_male as $male):?>
              <span class="info-box-text"><i class="text-info fas fa-mars"></i> Male: <?php echo $male['COUNT(u.id)'] ?></span>
            <?php endforeach;?>
          <?php foreach ($outsider_female as $female):?>
          <span class="info-box-text"><i class="text-danger fas fa-venus"></i> Female: <?php echo $female['COUNT(u.id)'] ?></span>
            <?php endforeach;?>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
