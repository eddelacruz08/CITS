    </div>
  </div>
<!-- /.content-wrapper -->
<!-- <footer class="main-footer noPrint" id="print-btn">
  <strong>All Right Reserved &copy; 2020-2021 <a href="#">United Coders Dev Team 2020</a>.</strong>

  <div class="float-right d-none d-sm-inline-block noPrint">
    <b>Version</b> 1.0.0
  </div>
</footer> -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="<?= base_url() ?>/public/js/jquery-3.3.1.slim.min.js"></script> -->

    <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>public/dist/js/adminlte.min.js"></script>
    <script src="<?= base_url() ?>public/plugins/chart.js/Chart.min.js"></script>
    <script src="<?= base_url() ?>public/js/moment.min.js"></script>
    <script src="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url() ?>public/plugins/moment/moment-with-locales.js"></script>
    <script src="<?= base_url() ?>public/plugins/select2/js/select2.full.min.js"></script>
    <script>
      $(function () {
        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })
      })
    </script>
    <script type="text/javascript">
      var baseURL = "<?php echo base_url(); ?>";
    </script>
    <script>
      $(document).ready(function(){
      setInterval(function(){
      $("#liveData").load('<?= base_url()?>guest%20assessment/div_assess')
    }, 2000);
      });
    </script>
    <script>
        $(document).ready(function () {
            $(".text").hide();
            $("#one_a").click(function () {
                $(".text").show();
            });
            $("#one_a1").click(function () {
                $(".text").hide();
            });
        });
        $(document).ready(function () {
            $(".text1").hide();
            $("#one_b").click(function () {
                $(".text1").show();
            });
            $("#one_b1").click(function () {
                $(".text1").hide();
            });
        });
        $(document).ready(function () {
            $(".text2").hide();
            $("#one_c").click(function () {
                $(".text2").show();
            });
            $("#one_c1").click(function () {
                $(".text2").hide();
            });
        });
        $(document).ready(function () {
            $(".text3").hide();
            $("#one_d").click(function () {
                $(".text3").show();
            });
            $("#one_d1").click(function () {
                $(".text3").hide();
            });
        });
        $(document).ready(function () {
            $(".text4").hide();
            $("#one_e").click(function () {
                $(".text4").show();
            });
            $("#one_e1").click(function () {
                $(".text4").hide();
            });
        });
        $(document).ready(function () {
            $(".text5").hide();
            $("#one_f").click(function () {
                $(".text5").show();
            });
            $("#one_f1").click(function () {
                $(".text5").hide();
            });
        });
        $(document).ready(function () {
            $(".text6").hide();
            $("#two_travel").click(function () {
                $(".text6").show();
            });
            $("#two_travel1").click(function () {
                $(".text6").hide();
            });
        });
        $(document).ready(function () {
            $(".text7").hide();
            $("#four_existing").click(function () {
                $(".text7").show();
            });
            $("#four_existing1").click(function () {
                $(".text7").hide();
            });
        });
    </script>
    <script src="<?= base_url() ?>public/js/popper.min.js"></script>
    <script src="<?= base_url() ?>public/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>public/js/scripts.js"></script>
    <script src="<?= base_url() ?>public/js/sweetalert2@9.js"></script>
    <script src="<?= base_url() ?>public/js/select2.min.js"></script>
    <script src="<?= base_url() ?>public/chart/Chart.min.js"></script>
    <script src="<?= base_url() ?>public/DataTables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>public/DataTables/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="<?= base_url() ?>public/chart/utils.js"></script>
    <script src="<?= base_url() ?>public/js/myAlerts.js"></script>

    <script src="<?= base_url() ?>public/js/select2.full.min.js"></script>
    <script src="<?= base_url() ?>public/js/myJavascript.js"></script>
    <script src="<?= base_url() ?>public/js/user_profile.js"></script>
    <script src="<?= base_url() ?>public/js/loader.js"></script>

    <script>
      $(".multiple-select").select2({
        // maximumSelectionLength: 2
      });
    </script>

    <script>
    $(document).ready(function(){
      $('input[type="radio"]').click(function(){
          var inputValue = $(this).attr("id");
          var targetBox = $("." + inputValue);
          $(".box").not(targetBox).hide();
          $(targetBox).show();
          });
      });
      $(document).ready(function(){
      $('input[type="radio"]').click(function(){
          var inputValue = $(this).attr("id");
          var targetBox = $("." + inputValue);
          $(".box2").not(targetBox).hide();
          $(targetBox).show();
          });
      });
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

        $(document).ready(function() {
            $('.index-table').DataTable({
            });
        });

    </script>
    <script>
    $(function () {
      /* ChartJS
      * -------
      * Here we will create a few charts using ChartJS
      */

      //-------------
      //- PIE CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      <?php if (isset($student_total)): ?>
      var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      var pieData        = {
        labels: [
          'Student(s)',
          'Faculty(s)',
          'Employee(s)',
          'Outsider(s)',
        ],
        datasets: [
          {
            data: [
              <?php
              foreach ($student_total as $student) {
                ?>
                  <?php echo ucwords($student['COUNT(u.id)']) ?>,
                <?php
              }
              ?>
              <?php
              foreach ($faculty_total as $faculty) {
                ?>
                  <?php echo ucwords($faculty['COUNT(u.id)']) ?>,
                <?php
              }
              ?>
              <?php
              foreach ($employee_total as $employee) {
                ?>
                  <?php echo ucwords($employee['COUNT(u.id)']) ?>,
                <?php
              }
              ?>
              <?php
              foreach ($outsider_total as $outsider) {
                ?>
                  <?php echo ucwords($outsider['COUNT(u.id)']) ?>,
                <?php
              }
              ?>

            ],
            backgroundColor : ['#00c0ef', '#f56954', '#00a65a', '#f39c12'],
          }
        ]
      }
      var pieOptions     = {
        maintainAspectRatio : false,
        responsive : true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
      })
      <?php endif; ?>

        //-------------
        //- DONUT CHART -
        //-------------
        //STUDENTS
        // Get context with jQuery - using jQuery's .get() method.
        <?php if (isset($student_male)): ?>
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData        = {
          labels: [
              'Male',
              'Female'
          ],
          datasets: [
            {
              data: [
                <?php
                foreach ($student_male as $male) {
                  ?>
                    <?php echo $male['COUNT(u.id)'] ?>,
                  <?php
                }
                ?>
                <?php
                foreach ($student_female as $female) {
                  ?>
                    <?php echo $female['COUNT(u.id)'] ?>
                  <?php
                }
                ?>
              ],
              backgroundColor : ['#00c0ef', '#f56954'],
            }
          ]
        }
        var donutOptions     = {
          maintainAspectRatio : false,
          responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var donutChart = new Chart(donutChartCanvas, {
          type: 'doughnut',
          data: donutData,
          options: donutOptions
        })
        <?php endif; ?>
        //-------------
        //- DONUT CHART -
        //-------------
        //Faculty
        // Get context with jQuery - using jQuery's .get() method.
        <?php if (isset($faculty_male)): ?>
        var donutChartCanvas = $('#donutChart2').get(0).getContext('2d')
        var donutData        = {
          labels: [
              'Male',
              'Female'
          ],
          datasets: [
            {
              data: [
                <?php
                foreach ($faculty_male as $male) {
                  ?>
                    <?php echo ucwords($male['COUNT(u.id)']) ?>,
                  <?php
                }
                ?>
                <?php
                foreach ($faculty_female as $female) {
                  ?>
                    <?php echo ucwords($female['COUNT(u.id)']) ?>
                  <?php
                }
                ?>
              ],
              backgroundColor : ['#00c0ef', '#f56954'],
            }
          ]
        }
        var donutOptions     = {
          maintainAspectRatio : false,
          responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var donutChart = new Chart(donutChartCanvas, {
          type: 'doughnut',
          data: donutData,
          options: donutOptions
        })
        <?php endif; ?>
        //-------------
        //- DONUT CHART -
        //-------------
        //Employee
        // Get context with jQuery - using jQuery's .get() method.
        <?php if (isset($employee_male)): ?>
        var donutChartCanvas = $('#donutChart3').get(0).getContext('2d')
        var donutData        = {
          labels: [
              'Male',
              'Female'
          ],
          datasets: [
            {
              data: [
                <?php
                foreach ($employee_male as $male) {
                  ?>
                    <?php echo ucwords($male['COUNT(u.id)']) ?>,
                  <?php
                }
                ?>
                <?php
                foreach ($employee_female as $female) {
                  ?>
                    <?php echo ucwords($female['COUNT(u.id)']) ?>
                  <?php
                }
                ?>
              ],
              backgroundColor : ['#00c0ef', '#f56954'],
            }
          ]
        }
        var donutOptions     = {
          maintainAspectRatio : false,
          responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var donutChart = new Chart(donutChartCanvas, {
          type: 'doughnut',
          data: donutData,
          options: donutOptions
        })
        <?php endif; ?>
        //-------------
        //- DONUT CHART -
        //-------------
        //Outsider
        // Get context with jQuery - using jQuery's .get() method.
        <?php if (isset($outsider_male)): ?>
        var donutChartCanvas = $('#donutChart4').get(0).getContext('2d')
        var donutData        = {
          labels: [
              'Male',
              'Female'
          ],
          datasets: [
            {
              data: [
                <?php
                foreach ($outsider_male as $male) {
                  ?>
                    <?php echo ucwords($male['COUNT(u.id)']) ?>,
                  <?php
                }
                ?>
                <?php
                foreach ($outsider_female as $female) {
                  ?>
                    <?php echo ucwords($female['COUNT(u.id)']) ?>
                  <?php
                }
                ?>
              ],
              backgroundColor : ['#00c0ef', '#f56954'],
            }
          ]
        }
        var donutOptions     = {
          maintainAspectRatio : false,
          responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var donutChart = new Chart(donutChartCanvas, {
          type: 'doughnut',
          data: donutData,
          options: donutOptions
        })
        <?php endif; ?>
      })
    </script>


  </body>
</html>