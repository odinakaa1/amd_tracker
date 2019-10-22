

        <div id="page-wrapper"><br>
            <div class="row" id="filter">
            </div><br>
            <!-- /.row -->
            <div class="row">
                
                
                <div class="col-lg-12">
                    <h3>Add State</h3>
                    <?php echo validation_errors();?>
                    <?php echo $this->session->flashdata('msg');?>
                </div>
               <?php echo form_open();?>
                <div class="col-lg-4">
                <label for="state">State Name</label>
                    <input type="text" name="state" id="state" class="form-control" placeholder="please enter state name" value="<?php echo set_value('state');?>" ><br>
                    <select name="country" id="" class="form-control">
                       
                        <option value="" selected="">select...</option>
                        <?php foreach ($countries->result_array() as $row)
                        {?>
                        <option value="<?php echo $row['id']; ?>"><?php  echo country_name_from_id($row['id']);
                        }?></option>          
                    </select><br>
                    <input type="submit" class="form-control btn-primary" value="Submit">
                </div>
                </form>
                <!-- /.col-lg-12 -->
            </div>
            
            
           
          
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
