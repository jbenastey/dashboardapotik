<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah data obat</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?= form_open('obat/create') ?>
              <form role="form">
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">kode obat</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="kode_obat">
                  </div>
                 
                 <div class="form-group">
                     <label>Jenis obat</label>
                    <select class="form-control" name="jenis_obat">
                      <option>OBAT</option>
                      <option>ALKES</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">nama obat</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="nama_obat">
                  </div>  
                  
                  <div class="form-group">
                    <label>bentuk obat</label>
                    <select class="form-control" name="bentuk_obat">
                      <option>TABLET</option>
                      <option>ALKES</option>
                      <option>SALEP</option>
                      <option>CAIRAN</option>
                      <option>SIRUP</option>
                      <option>INJEKSI</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>golongan obat</label>
                    <select class="form-control" name="golongan_obat">
                      <option>BEBAS</option>
                      <option>PSIKOTROPIKA</option>
                      <option>BEBAS TERBATAS</option>
                      <option>OBAT KERAS</option>
                      <option>ALKES</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>kelompok obat</label>
                    <select class="form-control" name="kelompok_obat">
                      <option>LAINYA</option>
                      <option>ASKES</option>
                      <option>NON ASKES</option>
                    </select>
                  </div>

                    <div class="form-group">
                    <label for="exampleInputPassword1">harga pembelian</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="" name="harga_pembelian">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">persediaan obat</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="" name="persediaan_obat">
                  </div>

                    <div class="form-group">
                    <label for="exampleInputPassword1">Produsen Obat</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="produsen_obat">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Produsen Obat</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="" name="produsen_obat">
                  </div>

                    <div class="form-group">
                    <label for="exampleInputPassword1">Tangal Expired</label>
                    <input type="date" class="form-control" id="exampleInputPassword1" placeholder="" name="tgl_expired">
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