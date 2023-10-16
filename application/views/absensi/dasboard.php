<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center>
      <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
  <div class="card-header"><img src="https://o.remove.bg/downloads/ef17264e-67f6-48c1-abb1-d0894189110b/png-transparent-computer-icons-three-people-black-%D0%BD%D0%BE%D0%B2%D1%8B%D0%B5-%D0%BF%D1%80%D0%B0%D0%B2%D0%B8%D0%BB%D0%B0-user-removebg-preview.png" alt="" width="90" heigth="90"><b>Daftar Siswa</b></div>
  <div class="card-body"> 
 <p><?php echo $karyawan; ?></p>
 <a class="nav-link active" aria-current="page" href="<?php echo base_url('admin/siswa') ?>">Log Out</a>
  </div>
</div>
</center>
 <center>
<div class="card text-bg-secondary mb-3" style="max-width: 18rem;">
  <div class="card-header"><img src="https://o.remove.bg/downloads/5fb667ff-51e1-4ec7-ac06-315f74d737a8/png-transparent-computer-icons-woman-female-businessman-love-people-logo-removebg-preview.png" alt="" width="111" heigth="111"><b>Daftar Guru</b></div>
  <div class="card-body"> 
  <p><?php echo $absensi; ?></p>
               <a class="nav-link active" aria-current="page" href="<?php echo base_url('admin/guru') ?>">Log Out</a>
        
  </div>
</div>
</center>
</body>
</html>