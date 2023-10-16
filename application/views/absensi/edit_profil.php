<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    
    
    <style>
     body {
        display: flex;

        margin: 0;
        min-height: 100vh;
        background-color: #656565;

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
* {
    margin: 0;
    padding: 0
}

body {
    background-color: #000
}

.card {
    width: 350px;
    background-color: #efefef;
    border: none;
    cursor: pointer;
    transition: all 0.5s;
}

.image img {
    transition: all 0.5s
}

.card:hover .image img {
    transform: scale(1.5)
}

.btn {
    height: 140px;
    width: 140px;
    border-radius: 50%
}

.name {
    font-size: 22px;
    font-weight: bold
}

.idd {
    font-size: 14px;
    font-weight: 600
}

.idd1 {
    font-size: 12px
}

.number {
    font-size: 22px;
    font-weight: bold
}

.follow {
    font-size: 12px;
    font-weight: 500;
    color: #444444
}

.btn1 {
    height: 40px;
    width: 150px;
    border: none;
    background-color: #000;
    color: #aeaeae;
    font-size: 15px
}

.text span {
    font-size: 13px;
    color: #545454;
    font-weight: 500
}

.icons i {
    font-size: 19px
}

hr .new1 {
    border: 1px solid
}

.join {
    font-size: 14px;
    color: #a0a0a0;
    font-weight: bold
}

.date {
    background-color: #ccc
}
</script>

</head>

<body id="jam">
  
       

  

    <!-- Sidebar -->
    <div id="sidebar" class="col-md-3 col-lg-2 d-md-block">
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
    <a href="<?php echo base_url('absensi/absensi') ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fingerprint" viewBox="0 0 16 16">
           <path d="M8.06 6.5a.5.5 0 0 1 .5.5v.776a11.5 11.5 0 0 1-.552 3.519l-1.331 4.14a.5.5 0 0 1-.952-.305l1.33-4.141a10.5 10.5 0 0 0 .504-3.213V7a.5.5 0 0 1 .5-.5Z"/>
               <path d="M6.06 7a2 2 0 1 1 4 0 .5.5 0 1 1-1 0 1 1 0 1 0-2 0v.332c0 .409-.022.816-.066 1.221A.5.5 0 0 1 6 8.447c.04-.37.06-.742.06-1.115V7Zm3.509 1a.5.5 0 0 1 .487.513 11.5 11.5 0 0 1-.587 3.339l-1.266 3.8a.5.5 0 0 1-.949-.317l1.267-3.8a10.5 10.5 0 0 0 .535-3.048A.5.5 0 0 1 9.569 8Zm-3.356 2.115a.5.5 0 0 1 .33.626L5.24 14.939a.5.5 0 1 1-.955-.296l1.303-4.199a.5.5 0 0 1 .625-.329Z"/>
                   <path d="M4.759 5.833A3.501 3.501 0 0 1 11.559 7a.5.5 0 0 1-1 0 2.5 2.5 0 0 0-4.857-.833.5.5 0 1 1-.943-.334Zm.3 1.67a.5.5 0 0 1 .449.546 10.72 10.72 0 0 1-.4 2.031l-1.222 4.072a.5.5 0 1 1-.958-.287L4.15 9.793a9.72 9.72 0 0 0 .363-1.842.5.5 0 0 1 .546-.449Zm6 .647a.5.5 0 0 1 .5.5c0 1.28-.213 2.552-.632 3.762l-1.09 3.145a.5.5 0 0 1-.944-.327l1.089-3.145c.382-1.105.578-2.266.578-3.435a.5.5 0 0 1 .5-.5Z"/>
                       <path d="M3.902 4.222a4.996 4.996 0 0 1 5.202-2.113.5.5 0 0 1-.208.979 3.996 3.996 0 0 0-4.163 1.69.5.5 0 0 1-.831-.556Zm6.72-.955a.5.5 0 0 1 .705-.052A4.99 4.99 0 0 1 13.059 7v1.5a.5.5 0 1 1-1 0V7a3.99 3.99 0 0 0-1.386-3.028.5.5 0 0 1-.051-.705ZM3.68 5.842a.5.5 0 0 1 .422.568c-.029.192-.044.39-.044.59 0 .71-.1 1.417-.298 2.1l-1.14 3.923a.5.5 0 1 1-.96-.279L2.8 8.821A6.531 6.531 0 0 0 3.058 7c0-.25.019-.496.054-.736a.5.5 0 0 1 .568-.422Zm8.882 3.66a.5.5 0 0 1 .456.54c-.084 1-.298 1.986-.64 2.934l-.744 2.068a.5.5 0 0 1-.941-.338l.745-2.07a10.51 10.51 0 0 0 .584-2.678.5.5 0 0 1 .54-.456Z"/>
                           <path d="M4.81 1.37A6.5 6.5 0 0 1 14.56 7a.5.5 0 1 1-1 0 5.5 5.5 0 0 0-8.25-4.765.5.5 0 0 1-.5-.865Zm-.89 1.257a.5.5 0 0 1 .04.706A5.478 5.478 0 0 0 2.56 7a.5.5 0 0 1-1 0c0-1.664.626-3.184 1.655-4.333a.5.5 0 0 1 .706-.04ZM1.915 8.02a.5.5 0 0 1 .346.616l-.779 2.767a.5.5 0 1 1-.962-.27l.778-2.767a.5.5 0 0 1 .617-.346Zm12.15.481a.5.5 0 0 1 .49.51c-.03 1.499-.161 3.025-.727 4.533l-.07.187a.5.5 0 0 1-.936-.351l.07-.187c.506-1.35.634-2.74.663-4.202a.5.5 0 0 1 .51-.49Z"/>
                               </svg>
                                   <span class="flex-1 ml-3 whitespace-nowrap">History</span>
      </a>
      <!-- Izin -->
      <a href="<?php echo base_url('#') ?>">
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
            <h1 class="text-4xl">UPDATE FOTO PROFIL</h1>
            <div class="flex items-center space-x-2">

            </div>
        </header>
        <br>
        <br>
        <br>
        <div class="card m-auto p-5">

<br>

<div>
  <center>
  <?php $this->session->flashdata('message') ?></div>
<div class="kontol">
    <center>
        <button class="border border-0 btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <?php if (!empty($row->foto)): ?>
            <img class="rounded-circle" height="150" width="150" src="<?php echo base64_decode($row->foto);?>">
            <?php else: ?>
            <img class="rounded-circle" height="150" width="150"
                src="https://image.civitai.com/xG1nkqKTMzGDvpLrqFT7WA/702e5bd2-3dfb-4bf3-bbd3-07e4f6a112a4/width=450/19389-34987464-(masterpiece_1.6,%20best%20quality),%20(finely%20detailed%20beautiful%20eyes_%201.2),%20%20phelaina,%20Eouftit3,%20%20Eof3,%201girl,%20elaina%20(majo%20no%20tabit.jpeg" />
            <?php endif;?>
        </button>
    </center>
    <br>
    <br>
    <br>
    <br>
            </center>
    <form method="post" action="<?php echo base_url('admin/aksi_ubah_akun') ?>" enctype="multipart/form_data">
        <input name="id_siswa" type="hidden">
        <div class="d-flex flex-row ">

            <div class="p-2 col-6">
                <label for="" class="form-label fs-5 ">Email </label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="p-2 col-6">
                <label for="" class="form-label fs-5">Username </label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>
        </div>
        <br>
        <br>
        <center>
        <div class="d-flex flex-row ">
            <div class="p-2 col-6 >
            <label for=" nama="" class="form-label fs-5">Password Baru </label>
                <input type="text" class="form-control" id="password_baru" name="password_baru"
                    placeholder="Password Baru" value=>
            </div>
            <div class="p-2 col-6 >
            <label for=" nama="" class="form-label fs-5"> Konfirmasi password</label>
                <input type="text" class="form-control" id="password_konfirmasi" name="password_konfirmasi"
                    placeholder="Konfirmasi Paswword" value=>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Foto Profile</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="container w-75 m p-3">
                        <form method="post" action="<?php echo base_url('admin/upload_image'); ?>"
                            enctype="multipart/form-data" class="row">
                            <div class="mb-3 col-12">
                                <label for="nama" class="form-label">Foto:</label>
                                <input type="hidden" class="form-control" id="id" name="id"
                                    value="<?php echo $this->session->userdata('id'); ?>">
                                <input type="hidden" name="base64_image" id="base64_image">
                                <input class="form-control" type="file" name="userfile" id="userfile"
                                    accept="image/*">
                            </div>
                            <div class="col-12 text-end">
                                <input type="submit" class="btn btn-sm btn-primary px-3" name="submit"
                                    value="Ubah Foto"></input>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-danger" href="<?php echo base_url('admin/hapus_image'); ?>">Hapus
                            Foto</a>
                    </div>

                </div>

            </div>



            </cennter>



        </div>
        <div class="flex justify-content-between">
            <div>
                <a href="<?php echo base_url('absensi/profil'); ?>"
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
   
</div>
</section>
</body>
</html>