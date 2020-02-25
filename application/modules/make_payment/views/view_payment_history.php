<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/ico" />

    <title>Make Payment</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/build/css/styles.css" rel="stylesheet">
  </head>

      <?php $this->load->view('common/header.php'); ?>

            <div class="page-title">
              <div class="title_left">
                  <h3>Make Payment</h3>
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
                          <li class="list-group-item">Date Of Birth : <?php echo date('d M Y',strtotime($user_data->date_of_birth)); ?></li>
                          <li class="list-group-item">Joining Date : <?php echo date('d M Y',strtotime($user_data->joining_date)); ?></li>
                          <li class="list-group-item">Phone : <?php echo $user_data->phone; ?></li>
                        </ul>
                    </div>
                  </div>
                </div>
                      
                <div class="col-md-9 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Payment History</h2>
                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                      <br />
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

                <!-- row -->
            </div>

            <div class="row">
              <div class="x_panel">
                  <div class="x_content">
                    <form name="add_payment_form" class="" action="" method="post">
                      <div class="col-md-3 col-sm-12 col-xs-12">
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo @$user_id; ?>">
                        <input type="hidden" name="net_salary" value="<?php echo @$salary_info->net_salary; ?>">
                        Gross Salary * 
                        <input type="text" class="form-control" name="" value="<?php echo @$salary_info->gross_salary; ?>" disabled="true">
                        Total Deduction * 
                        <input type="text" class="form-control" name="" value="<?php echo @$salary_info->total_deductions; ?>" disabled="true">
                        Net Salary * 
                        <input type="text" class="form-control" name="" value="<?php echo @$salary_info->net_salary; ?>" disabled="true">
                        Month * 
                        <div class='input-group date' id='payment_month'>
                            <input type='text' class="form-control" name="payment_month" id="payment_month_year" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div> 
                        <span id="payment_done_error" style="color:red;display:none;"></span>
                        Payment Amount * 
                        <input type="text" class="form-control" name="payment_amount" value="<?php echo @$salary_info->net_salary; ?>">
                        Payment Method *
                        <select class="form-control" name="payment_method" id="payment_method">
                          <option value="">Select Payment Method</option>
                          <option value="cash">Cash</option>
                          <option value="cheque">Cheque</option>
                        </select>
                        Comments 
                        <input type="text" class="form-control" name="comments" value=""><br/>
                        <input type="submit" name="add_payment" class="btn btn-primary" id="add_payment" value="Add Payment">
                      </div>
                    </form>
                  </div>
              </div>
              <div class="col-md-9 col-sm-12 col-xs-12">
              </div>
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

    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url(); ?>assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

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

      $(function () {
        $("#payment_month").datetimepicker({
            viewMode: "months",
            format: "MM-YYYY"
        });

        $('#payment_month').on('dp.change', function(){
          var payment_month_year = $('#payment_month_year').val();
          var user_id = $("#user_id").val();
          // console.log('user_id', user_id);
          // console.log('payment_month_year', payment_month_year);
          $.ajax({
            url:"<?php echo base_url(); ?>make_payment/ajax_check_payment_done_for_user",
            type:'post',
            dataType:'json',
            data: {user_id: user_id, payment_month_year:payment_month_year},
            success: function(response){
              // console.log('response', response);
              if(response.status==1){
                $('#payment_done_error').text('Payment Already done for this month.').show();
                $('#add_payment').prop('disabled', true);
              }else{
                $('#payment_done_error').text('').hide();
                $('#add_payment').prop('disabled', false);
              }
            }
          });
        });
      });

    </script>

  </body>
</html>
