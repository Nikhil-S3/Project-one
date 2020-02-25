<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/ico" />

    <title>Salary Report</title>

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

    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/build/css/styles.css" rel="stylesheet">
  </head>

      <?php $this->load->view('common/header.php'); ?>
            
            <div>
              <form id="salary_reports_form" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url();?>reports/salaryreport" method="post" enctype="multipart/form-data" >

                <div class='col-md-2 col-sm-12 col-xs-12 form-group'>
                  Salary For *
                  <select id="salary_for" name="salary_for" class="form-control">
                    <option value="">Please Select</option>
                    <option value="5" <?php echo ($this->session->flashdata('salary_for')=='5')?'selected':''; ?> >Receptionist</option>
                    <option value="6" <?php echo ($this->session->flashdata('salary_for')=='6')?'selected':''; ?> >Librarian</option>
                    <option value="7" <?php echo ($this->session->flashdata('salary_for')=='7')?'selected':''; ?> >Accountant</option>
                    <option value="2"<?php echo ($this->session->flashdata('salary_for')=='2')?'selected':''; ?> >Teacher</option>
                    <option value="1" <?php echo ($this->session->flashdata('salary_for')=='1')?'selected':''; ?> >Admin</option>
                  </select>
                </div>
                
                <div class='col-md-2 col-sm-12 col-xs-12 form-group salary_for_dynamic_hidden' <?php echo ($this->session->flashdata('salary_for_dynamic_id'))?'':'style="display: none"' ?> >
                  <span id="salary_for_dynamic_text"><?php echo @$this->session->flashdata('salary_for_text'); ?></span> *
                  <select id="salary_for_dynamic_id" name="salary_for_dynamic_id" class="form-control">
                    <option value="">Please Select</option>
                    <?php if(!empty($user_info) && count($user_info)>0) {
                            foreach($user_info as $u_key=>$u_val) {
                     ?>
                      <option value="<?php echo $u_val->id; ?>" <?php echo ($this->session->flashdata('salary_for_dynamic_id')==$u_val->id)?'selected':''; ?> ><?php echo $u_val->preferred_name; ?></option>
                    <?php } } ?>
                  </select>
                </div>

                <div class='col-md-2 col-sm-12 col-xs-12 form-group'>
                  Month *
                  <div class='input-group date' id='payment_month'>
                      <input type='text' class="form-control" name="payment_month" id="payment_month_year" value="<?php echo @$this->session->flashdata('payment_month'); ?>" />
                      <span class="input-group-addon">
                         <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div> 
                </div>

                <div class='col-md-2 col-sm-12 col-xs-12 form-group'>
                  From Date
                  <div class='input-group date' id='from_date'>
                      <input type='text' class="form-control" name="from_date" value="<?php echo @$this->session->flashdata('from_date'); ?>" />
                      <span class="input-group-addon">
                         <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
                </div>

                <div class='col-md-2 col-sm-12 col-xs-12 form-group'>
                  To Date
                  <div class='input-group date' id='to_date'>
                      <input type='text' class="form-control" name="to_date" value="<?php echo @$this->session->flashdata('to_date'); ?>" />
                      <span class="input-group-addon">
                         <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
                </div>

                <div class='col-md-2 col-sm-12 col-xs-12 form-group'>
                  &nbsp;&nbsp;
                    <input type="submit" class="btn btn-success form-control" id="get_report" name="get_report" value="Get Report">
                </div>
            </form>  
            </div>

            <?php if(isset($salary_reports) && count($salary_reports)>0) {
                    
              ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Report For - <span class="report_for_text"></span></h2>
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

                    <input type="button" class="btn btn-primary" onclick="printDiv('id-card')" value="print" />

                    <div class="x_content">
                      
                      <table class="table table-striped table-bordered student-report"  id='student-report'>
                            <thead>
                              <th>#</th>
                              <th>Date</th>
                              <th>Name</th>
                              <th>Role</th>
                              <th>Month</th>
                              <th>Amount</th>
                            </thead>
                              <?php $counter=1; foreach ($salary_reports as $key => $value) {
                                echo '<tr>';
                                echo '<td>'.$counter.'</td>';
                                echo '<td>'.date('d M Y',strtotime($value->payment_month_year)).'</td>';
                                echo '<td>'.$value->preferred_name.'</td>';
                                echo '<td>'.$value->role.'</td>';
                                echo '<td>'.date('M Y',strtotime($value->payment_month_year)).'</td>';
                                echo '<td>'.$value->payment_amount.'</td>';
                                echo '</tr>';
                              $counter++; } ?>
                              <?php ?>
                          </table>

                    </div>
                  </div>
                </div>
                      
              </div>
              <?php } else{ ?>

                <div class="x_content">
                      
                    <table class="table table-striped table-bordered student-report"  id='student-report'>
                          <thead>
                            <th>#</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Month</th>
                            <th>Amount</th>
                          </thead>
                          <tr>
                            <td colspan="6" align="center">No Data Found.</td>
                          </tr>
                    </table>

                  </div>
              <?php } ?>
            
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

    <!-- jQuery Form Validator -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

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

      $(document).ready(function(){

        $("#payment_month").datetimepicker({
            viewMode: "months",
            format: "MM-YYYY"
        });
        $('#from_date').datetimepicker({
            format: 'DD-MM-YYYY',
            maxDate: 'now'
        });
        $('#to_date').datetimepicker({
            format: 'DD-MM-YYYY',
            maxDate: 'now'
        });

        $('#salary_reports_form').validate({
          rules: {
            salary_for: {
              required: true
            },
            class_id: {
              required: true
            }
          },
          
          errorPlacement: function(){
            return false;  // suppresses error message text
          },
          submitHandler: function (form) {
            form.submit();
          }
        });
          
          $(document).on('change', '#salary_for', function(){
              var salary_for = $(this).val();
              var salary_for_text = $("#salary_for option:selected").text();
              console.log("role_id",salary_for);
              if(salary_for!='' ){
                $.ajax({
                  url:"<?php echo base_url();?>reports/ajax_get_user",
                  type:'post',
                  // dataType:'json',
                  data:{role_id:salary_for},
                  success: function(response){
                    console.log('response', response);
                    $('#salary_for_dynamic_text').text(salary_for_text);
                    $('#salary_for_dynamic_id').html(response);
                    $('.salary_for_dynamic_hidden').show();
                  }
                });
              }else{
                  $('#salary_for_dynamic_text').text('');
                  $('#salary_for_dynamic_id').html('');
                  $('.salary_for_dynamic_hidden').hide();
              }
          });

          <?php if(!empty($_POST['salary_for'])){ ?>
            var reportForText = $("#salary_for option:selected").text();
            console.log('reportForText',reportForText);
            $('.report_for_text').text(reportForText).css('color','#808b9c');
          <?php } ?>
      });

      function printDiv(divName) {
          /*var printContents = document.getElementById(divName).innerHTML;
          var originalContents = document.body.innerHTML;
          document.body.innerHTML = printContents;
          window.print();
          document.body.innerHTML = originalContents;*/
          var mywindow = window.open('', 'PRINT', 'height=400,width=600');

          mywindow.document.write('<html><head><title>' + document.title  + '</title>');
          mywindow.document.write('</head><body >');
          mywindow.document.write('<h1>' + document.title  + '</h1>');
          mywindow.document.write(document.getElementById(divName).innerHTML);
          mywindow.document.write('</body></html>');

          mywindow.document.close(); // necessary for IE >= 10
          mywindow.focus(); // necessary for IE >= 10*/

          /*mywindow.print();
          mywindow.close();*/

          return false;
      }

    </script>

  </body>
</html>
