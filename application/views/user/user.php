<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Data User</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                        <a class="btn btn-success" href="<?= site_url("controllerHome") ?>">
                                    <i class="fas fa-chevron-left nav-icon"></i> Kembali
                                </a>
                            <a type="button" href="<?= site_url("controllerLogin/register_action"); ?>" class="btn btn-primary"> 
                            <i class="fas fa-plus-square nav-icon "></i> Tambah
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($user)): ?>
                                        <?php foreach ($user as $u): ?>
                                            <tr>
                                                <td><?php echo $u->username; ?></td>
                                                <td class="text-center">
                                                    <?= anchor(
                                                        site_url("controllerLogin/deleteUser/" . $u->id),
                                                        '<i class="nav-icon fa-solid fa-trash"></i> Hapus User',
                                                        [
                                                            'class' => 'btn btn-danger delete',
                                                            'title' => 'Hapus User',
                                                            'onclick' => 'return confirmDelete()'
                                                        ]
                                                    ) ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3">Tidak ada data pengguna.</td>
                                        </tr>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    // Fungsi konfirmasi sebelum menghapus
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus user ini?');
    }
</script>
