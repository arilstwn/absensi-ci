<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
   
   
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    
    <style>
     body {
        display: flex;

        margin: 0;
        min-height: 100vh;
        background-color: #37abc3;

    } 
     /* tr {
        display: flex;

        margin: 0;
        min-height: 10vh;
        background-color: #23a3aa;

    }  */
     {
        display: flex;

        margin: 0;
        min-height: 20px;
        background-color: #25a7c1;

    } 
    

    #sidebar {
        background-color: #208991;

        color: #ffffff;
        height: 100%;
        width: 250px;
        position: fixed;
        left: 0;
        top: 0;
        transition: 0.3s;
        padding-top: 20px;
    }

    #sidebar a {
        padding: 10px 15px;
        text-decoration: none;
        color: #ffffff;
        display: block;
    }

    #sidebar a:hover {
        background-color: black;

    }

    #content {
        flex: 1;
        margin-left: 250px;
        transition: 0.3s;
        padding: 20px;
    }

    @media screen and (max-width: 788px) {
        #sidebar {
            width: 100%;
            position: static;
            height: auto;
            margin-bottom: 20px;
        }

        #content {
            margin-left: 0;
        }
    }

    /* a {
        padding: 10px 15px;
        text-decoration: none;
        color: #ffffff;
        display: block;
    } */
    </style>
     <script type="text/javascript">
        window.onload = function() {jam();}
        
        function jam() {
            var a = document.getElementById('jam'),
            d = new Date(), h, s,;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());

            a.innerHTML = h + ":" + m ":" + s;

            setTimecut{'jam()', 1000};

        }

        function set(o) {
            a = a < 10 ? '0' + a : a;
            return a;
        }
    </script>
    <!-- <style> 
p {
  width: 300px;
  height: 100px;
  padding: 20px;
  background-color: red;
  box-shadow: 10px 15px;
}
</style> -->
<script>
    <?php
if (isset($_POST['submit'])) {
    // Contoh validasi sederhana
    $nama = $_POST['nama'];
    if (empty($nama)) {
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Kesalahan',
            text: 'Nama tidak boleh kosong',
            confirmButtonText: 'OK'
        });</script>";
    } else {
        // Lanjutkan dengan pemrosesan data jika data valid
        // ...
    }
}
?>
</script>

 <script>
        function hapus(id) {
            swal.fire({
                title: 'Yakin untuk menghapus data ini?',
                text: "Data ini akan terhapus permanen",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Dihapus',
                        showConfirmButton: false,
                        timer: 1500,

                    }).then(function() {
                        window.location.href = "<?php echo base_url('absensi/hapus_karyawan/')?>" + id;
                    });
                }
            });
        }
        </script>
</head>

<body id="jam"  class="flex h-screen bg-gray">
  
       

  

    <!-- Sidebar -->
    
    <div id="sidebar" class="col-md-3 col-lg-2 d-md-block">
   
      <span class="ml-3"> SISTEM INFORMASI</span>
      <hr>
      <!-- Home -->
      <a href="<?php echo base_url('admin/dasboard') ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                 <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
                      </svg>
                           <span class="flex-1 ml-3 whitespace-nowrap">Home</span>
        </a>
      <!-- Admin -->
      <a href="<?php echo base_url('admin/rekap_h') ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-fill" viewBox="0 0 16 16">
          <path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z"/>
            </svg>
                               <span class="flex-1 ml-3 whitespace-nowrap">Rekap Harian</span>
     </a>
     <!-- Karyawan -->
     <a href="<?php echo base_url('admin/rekap_m') ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-fill" viewBox="0 0 16 16">
         <path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z"/>
           </svg>
                          <span class="flex-1 ml-3 whitespace-nowrap">Rekap Mingguan</span>
        </a>
        <!-- Absensi -->
    <a href="<?php echo base_url('admin/rekap_b') ?>">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-fill" viewBox="0 0 16 16">
        <path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z"/>
          </svg>

                                   <span class="flex-1 ml-3 whitespace-nowrap">Rekap Bulanan</span>
      </a>
      </a>
      </a>
      <!-- Profil -->
         <a href="<?php echo base_url('absensi/profil') ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                     <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                          </svg>
                               <span class="flex-1 ml-3 whitespace-nowrap">Edit Profil</span>
     </a>

     
     
     
     <i class="bi-alarm" style="font-size: 2rem; color: cornflowerblue;"></i>
     <?php
       date_default_timezone_set("Asia/jakarta");
       ?>

<script type="text/javascript">
  function date_time(id)
        {
          date   = new Date;
          year   = date.getFullYear(); 
          month  = date.getMonth();
          months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
          d      = date.getDate();
            day    = date.getDay();
            days   = new Array('January', 'indonesia', 'March', 'April', 'May', 'Juni', 'jully');
            h      = date.getHours();
            if(h<10)
            {
              h = "0"+h;
            }
            m = date.getMinutes();
            if(m<10)
            {
              m = "0"+m;
            }
            s = date.getSeconds();
            if(s<10)
            {
                                  s = "0"+s;
                                }
                                result = ''+days[day]+' '+d+' '+months[month]+' '+year+' '+h+':'+m+':'+s;
                                document.getElementById(id).innerHTML = result;
                                setTimeout('date_time("'+id+'");','1000');
                                return true;
                              }
                              </script>

<span id="date_time"></span>
<script type="text/javascript">window.onload = date_time('date_time');</script>


<aside id="separator-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
              <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
                <ul class="space-y-2 font-medium">
                  </svg>
                  <hr>
                  
                  
                  
                  
                  <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"> 
                    
                    </a>
                    
                    
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                      
                      
                      </a>
                      
                      
                      
                      <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        
                        
                        </a>
                        
                        
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        
                      
                        
                        
                      
   
                <a class="btn btn-lg   " onclick=" logout(id)">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
       <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
           </svg>
                         <span class="link-name">Log Out</span>
                     </a>
      
                 




        </a>
        
</aside>
      </div>
     
      <div id="content" role="main">
        <header class="flex justify-between items-center p-4 bg-white border-b-2 border-gray-200">
          <h1 class="text-4xl">DASHBOARD ADMIN
         </h1>
          
         
            <div class="flex items-center space-x-2">

            </div>
        </header>
        <br>
        <br>
        
        
       
     
    <!-- Dasboard -->
    
  
    <section>
        <center>
        
    <div class="card mb-4 shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="card shadow bg-D8D9DA text-black shadow border-10 rounded">
                                    <h3><b>Data karyawan</b></h3>
                                    <hr>
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="fas fa-user mr-2" style="font-size: 60px;"></i>
                                            </div>
                                            <div class="ml-auto"></div>
                                        <br>
                                        <span style="font-size: 24px;">
                                            <b><?php echo $absensi ?></b>
                                        </span>
                                    </div>
                                    <hr>
                                    <a href="<?php echo base_url('absensi/index') ?>">Lihat Detail</a><br>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card shadow bg-D8D9DA text-black shadow border-10 rounded">
                                    <h3><b>Data Izin</b></h3>
                                    <hr>
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="fas fa-user-tie mr-2" style="font-size: 60px;"></i>
                                        </div>
                                        <div class="ml-auto"></div>
                                        <span style="font-size: 24px;">
                                            <b><?php echo $karyawan?></b>
                                        </span>
                                    </div>
                                    <hr>
                                    <a href="<?php echo base_url('absensi/history') ?>">Lihat Detail</a><br>
                                    </div>
                                </div>
                                                            
                              
                                                    </center>

                                             
   <br>
   <br>

                   
             <!-- Tbel Kryawan -->
           
           
             <div class="card-body">
         <div class="row">
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th class="text-center"><b>No</b></th>
                        <th class="text-center"><b>Id Karyawan</b></th>
                        <th class="text-center"><b>Kegiatan</b></th>
                        <th class="text-center"><b>Date</b></th>
                        <th class="text-center"><b>Jam Msuk</b></th>
                        <th class="text-center"><b>Jam Keluar</b></th>
                        <th class="text-center"><b>Keterangan Izin</b></th>
                        <th class="text-center"><b>Status</b></th>
                      
                       
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0; foreach ($data as $u) : ?>
                    <tr>
                        
                        <td class="text-center"><b><?php echo $no++ ?></b></td>
                        <td class="text-center"><b><?php echo $u->id_karyawan ?></b></td>
                        <td class="text-center"><b><?php echo $u->kegiatan ?></b></td>
                        <td class="text-center"><b><?php echo $u->date ?></b></td>
                        <td class="text-center"><b><?php echo $u->jam_masuk ?></b></td>
                        <td class="text-center"><b><?php echo $u->jam_keluar ?></b></td>
                        <td class="text-center"><b><?php echo $u->keterangan_izin ?></b></td>
                        <td class="text-center"><b><?php echo $u->status ?></b></td>
                        <td class="text-center"> 
                     

                        
                        </td>
                    </tr>
                   
                    <?php endforeach ?>
                    
                </tbody>
                
            </table>
        </div>
        
    </div>
   
                   









<hr>
                            <!-- <a href="<?php echo base_url('absensi/export') ?>" class="btn btn-success">Export</a> -->
                            <!-- <a href="<?php echo base_url('absensi/export') ?>" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M18 22a2 2 0 0 0 2-2v-5l-5 4v-3H8v-2h7v-3l5 4V8l-6-6H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12zM13 4l5 5h-5V4z"></path></svg>Export</a> -->
                            <!-- Data Modal -->
                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                   Modal
                                  </button> -->
                                  <!-- <form class="mt-5" method="post" enctype="multipart/form-data" 
         action="<?= base_url('absensi/import') ?>">
       <input type="file" name="file"/>
       <button type="submit" class="btn btn-outline-success" name="submit">Import</button>
       <div class="d-grid gap-2 d-md-block"></div>
        <hr>
 
       </form> -->
                           <br>
                          
                           <!-- Export -->
                        <!-- Tbel Kryawan -->
                     
    
</body>
<script>
function logout(id) {
    swal.fire({
        title: ' Yakin Ingin Log Out',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Log Out'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: 'success',
                title: 'Log Out',
                showConfirmButton: false,
                timer: 1500,

            }).then(function() {
                window.location.href = "<?php echo base_url('auth/logout/')?>" + id;
            });
        }
    });
}
</script>
</html>