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
                    <h2>Add Salary Template</h2>
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
                        <form class="form-horizontal" role="form" method="post" id="salarytemplate_add_form" action="<?php echo base_url();?>salary_template/add">
                          <div class="row">
                            <div class="col-sm-12" style="margin-bottom: 10px;">
                                <div class='form-group' >                  
                                  <label for="salary_grades" class="col-sm-2 control-label">
                                        Salary Grades <span class="text-red">*</span>
                                  </label>
                                  <div class="col-sm-4">
                                      <input type="text" class="form-control" id="salary_grades" name="salary_grades" value="">
                                  </div>
                                    <span class="col-sm-4 control-label" id="salary_grades_error">
                                    </span>
                                </div>

                                <div class='form-group' >                        <label for="basic_salary" class="col-sm-2 control-label">
                                        Basic Salary <span class="text-red">*</span>
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="basic_salary" name="basic_salary" value="">
                                    </div>
                                    <span class="col-sm-4 control-label" id="basic_salary_error">
                                                                </span>
                                </div>

                                <div class='form-group' >
                                  <label for="overtime_rate" class="col-sm-2 control-label">
                                      Overtime Rate (Per Hour) <span class="text-red">*</span>
                                  </label>
                                  <div class="col-sm-4">
                                      <input type="text" class="form-control" id="overtime_rate" name="overtime_rate" value="" >
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
                                                  
                                            <div class='form-group'>
                                              <div class="row1">
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="allowances_label1" name="allowances_label[]" value="House Rent" placeholder="Enter Allowances Label">
                                                </div>

                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control allowances_amount" id="allowances_amount1" name="allowances_amount[]" value="" placeholder="Enter Allowances Value">
                                                </div>

                                                <div class="col-sm-2" >
                                                    <button type="button" class="btn btn-success btn-xs salary-btn salary-btn-allowances-add add_allowances" id="salary-btn-allowances-add" >
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                              </div>

                                              <div class="dynamic_allowances"></div>
                                              <!-- <span class="col-sm-12 errorpointallowances" id="allowanceserror1"> -->
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
                                                  <div class="rowdeduction1">
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" id="deductions_label1" name="deductions_label[]" value="Provident Fund" placeholder="Enter Deductions Label">
                                                    </div>

                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control deductions_amount" id="deductions_amount1" name="deductions_amount[]" value="" placeholder="Enter Deductions Value">
                                                    </div>


                                                    <div class="col-sm-2" >
                                                        <button type="button" class="btn btn-success btn-xs salary-btn salary-btn-deductions-add add_deductions" id="salary-btn-deductions-add">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                  </div>
                                                  <div class="dynamic_deductions_html"></div>

                                                <!-- <span class="col-sm-12 errorpointdeductions" id="deductionserror1"> -->
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

                                                        <td class="col-sm-4"><input class="form-control" id="gross_salary" type="text" readonly" name="gross_salary"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="col-sm-8" style="line-height: 36px">Total Deduction</td>

                                                        <td class="col-sm-4"><input class="form-control" id="total_deduction" type="text" readonly name="total_deductions"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="col-sm-8" style="line-height: 36px">Net Salary</td>

                                                        <td class="col-sm-4"><input class="form-control" id="net_salary" type="text" readonly name="net_salary"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-xs-12">
                                <input class="btn btn-success pull-right col-sm-3 col-xs-12 " type="submit" id="add_salary_template" name="add_salary_template" value="Add Salary Template">
                            </div>

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
      $(document).ready(function(){
         var i = 1;
         var j = 1;

         $('#salarytemplate_add_form').validate({
          rules: {
            salary_grades: {
              required: true
            },
            basic_salary: {
              required: true
            },
            overtime_rate: {
              required: true,
            }
          },
          messages: {
            salary_grades: {
              required: "The salary grade field is required"
            },
            basic_salary: {
              required: "The Basic Salary field is required"
            },
            overtime_rate: {
              required: "The Overtime Rate field is required",
            },
          },
          submitHandler: function (form) { // for demo
            // alert('valid form submitted');
            // return false;
            form.submit();
          }
        });

         // Add basic salary to Gross Salary
         $('#basic_salary').change(function(){
            var basic_sal = $(this).val();
            var values = [];
            $('input[name^="allowances_amount"]').each(function(){
              if($(this).val())
                values.push($(this).val());
            });
            console.log(values);
            var total = 0;
            $.each(values,function() {
                total += parseInt(this, 10);
            });
            var total_deductions = $('#total_deduction').val();
            var gross_sal_total = Number(total)+Number(basic_sal);
            var net_sal_total = Number(gross_sal_total)-Number(total_deductions);
            $('#gross_salary').val(gross_sal_total);
            $('#net_salary').val(net_sal_total);
         });

         // Add Allowances to Gross Salary
         $(document).on('change', '.allowances_amount', function(){
            var values = [];
            $('input[name^="allowances_amount"]').each(function(){
              values.push($(this).val());
            });
            console.log(values);
            var total = 0;
            $.each(values,function() {
                total += parseInt(this, 10);
            });
            var basic_sal = $('#basic_salary').val();
            console.log('total',total);
            var gross_salary = Number(basic_sal)+Number(total);
            console.log('gross salary',gross_salary);
            $('#gross_salary').val(gross_salary);
            var total_deductions = $('#total_deduction').val();
            var net_salary = Number(gross_salary)-Number(total_deductions);
            $('#net_salary').val(net_salary);
         });

         // Subtract Deductions from Gross Salary
         $(document).on('change onblur', '.deductions_amount', function(){
            var deduction_val = $(this).val();
            console.log('deductions present val',deduction_val);
            var net_salary = $('#net_salary').val();
            console.log('net_salary',net_salary);
            var final_total = Number(net_salary)-Number(deduction_val);
            console.log('final_total',final_total);
            $('#net_salary').val(final_total);
            // show total deductions
            var values = [];
            $('input[name^="deductions_amount"]').each(function(){
              values.push($(this).val());
            });
            console.log(values);
            var total = 0;
            $.each(values,function() {
                total += parseInt(this, 10);
            });
            $('#total_deduction').val(total);
            console.log('total deductions ',total);
         });

         $(document).on('click', '.add_allowances', function(){
            i++;
            $(this).remove();
            var dynamicHTML =  '<span class="row'+i+'"><div class="col-sm-5">                                                  <input type="text" class="form-control" id="allowances_label'+i+'" name="allowances_label[]" placeholder="Enter Allowances Label"></div><div class="col-sm-5"><input type="text" class="form-control allowances_amount" id="allowances_amount'+i+'" name="allowances_amount[]" value="" placeholder="Enter Allowances Value"></div><div class="col-sm-2"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn-xs btn_remove_allowances"><i class="fa fa-times" aria-hidden="true"></i></button><button type="button" class="btn btn-success btn-xs salary-btn salary-btn-allowances-add add_allowances" id="salary-btn-allowances-add" ><i class="fa fa-plus"></i></button></div></span>';
            $('.dynamic_allowances').append(dynamicHTML);
         });

         $(document).on('click', '.btn_remove_allowances', function(){
            i--;
            var previous_row_id = i;
            console.log('previous_row_id'+previous_row_id);
            var id = $(this).attr('id');
            var current_allowance_val = $('#allowances_amount'+id).val();
            console.log('current allowance val',current_allowance_val);
            var gross_sal = $('#gross_salary').val();
            var net_sal = $('#net_salary').val();
            console.log('gross sal',gross_sal);
            console.log('net sal',net_sal);
            var gross_sal_total = Number(gross_sal)-Number(current_allowance_val);
            var net_sal_total = Number(net_sal)-Number(current_allowance_val);
            console.log('gross_sal_total',gross_sal_total);
            $('#gross_salary').val(gross_sal_total);
            $('#net_salary').val(net_sal_total);
            $(".row"+id).remove();
            $('.row'+previous_row_id).find('.col-sm-2').append('<button type="button" class="btn btn-success btn-xs salary-btn salary-btn-allowances-add add_allowances" id="salary-btn-allowances-add" ><i class="fa fa-plus"></i></button>');
         });

         $(document).on('click','.add_deductions', function(){
            j++;
            $(this).remove();
            var dynamicHTMLDeductions = '<div class="rowdeduction'+j+'"><div class="col-sm-5"> <input type="text" class="form-control" id="deductions_label'+j+'" name="deductions_label[]" placeholder="Enter Deductions Label"></div><div class="col-sm-5">  <input type="text" class="form-control deductions_amount" id="deductions_amount'+j+'" name="deductions_amount[]" value="" placeholder="Enter Deductions Value"></div><div class="col-sm-2"><button type="button" name="remove'+j+'" id="'+j+'" class="btn btn-danger btn-xs btn_remove_deductions"><i class="fa fa-times" aria-hidden="true"></i></button><button type="button" class="btn btn-success btn-xs salary-btn salary-btn-deductions-add add_deductions" id="salary-btn-allowances-add" ><i class="fa fa-plus"></i></button></div></div>';
            $('.dynamic_deductions_html').append(dynamicHTMLDeductions);
         });
         $(document).on('click', '.btn_remove_deductions', function(){
            console.log('clicked on remove');
            j--;
            var previous_row_id = j;
            console.log('previous_row_id'+previous_row_id);
            var id = $(this).attr('id');
            console.log('id ',id);

            var current_deduction_val = $('#deductions_amount'+id).val();
            console.log('current deduction',current_deduction_val);
            var net_sal = $('#net_salary').val();
            var total_deduction = $('#total_deduction').val();
            console.log('net sal',net_sal);
            var total_deduction_final = Number(total_deduction)-Number(current_deduction_val);
            var net_sal_total = Number(net_sal)+Number(current_deduction_val);
            $('#total_deduction').val(total_deduction_final);
            $('#net_salary').val(net_sal_total);

            $(".rowdeduction"+id).remove();
            $('.rowdeduction'+previous_row_id).find('.col-sm-2').append('<button type="button" class="btn btn-success btn-xs salary-btn salary-btn-deductions-add add_deductions" id="salary-btn-deductions-add" ><i class="fa fa-plus"></i></button>');
         });



      });
    </script>

  </body>
</html>
