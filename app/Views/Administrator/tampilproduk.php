<div class="container">
	<section>
		<div class="row">
			<div class="col-md-">
			<header>
				<a href="<?= BASE_URL; ?>admin/tambahproduk">tambah data </a>
			</header>
				<div class="table-responsive">
	
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>no</th>
							<th>nama produk</th>
							<th>gambar produk</th>
							<th>deskripsi produk</th>
							
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						foreach ($data['produk'] as $row): ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $row['nama_produk'] ?></td>
									<td><?php echo $row['gambar_produk']; ?></td>
									<td><?php echo $row['deskripsi_produk']; ?></td>
								</tr>
							
						<?php endforeach ?>
					</tbody>
				</table>
						
			</div>
		</div>
	</section>
</div>