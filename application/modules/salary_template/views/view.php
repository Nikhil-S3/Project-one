<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/ico" />

    <title>Salary Template</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    
    <!-- iCheck -->
    <link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url(); ?>assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/build/css/styles.css" rel="stylesheet">

  </head>

      <?php $this->load->view('common/header.php'); ?>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="add_marks_status text-center" style="display: none"></div>

                  <div class="x_title">
                    <h2>Salary Template</h2>
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
                    <?php echo validation_errors('<p style="color: red;">', '</p>'); 
                        if($this->session->flashdata('item')) {
                          $message = $this->session->flashdata('item');
                          $class = $message['class'];
                          $message = $message['message'];
                          echo "<div class='$class'>$message</div>";
                        }
                    ?>

                    <div class="box-body">
                        <form class="form-horizontal" role="form" method="post" id="templateDataForm" action="<?php echo base_url();?>salary_template/add">
                          <div class="row">
                            <div class="col-sm-12" style="margin-bottom: 10px;">
                                <div class='form-group' >                  
                                  <label for="salary_grades" class="col-sm-2 control-label">
                                        Salary Grades <span class="text-red">*</span>
                                  </label>
                                  <div class="col-sm-4">
                                      <input type="text" class="form-control" id="salary_grades" name="salary_grades" value="<?php echo $salary_template_info->grade; ?>" readonly>
                                  </div>
                                    <span class="col-sm-4 control-label" id="salary_grades_error">
                                    </span>
                                </div>

                                <div class='form-group' >                        <label for="basic_salary" class="col-sm-2 control-label">
                                        Basic Salary <span class="text-red">*</span>
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="basic_salary" name="basic_salary" value="<?php echo $salary_template_info->basic_salary; ?>" readonly>
                                    </div>
                                    <span class="col-sm-4 control-label" id="basic_salary_error">
                                                                </span>
                                </div>

                                <div class='form-group' >
                                  <label for="overtime_rate" class="col-sm-2 control-label">
                                      Overtime Rate (Per Hour) <span class="text-red">*</span>
                                  </label>
                                  <div class="col-sm-4">
                                      <input type="text" class="form-control" id="overtime_rate" name="overtime_rate" value="<?php echo $salary_template_info->overtime_rate; ?>" readonly >
                                  </div>
                                  <span class="col-sm-4 control-label" id="overtime_rate_error"></span>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="box" style="border: 1px solid #eee;height: 133px">
                                    <div class="box-header" style="border-bottom: 1px solid #eee;color: #000;">
                                        <h3 class="box-title" style="color: #1a2229">Allowances</h3>
                                    </div><!-- /.box-header -->
                                    <!-- form start -->
                                    <div class="box-body">
                                        <div class="row">
                                          <div class="col-sm-12" id="allowances">
                                                  
                                            <div class='form-group allowancesfield'>
                                              <?php if(isset($salary_template_allowances) && count($salary_template_allowances)>0) {
                                                  foreach($salary_template_allowances as $a_key=>$a_val){
                                               ?>
                                              <div class="col-sm-5">
                                                  <input type="text" class="form-control" name="allowances_label[]" value="<?php echo $a_val->allowance_label; ?>" readonly>
                                              </div>

                                              <div class="col-sm-5">
                                                  <input type="text" class="form-control allowances_amount" name="allowances_amount[]" value="<?php echo $a_val->allowance_amount; ?>" readonly>
                                              </div>

                                              <span class="col-sm-12 errorpointallowances" id="allowanceserror1">
                                              <?php } } ?>
                                              </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="box" style="border: 1px solid #eee;height: 133px">
                                    <div class="box-header" style="background-color: #fff;border-bottom: 1px solid #eee;color: #000;">
                                        <h3 class="box-title" style="color: #1a2229">Deduction</h3>
                                    </div><!-- /.box-header -->
                                    <!-- form start -->
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-sm-12" id="deductions">
                                                <div class='form-group deductionsfield'>
                                                  <?php if(isset($salary_template_deductions) && count($salary_template_deductions)>0) {
                                                  foreach($salary_template_deductions as $d_key=>$d_val){
                                               ?>
                                                  <div class="col-sm-5">
                                                      <input type="text" class="form-control" name="deductions_label[]" value="<?php echo $d_val->deduction_label; ?>" readonly >
                                                  </div>

                                                  <div class="col-sm-5">
                                                      <input type="text" class="form-control deductions_amount" name="deductions_amount[]" value="<?php echo $d_val->deduction_amount; ?>" readonly >
                                                  </div>

                                                <span class="col-sm-12 errorpointdeductions" id="deductionserror1">
                                                <?php } } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-8 col-sm-offset-4">
                                <div class="box" style="border: 1px solid #eee;height: 275px">
                                    <div class="box-header" style="background-color: #fff;border-bottom: 1px solid #eee;color: #000;">
                                        <h3 class="box-title" style="color: #1a2229">Total Salary Details</h3>
                                    </div><!-- /.box-header -->
                                    <!-- form start -->
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td class="col-sm-8" style="line-height: 36px">Gross Salary</td>

                                                        <td class="col-sm-4"><input class="form-control" id="gross_salary" type="text" value="<?php echo $salary_template_info->gross_salary; ?>" disabled="disabled" name="gross_salary"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="col-sm-8" style="line-height: 36px">Total Deduction</td>

                                                        <td class="col-sm-4"><input class="form-control" id="total_deduction" type="text" value="<?php echo $salary_template_info->total_deductions; ?>" disabled="disabled" name="total_deduction"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="col-sm-8" style="line-height: 36px">Net Salary</td>

                                                        <td class="col-sm-4"><input class="form-control" id="net_salary" type="text" value="<?php echo $salary_template_info->net_salary; ?>" disabled="disabled" name="net_salary"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-sm-12 col-xs-12">
                                <input class="btn btn-success pull-right col-sm-3 col-xs-12 " type="submit" id="add_salary_template" name="add_salary_template" value="Add Salary Template">
                            </div> -->

                          </div>
                        </form>
                    </div>

                  </div>
                </div>
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
    <script src="<?php echo base_url(); ?>assets/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url(); ?>assets/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url(); ?>assets/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url(); ?>assets/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url(); ?>assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url(); ?>assets/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url(); ?>assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url(); ?>assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

    <!-- jQuery Form Validator -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script>
	   
    <script>
      
      /** After windod Load */
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
