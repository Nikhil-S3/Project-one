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

    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!-- iCheck -->
    <link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- Datatables -->
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- jQuery Validator -->
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <?php $this->load->view('common/header.php'); ?>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Teachers</h2>
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

                  <?php if($_SESSION['module_permissions'][1]['p_add'] == '1'){ ?>
                    <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#addTeacherModal" >Add Teacher</button>
                  <?php } ?>
                  
                  <div class="x_content">
                    <?php echo validation_errors('<p style="color: red;">', '</p>'); 
                        if($this->session->flashdata('item')) {
                          $message = $this->session->flashdata('item');
                          $class = $message['class'];
                          $message = $message['message'];
                          echo "<div class='$class'>$message</div>";
                        }
                    ?>
                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Designation</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Joining Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php if(!empty($all_teachers)) { 
                                foreach( $all_teachers as $t_key => $t_val ){
                                  $continue = '';
                                  $enc_id = modules::load('common/common/')->my_simple_crypt($t_val->id, 'e');
                          ?>
                        <tr>
                          <td><?php echo $t_val->preferred_name; ?></td>
                          <td><?php echo $t_val->designation; ?></td>
                          <td><?php echo $t_val->email; ?></td>
                          <td><?php echo $t_val->phone; ?></td>
                          <td><?php echo $t_val->joining_date; ?></td>
                          <td>
                            <?php if($_SESSION['module_permissions'][1]['p_view'] == '1'){ ?>
                              <a href="<?php echo base_url().'teachers/view/'.$enc_id; ?>">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                              </a>
                            <?php $continue .= '|'; } if($_SESSION['module_permissions'][1]['p_edit'] == '1'){ echo $continue; ?>
                              <a href="<?php echo base_url().'teachers/edit/'.$enc_id; ?>">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                              </a>
                            <?php } if($_SESSION['module_permissions'][1]['p_delete'] == '1'){ 
                            echo $continue; ?>
                              <a href="<?php echo base_url().'teachers/delete/'.$enc_id; ?>" onclick="return confirm('Are you sure you want to delete this record?');">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </a>
                            <?php } ?>
                          </td>
                        </tr>
                      <?php } } else{ ?> 
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
          
        <?php $this->load->view('add_teacher_modal.php'); ?>
       
    <?php $this->load->view('common/footer.php'); ?> 

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>

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
      
      $('#date_of_birth').datetimepicker({
          format: 'DD/MM/YYYY',
          maxDate: 'now'
      });
      $('#joining_date').datetimepicker({
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

      $(document).ready(function () {
        
        $('#add_teacher_form').validate({
          rules: {
            preferred_name: {
              required: true,
              minlength: 5,
              maxlength: 12
            },
            designation: {
              required: true
            },
            date_of_birth: {
              required: true
            },
            email: {
              required: true,
              email: true
            },
            phone:{
              number: true,
              minlength:10
            },
            username: {
              required: true
            },
            password: {
              required: true,
              minlength: 5
            }
          },
          messages: {
            preferred_name: {
              required: "The Name field is required"
            },
            designation: {
              required: "The Designation field is required"
            },
            date_of_birth: {
              required: "The Date Of Birth field is required"
            },
            email: {
              required: "The Email field is required"
            },
            phone: {
              number: "The phone must be only digits."
            },
            username: {
              required: "The Username field is required"
            },
            password: {
              required: "The Password field is required.",
              minlength: "The Password must contain atleast 8 chars."
            }
          },
          submitHandler: function (form) { // for demo
            // alert('valid form submitted');
            // return false;
            form.submit();
          }
        });

        $(document).on('change', '#email', function(){
          var val = $(this).val();
          // console.log('email',val);
          if(val !=''){
            $.ajax({
              'url':"<?php echo base_url(); ?>common/ajax_check_email_exists",
              'type':'post',
              'data':{val:val, user_type:'teacher'},
              'dataType':'json',
              success:function(response){
                console.log('response',response);
                if(response.status == 1){
                  $('.add_teacher_btn').prop('disabled', true);
                  $('.email_exists_error').text('Email already exists.').show();
                }
              }
            });
          }
          $('.add_teacher_btn').prop('disabled', false);
          $('.email_exists_error').text('').hide();
        });

        $(document).on('change', '#username', function(){
          var val = $(this).val();
          // console.log('name',val);
          if(val !=''){
            $.ajax({
              'url':"<?php echo base_url(); ?>common/ajax_check_username_exists",
              'type':'post',
              'data':{val:val,user_type:'teacher'},
              'dataType':'json',
              success:function(response){
                // console.log('response',response);
                if(response.status == 1){
                  $('.add_teacher_btn').prop('disabled', true);
                  $('.username_exists_error').text('Username already exists.').show();
                }
              }
            });
          }
          $('.add_teacher_btn').prop('disabled', false);
          $('.username_exists_error').text('').hide();
        });


      });
    </script>

  </body>
</html>
