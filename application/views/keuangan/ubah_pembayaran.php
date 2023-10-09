<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
          background-image: url('https://img.lovepik.com/background/20211022/medium/lovepik-purple-gradient-geometric-background-image_401945293.jpg');
          background-repeat: no-repeat;
          background-attachment: fixed; 
          background-size: 100% 100%;
        }
       </style>
        <style>
        
        div {
          background-image: url('https://img.freepik.com/vector-gratis/lineas-violeta-fondo-abstracto-semitono_23-2148582763.jpg');
          background-repeat: no-repeat;
          background-attachment: fixed; 
          background-size: 100% 100%;
        }
       </style>
</head>

<body class="min-vh-100 d-flex align-items-center">
    <div class="card w-50 m-auto p-3">
        <h3 class="text-center"><b>Ubah Pembayaran</b></h3>
        <hr>
        
        <?php foreach ($pembayaran as $row) : ?>
        <form action="<?php echo base_url('keuangan/aksi_ubah_pembayaran') ?>"
        enctype="multipart/form-data"
        method="post" class="row">
        <input name="id" type="hidden" value="<?php echo $row->id ?>">
        <div class="mb-3 col-6">
                <label for="siswa" class="form-label"><b>Siswa</b></label>
                <select name="id_siswa" class="form-select">
                    <option selected>Pilih Siswa</option>
                    <?php foreach ($siswa as $row) : ?>
                    <option value="<?php echo $row->id_siswa ?>">
                        <?php echo $row->nama_siswa ?>
                    </option>
                    <?php endforeach ?>
                </select>
               <hr>
            </div>
            <div class="mb-3 col-6">
                <label for="jenis_pembayaran" class="form-label"><b>Jenis Pembayaran</b></label>
                <select name="jenis_pembayaran" class="form-select" value="<?php echo $row->jenis_pembayaran ?>">
                    <option selected>Pilih Jenis Pembayaran</option>
            
            </option>
                    <option value="Pembayaran_SPP">Pembayaran SPP</option>
                    <option value="Pembayaran_Uang_Gedung">Pembayaran Uang Gedung</option>
                    <option value="Pembayaran_Seragam">Pembayaran Seragam</option>
                </select>
                <hr>
            </div>
            <div class="mb-3 col-6">
            <label for="total_pembayaran" class="form-label"><b>Total Pembayaran</b></label>
            <input type="text" class="form-control" id="total_pembayaran" placeholder="O shiharai sōgaku o nyūryoku shite kudasai" name="total_pembayaran">
             <hr>
          </div>
          <div class="mb-3 col-6">
                <label for="kelas" class="form-label"><b>Kelas</b></label>
                <select name="id_kelas" class="form-select">
                    <option selected>Pilih Kelas</option>
                    <?php foreach ($siswa as $row) : ?>
                    <option value="<?php echo $row->id_kelas ?>">
                        <?php echo $row->id_kelas ?>
                    </option>
                    <?php endforeach ?>
                </select>
               <hr>
            </div>
          <div class="flex justify-content-between">
                    <div>
                        <a href="<?php echo base_url('keuangan/pembayaran'); ?>"
                            class=" flex items-center p-2 m-10 w-auto bg-red-500 hover:bg-red-700 text-white font-bold py-2  rounded w-7/6">
                            <span>Kembali</span>
                        </a>
                    </div>
                    <div>
                        <button type="submit"
                            class="flex items-center p-2 m-10 w-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2  rounded w-7/6"
                            name=" submit">Confirm</button>
                    </div>
                </div>        
                        </form>
                        <?php endforeach; ?>
</body>

</html>