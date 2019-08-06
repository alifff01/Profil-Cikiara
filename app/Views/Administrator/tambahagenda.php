<div class="container">
	<section>
		<div class="row">
			<div class="col-md-">
			<form method="POST" action=" <?= BASE_URL; ?>admin/simpanagenda">
				<div class="form-group">
					<label>nama agenda</label>
					<input type="text" name="nama_agenda">
				</div>
				<div class="form-group">
					<label>kaeaterangan</label>
					<input type="text" name="keterangan">
				</div>
				<div class="form-group">
					<label>gamvar agenda</label>
					<input type="text" name="gambar_agenda">
				</div>
				<div class="form-group">
					<label>tgl dibuat</label>
					<input type="date" name="tgl_dibuat">
				</div>
				<input type="submit" value="simpan" class="btn btn-danger">
			</form>		
			</div>
		</div>
	</section>
</div>