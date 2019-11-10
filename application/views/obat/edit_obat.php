<?php 
include 'header.php';
?>

<?php
    include"config.php";
    $no = 1;
    $data = mysqli_query ($koneksi, " select 
                                            id_pengajar,
                                            nama_pengajar,
                                            tempat_lahir,
                                            tanggal,
                                            jenis_kelamin,
                                            agama,
                                            alamat,
                                            no_hp
                                      from 
                                      pengajar 
                                      where id_pengajar = $_GET[id]");
    $row = mysqli_fetch_array ($data);
    
?>                 
    
     <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="pengajar.php">Data Master</a></li>
                    <li class="active">Edit Jadwal</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            
                         
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Edit</strong> Pengajar</h3>

                                </div>
                               
                                <div class="panel-body">                                                                        
                                       <form action="update_pengajar.php" method="post" class="form-horizontal">

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">ID Pengajar</label>
                                        <div class="col-md-6 col-xs-12">                        
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="id_pengajar" value="<?php echo $row['id_pengajar'] ?>" class="form-control" readonly/>
                                            </div>                                           
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Nama Pengajar</label>
                                        <div class="col-md-6 col-xs-12">                        
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="nama_pengajar" value="<?php echo $row['nama_pengajar'] ?>" class="form-control"/>
                                            </div>                                           
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Tempat Lahir</label>
                                        <div class="col-md-6 col-xs-12">                        
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="tempat_lahir" value="<?php echo $row['tempat_lahir'] ?>" class="form-control"/>
                                            </div>                                           
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Tanggal Lahir</label>
                                        <div class="col-md-6 col-xs-12">                        
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control datepicker" name="tanggal" value="<?php echo $row['tanggal'] ?>" class="form-control"/>
                                            </div>                                           
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Jenis Kelamin</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <select name="jenis_kelamin" class="form-control">
                                                    <option><?php echo $row['jenis_kelamin'] ?></option> 
                                                     <option value='Laki-laki'>Laki-laki</option> 
                                                     <option value='Perempuan'>Perempuan</option> 
                                                </select>
                                            </div>                                      
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Agama</label>
                                        <div class="col-md-6 col-xs-12">                               
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <select name="agama" class="form-control">
                                                    <option><?php echo $row['agama'] ?></option>
                                                     <option value='Islam'>Islam</option> 
                                                     <option value='Kristen'>Kristen</option>
                                                     <option value='Hindu'>Hindu</option> 
                                                     <option value='Budha'>Budha</option>
                                                     <option value='Konghucu'>Konghucu</option> 
                                                     <option value='Lainnya'>Lainnya</option> 
                                                </select>
                                            </div>                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Alamat</label>
                                        <div class="col-md-6 col-xs-12">                        
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="alamat" value="<?php echo $row['alamat'] ?>" class="form-control"/>
                                            </div>                                           
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">No. HP</label>
                                        <div class="col-md-6 col-xs-12">                        
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="no_hp" value="<?php echo $row['no_hp'] ?>" class="form-control"/>
                                            </div>                                           
                                        </div>
                                    </div>

                                    
                                <div class="panel-footer">
                                    <button class="btn btn-default" type="reset">Bersihkan</button>                              
                                    <button type="submit" class="btn btn-primary pull-right">Ubah Data</button>
                                </div>  
                              </form>                               
                            </div>
                            
                        </div>
                    </div>                    
                    
                </div>
    
    
<?php include 'footer.php'; ?>