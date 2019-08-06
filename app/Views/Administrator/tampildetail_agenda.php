<div class="container">
	<section>
		<div class="row">
			<div class="col-md-">
			<header>
				<a href="<?= BASE_URL; ?>admin/tambahagenda">tambah data </a>
			</header>
				<div class="table-responsive">
				
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>no</th>
							<th>deskripsi</th>
							<th>detail agenda</th>
							<th>agenda</th>
							<th>nama detail</th>
							<th>gambar detail</th>
							
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						foreach ($data['detail_agenda'] as $row): ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $row['deskripsi']; ?></td>
									<td><?php echo $row['id_detailagenda'] ?></td>
									<td><?php echo $row['id_agenda']; ?></td>
									<td><?php echo $row['nama_detail']; ?></td>
									<td><?php echo $row['gambar_detail']; ?></td>
									
								</tr>
							
						<?php endforeach ?>
					</tbody>
				</table>
				
					
			</div>
		</div>
	</section>
</div>