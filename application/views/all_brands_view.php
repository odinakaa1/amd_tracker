

        <div id="page-wrapper"><br>
            <div class="row" id="filter">
                <div class="col-xs-2">
                
                    <select name="" id="" class="form-control">
                        <option value="">Please Select Brand ...</option>
                        <option value="">Abbott</option>
                        <option value="">Eber</option>
                        <option value="">Elger</option>
                        <option value="">Urith</option>
                        <option value="">YHLO</option>
                    </select>
                </div>

                <div class="col-xs-2">
                
                    <select name="" id="" class="form-control">
                        <option value="">Please Category...</option>
                        <option value="">All</option>
                        <option value="">Haematology</option>
                        <option value="">Chemistry</option>
                        <option value="">Microbiology</option>
                        <option value="">Immuno</option>
                    </select>
                </div>
            <button class="btn" >Search</button>
            <i class="fa fa-plus fa-2x" style="margin-left: 2%;"></i><a href="<?php echo base_url('analysers/add_brand')?>">Add a Brand</a>
                <!-- /.col-lg-12 -->
            </div><br>
            <!-- /.row -->
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           All Brands
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Brand</th>
                                            <th>Contact Person</th>
                                            <th>Contact Email</th>
                                            <th>Contact Phone</th>
                                            <th>Website</th>
                                            <th>Supervisor</th>   
                                        </tr>
                                    </thead>
                                    <?php
                                    $i= 0;
                                    foreach($brands->result_array() as $row){
                                    $i++;
                                       ?>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i ?></td>
                                            <td><?php echo  $row['brand_name'];?></td>
                                            <td><?php echo  $row['contact_name'];?></td>
                                            <td><?php echo  $row['contact_email'];?></td>
                                            <td class="center"><?php echo  $row['contact_phone'];?></td> 
                                            <td><?php echo  $row['website'];?></td>    
                                            <td><?php echo  $row['brand_supervisor'];?></td>                                          
                                        </tr>   
                                          
                                    </tbody>
                                    <?php }?>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            
           
          
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
