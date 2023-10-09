<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
        body{
          background-image: url('https://arifkeisuke.com/wp-content/uploads/2017/12/anime-anime-art-Shigatsu-wa-Kimi-no-Uso-arima-kousei-1894839.jpg');
          background-repeat: no-repeat;
          background-attachment: fixed; 
          background-size: 100% 100%;
        }
       </style>
        <style>
        div{
          background-image: url('https://i.ytimg.com/vi/CmRyGcR8fc4/maxresdefault.jpg');
          background-repeat: no-repeat;
          background-attachment: fixed; 
          background-size: 100% 100%;
        }
       </style>
</head>

<body class="min-vh-100 d-flex align-items-center">
    <div class="card w-50 m-auto p-3">
        <h3 class="text-center">Ubah Siswa</h3>
        <hr>
        
        <?php foreach ($siswa as $row ) : ?>
        <form action="<?php echo base_url('admin/aksi_ubah_siswa') ?>"
        enctype="multipart/form-data"
        method="post" class="row">
        <input name="id_siswa" type="hidden" value="<?php echo $row->id_siswa?>">
            <div class="mb-3 col-6">
                <label for="nama" class="form-label"><b>Nama Siswa</b></label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row->nama_siswa ?>">
                <hr>
            </div>
            <div class="mb-3 col-6">
                <label for="nisn" class="form-label"><b>NISN</b></label>
                <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $row->nisn ?>">
                <hr>
            </div>
            <div class="mb-3 col-6">
                <label for="gender" class="form-label"><b>Gender</b></label>
                <select name="gender" class="form-select" value="<?php echo $row->gender ?>">
                    <option selected>Pilih Gender</option>
            
            </option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                    <option value="2D">2D</option>
                </select>
                <hr>
            </div>
            <div class="mb-3 col-6">
                <label for="id_kelas" class="form-label"><b>Kelas</b></label>
                <input type="text" class="form-control" id="id_kelas" name="id_kelas" value="<?php echo $row->id_kelas ?>">
                <hr>
            </div>
           
                <center>
                <div class="mb-3 col-6">
                <label for="nama_sekolah" class="form-label"><b>Sekolah</b></label>
                <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah">
                <hr>
            </div></center>
                <button class="btn btn-lg btn-primary" type="submit">Ubah</button>           
                        </form>
                        <?php endforeach; ?>
</body>

</html>