<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Data List Menu Materi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                        <a class="btn btn-success" href="<?= site_url("controllerHome") ?>">
                                    <i class="fas fa-chevron-left nav-icon"></i> Kembali
                                </a>
                        <?php if( empty( $this->session->session_login[ 'username' ] ) ):?>
                            <?php else :?>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                                    <i class="fas fa-plus-square nav-icon "></i> Tambah List Menu Materi
                                </button> 
                                <?php endif;?>  
                                <a class="btn btn-primary" href="<?= site_url("controllerHome") ?>">
                                    <i class="fas fa-chevron-left nav-icon"></i> Kembali
                                </a>
                        </div>
                        <div class="table-responsive">
                            <table id="mytable_materi" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Menu Materi</th>
                                        <?php if( empty( $this->session->session_login[ 'username' ] ) ):?>
                                            <?php else :?>
                                        <th>Kelas</th>
                                        <th>Semester</th>
                                        <th class="text-center">Aksi</th>
                                        <?php endif;?>  
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($menu as $item): ?>
                                        <tr>
                                        <td>
                                            <?php echo $item['nama_menu']; ?>
                                            
                                        </td>
                                        <?php if($item['id_semester']==1) :?>
                                            <td>VII</td>
                                        <td>Semester Gasal</td>
                                        <?php elseif($item['id_semester']==2) :?>
                                            <td>VII</td>
                                        <td>Semester Genap</td>
                                        <?php elseif($item['id_semester']==3) :?>
                                            <td>VIII</td>
                                        <td>Semester Gasal</td>
                                        <?php elseif($item['id_semester']==4) :?>
                                            <td>VIII</td>
                                        <td>Semester Genap</td>
                                        <?php elseif($item['id_semester']==5) :?>
                                            <td>IX</td>
                                        <td>Semester Gasal</td>
                                        <?php elseif($item['id_semester']==6) :?>
                                            <td>IX</td>
                                        <td>Semester Genap</td>
                                        <?php endif; ?>
    
                                        
                                        
                                        <?php if( empty( $this->session->session_login[ 'username' ] ) ):?>
                            <?php else :?>
                                <td colspan="2" class="text-center">
                                                <button type="button" class="btn btn-warning mb-1" data-toggle="modal" data-target="#editModal" data-id="<?= $item['id'] ?>" data-nama="<?= $item['nama_menu'] ?>">
                                                <i class="nav-icon fas fa-edit"></i>
                                                    Edit
                                                </button>    
                                                <button type="button" class="btn btn-danger mb-1" onclick="confirmDelete('<?= base_url("controllerMenu/delete/") . $item['id']?>')">
                                                    <i class="nav-icon fa fa-trash"></i>
                                                    Hapus
                                                </button>                          
                                            </td> 
                                <?php endif;?>  
                                     
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
            <form id="addForm" action="<?= base_url("controllerMenu/insert") ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_materi">Nama Menu</label>
                        <input type="text" class="form-control" name="nama_menu" placeholder="Enter Nama Menu" required />
                    </div>
                    <!-- Input Dropdown Kelas -->
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" id="kelas_add" name="kelas" required>
                            <option value="">Pilih Kelas</option>
                            <option value="VII">VII</option>
                            <option value="VIII">VIII</option>
                            <option value="IX">IX</option>
                        </select>
                    </div>
                    <!-- Input Dropdown Semester -->
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <select class="form-control" id="semester_add" name="semester" required>
                            <option value="">Pilih Semester</option>
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
            <form id="editForm" action="<?= base_url("controllerMenu/edit") ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="form-group">
                        <label for="edit_nama_materi">Nama Menu</label>
                        <input type="text" class="form-control" id="edit_nama_materi" name="nama_menu" placeholder="Enter Nama Menu" required />
                    </div>
                    <!-- Input Dropdown Kelas -->
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" id="kelas_edit" name="kelas" required>
                            <option value="">Pilih Kelas</option>
                            <option value="VII">VII</option>
                            <option value="VIII">VIII</option>
                            <option value="IX">IX</option>
                        </select>
                    </div>
                    <!-- Input Dropdown Semester -->
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <select class="form-control" id="semester_edit" name="semester" required>
                            <option value="">Pilih Semester</option>
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

// Fungsi untuk memperbarui opsi semester berdasarkan pilihan kelas
function updateSemesterOptions(kelasSelectId, semesterSelectId) {
    const kelas = document.getElementById(kelasSelectId).value;
    const semesterSelect = document.getElementById(semesterSelectId);

    // Hapus semua opsi yang ada
    semesterSelect.innerHTML = '<option value="">Pilih Semester</option>';

    if (kelas === "VII") {
        semesterSelect.innerHTML += '<option value="1">Semester Gasal</option>';
        semesterSelect.innerHTML += '<option value="2">Semester Genap</option>';
    } else if (kelas === "VIII") {
        semesterSelect.innerHTML += '<option value="3">Semester Gasal</option>';
        semesterSelect.innerHTML += '<option value="4">Semester Genap</option>';
    } else if (kelas === "IX") {
        semesterSelect.innerHTML += '<option value="5">Semester Gasal</option>';
        semesterSelect.innerHTML += '<option value="6">Semester Genap</option>';
    }

    // Periksa apakah semua input telah diisi setelah mengubah opsi
    checkForm(kelasSelectId === 'kelas_add' ? 'addForm' : 'editForm', kelasSelectId === 'kelas_add' ? 'addSubmitBtn' : 'editSubmitBtn');
}

// Event listener untuk form add
document.getElementById('addForm').addEventListener('input', function () {
    checkForm('addForm', 'addSubmitBtn');
});

document.getElementById('kelas_add').addEventListener('change', function () {
    updateSemesterOptions('kelas_add', 'semester_add');
});

// Event listener untuk form edit
document.getElementById('editForm').addEventListener('input', function () {
    checkForm('editForm', 'editSubmitBtn');
});

document.getElementById('kelas_edit').addEventListener('change', function () {
    updateSemesterOptions('kelas_edit', 'semester_edit');
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