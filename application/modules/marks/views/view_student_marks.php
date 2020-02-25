<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/ico" />

    <title>Marks</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/build/css/styles.css" rel="stylesheet">
  </head>

  <?php $this->load->view('common/header.php'); ?>

            <div class="row">
              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Input Mask</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                    <div class="x_content">
                      <?php if($student_info->photo!=''){ ?>
                        <img class="img-circle" src="<?php echo base_url('assets/images/uploads/'.$student_info->photo); ?>" alt="" width="200" height="200">
                    <?php }else{ ?>
                        <img class="img-circle" src="<?php echo base_url('assets/images/user.png'); ?>" alt="" width="200" height="200">
                    <?php } ?>
                      <span class="text-center"><h5><?php echo $student_info->student_name; ?></h5></span>
                      <!-- <div class="card-body"> -->
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">Register NO : <?php echo $student_info->register_no; ?></li>
                          <li class="list-group-item">Roll : <?php echo $student_info->roll_no; ?></li>
                          <li class="list-group-item">Class : <?php echo $student_info->class; ?></li>
                          <li class="list-group-item">Section : <?php echo $student_info->section; ?></li>
                        </ul>
                    </div>
                  </div>
                </div>
                      
                <div class="col-md-9 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Color Picker</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                          </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                      <br />
                      
                      <?php
                          if(count($student_exams)>0){
                            foreach ($student_exams as $e_key => $e_val) {
                              foreach($student_marks as $mk=>$mv){ 
                                if($mk==$e_val->exam_id) {
                                    echo '<h4>'.$e_val->exam_name.'</h4>'; ?>
                                    <table class="attendance_table table-bordered">
                                    <thead>
                                        <tr>
                                          <th>Subject</th>
                                          <th>Marks</th>
                                          <th>Grade</th>
                                          <th>Point</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($mv as $key=>$val){ ?>
                                        <tr>
                                            <td><?php echo $val->subject_name; ?></td>
                                            <td><?php echo $val->marks; ?></td>
                                            <?php 
                                                if(count($subject_grades[$val->id])>0){
                                                      echo '<td>'.$subject_grades[$val->id]->grade_name.'</td>';
                                                      echo '<td>'.$subject_grades[$val->id]->grade_point.'</td>';

                                                }else{ echo "<td></td><td></td>"; } ?>
                                        </tr>
                                    <?php } ?> 
                                  </tbody>
                                  </table>
                              <?php } } } }?>
                          <div>
                            <span>Total Leave:<?php //echo $total_stats->leave_count; ?></span>, 
                            <span>Total Present:<?php //echo $total_stats->present; ?></span>, 
                            <span>Total Late With Excuse:<?php //echo $total_stats->LE_count; ?></span>, 
                            <span>Total Absent:<?php //echo $total_stats->absent; ?></span>
                          </div>
                  </div>
                </div>
              </div>

                    <!-- </div> -->
                          <!-- row -->
                  </div>
    
    <?php $this->load->view('common/footer.php'); ?>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- easy-pie-chart -->
    <script src="../vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script>
	   
    <script>
      
      /** After window Load */
      $(window).bind("load", function() {
        window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove();
          });
      }, 4000);
      });

    </script>

  </body>
</html>
