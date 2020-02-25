<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/ico" />

    <title>User Attendance</title>

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

            <div class="page-title">
              <div class="title_left">
                  <h3>User Attendance</h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <!-- <div class="x_title">
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
                  </div> -->

                    <div class="x_content">
                      <?php if($user_data->photo!=''){ ?>
                        <img class="img-circle" src="<?php echo base_url('assets/images/uploads/'.$user_data->photo); ?>" alt="" width="200" height="200">
                    <?php }else{ ?>
                        <img class="img-circle" src="<?php echo base_url('assets/images/user.png'); ?>" alt="" width="200" height="200">
                    <?php } ?>
                      <span class="text-center"><h5><?php echo $user_data->user_name; ?></h5></span>
                      <span class="text-center"><h6><?php echo $user_data->user_role; ?></h6></span>
                      <!-- <div class="card-body"> -->
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">Gender : <?php echo $user_data->gender; ?></li>
                          <li class="list-group-item">Date Of Birth : <?php echo date('d-m-Y',strtotime($user_data->date_of_birth)); ?></li>
                          <li class="list-group-item">Phone : <?php echo $user_data->phone; ?></li>
                        </ul>
                    </div>
                  </div>
                </div>
                      
                <div class="col-md-9 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Attendance</h2>
                      <!-- <ul class="nav navbar-right panel_toolbox">
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
                      </ul> -->
                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                      <br />
                            <table class="attendance_table table-bordered">
                              <thead>
                                  <tr>
                                    <th>#</th>
                                    <?php for($i=1;$i<32;$i++){ 
                                     echo "<th>$i</th>"; }
                                    ?>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php foreach($month_arr as $mk=>$mv){ ?>
                                    <tr>
                                      <td><?php echo $mv; ?></td>
                                      <?php 
                                        for($i=1;$i<32;$i++){
                                            $attendance_val = 'N/A'; 
                                           foreach($user_attendance as $uak=>$uav){
                                              if($uav->day==$i && $mk==$uav->month){
                                                 $attendance_val = $uav->attendance;
                                                    break;
                                              } 
                                            } 
                                            switch($attendance_val){
                                              case 'P': 
                                                        $td_class = 'bg-success';
                                                        break;
                                              case 'L': 
                                                        $td_class = 'bg-info';
                                                        break;
                                              case 'A':
                                                        $td_class = 'bg-danger';
                                                        break;
                                              case 'LE':
                                                        $td_class = 'bg-warning';
                                                        break;
                                              case 'N/A':
                                                        $td_class = 'bg-secondary';
                                                        break;
                                              default: 
                                                        $td_class = '';
                                                        break;
                                            }
                                            echo '<td class='.$td_class.'>'.$attendance_val.'</td>';
                                            
                                        /*$attendance_val = 'N/A'; 
                                        for ($j=0; $j < count($user_attendance); $j++){ 
                                            if($user_attendance[$j]['day'] == $i && $mk == $user_attendance[$j]['month']){
                                              $attendance_val = $user_attendance[$j]['attendance'];
                                              break;          
                                            }
                                          }
                                          echo '<td>'.$attendance_val.'</td>';*/
                                        }
                                        ?>
                                    </tr>
                                  <?php 
                                     } ?>
                                </tbody>
                          </table>
                          <div>
                            <span>Total Leave:<?php echo $total_stats->leave_count; ?></span>, 
                            <span>Total Present:<?php echo $total_stats->present; ?></span>, 
                            <span>Total Late With Excuse:<?php echo $total_stats->LE_count; ?></span>, 
                            <span>Total Absent:<?php echo $total_stats->absent; ?></span>
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
