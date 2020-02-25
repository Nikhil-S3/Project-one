<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/ico" />

    <title>Permission</title>

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
                    <h2>Add Permission</h2>
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

                    <form id="role_form" class="form-inline" action="<?php echo base_url();?>permission/index" method="post">

                      <div class='col-md-3 col-sm-12 col-xs-12 form-group'>
                          Role *
                          <select id="role_id" name="role_id" class="form-control" onchange="getModulesPermissions()" >
                            <option value="">Select Role</option>
                            <?php 
                                  if(!empty($all_roles)){
                                foreach($all_roles as $r_key=>$r_val){ ?>
                                  <option value="<?php echo $r_val->role_id; ?>" <?php echo ($this->session->flashdata('role_id')==$r_val->role_id)?'selected':''; ?> ><?php echo $r_val->role_name; ?></option>
                                <?php } } ?>
                          </select>
                      </div>
                    </form>
                      <?php if(isset($role_permissions) && count($role_permissions)>0) { ?>
                    <form id="role_permission_form" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url();?>permission/save_permissions" method="post" enctype="multipart/form-data" >
                      <input type="hidden" name="role_id" class="role_id" value="<?php echo ($this->session->flashdata('role_id'))?$this->session->flashdata('role_id'):'';  ?>">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Module Name</th>
                            <th>Add</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>View</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $count=1; foreach( $role_permissions as $rp_key => $rp_val ){ ?>
                              <!-- <input type="hidden" name="<?php // echo strtolower($rp_val->module_name).'_add_'.$rp_val->id; ?>" value="0"> -->
                          <tr>
                            <td><?php echo $count++; ?></td>
                            <td><?php echo $rp_val->module_name; ?></td>
                            <?php if(strpos(strtolower($rp_val->module_name), 'report') === false) { ?>
                              <td><input type="checkbox" class="" name="<?php echo 'add_'.$rp_val->id; ?>" value="1" <?php echo ($rp_val->p_add)?'checked':''; ?> ></td>
                              <?php if(strpos(strtolower($rp_val->module_name), 'attendance') === false) { ?>
                              <td><input type="checkbox" class="" name="<?php echo 'edit_'.$rp_val->id; ?>" value="1" <?php echo ($rp_val->p_edit)?'checked':''; ?> ></td>
                              <td><input type="checkbox" class="" name="<?php echo 'delete_'.$rp_val->id; ?>" value="1" <?php echo ($rp_val->p_delete)?'checked':''; ?> ></td>
                              <?php } else{ ?> 
                                <td></td>
                                <td></td>
                              <?php } ?> 
                              <td><input type="checkbox" class="" name="<?php echo 'view_'.$rp_val->id; ?>" value="1" <?php echo ($rp_val->p_view)?'checked':''; ?> ></td>
                            <?php } else{ ?> 
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            <?php } ?> 
                          </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                      <input type="submit" id="save_permissions" name="save_permissions" class="btn btn-primary save_permissions" value="Save Permission">
                      <?php } ?>
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

      function getModulesPermissions(){
        document.getElementById("role_form").submit();
      }

      $(document).ready(function(){

        $('#role_form').validate({
          rules: {
            role_id: {
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

        $("#role_permission_form").submit(function () {

            var this_master = $(this);

            this_master.find('input[type="checkbox"]').each( function () {
                var checkbox_this = $(this);


                if( checkbox_this.is(":checked") == true ) {
                    checkbox_this.attr('value','1');
                } else {
                    checkbox_this.prop('checked',true);
                    //DONT' ITS JUST CHECK THE CHECKBOX TO SUBMIT FORM DATA    
                    checkbox_this.attr('value','0');
                }
            });
        });
        
      });
    </script>

  </body>
</html>
