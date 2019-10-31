<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Add A Brand</h3>
            <?php echo validation_errors();?>
            <?php echo $this->session->flashdata('msg');?>
            
        </div>  
        <!-- /.col-lg-12 -->
    </div>
    
     <div class="col-lg-4">
     <?php echo form_open()?>
     <label for="brand_name">Brand Name</label>
    <input type="text" id="brand_name" class="form-control" placeholder="please enter a brand name" name="brand_name"><br>
    
    <label for="brand_contact_name">Brand contact name</label>
    <input type="text" id="brand_contact_name" class="form-control" placeholder="please enter a brand contact name" name="contact_name"><br>
    
    <label for="brand_contact_address">Brand Address</label>
    <input type="text" id="brand_contact_address" class="form-control" placeholder="please enter a brand contact address" name="contact_address"><br>

    <label for="website">Brand Website</label>
    <input type="text" id="website" class="form-control" placeholder="please enter a brand contact email" name="website"><br>

    <label for="brand_contact_email">Contact Email</label>
    <input type="text" id="brand_contact_email" class="form-control" placeholder="please enter a brand contact email" name="contact_email"><br>

    <label for="contact_phone">Contact Phone</label>
    <input type="text" id="contact_phone" class="form-control" placeholder="please enter a brand contact_phone" name="contact_phone"><br>
    
    
    <label for="brand_supervisor">Brand Supervisor</label>
    <input type="text" id="brand_supervisor" class="form-control" placeholder="please enter a brand  supervisor" name="brand_supervisor"><br>
    
    <input type="submit" class="form-control btn-primary" value="Submit">
     </div>
            <!-- /.row -->
    </form>    <!-- /#page-wrapper -->
</div>
    <!-- /#wrapper -->
   
