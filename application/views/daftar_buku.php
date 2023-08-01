<div class="card">
    <div class="card-header text-center">
        <h1>Daftar Buku</h1>
    </div>
    <div class="card-body">
        <!-- menampilkan flash data -->
        <?= $this->session->flashdata('pesan');?>
        <!-- Tombol Tambah -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-secondary col-12 mb-3" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            Tambah Buku
        </button>
        <table class="table table-success table-striped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Buku</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Tahun Terbit</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
    $no = 1; 
    foreach($daftar_buku as $row) {?>
                <tr>
                    <th scope="row"><?= $no++;?></th>
                    <td><?= $row['kd_buku'];?></td>
                    <td><?= $row['judul_buku'];?></td>
                    <td><?= $row['tahun_penerbit'];?></td>
                    <td><?= $row['nama_penerbit'];?></td>
                    <td><a href="<?= base_url('Pages/show_edit_page/').$row['kd_buku'];?>" class="btn btn-light btn-sm m-2">
                    <i class="fa fa-pencil-square"></i>                    
                      <a href="<?= base_url('Pages/hapus_buku/').$row['kd_buku'];?>" class="btn btn-light btn-sm"
                            onclick="return confirm('Hapus data ini?')">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                          </td>        
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>