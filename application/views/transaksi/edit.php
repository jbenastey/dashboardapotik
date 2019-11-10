<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">edit data transaksi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?= form_open('transaksi/edit/'.$transaksi['id_transaksi']) ?>
              <form role="form">
                <div class="card-body">
              
                  <div class="form-group">
                    <label>jenis transaksi</label>
                    <select class="form-control" name="jenis_transaksi">
                      <option <?php if ($transaksi['jenis_transaksi'] == 'PENJUALAN') echo 'selected' ?> >PENJUALAN</option>
                      <option <?php if ($transaksi['jenis_transaksi'] == 'PEMBELIAN') echo 'selected' ?> >PEMBELIAN</option>
                      <option <?php if ($transaksi['jenis_transaksi'] == 'KOREKSI_PERSEDIAAN') echo 'selected' ?> >KOREKSI PERSEDIAAN</option>
                      <option <?php if ($transaksi['jenis_transaksi'] == 'MUTASI') echo 'selected' ?> >MUTASI</option>
                      <option <?php if ($transaksi['jenis_transaksi'] == 'KOREKSI_PENJUALAN') echo 'selected' ?> >KOREKSI PENJUALAN</option>
                    </select>
                  </div>
                 
                 <div class="form-group">
                    <label for="exampleInputPassword1">Nama Obat</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="nama_obat" value="<?php echo $transaksi['nama_obat']?>">
                  </div>
                  
                  <div class="form-group">
                    <label>tempat obat</label>
                    <select class="form-control" name="tempat_obat">
                      <option <?php if ($transaksi['tempat_obat'] == 'GUDANG OBAT') echo 'selected' ?> >GUDANG OBAT</option>
                      <option <?php if ($transaksi['tempat_obat'] == 'IGD') echo 'selected' ?> >IGD</option>
                      <option <?php if ($transaksi['tempat_obat'] == 'APOTIK 1') echo 'selected' ?> >APOTIK 1</option>
                      
                      
                    </select>
                  </div>  
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">debet</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="" name="debet" value="<?php echo $transaksi['debet']?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">kredit</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="" name="kredit" value="<?php echo $transaksi['kredit']?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">biaya</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="" name="biaya" value="<?php echo $transaksi['biaya']?>">
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