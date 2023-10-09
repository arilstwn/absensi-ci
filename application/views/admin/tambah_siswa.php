
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
        body {
          background-image: url('https://i0.wp.com/arifkeisuke.com/wp-content/uploads/2017/11/111517_1020_Rekomendasi4-1024x576.jpg?resize=1024%2C576');
          background-repeat: no-repeat;
          background-attachment: fixed; 
          background-size: 100% 100%;
        }
       </style>
        <style>
        
        div {
          background-image: url('https://i.ytimg.com/vi/CmRyGcR8fc4/maxresdefault.jpg');
          background-repeat: no-repeat;
          background-attachment: fixed; 
          background-size: 100% 100%;
        }
       </style>
</head>
<body class="min-vh-100 d-flex align-items-center">
    <div class="card w-50 m-auto p-3">
        <h3 class="text-center">Tambah Siswa</h3>
        <hr>
        <form action="<?php echo base_url('admin/aksi_tambah_siswa') ?>" method="post" class="row">
            <div class="mb-3 col-6">
                <label for="nama" class="form-label"><b>Nama Siswa</b></label>
                
                <input type="text" class="form-control" id="nama" name="nama">
                <hr>
            </div>
            <div class="mb-3 col-6">
                <label for="nisn" class="form-label"><b>NISN</b></label>
                
                <input type="text" class="form-control" id="nisn" name="nisn">
                <hr>
            </div>
            <div class="mb-3 col-6">
                <label for="gender" class="form-label"><b>Gender</b></label>
                
                <select name="gender" class="form-select">
                    <option selected>Pilih Gender</option>
            
            </option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                    <option value="Perempuan">2D</option>
                </select>
                <hr>
            </div>
            <div class="mb-3 col-6">
                <label for="id_kelas" class="form-label"><b>Kelas</b></label>
                <select name="id_kelas" class="form-select">
                    <option selected>Pilih Kelas</option>
                    <?php foreach ($kelas as $row) : ?>
                    <option value="<?php echo $row->id ?>">
                        <?php echo $row->tingkat_kelas .''. $row->jurusan_kelas ?>
                    </option>
                    <?php endforeach ?>
                </select>
               <hr>
            </div>
           
          <center>
            <div class="mb-3 col-6">
            <label for="nama_sekolah" class="form-label"><b>Sekolah</b></label>
            <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah">

          
            <hr>
          </div></center>
          <input type="file" name="foto" />
                <div class="d-grid gap-2 d-md-block">
                    <hr>
         
<button type="submit" class="btn btn-sm btn-primary">Tambah</button>             
        </form>
    </div>
</body>
</html>