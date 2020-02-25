<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/ico" />

    <title>Student</title>

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
    <link href="<?php echo base_url(); ?>assets/build/css/styles.css" rel="stylesheet">
  </head>

  <?php $this->load->view('common/header.php'); ?>
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Students</h2>
                    <div class="clearfix"></div>
                  </div>
                  
                  <?php if($_SESSION['module_permissions'][3]['p_add'] == '1'){ ?>
                    <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#addStudentModal">Add Student</button>
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
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Roll</th>
                          <th>Email</th>
                          <th>Class</th>
                          <th>Section</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php if(!empty($all_students)) { 
                                foreach( $all_students as $s_key => $s_val ){
                                  $continue = '';
                                  $enc_id = modules::load('common/common/')->my_simple_crypt($s_val->id, 'e');
                          ?>
                        <tr>
                          <td><?php echo $s_val->preferred_name; ?></td>
                          <td><?php echo $s_val->roll_no; ?></td>
                          <td><?php echo $s_val->email; ?></td>
                          <td><?php echo $s_val->class; ?></td>
                          <td><?php echo $s_val->section; ?></td>
                          <td>
                            <?php if($_SESSION['module_permissions'][3]['p_edit'] == '1'){ ?>
                              <a href="<?php echo base_url().'students/edit/'.$enc_id; ?>">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                              </a> 
                            <?php $continue .= '|'; } if($_SESSION['module_permissions'][3]['p_delete'] == '1'){ echo $continue; ?>
                              <a href="<?php echo base_url().'students/delete/'.$enc_id; ?>" onclick="return confirm('Are you sure you want to delete this student?');">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </a>
                            <?php } ?>
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
          
        <?php $this->load->view('add_student_modal.php'); ?>
    
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
      /** After windod Load */
      $(window).bind("load", function() {
        window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove();
          });
      }, 4000);
      });

      $(document).ready(function () {
        
        $('#add_student_form').validate({
          rules: {
            preferred_name: {
              required: true,
              minlength: 4,
              maxlength: 12
            },
            class_id: {
              required: true
            },
            section_id: {
              required: true
            },
            register_no: {
              required: true
            },
            roll_no: {
              required: true
            },
            username: {
              required: true
            },
            password: {
              required: true
            }
          },
          messages: {
            preferred_name: {
              required: "The Name field is required"
            },
            class_id: {
              required: "The Class field is required"
            },
            section_id: {
              required: "The Section field is required"
            },
            register_no: {
              required: "The Register field is required"
            },
            roll_no: {
              required: "The Roll field is required"
            },
            username: {
              required: "The Username field is required"
            },
            password: {
              required: "The Password field is required"
            }
          },
          submitHandler: function (form) { // for demo
            // alert('valid form submitted');
            // return false;
            form.submit();
          }
        });

        $('#class_id').on('change', function(){
          var class_id = $(this).val();
          console.log("class_id",class_id);
          if(class_id!=''){
            // Get Sections
            $.ajax({
              url: "sections/ajax_get_class_sections",
              type: "post",
              data: {'class_id':class_id, 'is_ajax':'1'},
              success: function(response){
                console.log("response",response);
                $('#section_id').html(response);
              }
            });
            // Get Optional subjects
            $.ajax({
              url: "subject/ajax_get_class_subjects",
              type: "post",
              data: {'class_id':class_id, 'is_ajax':'1', 'is_optional_subjects':'1'},
              success: function(response){
                console.log("response",response);
                $('#optional_subject_id').html(response);
              }
            });
          }else{
            $('#section_id').html('<option value="0">Select Section</option>');
            $('#optional_subject_id').html('<option value="0">Select Optional Subject</option>');
          }
        });

        $(document).on('change', '#username', function(){
          var val = $(this).val();
          // console.log('name',val);
          if(val !=''){
            $.ajax({
              'url':"<?php echo base_url(); ?>common/ajax_check_username_exists",
              'type':'post',
              'data':{val:val,user_type:'student'},
              'dataType':'json',
              success:function(response){
                // console.log('response',response);
                if(response.status == 1){
                  $('.add_student_btn').prop('disabled', true);
                  $('.username_exists_error').text('Username already exists.').show();
                }
              }
            });
          }
          $('.add_student_btn').prop('disabled', false);
          $('.username_exists_error').text('').hide();
        });

        $(document).on('change', '#email', function(){
          var val = $(this).val();
          // console.log('email',val);
          if(val !=''){
            $.ajax({
              'url':"<?php echo base_url(); ?>common/ajax_check_email_exists",
              'type':'post',
              'data':{val:val, user_type:'student'},
              'dataType':'json',
              success:function(response){
                console.log('response',response);
                if(response.status == 1){
                  $('.add_student_btn').prop('disabled', true);
                  $('.email_exists_error').text('Email already exists.').show();
                }
              }
            });
          }
          $('.add_student_btn').prop('disabled', false);
          $('.email_exists_error').text('').hide();
        });
      });
    </script>

  </body>
</html>
