 <!--sidebar end-->

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT nama, nomor, hp, alamat, plat bm
      *********************************************************************************************************************************************************** -->
 <!--main content start-->
 <section id="main-content">
 	<section class="wrapper">

 		<div class="row">
 			<div class="col-lg-12 main-chart">
 				<h3>Data Pelanggan</h3>
 				<br />
 				<?php if (isset($_GET['success'])) { ?>
 					<div class="alert alert-success">
 						<p>Tambah Data Berhasil !</p>
 					</div>
 				<?php } ?>
 				<?php if (isset($_GET['success-edit'])) { ?>
 					<div class="alert alert-success">
 						<p>Update Data Berhasil !</p>
 					</div>
 				<?php } ?>
 				<?php if (isset($_GET['remove'])) { ?>
 					<div class="alert alert-danger">
 						<p>Hapus Data Berhasil !</p>
 					</div>
 				<?php } ?>
 				<?php
					if (!empty($_GET['uid'])) {
						$sql = "SELECT * FROM pelanggan WHERE id_pelanggan = ?";
						$row = $config->prepare($sql);
						$row->execute(array($_GET['uid']));
						$edit = $row->fetch();
					?>
 					<form method="POST" action="fungsi/edit/edit.php?pelanggan=edit">
 						<input type="hidden" name="id" value="<?= $edit['id_pelanggan']; ?>">
 						<table>
 							<tr>
 								<td style="width:15pc;padding-right:10px;">
 									<input type="text" class="form-control" value="<?= $edit['nama']; ?>" required name="nama" placeholder="Masukan Nama">
 								</td>
 								<td style="width:15pc;padding-right:10px;">
 									<input type="text" class="form-control" value="<?= $edit['nomor_hp']; ?>" required name="nomor_hp" placeholder="Masukan Nomor Hp">
 								</td>
 								<td style="width:15pc;padding-right:10px;">
 									<input type="text" class="form-control" value="<?= $edit['nomor_kendaraan']; ?>" required name="nomor_kendaraan" placeholder="Masukan Nomor Kendaraan">
 								</td>
 								<td style="width:15pc;padding-right:10px;">
 									<input type="text" class="form-control" value="<?= $edit['alamat']; ?>" required name="alamat" placeholder="Masukan Alamat">
 								</td>

 								<td style="padding-left:10px;"><button id="tombol-simpan" class="btn btn-primary"><i class="fa fa-edit"></i> Ubah Data</button></td>
 							</tr>
 						</table>
 					</form>
 				<?php } else { ?>
 					<form method="POST" action="fungsi/tambah/tambah.php?pelanggan=tambah">
 						<table>
 							<tr>
 								<td style="width:15pc;padding-right:10px;"><input type="text" class="form-control" required name="nama" placeholder="Masukan nama"></td>
 								<td style="width:15pc;padding-right:10px;"><input type="text" class="form-control" required name="nomor_hp" placeholder="Masukan Nomor Hp"></td>
 								<td style="width:15pc;padding-right:10px;"><input type="text" class="form-control" required name="nomor_kendaraan" placeholder="Masukan Nomor Kendaraan"></td>
 								<td style="width:15pc;padding-right:10px;"><input type="text" class="form-control" required name="alamat" placeholder="Masukan alamat"></td>

 								<td style="padding-left:10px;"><button id="tombol-simpan" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button></td>
 							</tr>
 						</table>
 					</form>
 				<?php } ?>
 				<br />
 				<table class="table table-bordered" id="example1">
 					<thead>
 						<tr style="background:#DFF0D8;color:#333;">
 							<th>No.</th>
 							<th>Nama</th>
 							<th>No.Hp</th>
 							<th>No.Kendaraan</th>
 							<th>Alamat</th>
 							<th>Tgl Input</th>
 							<th>Tgl Edit</th>
 							<th>Aksi</th>
 						</tr>
 					</thead>
 					<tbody>
 						<?php
							$hasil = $lihat->pelanggan();
							$no = 1;
							foreach ($hasil as $isi) {
							?>
 							<tr>
 								<td><?php echo $no; ?></td>
 								<td><?php echo $isi['nama']; ?></td>
 								<td><?php echo $isi['nomor_hp']; ?></td>
 								<td><?php echo $isi['nomor_kendaraan']; ?></td>
 								<td><?php echo $isi['alamat']; ?></td>
 								<td><?php echo $isi['tgl_input']; ?></td>
 								<td><?php echo $isi['tgl_edit']; ?></td>
 								<td>
 									<a href="index.php?page=riwayat&uid=<?php echo $isi['id_pelanggan']; ?>"><button class="btn btn-info">Riwayat</button></a>
 									<a href="index.php?page=pelanggan&uid=<?php echo $isi['id_pelanggan']; ?>"><button class="btn btn-warning">Edit</button></a>
 									<a href="fungsi/hapus/hapus.php?pelanggan=hapus&id=<?php echo $isi['id_pelanggan']; ?>" onclick="javascript:return confirm('Hapus Data Pelanggan ?');"><button class="btn btn-danger">Hapus</button></a>
 								</td>
 							</tr>
 						<?php $no++;
							} ?>
 					</tbody>
 				</table>
 				<div class="clearfix" style="padding-top:16%;"></div>
 			</div>
 		</div>
 	</section>
 </section>