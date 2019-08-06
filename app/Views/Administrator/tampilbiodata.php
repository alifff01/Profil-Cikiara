<div class="container">
	<section>
		<div class="row">
			<div class="col-md-">
			<header>
				<a href="<?= BASE_URL; ?>admin/tambahbiodata">tambah data </a>
			</header>
				<div class="table-responsive">
					
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>no</th>
							<th>photo</th>
							<th>jk</th>
							<th>id_biodata</th>
							<th>id_jabatan</th>
							<th>nama_anggota</th>
							<th>alamat</th>
							<th>no hp</th>
							<th>tempat lahir</th>
							<th>tgl lahir</th>
							<th>email</th>
							<th>agama</th>
							<th>tindakan</th>

						</tr>
					</thead>
					<tbody>
					<?php 
						$no=1;
						foreach ($data['biodata'] as $row): ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $row['photo']; ?></td>
									<td><?php echo $row['jk'] ?></td>
									<td><?php echo $row['id_biodata']; ?></td>
									<td><?php echo $row['id_jabatan']; ?></td>
									<td><?php echo $row['nama_anggota']; ?></td>
									<td><?php echo $row['alamat'] ?></td>
									<td><?php echo $row['no_hp'] ?></td>
									<td><?php echo $row['tempat_lahir'] ?></td>
									<td><?php echo $row['tgl_lahir'] ?></td>
									<td><?php echo $row['email'] ?></td>
									<td><?php echo $row['agama'] ?></td>
									<td>
										<a href="<?= BASE_URL; ?>admin/detailbiodata/<?= $row['id_biodata'] ?>">
											Detail
										</a></td>
								</tr>
							
						<?php endforeach ?>
					</tbody>
				</table>
				
			
			</div>
		</div>
	</section>
</div>