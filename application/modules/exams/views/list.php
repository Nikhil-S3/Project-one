<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/ico" />

    <title>Exam</title>

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
                    <h2>Exam</h2>
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

                  <?php if($_SESSION['module_permissions'][11]['p_add'] == '1'){ ?>
                    <button type="submit" data-toggle="modal" data-target="#addExamModal" class="btn btn-success">Add Exam</button>
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
                    

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="" aria-labelledby="home-tab">
                          
                          <table id="datatable-fixed-header" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Note</th>
                                <th>Action</th>
                              </tr>
                            </thead>

                            <tbody>
                              <?php if(!empty($all_exams)) { 
                                      $i = 1;
                                      foreach( $all_exams as $ex_key => $ex_val ){
                                        $timestamp = strtotime($ex_val->exam_date);
                                        $new_date = date('d M Y', $timestamp);
                                        $continue = '';
                                ?>
                              <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $ex_val->exam_name; ?></td>
                                <td><?php echo $new_date; ?></td>
                                <td><?php echo $ex_val->notes; ?></td>
                                <td>
                                  <?php if($_SESSION['module_permissions'][11]['p_edit'] == '1'){ ?>
                                    <a href="<?php echo base_url().'exams/edit/'.$ex_val->id; ?>">
                                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a> 
                                  <?php $continue .= '|'; } if($_SESSION['module_permissions'][11]['p_delete'] == '1'){ echo $continue; ?> 
                                    <a href="<?php echo base_url().'exams/delete/'.$ex_val->id; ?>" onclick="return confirm('Are you sure you want to delete this exam?');">
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
                                <!-- hidden column 8 for proper DataTable applying -->
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

            </div>
          
        <?php $this->load->view('add_exam_modal.php'); ?>
      
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

    <!-- bootstrap-datetimepicker -->    
    <script src="<?php echo base_url(); ?>assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

    <!-- jQuery Form Validator -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script>
	   
    <script>
      
      $('#exam_date').datetimepicker({
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
        
        $('#add_exam_form').validate({
          rules: {
            exam_name: {
              required: true
            },
            exam_date: {
              required: true,
            }
          },
          messages: {
            exam_name: {
              required: "The Name is required."
            },
            exam_date: {
              required: "The Date is required.",
            }
          },
          submitHandler: function (form) { // for demo
            // alert('valid form submitted');
            // return false;
            form.submit();
          }
        });
      });
    </script>

  </body>
</html>
