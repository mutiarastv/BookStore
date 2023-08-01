<form action="<?= base_url('Pages/update_penerbit');?>" method="POST">
    <div class="modal-body">
        <div class="form-floating mb-3">
            <input type="text" name="kodePenerbit" class="form-control" value="<?=$daftar_penerbit['kd_penerbit'];?>"
                readonly />
            <label for="floatingKode">Kode Penerbit</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Judul Buku"
                value="<?=$daftar_penerbit['nama_penerbit'];?>" name="namaPenerbit">
            <label for="floatingInput">Nama Penerbit</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Judul Buku"
                value="<?=$daftar_penerbit['alamat_penerbit'];?>" name="alamatPenerbit">
            <label for="floatingInput">Alamat Penerbit</label>
        </div>        
    </div>
    <div class="modal-footer mt-3">
        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal"
            onclick="history.back()">Back</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>