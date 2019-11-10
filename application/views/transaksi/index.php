<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
              <div class="card-header">
              <a href="<?php echo base_url('transaksi/create') ?>" class="btn btn-primary">tambah transaksi</a>
              <a href="<?php echo base_url('transaksi/grafik') ?>" class="btn btn-primary">Lihat Grafik</a>  
              </div>
              <div class="card-body">
              
                <table class="table table-striped table-valign-middle"id="example1">
                  <thead>
                  <tr>
                    <th>tgl_transaksi</th>
                    <th>jenis_transaksi</th>
                    <th>nama_obat</th>
                     <th>tempat_obat</th>
                    <th>debet</th>
                    <th>kredit</th>
                    <th>biaya</th>
                    <th>Aksi</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($transaksi as $key => $value):
                      ?>
                    <tr>
                      <td>
                        <?php echo $value['tgl_transaksi'] ?>
                      </td>
                      <td>
                        <?php echo $value['jenis_transaksi'] ?>
                      </td>
                      <td>
                        <?php echo $value['nama_obat'] ?>
                      </td>
                      <td>
                        <?php echo $value['tempat_obat'] ?>
                      </td>
                      <td>
                        <?php echo $value['debet'] ?>
                      </td>
                      <td>
                        <?php echo $value['kredit'] ?>
                      </td>
                      <td>
                        <?php echo $value['biaya'] ?>
                      </td>
                      <td>
                        <a href="<?php echo base_url('transaksi/edit/').$value ['id_transaksi']?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                        <a href="<?php echo base_url('transaksi/delete/').$value ['id_transaksi']?>" class="btn btn-danger" onclick="return confirm('apakah yakin menghapus data ini')"><i class="fa fa-trash"></i></a>
                      </td>
                    
                    </tr>
                    <?php
                    endforeach;
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
            </div>
            </div>
            </div>
            </section>