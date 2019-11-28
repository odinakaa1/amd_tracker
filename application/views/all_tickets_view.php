

        <div id="page-wrapper"><br>
            <div class="row" id="filter">
                <div class="col-xs-2">
                
                    <select name="" id="" class="form-control">
                        <option value="">January</option>
                        <option value="">February</option>
                        <option value="">March</option>
                        <option value="">May</option>
                    </select>
                </div>

                <div class="col-xs-2">
                
                    <select name="" id="" class="form-control">
                        <option value="">2019</option>
                        <option value="">2020</option>
                        <option value="">2021</option>
                        <option value="">2022</option>
                    </select>
                </div>
            <button class="btn" >Search</button>
            <i class="fa fa-plus fa-2x" style="margin-left: 2%;"></i><a href="<?php echo base_url('ticket/create_ticket')?>">Create A ticket</a>
                <!-- /.col-lg-12 -->
            </div><br>
            <!-- /.row -->
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           All Tickets
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Ticket Code</th>
                                            <th>Engrs</th>
                                            <th>Analyser</th>
                                          
                                            <th>Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=0;foreach($tickets->result_array() as $row){  $i++;
                                    list($fname, $lname) = user_name_from_id($row["engr_id"]);    
                                    ?>
                                   
                                        <tr class="odd gradeX">
                                            <td><?php echo $i;?></td>
                                            <td><a href="<?php echo base_url('ticket/tickets_more_info/')?><?php echo $row["id"];?>"><?php echo $row["code"];?></a></td>
                                            <td><?php echo $fname." ".$lname;?></td>
                                            <td class="center"><?php echo $row["analyser"];?></td> 
                                           
                                            <td>Resolved</td>
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
