<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Add Analyser Model</h3>
            <?php echo validation_errors();?>
            <?php echo $this->session->flashdata('msg');?>
            
        </div>  
        <!-- /.col-lg-12 -->
    </div>
    
     <div class="col-lg-4">
     <?php echo form_open()?>
    

    

   <label for="brand">Brand</label>
   <select name="brand" id="" class="form-control"><br>
   <option value="">Select Brand...</option>
   <?php foreach($brands->result_array() as $row){?>
  
   <option><?php echo $row["brand_name"]; ?></option>
   <?php }?>
   </select><br>

   <label for="model">Model</label>
  <input type="text" class="form-control" placeholder="Please Enter Analyser Model" name="model" value="<?php echo set_value("model");?>"><br>

   <label for="category">Category...</label>
   <select name="category" id="" class="form-control" ><br>
   <option value="">Category...</option>
   <option >Immuno</option>
   <option >Chemistry</option>
   <option >ISE</option>
   <option >Haematology</option>
   <option >MCB</option>
   </select><br>


    <input type="submit" class="form-control btn-primary" value="Submit">
     </div>
            <!-- /.row -->
    </form>    <!-- /#page-wrapper -->
</div>
    <!-- /#wrapper -->
   
