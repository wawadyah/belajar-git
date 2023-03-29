<?php
    include 'koneksi.php';
    session_start();

    $query = "SELECT * from tb_siswa;";
    $sql = mysqli_query($conn, $query);
    $no = 0;

?>

<!DOCTYPE html>
<html>
    <head>
        <!-- bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" >
        <script src="js/bootstrap.bundle.min.js"></script>
        <title>belajar_crud</title>

        <!-- font -->
        <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
        <!-- data tables -->
        <link href="datatables/datatables.css" rel="stylesheet" >
        <script type="text/javascript" src="datatables/datatables.js"></script>


        <!-- animate -->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />
    </head>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#dt').DataTable();
        });
    </script>

    <body>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">    
                CRUD
                </a>
            </div>
        </nav>

        <!-- judul -->
        <div class="container">
            <h1 class="mt-3">Data Siswa</h1>
            <figure>
            <blockquote class="blockquote">
                <p>Data yang telah disimpan</p>
            </blockquote>
            <figcaption class="blockquote-footer">
            CRUD <cite title="Source Title">Create Read Update Delete</cite>
            </figcaption>
            </figure>
            <a href ="kelola.php" type="button" class="btn btn-primary mb-3  animate__animated animate__slower  animate__bounce">
                <i class="fa fa-plus animate__animated animate__bounce"></i>
                Tambah Data</a>

                <?php
                if(isset($_SESSION['eksekusi'])):

                ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">                
                    <?php
                    echo $_SESSION['eksekusi'];
                    ?> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <?php
                session_destroy();
                endif;
                ?>

            <div class="table-responsive">
                <table id="dt" class=" table table-group-divider table-striped table-hover">
                    <thead>
                    <tr>
                        <th><center>No.</center></th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Foto Siswa</th>
                        <th>Alamat</th>
                        <th>Aksi</th>               
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($result = mysqli_fetch_assoc($sql)){

                        
                    ?>
                    <tr>
                        <td><center>
                            <?php echo ++$no; ?>.
                        </center></td>
                        <td><?php echo $result['nis']; ?></td>
                        <td><?php echo $result['nama_siswa']; ?></td>
                        <td><?php echo $result['jenis_kelamin']; ?></td>
                        <td>
                            <img src="img/<?php echo $result['foto_siswa']; ?>" style="width: 150px;">
                        </td>
                        <td><?php echo $result['alamat']; ?></td>
                        <td>
                            <a href="kelola.php?ubah=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-success btn-sm">
                                <i class="fa fa-pencil"></i>
                                </a>
                                <a href="proses.php?hapus=
                                <?php echo $result['id_siswa']; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin mrnghapus data tersebut??')">        
                                <i class="fa fa-trash"></i>
                                </a>
                        </td>
                    </tr> 
                    <?php
                        }
                    ?>                  
                    </tbody>
                </table>
                <div class="mb-5"></div>
            </div>
        </div>
        </body>
</html>