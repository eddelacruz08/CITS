    </div>
  </div>

  <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>public/dist/js/adminlte.min.js"></script>
  <script src="<?= base_url() ?>public/js/moment.min.js"></script>
  <script src="<?= base_url() ?>public/plugins/moment/moment-with-locales.js"></script>
  <script src="<?= base_url() ?>public/js/popper.min.js"></script>
  <script src="<?= base_url() ?>public/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>public/js/scripts.js"></script>
  <script src="<?= base_url() ?>public/js/sweetalert2@9.js"></script>
  <script src="<?= base_url() ?>public/js/myAlerts.js"></script>
  <script src="<?= base_url() ?>public/DataTables/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>public/DataTables/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="<?= base_url() ?>public/chart/Chart.min.js"></script>
  <script src="<?= base_url() ?>public/chart/utils.js"></script>
  <script src="<?= base_url() ?>public/js/myJavascript.js"></script>
  <script src="<?= base_url() ?>public/js/user_profile.js"></script>
  <script src="<?= base_url() ?>public/js/loader.js"></script>
  <script src="<?= base_url() ?>public/plugins/summernote/summernote-bs4.min.js"></script>
  <script>
    $(function () {
      'use strict'

      var mode = 'index'
      var intersect = true
      var salesChart = document.getElementById('assessment-chart'); // node
      var salesChart = document.getElementById('assessment-chart').getContext('2d'); // 2d context
      var salesChart = $('#assessment-chart'); // jQuery instance
      var salesChart = 'assessment-chart'; // element id

      // var $salesChart = $('#assessment-chart')
      // eslint-disable-next-line no-unused-vars
      var salesChart = new Chart(salesChart, {
        type: 'bar',
        data: {
          labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
          datasets: [
            {
              backgroundColor: '#17a2b8',
              borderColor: '#17a2b8',
              data: [
      <?php if(isset($getAssessmentMonthlyCount)):?>
            <?php foreach($getAssessmentMonthlyCount as $AssessmentMonthlyCount):?>
              <?=$AssessmentMonthlyCount['Jan'];?>,
              <?=$AssessmentMonthlyCount['Feb'];?>,
              <?=$AssessmentMonthlyCount['Mar'];?>,
              <?=$AssessmentMonthlyCount['Apr'];?>,
              <?=$AssessmentMonthlyCount['May'];?>,
              <?=$AssessmentMonthlyCount['Jun'];?>,
              <?=$AssessmentMonthlyCount['Jul'];?>,
              <?=$AssessmentMonthlyCount['Aug'];?>,
              <?=$AssessmentMonthlyCount['Sep'];?>,
              <?=$AssessmentMonthlyCount['Oct'];?>,
              <?=$AssessmentMonthlyCount['Nov'];?>,
              <?=$AssessmentMonthlyCount['Dec'];?>,
            <?php endforeach;?>
      <?php endif;?>
              ]
            },
            {
              backgroundColor: '#6c757d ',
              borderColor: '#6c757d ',
              data: [
      <?php if(isset($totalAssessmentLastYears)):?>
            <?php foreach($totalAssessmentLastYears as $totalAssessmentLastYear):?>
              <?=$totalAssessmentLastYear['Jan'];?>,
              <?=$totalAssessmentLastYear['Feb'];?>,
              <?=$totalAssessmentLastYear['Mar'];?>,
              <?=$totalAssessmentLastYear['Apr'];?>,
              <?=$totalAssessmentLastYear['May'];?>,
              <?=$totalAssessmentLastYear['Jun'];?>,
              <?=$totalAssessmentLastYear['Jul'];?>,
              <?=$totalAssessmentLastYear['Aug'];?>,
              <?=$totalAssessmentLastYear['Sep'];?>,
              <?=$totalAssessmentLastYear['Oct'];?>,
              <?=$totalAssessmentLastYear['Nov'];?>,
              <?=$totalAssessmentLastYear['Dec'];?>,
            <?php endforeach;?>
      <?php endif;?>
              ]
            }
          ]
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            mode: mode,
            intersect: intersect
          },
          hover: {
            mode: mode,
            intersect: intersect
          },
          legend: {
            display: false
          },
          scales: {
            yAxes: [{
              // display: false,
              gridLines: {
                display: true,
                lineWidth: '4px',
                color: 'rgba(0, 0, 0, .2)',
                zeroLineColor: 'transparent'
              },
            }],
            xAxes: [{
              display: true,
              gridLines: {
                display: false
              },
            }]
          }
        }
      })
    });
  </script>
  <script>
    $(function () {
      'use strict'

      var mode = 'index'
      var intersect = true

      var salesChart = document.getElementById('invalidation-chart'); // node
      var salesChart = document.getElementById('invalidation-chart').getContext('2d'); // 2d context
      var salesChart = $('#invalidation-chart'); // jQuery instance
      var salesChart = 'invalidation-chart'; // element id
      // eslint-disable-next-line no-unused-vars
      var salesChart = new Chart(salesChart, {
        type: 'bar',
        data: {
          labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
          datasets: [
            {
              backgroundColor: '#ffc107 ',
              borderColor: '#ffc107 ',
              data: [
      <?php if(isset($getInvalidatedMonthlyCount)):?>
            <?php foreach($getInvalidatedMonthlyCount as $InvalidatedMonthlyCount):?>
              <?=$InvalidatedMonthlyCount['Jan'];?>,
              <?=$InvalidatedMonthlyCount['Feb'];?>,
              <?=$InvalidatedMonthlyCount['Mar'];?>,
              <?=$InvalidatedMonthlyCount['Apr'];?>,
              <?=$InvalidatedMonthlyCount['May'];?>,
              <?=$InvalidatedMonthlyCount['Jun'];?>,
              <?=$InvalidatedMonthlyCount['Jul'];?>,
              <?=$InvalidatedMonthlyCount['Aug'];?>,
              <?=$InvalidatedMonthlyCount['Sep'];?>,
              <?=$InvalidatedMonthlyCount['Oct'];?>,
              <?=$InvalidatedMonthlyCount['Nov'];?>,
              <?=$InvalidatedMonthlyCount['Dec'];?>,
            <?php endforeach;?>
      <?php endif;?>
              ]
            },
            {
              backgroundColor: '#6c757d',
              borderColor: '#6c757d',
              data: [
      <?php if(isset($totalInvalidatedLastYears)):?>
            <?php foreach($totalInvalidatedLastYears as $totalInvalidatedLastYear):?>
              <?=$totalInvalidatedLastYear['Jan'];?>,
              <?=$totalInvalidatedLastYear['Feb'];?>,
              <?=$totalInvalidatedLastYear['Mar'];?>,
              <?=$totalInvalidatedLastYear['Apr'];?>,
              <?=$totalInvalidatedLastYear['May'];?>,
              <?=$totalInvalidatedLastYear['Jun'];?>,
              <?=$totalInvalidatedLastYear['Jul'];?>,
              <?=$totalInvalidatedLastYear['Aug'];?>,
              <?=$totalInvalidatedLastYear['Sep'];?>,
              <?=$totalInvalidatedLastYear['Oct'];?>,
              <?=$totalInvalidatedLastYear['Nov'];?>,
              <?=$totalInvalidatedLastYear['Dec'];?>,
            <?php endforeach;?>
      <?php endif;?>
              ]
            }
          ]
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            mode: mode,
            intersect: intersect
          },
          hover: {
            mode: mode,
            intersect: intersect
          },
          legend: {
            display: false
          },
          scales: {
            yAxes: [{
              // display: false,
              gridLines: {
                display: true,
                lineWidth: '4px',
                color: 'rgba(0, 0, 0, .2)',
                zeroLineColor: 'transparent'
              },
            }],
            xAxes: [{
              display: true,
              gridLines: {
                display: false
              },
            }]
          }
        }
      })
    });
  </script>
  <script>
      <?php if(isset($getAssessmentMonthlyCount)):?>
    $(function () {
      var areaChartData = {
        labels  : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [
          {
            label               : 'Guest Assessment',
            backgroundColor     : '#17a2b8',
            borderColor         : '#17a2b8',
            pointRadius          : false,
            pointColor          : '#17a2b8',
            pointStrokeColor    : '#17a2b8',
            pointHighlightFill  : '#17a2b8',
            pointHighlightStroke: '#17a2b8',
            data                : [
            <?php foreach($getAssessmentMonthlyCount as $AssessmentMonthlyCount):?>
              <?=$AssessmentMonthlyCount['Jan'];?>,
              <?=$AssessmentMonthlyCount['Feb'];?>,
              <?=$AssessmentMonthlyCount['Mar'];?>,
              <?=$AssessmentMonthlyCount['Apr'];?>,
              <?=$AssessmentMonthlyCount['May'];?>,
              <?=$AssessmentMonthlyCount['Jun'];?>,
              <?=$AssessmentMonthlyCount['Jul'];?>,
              <?=$AssessmentMonthlyCount['Aug'];?>,
              <?=$AssessmentMonthlyCount['Sep'];?>,
              <?=$AssessmentMonthlyCount['Oct'];?>,
              <?=$AssessmentMonthlyCount['Nov'];?>,
              <?=$AssessmentMonthlyCount['Dec'];?>,
            <?php endforeach;?>
            ]
          },
          {
            label               : 'Guest Invalidated',
            backgroundColor     : '#ffc107 ',
            borderColor         : '#ffc107 ',
            pointRadius         : false,
            pointColor          : '#ffc107 ',
            pointStrokeColor    : '#ffc107 ',
            pointHighlightFill  : '#17a2b8',
            pointHighlightStroke: '#ffc107 ',
            data                : [
      <?php if(isset($getInvalidatedMonthlyCount)):?>
            <?php foreach($getInvalidatedMonthlyCount as $InvalidatedMonthlyCount):?>
              <?=$InvalidatedMonthlyCount['Jan'];?>,
              <?=$InvalidatedMonthlyCount['Feb'];?>,
              <?=$InvalidatedMonthlyCount['Mar'];?>,
              <?=$InvalidatedMonthlyCount['Apr'];?>,
              <?=$InvalidatedMonthlyCount['May'];?>,
              <?=$InvalidatedMonthlyCount['Jun'];?>,
              <?=$InvalidatedMonthlyCount['Jul'];?>,
              <?=$InvalidatedMonthlyCount['Aug'];?>,
              <?=$InvalidatedMonthlyCount['Sep'];?>,
              <?=$InvalidatedMonthlyCount['Oct'];?>,
              <?=$InvalidatedMonthlyCount['Nov'];?>,
              <?=$InvalidatedMonthlyCount['Dec'];?>,
            <?php endforeach;?>
      <?php endif;?>
            ]
          },
        ]
      }

      //-------------
      //- BAR CHART -
      //-------------
      var barChartCanvas = $('#barChart').get(0).getContext('2d')
      var barChartData = $.extend(true, {}, areaChartData)
      var temp0 = areaChartData.datasets[0]
      var temp1 = areaChartData.datasets[1]
      barChartData.datasets[0] = temp1
      barChartData.datasets[1] = temp0

      var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
      }

      new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })
    })
      <?php endif;?>
  </script>

  <script>
    $(document).ready(function(){
        refresh();
    });
    function refresh(){
        setTimeout(function(){
            $('#load_table_assessment').load('<?= base_url()?>guest%20assessment/load_table_assessment').fadeIn("slow");
            refresh();
        }, 2000);
    }
  </script>

  <script>
    $(function () {
      $('#summernote').summernote()
    })
  </script>

  <script>
    $(function() {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
      });

      $('.swalDefaultError').click(function() {
        Toast.fire({
          icon: 'error',
          title: '<p class="text-dark" style="font-size:13px;">Your Qr Code is unavailable because your latest assessment was defined on symptoms.</p>'
        })
      });
      $('.swalAssessmentError').click(function() {
        Toast.fire({
          icon: 'error',
          title: '<p class="text-dark" style="font-size:13px;">You cannot take self-assessment. Please try tommorrow.</p>'
        })
      });
    });
  </script>
  
  <script>
      $(document).ready(function() {
          $('.index-table').DataTable({
          });
      });
  </script>

  <script>
    $(function () {
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
          'Visitor(s)',
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
          labels: ['Male', 'Female'],
          datasets: [{
              data: [
                <?php foreach ($outsider_male as $male) { ?>
                    <?php echo ucwords($male['COUNT(u.id)']) ?>,
                  <?php } ?>
                <?php foreach ($outsider_female as $female) { ?>
                    <?php echo ucwords($female['COUNT(u.id)']) ?>
                  <?php } ?>
              ],
              backgroundColor : ['#00c0ef', '#f56954'],
            }
          ]}
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
