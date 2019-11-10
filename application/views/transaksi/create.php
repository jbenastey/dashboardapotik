<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah data transaksi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?= form_open('transaksi/create') ?>
              <form role="form">
                <div class="card-body">
                  
                  <div class="form-group">
                    <label>jenis transaksi</label>
                    <select class="form-control" name="jenis_transaksi">
                      <option>PENJUALAN</option>
                      <option>PEMBELIAN</option>
                      <option>KOREKSI PERSEDIAAN</option>
                      <option>MUTASI</option>
                      <option>KOREKSI PENJUALAN</option>
                    </select>
                  </div>
                 
                 <div class="form-group">
                    <label for="exampleInputPassword1">Nama Obat</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="nama_obat">
                  </div>
                  
                  <div class="form-group">
                    <label>tempat obat</label>
                    <select class="form-control" name="tempat_obat">
                      <option>GUDANG OBAT</option>
                      <option>IGD</option>
                      <option>APOTIK 1</option>
                      
                      
                    </select>
                  </div>  
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">debet</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="" name="debet">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">kredit</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="" name="kredit">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">biaya</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="" name="biaya">
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