<!-- Modal -->
<div id="assignSalaryTemplateModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">ASSIGN SALARY TEMPLATE</h4>
      </div>
      <form id="assign_salary_template" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url();?>manage_salary/assign_salary_template_to_teacher" method="post" enctype="multipart/form-data" >

            <div class="modal-body">
                <div class="container">
                  <div class="row">

                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Grade
                          <select id="salary_template_id" class="form-control" name="salary_template_id">
                            <option value="">Choose..</option>
                            <?php 
                              if(!empty($all_salary_template)){
                            foreach($all_salary_template as $st_key=>$st_val){ ?>
                              <option value="<?php echo $st_val->id; ?>" ><?php echo $st_val->grade; ?></option>
                            <?php } } ?>
                          </select>
                      </div>

                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Teacher Name
                          <select id="teacher_id" class="form-control" name="teacher_id">
                            <option value="">Choose..</option>
                            <?php 
                              if(!empty($all_teachers)){
                            foreach($all_teachers as $t_key=>$t_val){ ?>
                              <option value="<?php echo $t_val->id; ?>" ><?php echo $t_val->preferred_name; ?></option>
                            <?php } } ?>
                            
                          </select>
                          <span class="error teacher_assigned_error"></span>
                      </div>
                      
                      <!-- <div class="ln_solid"></div> -->

                  </div>

                  <div class="notes notes-danger">
                    <p><strong>NOTE:</strong> Create a salary template and teacher before assign salary template to teacher.</p>
                  </div>
                  
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-success assign_btn" value="Assign">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
      </form>
    </div>
  </div>
</div>

