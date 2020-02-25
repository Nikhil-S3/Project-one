<!-- Modal -->
<div id="addTeacherModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">ADD TEACHER</h4>
        </div>
          <form id="add_teacher_form" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url();?>teachers/save" method="post" enctype="multipart/form-data" >

            <div class="modal-body">
              <div class="container">
                <div class="row">

                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Name *
                          <input type="text" id="preferred_name" name='preferred_name' class="form-control" value="<?php echo set_value('preferred_name'); ?>">
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Designation *
                          <input type="text" id="designation" name="designation" class="form-control" value="<?php echo set_value('designation'); ?>">
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Date Of Birth
                          <div class='input-group date' id='date_of_birth'>
                              <input type='text' class="form-control" name="date_of_birth" value="<?php echo set_value('date_of_birth'); ?>" />
                              <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>

                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Gender
                          <select id="gender" class="form-control" name="gender">
                            <option value="">Choose..</option>
                            <option value="male" <?php echo set_select('gender', 'male', TRUE); ?> >Male</option>
                            <option value="female" <?php echo set_select('gender', 'female', TRUE); ?> >FeMale</option>
                          </select>
                      </div>
                      
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Religion
                          <input id="religion" class="form-control col-md-7 col-xs-12" type="text" name="religion" value="<?php echo set_value('religion'); ?>">
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Email *
                        <input id="email" class="form-control col-md-7 col-xs-12" type="text" name="email" value="<?php echo set_value('email'); ?>">
                        <span class="email_exists_error" style="display: none;color:red"></span>
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Phone
                        <input id="phone" class="form-control col-md-7 col-xs-12" type="text" name="phone" value="<?php echo set_value('phone'); ?>">
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Address
                        <input id="address" class="form-control col-md-7 col-xs-12" type="text" name="address" value="<?php echo set_value('address'); ?>">
                      </div>
                      
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Joining Date
                        <div class='input-group date' id='joining_date'>
                              <input type='text' class="form-control" name="joining_date" value="<?php echo set_value('joining_date'); ?>" />
                              <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>

                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Photo
                        <input id="photo" class="form-control col-md-7 col-xs-12" type="file" name="photo" value="<?php echo set_value('photo'); ?>">
                      </div>
                      
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Username *
                          <input id="username" class="form-control col-md-7 col-xs-12" type="text" name="username" value="<?php echo set_value('username'); ?>">
                          <span class="username_exists_error" style="display: none;color:red"></span>
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Password *
                          <input id="password" class="form-control col-md-7 col-xs-12" type="password" name="password">
                      </div>

                        <!-- <input id="role_id" type="hidden" name="role_id" value="2"> -->

                        <!-- <div class="ln_solid"></div> -->

                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-success add_teacher_btn" value="Submit">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
          </div>
        </div>
      </div>