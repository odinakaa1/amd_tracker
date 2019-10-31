<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Add Country</h3>
            <?php echo validation_errors();?>
            <?php echo $this->session->flashdata('msg');?>
            
        </div>  
        <!-- /.col-lg-12 -->
    </div>
    
     <div class="col-lg-4">
     <?php echo form_open()?>
     <label for="country">Country Name</label>
    <input type="text" id="country" class="form-control" placeholder="please a country name" name="country_name"><br>
    <input type="submit" class="form-control btn-primary" value="Submit">
     </div>
            <!-- /.row -->
    </form>    <!-- /#page-wrapper -->
</div>
    <!-- /#wrapper -->
   
