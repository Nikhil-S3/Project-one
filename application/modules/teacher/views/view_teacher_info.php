<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/ico" />

    <title>Teacher</title>

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
                  
                    <div class="x_content">
                      <?php if($teacher_info->photo!=''){ ?>
                        <img class="img-circle" src="<?php echo base_url('assets/images/uploads/'.$teacher_info->photo); ?>" alt="" width="200" height="200">
                    <?php }else{ ?>
                        <img class="img-circle" src="<?php echo base_url('assets/images/user.png'); ?>" alt="" width="200" height="200">
                    <?php } ?>
                      <span class="text-center"><h5><?php echo $teacher_info->preferred_name; ?></h5></span>
                      <!-- <div class="card-body"> -->
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">Gender : <?php echo ucwords($teacher_info->gender); ?></li>
                          <li class="list-group-item">Date of Birth : <?php echo date('d M Y',strtotime($teacher_info->date_of_birth)); ?></li>
                          <li class="list-group-item">Phone : <?php echo $teacher_info->phone; ?></li>
                        </ul>
                    </div>
                  </div>
                </div>
                      
                <div class="col-md-9 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    
                    <div class="x_content">
                      
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active">
                          <a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Profile</a>
                        </li>
                        <li role="presentation" class="">
                          <a href="#tab_content2" role="tab" id="attendance-tab" data-toggle="tab" aria-expanded="false">Attendance</a>
                        </li>
                        <li role="presentation" class="">
                          <a href="#tab_content3" role="tab" id="salary-tab" data-toggle="tab" aria-expanded="false">Salary</a>
                        </li>
                        <li role="presentation" class="">
                          <a href="#tab_content4" role="tab" id="payment-tab" data-toggle="tab" aria-expanded="false">Payment</a>
                        </li>
                      
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          
                          Joining Date : <?php echo date('d M Y',strtotime($teacher_info->joining_date)); ?>, 
                          Religion: <?php echo date('d M Y',strtotime($teacher_info->religion)); ?>, 
                          Email: <?php echo date('d M Y',strtotime($teacher_info->email)); ?>, 
                          Address: <?php echo date('d M Y',strtotime($teacher_info->address)); ?>, 
                          Username: <?php echo date('d M Y',strtotime($teacher_info->username)); ?>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          
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
                                           foreach($teacher_attendance as $sak=>$sav){
                                              if($sav->day==$i && $mk==$sav->month){
                                                 $attendance_val = $sav->attendance;
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
                                        for ($j=0; $j < count($teacher_attendance); $j++){ 
                                            if($teacher_attendance[$j]['day'] == $i && $mk == $teacher_attendance[$j]['month']){
                                              $attendance_val = $teacher_attendance[$j]['attendance'];
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
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                          Salary Grade : <?php echo $teacher_salary_info->grade; ?> <br>
                          Overtime Rate : <?php echo $teacher_salary_info->overtime_rate; ?> <br>
                          Gross Salary : <?php echo $teacher_salary_info->gross_salary; ?> <br>
                          Total Deduction : <?php echo $teacher_salary_info->total_deductions; ?> <br>
                          Net Pay : <?php echo $teacher_salary_info->net_salary; ?> <br>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">

                          <table id="datatable-buttons" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>Month</th>
                                  <th>Date</th>
                                  <th>Net Salary</th>
                                  <th>Payment Amount</th>
                                  <th>Action</th>
                                </tr>
                              </thead>


                              <tbody>
                                <?php if(!empty($payment_history)) { 
                                        foreach( $payment_history as $ph_key => $ph_val ){
                                  ?>
                                <tr>
                                  <td><?php echo date('M Y',strtotime($ph_val->payment_month_year)); ?></td>
                                  <td><?php echo date('d M Y',strtotime($ph_val->created_at)); ?></td>
                                  <td><?php echo $ph_val->net_salary; ?></td>
                                  <td><?php echo $ph_val->payment_amount; ?></td>
                                  <td>
                                      <a href="<?php echo base_url().'make_payment/view/'.$ph_val->id; ?>">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                      </a> |
                                      <a href="<?php echo base_url().'make_payment/delete/'.$ph_val->id; ?>" onclick="return confirm('Are you sure you want to delete this student?');">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                      </a>
                                  </td>
                                </tr>
                              <?php } } else{  ?>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <!-- hidden column 6 for proper DataTable applying -->
                                  <td style="display: none"></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          
                        </div>
                      </div>
                    </div>
                          
                    </div>
                </div>
              </div>
            </div> <!-- row -->

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
