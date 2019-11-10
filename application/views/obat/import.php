<div class="container-fluid">
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Import data obat</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<?= form_open('obat/import',array('enctype' => 'multipart/form-data')) ?>
				<form role="form">
					<div class="card-body">
						<div class="form-group">
							<a href="<?=base_url().'excel/format/obat.xlsx'?>" class="btn btn-outline-primary"><i class="fa fa-download"></i> Download Format</a>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Import Excel</label>
							<input type="file" class="form-control" name="import">
						</div>
					</div>

					<!-- /.card-body -->

					<div class="card-footer">
						<button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
					</div>
				</form>
			</div>
			<?= form_close() ?>
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
