<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit data obat</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?= form_open('obat/edit/'.$obat['kode_obat']) ?>
              <form role="form">
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">kode obat</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="kode_obat" value="<?php echo $obat['kode_obat']?>" readonly>
                  </div>
                 
                 <div class="form-group">
                     <label>Jenis obat</label>
                    <select class="form-control" name="jenis_obat">
                      <option <?php if ($obat['jenis_obat'] == 'OBAT') echo 'selected' ?> >OBAT</option>
                      <option <?php if ($obat['jenis_obat'] == 'ALKES') echo 'selected' ?> >ALKES</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">nama obat</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="nama_obat" value="<?php echo $obat['nama_obat']?>">
                  </div>  
                  
                  <div class="form-group">
                    <label>bentuk obat</label>
                    <select class="form-control" name="bentuk_obat">
                      <option <?php if ($obat['bentuk_obat'] == 'TABLET') echo 'selected' ?> >TABLET</option>
                      <option <?php if ($obat['bentuk_obat'] == 'ALKES') echo 'selected' ?> >ALKES</option>
                      <option <?php if ($obat['bentuk_obat'] == 'SALEP') echo 'selected' ?> >SALEP</option>
                      <option <?php if ($obat['bentuk_obat'] == 'CAIRAN') echo 'selected' ?> >CAIRAN</option>
                      <option <?php if ($obat['bentuk_obat'] == 'SIRUP') echo 'selected' ?> >SIRUP</option>
                      <option <?php if ($obat['bentuk_obat'] == 'INJEKSI') echo 'selected' ?> >INJEKSI</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>golongan obat</label>
                    <select class="form-control" name="golongan_obat">
                      <option <?php if ($obat['golongan_obat'] == 'BEBAS') echo 'selected' ?> >BEBAS</option>
                      <option <?php if ($obat['golongan_obat'] == 'PSIKOTROPIKA') echo 'selected' ?> >PSIKOTROPIKA</option>
                      <option <?php if ($obat['golongan_obat'] == 'BEBAS TERBATAS') echo 'selected' ?> >BEBAS TERBATAS</option>
                      <option <?php if ($obat['golongan_obat'] == 'OBAT KERAS') echo 'selected' ?> >OBAT KERAS</option>
                      <option <?php if ($obat['golongan_obat'] == 'ALKES') echo 'selected' ?> >ALKES</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>kelompok obat</label>
                    <select class="form-control" name="kelompok_obat">
                      <option <?php if ($obat['kelompok_obat'] == 'LAINYA') echo 'selected' ?> >LAINYA</option>
                      <option <?php if ($obat['kelompok_obat'] == 'ASKES') echo 'selected' ?> >ASKES</option>
                      <option <?php if ($obat['kelompok_obat'] == 'NON ASKES') echo 'selected' ?> >NON ASKES</option>
                    </select>
                  </div>

                    <div class="form-group">
                    <label for="exampleInputPassword1">harga pembelian</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="" name="harga_pembelian" value="<?php echo $obat['harga_pembelian']?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">persediaan obat</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="" name="persediaan_obat" value="<?php echo $obat['persediaan_obat']?>">
                  </div>

                    <div class="form-group">
                    <label for="exampleInputPassword1">Produsen Obat</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="produsen_obat" value="<?php echo $obat['produsen_obat']?>">
                  </div>


                </div>


                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </div>
              </form>
            </div>
            <?=form_close() ?>
            <!-- /.card -->

            <!-- Form Element sizes -->
                  <!-- select -->
          
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->