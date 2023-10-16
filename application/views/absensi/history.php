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
      <a href="<?php echo base_url('absensi') ?>">
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                     <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
                          </svg>
                               <span class="flex-1 ml-3 whitespace-nowrap">Admin</span>
     </a>
     <!-- Karyawan -->
     <a href="<?php echo base_url('absensi/karyawan') ?>">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
               <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                    </svg>
                          <span class="flex-1 ml-3 whitespace-nowrap">Karyawan</span>
        </a>
        <!-- Absensi -->
    <a href="<?php echo base_url('absensi/history') ?>">
    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9V168c0 13.3 10.7 24 24 24H134.1c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24V256c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65V152c0-13.3-10.7-24-24-24z"/></svg>

                                   <span class="flex-1 ml-3 whitespace-nowrap">History</span>
      </a>
      </a>
        <!-- Absensi -->
    <a href="<?php echo base_url('absensi/absensi') ?>">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-plus-fill" viewBox="0 0 16 16">
              <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z"/>
                   <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM8.5 6.5V8H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V9H6a.5.5 0 0 1 0-1h1.5V6.5a.5.5 0 0 1 1 0Z"/>
                        </svg>
                           <span class="flex-1 ml-3 whitespace-nowrap">Absensi</span>
      </a>
      <!-- Izin -->
      <a href="<?php echo base_url('absensi/izin') ?>">
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-align-bottom" viewBox="0 0 16 16">
               <rect width="4" height="12" x="6" y="1" rx="1"/>
                    <path d="M1.5 14a.5.5 0 0 0 0 1v-1zm13 1a.5.5 0 0 0 0-1v1zm-13 0h13v-1h-13v1z"/>
                         </svg>
                              <span class="flex-1 ml-3 whitespace-nowrap">Izin</span>
                              
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
            <h1 class="text-4xl">HISTORY KARYAWAN </h1>
            <div class="flex items-center space-x-2">

            </div>
        </header>
        
       
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
                        <th class="text-center"><b>Aksi</b></th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($absensi as $u) : ?>
                    <tr>
                        
                        <td class="text-center"><b><?php echo $no++ ?></b></td>
                        <td class="text-center"><b><?php echo $u->id_karyawan ?></b></td>
                        <td class="text-center"><b><?php echo $u->kegiatan ?></b></td>
                        <td class="text-center"><b><?php echo $u->date ?></b></td>
                        <td class="text-center"><b><?php echo $u->jam_masuk ?></b></td>
                        <td class="text-center"><b><?php echo $u->jam_keluar ?></b></td>
                        <td class="text-center"><b><?php echo $u->keterangan_izin ?></b></td>
                        <td class="text-center"> 
                        <a  class="btn btn-primary" href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                     <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg></a>

                   
                                        <button onclick="hapus(<?php echo $u->id ?>)" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"   class="bi bi-trash" viewBox="0 0 16 16">
                                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                          <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                             </svg></button>

                                       


                    <a class="btn btn-warning" href="<?php echo base_url('auth/login') ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" fill="currentColor" class="bi bi-person-walking" viewBox="0 0 17 16">
                                             <path d="M9.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM6.44 3.752A.75.75 0 0 1 7 3.5h1.445c.742 0 1.32.643 1.243 1.38l-.43 4.083a1.75 1.75 0 0 1-.088.395l-.318.906.213.242a.75.75 0 0 1 .114.175l2 4.25a.75.75 0 1 1-1.357.638l-1.956-4.154-1.68-1.921A.75.75 0 0 1 6 8.96l.138-2.613-.435.489-.464 2.786a.75.75 0 1 1-1.48-.246l.5-3a.75.75 0 0 1 .18-.375l2-2.25Z"/>
                                                <path d="M6.25 11.745v-1.418l1.204 1.375.261.524a.75.75 0 0 1-.12.231l-2.5 3.25a.75.75 0 1 1-1.19-.914l2.345-3.048Zm4.22-4.215-.494-.494.205-1.843a1.93 1.93 0 0 0 .006-.067l1.124 1.124h1.44a.75.75 0 0 1 0 1.5H11a.75.75 0 0 1-.531-.22Z"/>
                                                   </svg>


                    </a>

                        
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