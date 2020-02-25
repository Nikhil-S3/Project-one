<!-- Modal -->
<div id="addSectionModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">ADD SECTION</h4>
      </div>
      <form id="add_section_form" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url();?>sections/save" method="post" enctype="multipart/form-data" >

            <div class="modal-body">
                <div class="container">
                  <div class="row">

                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Section *
                          <input type="text" id="section" name='section' class="form-control">
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Category *
                          <input type="text" id="category" name="category" class="form-control">
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Capacity *
                          <input type="text" id="capacity" name="capacity" class="form-control">
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Class
                          <select id="class_of_section" class="form-control" name="class_of_section">
                            <option value="">Choose..</option>
                            <?php 
                              if(!empty($all_classes)){
                            foreach($all_classes as $c_key=>$c_val){ ?>
                              <option value="<?php echo $c_val->id; ?>" ><?php echo $c_val->class; ?></option>
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
                      </div>
                      
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Note
                        <textarea class="form-control" name="notes"></textarea>
                      </div>
                      
                        <!-- <div class="ln_solid"></div> -->

                  </div>

                  <div class="notes notes-danger">
                    <p><strong>NOTE:</strong> Create a class and teacher before create a new section.</p>
                  </div>
                  
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-success" value="Submit">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
      </form>
    </div>
  </div>
</div>

