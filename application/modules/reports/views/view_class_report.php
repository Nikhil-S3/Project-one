<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/ico" />

    <title>Class Report</title>

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
            
            <div>
              <form id="class_reports_form" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url();?>reports/class" method="post" enctype="multipart/form-data" >

                <div class='col-md-2 col-sm-12 col-xs-12 form-group'>
                  Class *
                  <select id="class_id" name="class_id" class="form-control">
                    <option value="">Select Class</option>
                    <?php 
                      if(!empty($all_classes)){
                    foreach($all_classes as $c_key=>$c_val){ ?>
                      <option value="<?php echo $c_val->id; ?>" <?php echo ($this->session->flashdata('class_id')==$c_val->id)?'selected':''; ?> ><?php echo $c_val->class; ?></option>
                    <?php } } ?>
                  </select>
                </div>
                <div class='col-md-2 col-sm-12 col-xs-12 form-group'>
                  Section *
                  <select id="section_id" name="section_id" class="form-control">
                    <option value="">Select Section</option>

                    <?php if($this->session->flashdata('section_id')){ 
                        if(count($class_sections)>0){
                          $i=2;
                          foreach ($class_sections as $cs_key => $cs_val) {
                    ?>
                    <option value="<?php echo $cs_val->id; ?>" <?php echo ($this->session->flashdata('section_id')==$cs_val->id)?'selected':''; ?>><?php echo $cs_val->section; ?></option>
                    <?php } } } ?>
                  </select>
                </div>
                
                <div class='col-md-2 col-sm-12 col-xs-12 form-group'>
                  &nbsp;&nbsp;
                    <input type="submit" class="btn btn-success form-control" id="get_report" name="get_report" value="Get Report">
                </div>
            </form>  
            </div>

            <?php if(isset($class_reports) && count($class_reports)>0) { ?>
            <div class="row">
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Class Informations</h2>
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
                      
                      <!-- <div class="card-body"> -->
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">Number of Students : <?php echo $class_reports['students']->total_students; ?></li>
                          <li class="list-group-item">Total Subject Assigned : <?php echo $class_reports['subjects']->total_subjects; ?></li>
                        </ul>
                    </div>
                    <div class="x_content">
                      
                      <!-- <div class="card-body"> -->
                        <h4>Subjects And Teachers</h4>
                        <table class="table">
                          <thead>
                            <th>Subject</th>
                            <th>Teacher</th>
                          </thead>
                            <?php foreach ($class_reports['subjects_teachers'] as $key => $value) {
                              echo '<tr>';
                              echo '<td>'.$value->subject_name.'</td>';
                              echo '<td>'.$value->preferred_name.'</td>';
                              echo '</tr>';
                            } ?>
                            <?php ?>
                        </table>
                    </div>
                  </div>
                </div>
                      
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Class Teacher</h2>
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
                      <h3><?php echo $class_reports['class_teacher']->preferred_name.'<hr></hr>'; ?></h3>
                        
                            <?php echo '<div>Phone : '.$class_reports['class_teacher']->phone.'</div><hr></hr>';;
                              echo '<div>Email : '.$class_reports['class_teacher']->email.'</div><hr></hr>';
                              echo '<div>Address : '.$class_reports['class_teacher']->address.'</div><hr></hr>';
                            ?>
                            
                    </div>
                  </div>
                </div>
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
          $('#class_id').on('change', function(){
            var class_id = $(this).val();
            console.log("class_id",class_id);
            if(class_id!=''){
              // Get Sections
              $.ajax({
                url: "<?php echo base_url(); ?>sections/ajax_get_class_sections",
                type: "post",
                data: {'class_id':class_id, 'is_ajax':'1'},
                success: function(response){
                  console.log("response",response);
                  $('#section_id').html(response);
                }
              });
            }else{
              $('#section_id').html('<option value="0">Select Section</option>');
            }
          });
      });

    </script>

  </body>
</html>
