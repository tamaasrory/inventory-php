 <!--sidebar end-->

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT nama, nomor, hp, alamat, plat bm
      *********************************************************************************************************************************************************** -->
 <!--main content start-->
 <section id="main-content">
 	<section class="wrapper">

 		<div class="row">
 			<div class="col-lg-12 main-chart">
				 <a href="index.php?page=pelanggan"><button class="btn btn-primary"><i class="fa fa-angle-left"></i> Balik </button></a>
 				<h3>Riwayat Pelanggan</h3>
 				<br />
 				<?php
					if (!empty($_GET['uid'])) {
						$sql = "SELECT *, b.nama_barang FROM nota n 
						left join barang b on b.id_barang = n.id_barang
						WHERE id_pelanggan = ? ORDER BY n.tanggal_input DESC";
						$row = $config->prepare($sql);
						$row->execute(array($_GET['uid']));
						$notas = $row->fetchAll();
					?>
 					<table class="table table-bordered" id="example1">
 						<thead>
 							<tr style="background:#DFF0D8;color:#333;">
 								<th>No.</th>
 								<th>Nama Barang</th>
 								<th>Jumlah</th>
 								<th>Total</th>
 								<th>Tgl. Pembelian</th>
 								<th>Periode</th>
 							</tr>
 						</thead>
 						<tbody>
 							<?php
								$no = 1;
								foreach ($notas as $isi) {
								?>
 								<tr>
 									<td><?php echo $no; ?></td>
 									<td><?php echo $isi['nama_barang']; ?></td>
 									<td><?php echo $isi['jumlah']; ?></td>
 									<td><?php echo $isi['total']; ?></td>
 									<td><?php echo $isi['tanggal_input']; ?></td>
 									<td><?php echo $isi['periode']; ?></td>
 								</tr>
 							<?php $no++;
								} ?>
 						</tbody>
 					</table>
 				<?php
					} ?>
 				<div class="clearfix" style="padding-top:16%;"></div>
 			</div>
 		</div>
 	</section>
 </section>