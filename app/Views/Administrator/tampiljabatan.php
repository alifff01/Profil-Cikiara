<div class="container">
	<section>
		<div class="row">
			<div class="col-md-">
			<header>
				<a href="<?= BASE_URL; ?>admin/tambahjabatan">tambah data </a>
			</header>
				<div class="table-responsive">
					
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>no</th>
							<th>nama jabatan</th>
							<th>keterangan</th>
							
						</tr>
					</thead>
					<tbody>
						<?php 
						$nomor=1;
						foreach ($data['jabatan'] as $row): ?>
								<tr>
									<td><?php echo $nomor++; ?></td>
									<td><?php echo $row['nama_jabatan']; ?></td>
									<td><?php echo $row['keterangan'] ?></td>
									
								</tr>
							
						<?php endforeach ?>
					</tbody>
				</table>
				
					
			</div>
		</div>
	</section>
</div>