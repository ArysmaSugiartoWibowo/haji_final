<?php
// Ambil id_tugas dari parameter URL menggunakan input CodeIgniter
$id_tugas_dosen = $this->input->get('id_tugas');

$this->db->select('type_table, kelas, id_pertemuan');
$this->db->from('tugas_tabel');
$this->db->where('id_tugas', $id_tugas_dosen);
$query = $this->db->get();

if ($query->num_rows() > 0) {
    $row = $query->row(); // Ambil satu baris hasil
    $type_table = $row->type_table;
    $kelas = $row->kelas;
    $id_pertemuan = $row->id_pertemuan;
} else {
    $type_table = null;
    $kelas = null;
    $id_pertemuan = null;
}
?>

<!-- 
<?php
// Ambil id_tugas dari parameter URL menggunakan input CodeIgniter
$this->db->select('username');
$this->db->from('user');
$this->db->where('id', $id_user);
$query = $this->db->get();

if ($query->num_rows() > 0) {
    $row = $query->row(); // Ambil satu baris hasil
    $id_user = $row->id_user;

} else {
    $id_user = null;

}
?> -->
<!--  -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="card card-success">
                    <div class="card-header">

                <?php
                $judul_t = $this->input->get('judul');
                ?>
             <h3 class="card-title">Data jawaban dari <?= $judul_t;?> </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                        <a class="btn btn-success" href="<?= site_url("controllerRoolbox/?id_pertemuan=$id_pertemuan&type=$type_table&kelas=$kelas") ?>">
                                    <i class="fas fa-chevron-left nav-icon"></i> Kembali
                                </a>
                                <?php if (!empty($this->session->session_login['username'])): ?>
                                <?php if ($this->session->userdata('session_login')['level'] == 'siswa') : ?>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                                    <i class="fas fa-plus-square nav-icon "></i> Upload</h3>
                                </button> 
                            <?php endif;?>
                            <?php endif;?>
                                
                        </div>
                      
                        <div class="table-responsive">
                            <table id="mytable_materi" class="table table-striped">
                                <thead>
                                    <tr> 

                                        <th>Nama Mahasiswa</th>  
                                        <th>Nama Data</th>  
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if (empty($files)): ?>
    <tr>
        <td colspan="3" class="text-center">Data kosong</td>
    </tr>
<?php else: ?>
    <?php if (!empty($this->session->session_login['username'])): ?>
        <?php if ($this->session->userdata('session_login')['level'] == 'siswa') : ?>
            <?php foreach ($files as $item): ?>
    <?php if ($item['id_user'] == $this->session->userdata('session_login')['id'] ): // Hanya tampilkan jika id_user adalah 23 ?>
        <?php
        // Query untuk mengambil username berdasarkan id_user
        $this->db->select('username');
        $this->db->from('user'); // Ganti dengan nama tabel pengguna Anda
        $this->db->where('id', $item['id_user']); // Ganti 'id' dengan nama kolom yang sesuai
        $query_user = $this->db->get();
        
        // Ambil hasil username jika ada
        if ($query_user->num_rows() > 0) {
            $user_row = $query_user->row();
            $username = $user_row->username;
        } else {
            $username = 'Username tidak ditemukan'; // Default jika tidak ada
        }
        ?>

        <tr>
            <td><?php echo $username; ?></td>
            <td><?php echo $item['judul_tugas']; ?></td>
            
            <td class="text-center" colspan="2">
                <?php if (strpos($item['nama_file'], '.mp4') !== false) : ?> 
                    <!-- Button to trigger modal for video files -->
                    <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#exampleModal" onclick="setModalContent(<?php echo $item['id_tugas_mahasiswa']; ?>)">
                        <i class="fas fa-play-circle nav-icon"></i> Tonton
                    </button>
                <?php else : ?>
                    <!-- Else condition for non-video files -->
                    <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#exampleModal" onclick="setModalContent(<?php echo $item['id_tugas_mahasiswa']; ?>)">
                        <i class="fas fa-book nav-icon"></i> Baca
                    </button>
                <?php endif; ?>

                <?php if (!empty($this->session->session_login['username'])): ?>
                    <?php if ($this->session->userdata('session_login')['level'] == 'siswa'): ?>
                        <button type="button" class="btn btn-danger mb-1" onclick="confirmDelete('<?= base_url("controllerJawaban/delete/") . $item["id_tugas_mahasiswa"] ?>')">
                            <i class="fa fa-trash nav-icon"></i> Hapus
                        </button>
                    <?php endif; ?>
                <?php endif; ?>
            </td>
        </tr>
    <?php endif; // Tutup kondisi untuk id_user 23 ?>
<?php endforeach; ?>

            <?php else :?>
                <?php foreach ($files as $item): ?>
        <?php
    // Query untuk mengambil username berdasarkan id_user
    $this->db->select('username');
    $this->db->from('user'); // Ganti dengan nama tabel pengguna Anda
    $this->db->where('id', $item['id_user']); // Ganti 'id' dengan nama kolom yang sesuai
    $query_user = $this->db->get();
    
    // Ambil hasil username jika ada
    if ($query_user->num_rows() > 0) {
        $user_row = $query_user->row();
        $username = $user_row->username;
    } else {
        $username = 'Username tidak ditemukan'; // Default jika tidak ada
    }
    ?>

    <tr>
        <td><?php echo $username ?></td>
        <td><?php echo $item['judul_tugas']; ?></td>
        
        <td class="text-center" colspan="2">
            <?php if (strpos($item['nama_file'], '.mp4') !== false) : ?> 
                <!-- Button to trigger modal for video files -->
                <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#exampleModal" onclick="setModalContent(<?php echo $item['id_tugas_mahasiswa']; ?>)">
                    <i class="fas fa-play-circle nav-icon"></i> Tonton
                </button>
            <?php else : ?>
                <!-- Else condition for non-video files -->
                <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#exampleModal" onclick="setModalContent(<?php echo $item['id_tugas_mahasiswa']; ?>)">
                    <i class="fas fa-book nav-icon"></i> Baca
                </button>
            <?php endif; ?>

            <?php if (!empty($this->session->session_login['username'])): ?>
                <?php if ($this->session->userdata('session_login')['level'] == 'siswa'): ?>
                    <button type="button" class="btn btn-danger mb-1" onclick="confirmDelete('<?= base_url("controllerJawaban/delete/") . $item["id_tugas_mahasiswa"] ?>')">
                        <i class="fa fa-trash nav-icon"></i> 
                    </button>

                <?php endif; ?>
            <?php endif; ?>
        </td>
    </tr>
    <?php
    // Query untuk mengambil username berdasarkan id_user
    $this->db->select('username');
    $this->db->from('user'); // Ganti dengan nama tabel pengguna Anda
    $this->db->where('id', $item['id_user']); // Ganti 'id' dengan nama kolom yang sesuai
    $query_user = $this->db->get();
    
    // Ambil hasil username jika ada
    if ($query_user->num_rows() > 0) {
        $user_row = $query_user->row();
        $username = $user_row->username;
    } else {
        $username = 'Username tidak ditemukan'; // Default jika tidak ada
    }
    ?>

    
<?php endforeach; ?>
            <?php endif;?>

            <!--  -->
            <?php endif;?>



<?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-header-title">
                    <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                    <!-- Add maximize and minimize buttons below the title -->
                    <div class="modal-header-controls">
                        <button type="button" class="btn btn-secondary" id="maximizeBtn" aria-label="Maximize">
                            <i class="fas fa-expand"></i> <!-- FontAwesome icon for maximize -->
                        </button>
                        <button type="button" class="btn btn-secondary d-none" id="minimizeBtn" aria-label="Minimize">
                            <i class="fas fa-compress"></i> <!-- FontAwesome icon for minimize -->
                        </button>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span id="modalFileIdDisplay" style="display:none;"></span>
                <div id="fileContent"></div> <!-- Container for dynamic content -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end Modal -->

<!-- Include FontAwesome for icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

<!-- Optional: Include Bootstrap and jQuery if not already included -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
/* Custom styles for fullscreen modal */
.fullscreen-modal .modal-dialog {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    max-width: none;
}

.fullscreen-modal .modal-content {
    height: 100%;
    border: none;
}

.modal-header-title {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    width: 100%;
}

.modal-header-controls {
    margin-top: 0.5rem;
}
</style>

<script>
// Function to toggle modal size
function toggleModalSize() {
    const modalDialog = document.querySelector('#exampleModal .modal-dialog');
    const maximizeBtn = document.getElementById('maximizeBtn');
    const minimizeBtn = document.getElementById('minimizeBtn');
    const modal = document.querySelector('#exampleModal');

    if (modal.classList.contains('fullscreen-modal')) {
        modal.classList.remove('fullscreen-modal');
        modalDialog.classList.add('modal-lg');
        maximizeBtn.classList.remove('d-none');
        minimizeBtn.classList.add('d-none');
    } else {
        modal.classList.add('fullscreen-modal');
        modalDialog.classList.remove('modal-lg');
        maximizeBtn.classList.add('d-none');
        minimizeBtn.classList.remove('d-none');
    }
}

// Event listeners for maximize and minimize buttons
document.getElementById('maximizeBtn').addEventListener('click', toggleModalSize);
document.getElementById('minimizeBtn').addEventListener('click', toggleModalSize);
</script>


<!-- Modal Add -->
<!-- Modal Add -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="addForm" action="<?= base_url("controllerJawaban/insert") ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Jawaban</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_file">Video (Harus Format mp4) / Modul (Harus Format Pdf)</label>
                            <input type="file" class="form-control" name="nama_file" id="nama_file" accept=".mp4, .pdf" required>
                            <input type="hidden" name="id_user" id="id_user" value="<?= $this->session->userdata('session_login')['id']?>">
                        </div>
                        <div class="form-group">
                            <label for="judul_tugas">Judul</label>
                            <input type="text" class="form-control" name="judul_tugas" placeholder="Enter Judul " required />
                        </div>
                        <div class="form-group">
                            <label for="id_tugas_dosen">Pilih Tugas/Soal</label>
                            <select class="custom-select" id="inputGroupSelect01" name="id_tugas_dosen" required>
                                <option selected disabled value="">Choose...</option>
                                <?php foreach ($soal as $item): ?>
                                    <option value="<?= $item['id_tugas']; ?>"><?= $item['judul_tugas']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="submitButton">Tambah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end M -->
<!-- end M -->

<script>
// Validasi JavaScript untuk memastikan jenis file yang diunggah adalah mp4 atau pdf
document.getElementById('addForm').addEventListener('submit', function (event) {
    var fileInput = document.getElementById('nama_file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.mp4|\.pdf)$/i;

    // Cek apakah file yang diunggah memiliki ekstensi yang diperbolehkan
    if (!allowedExtensions.exec(filePath)) {
        alert('Hanya file dengan format MP4 atau PDF yang diizinkan.');
        fileInput.value = ''; // Kosongkan input file
        event.preventDefault(); // Cegah pengiriman form
        return false;
    }
});
</script>


<!-- jQuery -->
<script src="<?= base_url('vendor') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="<?= base_url('vendor') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#mytable_materi').DataTable();
        
    });
</script>
<script>
      function confirmDelete(url) {
        if (confirm('Apakah Anda yakin ingin menghapus item ini?')) {
            window.location.href = url; // Redirect ke URL penghapusan
        }
    }
    function setModalContent(id) {
        // Set the ID file in the modal
        document.getElementById('modalFileIdDisplay').innerText = id;

        // Get the container where the file content will be displayed
        var fileContentDiv = document.getElementById('fileContent');
        fileContentDiv.innerHTML = ''; // Clear any previous content

        <?php foreach ($files as $file): ?>
            if (id == <?= $file['id_tugas_mahasiswa']; ?>) {
                var ext = '<?= pathinfo($file['nama_file'], PATHINFO_EXTENSION); ?>';
                var fileUrl = '<?= base_url('uploads/' . $file['nama_file']); ?>';

                if (ext === 'mp4') {
                    fileContentDiv.innerHTML = `
                        <div class="embed-responsive embed-responsive-16by9 mb-3">
                            <video class="embed-responsive-item" controls>
                                <source src="${fileUrl}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>`;
                } else if (ext === 'pptx') {
                    fileContentDiv.innerHTML = `
                        <a href="${fileUrl}" target="_blank">
                            <img src="<?= base_url('assets/img/pptx_icon.png'); ?>" alt="PPTX File" class="img-fluid" />
                            Download PowerPoint File
                        </a>`;
                } else if (ext === 'docx') {
                    fileContentDiv.innerHTML = `
                        <a href="${fileUrl}" target="_blank">
                            <img src="<?= base_url('assets/img/docx_icon.png'); ?>" alt="DOCX File" class="img-fluid" />
                            Download Word File
                        </a>`;
                } else if (ext === 'pdf') {
                    fileContentDiv.innerHTML = `
                        <div class="embed-responsive embed-responsive-4by3 mb-3">
                            <iframe class="embed-responsive-item" src="${fileUrl}" style="border: none;">     <div class="btn-group ml-2">
                   
                        </div>`;
                } else {
                    fileContentDiv.innerHTML = '<p>File type not supported.</p>';
                }
            }
        <?php endforeach; ?>
    }
</script>