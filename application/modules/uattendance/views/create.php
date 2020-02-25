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

                  <div class="attendance_status text-center" style="display: none"></div>

                  <div class="x_title">
                    <h2>Add User Attendance</h2>
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

                    <form id="user_attendance_form" class="form-inline" action="<?php echo base_url();?>uattendance/add" method="post">

                      <div class='col-md-3 col-sm-12 col-xs-12 form-group'>
                          Date *
                          <div class='input-group date'>
                              <input type='text' class="form-control" name="attendance_date" id='attendance_date' value="<?php echo !empty($this->session->flashdata('attendance_date'))?$this->session->flashdata('attendance_date'):''; ?>" />
                              <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>
                      <div class='col-md-3 col-sm-12 col-xs-12 form-group'>
                          <input type="submit" class="btn btn-success form-control" id="attendance_submit" name="attendance_submit" value="Attendance">
                      </div>
                      <?php if(isset($user_attendance_info) && count($user_attendance_info)>0) { ?>
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Attendance</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $count=1; foreach( $user_attendance_info as $u_key => $u_val ){ ?>
                          <tr>
                            <td><?php echo $count++; ?></td>
                            <td><?php echo $u_val->preferred_name; ?></td>
                            <td><?php echo $u_val->email; ?></td>
                            <td><?php echo $u_val->user_role; ?></td>
                            <td>
                              <input type="radio" class="attendance btn btn-warning present" id="<?php echo $u_val->id; ?>-1" value="P" name="attendance<?php echo $u_val->id; ?>">
                              <label style="vertical-align:  middle;display: inline;" for="<?php echo $u_val->id; ?>-1">Present </label> 
                              <input type="radio" class="attendance btn btn-warning lateexcuse" id="<?php echo $u_val->id; ?>-2" value="LE" name="attendance<?php echo $u_val->id; ?>">
                              <label style="vertical-align:  middle;display: inline;" for="<?php echo $u_val->id; ?>-2">Late Present With Excuse </label>
                              <input type="radio" class="attendance btn btn-warning late" id="<?php echo $u_val->id; ?>-3" value="L" name="attendance<?php echo $u_val->id; ?>">
                              <label style="vertical-align:  middle;display: inline;" for="<?php echo $u_val->id; ?>-3">Late Present </label>
                              <input type="radio" class="attendance btn btn-warning absent" id="<?php echo $u_val->id; ?>-4" value="A" name="attendance<?php echo $u_val->id; ?>">
                              <label style="vertical-align:  middle;display: inline;" for="<?php echo $u_val->id; ?>-4">Absent </label>
                            </td>
                          </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                      <button type="button" id="save_attendance" class="btn btn-primary save_attendance">Submit</button>
                      <?php } ?>
                    </form>
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
      
      $('#attendance_date').datetimepicker({
          format: 'DD/MM/YYYY'
      });
      /** After windod Load */
      $(window).bind("load", function() {
        window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove();
          });
      }, 4000);
      });
      $(document).ready(function(){

        $('#teacher_attendance_form').validate({
          rules: {
            attendance_date: {
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

        $('.save_attendance').click(function(){
          var attendance = {};
          var a_date = $('#attendance_date').val();;
          $('.attendance').each(function(i){
              var name = $(this).attr('name');
              if($("input:radio[name="+name+"]").is(":checked")) {
                  var val = $('input:radio[name='+name+']:checked').val();
              } else {
                  var val = 'A';
              }
              attendance[name] = val;
          });
          // console.log('attendance '+attendance);
          $.ajax({
            url:"<?php echo base_url(); ?>uattendance/ajax_save_attendance",
            type:'post',
            data:{attendance:attendance,a_date:a_date},
            dataType  : 'json',
            success: function(response){
              console.log('attendance response : '+response);
              $('.attendance_status').html('<span class="'+response.class+'">'+response.message+'</span>').show().delay(5000).fadeOut();
            }
          });
        });
        
      });
    </script>

  </body>
</html>
