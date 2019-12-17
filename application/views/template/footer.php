</div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer d-print-none">
    <!-- To the right -->
    <div class="float-right d-none d-sm-block-down">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url ('assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap -->
<script src="<?= base_url ('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE -->
<script src="<?= base_url ('assets/js/adminlte.js') ?>"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url ('assets/plugins/chart.js/Chart.min.js') ?>"></script>
<script src="<?= base_url ('assets/js/demo.js') ?>"></script>
<script src="<?= base_url ('assets/js/pages/dashboard3.js') ?>"></script>
<script src="<?= base_url ('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url ('assets/plugins/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url ('assets/js/grafik/obat.js') ?>"></script>
<script src="<?= base_url ('assets/js/grafik/transaksi.js') ?>"></script>
<script>
	$(function () {
		$('table.example1').DataTable();
		$('table.example2').DataTable({
			paging: false
		});
	});
</script>
</body>
</html>
