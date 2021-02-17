<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Kursus</h1>
    <a href="index.php?page=kursus" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
    </a>
</div>

<form method="POST" enctype="multipart/form-data">
<div class="row">
    <div class="col-lg-8 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Informasi</h6>
            </div>
            <div class="card-body">
                <?php
                    if ($session->get('alert')) {
                        echo $session->get('alert');
                    }
                ?>
                <div class="form-group">
                    <label for="judul">Judul Kursus</label>
                    <input type="text" name="judul" class="form-control" id="judul" placeholder="Masukkan judul kursus" required>
                </div>
                <div class="form-group">
                    <label for="ckeditor">Deskripsi</label>
                    <textarea name="deskripsi" id="ckeditor" rows="10" cols="80" required></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select name="kategori_id" id="kategori" class="form-control" required>
                        <?php foreach($kursus->getKategori() as $row){ ?>
                        <option value="<?= $row->id ?>"><?= $row->nama_kategori ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tingkat">Tingkat</label>
                    <select name="tingkat" id="tingkat" class="form-control" required>
                        <option value="Pemula" selected>Pemula</option>
                        <option value="Menengah">Menengah</option>
                        <option value="Ahli">Ahli</option>
                        <option value="Semua Tingkat">Semua Tingkat</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" class="form-control" id="gambar" onchange="readURL(this);" accept="image/*" required><br>
                    <img id="ShowImage">
                </div>
                <button type="submit" name="addKursus" class="btn btn-block btn-primary">Selanjutnya</button>
            </div>
        </div>
    </div>
</div>
</form>