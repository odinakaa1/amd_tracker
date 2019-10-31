

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
            <i class="fa fa-plus fa-2x" style="margin-left: 2%;"></i><a href="<?php echo base_url('analysers/add_analyser')?>">Add an Analyser to facility</a>
                <!-- /.col-lg-12 -->
            </div><br>
            <!-- /.row -->
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          ALl Analysers
                        </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">  
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Brand</th>
                                            <th>Facility Code</th>
                                            <th>Model</th>
                                            <th>Model Number</th>
                                            <th>Serial No.</th>
                                           
                                           
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php                                    
                                    $i= 0;
                                    foreach($analysers->result_array() as $row){
                                    $i++;
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row["brand_name"] ?></td>
                                            <td><a href="tickets_more_info"><?php echo $row["facility_code"] ?></a></td>
                                            <td><?php echo $row["brand_name"] ?></td>
                                            <td class="center"><?php echo $row["model_number"] ?></td> 
                                            <td><?php echo $row["serial"] ?></td>                                          
                                        </tr>   
                                    <?php }?>    
                                    </tbody>
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
