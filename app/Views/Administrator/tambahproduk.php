<div class="container">
	<section>
		<div class="row">
			<div class="col-md-">
			<form method="POST" action=" <?= BASE_URL; ?>admin/simpanproduk">
				<div class="form-group">
					<label>produk</label>
					<input type="text" name="produk">
				</div>
				<div class="form-group">
					<label>nama produk</label>
					<input type="text" name="nama_produk">
				</div>
				<div class="form-group">
					<label>gambar produk</label>
					<input type="text" name="gambar_produk">
				</div>
				<div class="form-group">
					<label>deskripsi produk</label>
					<input type="text" name="deskripsi_produk">
				</div>
				<input class="btn btn-danger" type="submit" value="simpan">
			</form>		
			</div>
		</div>
	</section>
</div>