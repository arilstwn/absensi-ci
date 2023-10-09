
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
        <h3 class="text-center"><b>Tambah Pembayaran</b></h3>
        <hr>
        <form action="<?php echo base_url('keuangan/aksi_tambah_pembayaran') ?>" method="post" class="row">
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
                
                <select name="jenis_pembayaran" class="form-select">
                    <option selected>Pilih Jenis Pembayaran</option>
            
      
                    <option value="pembayaran_SPP">Pembayaran SPP</option>
                    <option value="Pembayaran_uang_gedung">Pembayaran Uang Gedung</option>
                    <option value="Pembayaran_seragam">Pembayaran Seragam</option>
                </select>
                <hr>
            </div>
           
            <div class="mb-3 col-6">
            <label for="total_pembayaran" class="form-label"><b>Total Pembayaran</b></label>
            <input type="text" class="form-control" id="total_pembayaran" placeholder="O shiharai sōgaku o nyūryoku shite kudasai" name="total_pembayaran">
             <hr>
          </div>
          <div class="mb-3 col-6">
                <label for="id" class="form-label"><b>Kelas</b></label>
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
            <input type="file" name="foto" />
                <div class="d-grid gap-2 d-md-block">
                    <hr>
                    <br>
                   
                </div>
<button type="submit" class="btn btn-sm btn-primary">Tambah</button>             
        </form>
    </div>
</body>
</html>