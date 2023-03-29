<!DOCTYPE html>

<?php
    include 'koneksi.php';
        session_start();


        $id_siswa = '';
        $nis = '';
        $nama_siswa = '';
        $jenis_kelamin = '';
        $alamat = '';

    if(isset($_GET['ubah'])){
        $id_siswa = $_GET['ubah'];
        $query = "SELECT * FROM tb_siswa where id_siswa = '$id_siswa';";
        $sql = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($sql);
        $nis = $result['nis'];
        $nama_siswa = $result['nama_siswa'];
        $jenis_kelamin = $result['jenis_kelamin'];
        $alamat = $result['alamat'];

    }
?>

<html>
    <head>
        <!-- bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" >
        <script src="js/bootstrap.bundle.min.js"></script>
        <title>belajar_crud</title>

        <!-- font Awesome-->
        <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    </head>
    <body>
        <nav class="navbar navbar-light bg-light mb-4">
            <div class="container-fluid">
                    <a class="navbar-brand" href="#">    
                        CRUD
                    </a>
            </div>
        </nav>

            <div class="container">
                <form method="POST" action="proses.php" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $id_siswa?>" name="id_siswa">
                    <div class="mb-3 row">
                        <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                        <div class="col-sm-10">
                            <input required type="text" name="nis" class="form-control" id="nis" placeholder="ex: 11223"
                            placeholder="Ex: 11223" value="<?php echo $nis; ?>">
                        </div>
                    </div>
                
                
                    <div class="mb-3 row">
                        <label name="nama_siswa" for="nis" class="col-sm-2 col-form-label">Nama Siswa</label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="nis" name="nama_siswa" placeholder="ex: Tinon Raihan"
                            placeholder="Ex: Nadhin Salsabilla" value="<?php echo $nama_siswa; ?>">
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="nis" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select required id="jkel" name="jenis_kelamin" class="form-select" aria-label="Default select example" >
                                
                                <option <?php if($jenis_kelamin == 'Laki-laki'){echo "selected";}?> value="Laki-laki">Laki-laki</option>
                                <option <?php if($jenis_kelamin == 'Perempuan'){echo "selected";}?> value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="foto" class="col-sm-2 col-form-label">Foto Siswa</label>
                        <div class="col-sm-10">
                            <input <?php if(!isset($_GET['ubah'])){ echo "required" ;} ?> class="form-control" type="file" name="foto" id="foto" accept="image/*">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                        <div class="col-sm-10">
                            <textarea required class="form-control" id="alamat" name="alamat" rows="3"><?php echo $alamat; ?></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row mt-4">
                        <div class="col">
                            <?php
                                if(isset($_GET['ubah'])){
                            ?>
                                <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                    Simpan Perubahan
                                </button>
                            <?php
                                } else {
                            ?>
                                    <button type="submit" name="aksi" value="add" class="btn btn-primary">
                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                    Tambahkan
                                </button>
                            <?php
                                }
                            ?>
                                
                            <a href="index.php" type="button" class="btn btn-danger">
                                <i class="fa fa-reply" aria-hidden="true"></i>
                                Batal
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </body>
</html>