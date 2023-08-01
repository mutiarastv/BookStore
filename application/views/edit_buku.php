<form action="<?= base_url('Pages/update_buku');?>" method="POST">
    <div class="modal-body">
        <div class="form-floating mb-3">
            <input type="text" name="kodeBuku" class="form-control" value="<?=$daftar_buku['kd_buku'];?>" readonly />
            <label for="floatingKode">Kode Buku</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Judul Buku"
                value="<?=$daftar_buku['judul_buku'];?>" name="judulBuku">
            <label for="floatingInput">Judul Buku</label>
        </div>
        <div class="form-floating">
            <select class="form-control" id="floatingYear" name="tahunTerbit">
                <?php for($a=2021;$a<=2023;$a++) {
                    if($a == $daftar_penerbit['tahun_penerbit']){?>
                <option value="<?=$a;?>" selected>
                    <?=$a;?>
                </option>
                <?php }else{ ?>
                <option value="<?=$a;?>">
                    <?=$a;?>
                </option>
                <?php }}?>
            </select>
            <label for="floatingYear">Tahun Terbit</label>
        </div>
        <div class="form-floating mt-3">
            <select class="form-control" id="floatingPenerbit" name="Penerbit">
                <?php
                        $kode = $daftar_penerbit['kd_penerbit']; 
                        foreach($daftar_penerbit as $row){
                            if($row['kd_penerbit'] == $kode){?>
                <option value="<?=$row['kd_penerbit'];?>" selected>
                    <?=$row['nama_penerbit'];?>
                </option>
                <?php }else{ ?>
                <option value="<?=$row['kd_penerbit'];?>">
                    <?=$row['nama_penerbit'];?>
                </option>
                <?php }}?>
            </select>
            <label for="floatingPenerbit">Penerbit</label>
        </div>
    </div>
    <div class="modal-footer mt-3">
        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal"
            onclick="history.back()">Back</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>