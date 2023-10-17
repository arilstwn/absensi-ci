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
        background-color: #0a0a0a;

    }  */
     {
        display: flex;

        margin: 0;
        min-height: 20px;
        background-color: #25a7c1;

    } 
    

    #sidebar {
        background-color: #44484e;

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
                title: 'Apakah anda yakin untuk menghapus data ini?',
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
                        window.location.href = "<?php echo base_url('absensi/hapus_absensi/')?>" + id;
                    });
                }
            });
        }
        </script>
</head>

<body id="jam"  class="flex h-screen bg-gray">
  
       

  

    <!-- Sidebar -->
    
    <div id="sidebar" class="col-md-3 col-lg-2 d-md-block">
   
            <!-- <div>
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="" alt="user photo">
              </button>
            </div>
            <br> -->
      <span class="ml-3"> SISTEM INFORMASI</span>
      <hr>
      <!-- Home -->
      <a href="<?php echo base_url('absensi') ?>">
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
      
      <i class="bi-alarm" style="font-size: 2rem; color: cornflowerblue;"></i>
          <?php
       date_default_timezone_set("Asia/Bangkok");
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
            days   = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
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
          
           
        <!-- Log Out -->
    <a href="<?php echo base_url('absensi/') ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
           <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                    </svg>
                         <span class="flex-1 ml-3 whitespace-nowrap">Log out</span>

        </a>
        
</aside>
      </div>
      <div id="content" role="main">
        <header class="flex justify-between items-center p-4 bg-white border-b-2 border-gray-200">
            <h1 class="text-4xl">REKAP MINGGUAN </h1>
            <div class="flex items-center space-x-2">

            </div>
        </header>
        
       
     <br>
     <br>
   
                   
             <!-- Tbel Kryawan -->
             
             <a href="<?php echo base_url('admin/export_minggu') ?>" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M18 22a2 2 0 0 0 2-2v-5l-5 4v-3H8v-2h7v-3l5 4V8l-6-6H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12zM13 4l5 5h-5V4z"></path></svg>Export</a>
             <div class="card-body">
         <div class="row">
            <table class="table table-striped">

                <thead>
                <tr>
                                <th class="px-3 py-2 text-xs text-gray-500">NO</th>
                                <th class="px-3 py-2 text-xs text-gray-500">
                                    KEGIATAN
                                </th>
                                <th class="px-3 py-2 text-xs text-gray-500">TANGGAL</th>
                                <th class="px-3 py-2 text-xs text-gray-500">JAM MASUK</th>
                                <th class="px-3 py-2 text-xs text-gray-500">JAM PULANG</th>
                                <th class="px-3 py-2 text-xs text-gray-500">KETERANGAN IZIN</th>
                            </tr>
                </thead>
                <tbody>
                <?php $no=0; foreach ($absensi_mingguan as $absen): $no++ ?>
                            <tr class="whitespace-nowrap">
                                <td class="px-3 py-4 text-sm text-gray-500"><?php echo $no ?></td>
                                <td class="px-3 py-4">
                                    <div class="text-sm text-gray-900">
                                        <?php echo $absen['kegiatan']; ?>
                                    </div>
                                </td>
                                <td class="px-3 py-4">
                                    <div class="text-sm text-gray-900">
                                        <?php echo $absen['date']; ?>
                                    </div>
                                </td>
                                <td class="px-3 py-4">
                                    <div class="text-sm text-gray-900">
                                        <?php echo $absen['jam_masuk']; ?>
                                    </div>
                                </td>
                                <td class="px-3 py-4">
                                    <div class="text-sm text-gray-900">
                                        <?php echo $absen['jam_keluar']; ?>
                                    </div>
                                </td>
                                <td class="px-3 py-4">
                                    <div class="text-sm text-gray-900">
                                        <?php echo $absen['keterangan_izin']; ?>
                                    </div>
                                </td>
                            </tr>
                   
                    <?php endforeach ?>
                    
                </tbody>
                
            </table>
        </div>
        
    </div>
   
                   
                                        

                 
                                 

                                     
                                     
                 

</div>


    
</body>

</html>