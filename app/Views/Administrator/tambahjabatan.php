<div class="container">
	<section>
		<div class="row">
			<div class="col-md-">
			<form method="POST" action=" <?= BASE_URL; ?>admin/simpanjabatan">
				
				<div class="form-group">
					<label> nama jabatan</label>
					<input class="form-control" type="text" name="nama_jabatan">
				</div>
				<div class="form-group">
					<label> keterangan</label>
					<input class="form-control" type="text" name="keterangan">
				</div>
				<div class="form-group">
					<input class="btn btn-danger" type="submit" value="simpan">

				</div>
			</form>		
			</div>
		</div>
	</section>
</div>