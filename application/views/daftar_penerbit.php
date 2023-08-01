<div class="card">
    <div class="card-header text-center">
        <h1> Daftar Penerbit </h1>
    </div>
    <div class="card-body">
    <?= $this->session->flashdata('pesan');?>
        <button type="button" class="btn btn-outline-secondary col-12 mb-3" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            Tambah Penerbit
        </button>
        <table class="table table-success table-striped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Penerbit</th>
                    <th scope="col">Nama Penerbit</th>
                    <th scope="col">Alamat_Penerbit</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
    $no = 1; 
    foreach($daftar_penerbit as $row) {?>
                <tr>
                    <th scope="row"><?= $no++;?></th>
                    <td><?= $row['kd_penerbit'];?></td>
                    <td><?= $row['nama_penerbit'];?></td>
                    <td><?= $row['alamat_penerbit'];?></td>
                    <td><a href="<?= base_url('Pages/show_edit_penerbit/').$row['kd_penerbit'];?>" class="btn btn-light btn-sm m-2">
                            <i class="fa fa-pencil-square"></i>
                            <a href="<?= base_url('Pages/hapus_penerbit/').$row['kd_penerbit'];?>" class="btn btn-light btn-sm" onclick="return confirm('Hapus data ini?')">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>