<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="card card-success">
                    <div class="card-header">
                    <?php
// Memastikan bahwa database sudah diload
$this->load->database();

// Tangkap id dari URL (misalnya, URL: localhost:8080/controllerMateri/index/1)
$id_menu = $this->uri->segment(3); // Mengambil id dari segment ke-3

// Melakukan query dengan parameter id
$this->db->select('nama_menu');
$this->db->from('menu');
$this->db->where('id', $id_menu);
$query = $this->db->get();

// Mendapatkan hasil query sebagai array
$asc = $query->row_array();

if ($asc) {
    // Jika data ditemukan, tampilkan nama_menu
    $nama_menu = htmlspecialchars($asc['nama_menu']);
} else {
    // Jika data tidak ditemukan, tampilkan pesan alternatif
    $nama_menu = 'Seluruh Kelas Dan Semester';
}
?>

<h3 class="card-title">Data Materi <?php echo $nama_menu;?></h3>
                            </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                       <a class="btn btn-success" href="<?= site_url("controllerHome") ?>">
                                    <i class="fas fa-chevron-left nav-icon"></i> Kembali
                                </a>
                    
                                <?php if ($this->session->userdata('session_login')) : ?>
                                <?php if ($this->session->userdata('session_login')['level'] != 'admin')  : ?>
                            <?php else :?>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                                    <i class="fas fa-plus-square nav-icon "></i> Tambah Materi
                                </button> 
                            <?php endif;?>
                            <?php endif;?>
                                
                        </div>
                        <div class="table-responsive">
                            <table id="mytable_materi" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Materi</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($materi as $item): ?>
                                        <tr>
                                            <td><?php echo $item['nama_materi']; ?></td>
                                            <td colspan="4" class="text-center">
                                                <?= anchor(site_url("controllerFiles/?id_materi=". $item['id_materi']."&type=video"), 
                                                '<i class="nav-icon fa-solid fa-clapperboard"></i> List Video', 
                                                'class="btn mb-1 btn-primary video" title="List Video"')?>
                                                <?= anchor(site_url("controllerFiles/?id_materi=". $item['id_materi']."&type=pdf"), 
                                                '<i class=" nav-icon fa fa-info-circle"></i> List Modul', 
                                                'class="btn mb-1 btn-secondary" title="List Modul"')?>
                                                  <?php if ($this->session->userdata('session_login')) : ?>
                                <?php if ($this->session->userdata('session_login')['level'] != 'admin')  : ?>
                                                    <?php else :?>
                                                <button type="button" class="btn btn-warning mb-1" data-toggle="modal" data-target="#editModal" data-id="<?= $item['id_materi'] ?>" data-nama="<?= $item['nama_materi'] ?>">
                                                <i class="nav-icon fas fa-edit"></i> Edit
                                                </button>    
                                                <button type="button" class="btn btn-danger mb-1" onclick="confirmDelete('<?= base_url("controllerMateri/delete/") . $item['id_materi']?>')">
                                                    <i class="nav-icon fa fa-trash"></i>
                                                    Hapus
                                                </button>    
                                                <?php endif;?>  
                                                 <?php endif;?>                      
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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

<!-- Modal Add -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="addForm" action="<?= base_url("controllerMateri/insert") ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_materi">Nama Materi</label>
                        <input type="text" class="form-control" name="nama_materi" placeholder="Enter Nama Materi" required />
                    </div>
                    <div class="form-group">
                        <label for="id">Pilih Kategori</label>
                        <select class="custom-select" id="inputGroupSelect01" name="id" required>
                            <option selected disabled value="">Choose...</option>
                            <?php foreach ($menus as $item): ?>
                                <option value="<?= $item['id']; ?>"><?= $item['nama_menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="addSubmitBtn" disabled>Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Add -->

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="editForm" action="<?= base_url("controllerMateri/edit") ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="id_materi">
                    <div class="form-group">
                        <label for="edit_nama_materi">Nama Materi</label>
                        <input type="text" class="form-control" id="edit_nama_materi" name="nama_materi" placeholder="Enter Nama Materi" required />
                    </div>
                    <div class="form-group">
                        <label for="id_menu">Pilih Kategori</label>
                        <select class="custom-select" id="edit_id_kategori" name="id" required>
                            <option selected disabled value="">Pilih</option>
                            <?php foreach ($menus as $item): ?>
                                <option value="<?= $item['id']; ?>"><?= $item['nama_menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="editSubmitBtn" disabled>Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Edit -->

<script>
// Fungsi untuk memeriksa apakah semua input telah diisi
function checkForm(formId, buttonId) {
    const form = document.getElementById(formId);
    const button = document.getElementById(buttonId);
    const inputs = form.querySelectorAll('input[required], select[required]');
    let allFilled = true;

    inputs.forEach(input => {
        if (!input.value) {
            allFilled = false;
        }
    });

    button.disabled = !allFilled;
}

// Event listener untuk form add
document.getElementById('addForm').addEventListener('input', function () {
    checkForm('addForm', 'addSubmitBtn');
});

// Event listener untuk form edit
document.getElementById('editForm').addEventListener('input', function () {
    checkForm('editForm', 'editSubmitBtn');
});

// Cek form saat pertama kali dibuka
document.getElementById('addModal').addEventListener('shown.bs.modal', function () {
    checkForm('addForm', 'addSubmitBtn');
});

document.getElementById('editModal').addEventListener('shown.bs.modal', function () {
    checkForm('editForm', 'editSubmitBtn');
});
</script>

<script src="<?= base_url('vendor/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<script>
    function confirmDelete(url) {
        if (confirm('Apakah Anda yakin ingin menghapus item ini?')) {
            window.location.href = url; // Redirect ke URL penghapusan
        }
    }

    $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Tombol yang mengklik modal
        var id = button.data('id'); // Mengambil data-id
        var nama = button.data('nama'); // Mengambil data-nama

        // Mengisi nilai-nilai ke dalam form modal
        var modal = $(this);
        modal.find('#edit_id').val(id);
        modal.find('#edit_nama_materi').val(nama);
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
    $('#mytable_materi').DataTable();
        
    });
</script>
