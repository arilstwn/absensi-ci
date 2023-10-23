<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
    body {
        display: flex;
        margin: 0;
        min-height: 100vh;
        background-color: #39c9c9;
    }
    #sidebar {
        background-color: #208991;
        color: #fff;
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
        color: #fff;
        display: block;
        font-size: 20px;
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
    .card {
        text-align: center;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
        border-radius: 5px;
    }
    .profile-details {
        background: none;
    }
    .profile-details {
        width: 78px;
    }
    .profile-details img {
        height: 52px;
        width: 52px;
        object-fit: cover;
        border-radius: 20px;
        background: #e4e4e4;
    }
    .profile-details .profile_name,
    .profile-details .job {
        color: #5edaee;
        font-size: 18px;
    }
    .profile-details .job {
        font-size: 12px;
    }
    /* CSS untuk card */
    .card {
        border: 1px solid #66f5ff;
        border-radius: 10px;
        max-width: 1200px;
        text-align: center;
    }
    /* CSS untuk gambar profil */
    .card img {
        width: 100px;
        /* Sesuaikan ukuran gambar profil sesuai kebutuhan Anda */
        height: 100px;
        object-fit: cover;
        border: 2px solid #66fffa;
        border-radius: 50%;
        margin-bottom: 10px;
    }
    /* CSS untuk judul card (username) */
    .card h5 {
        margin: 0;
        font-size: 1.5em;
    }
    /* CSS untuk informasi tambahan */
    .card p {
        font-size: 1em;
        color: #555;
    }
    /* CSS untuk membuat tata letak responsif */
    @media (max-width: 767px) {
        /* Misalnya, pada layar dengan lebar kurang dari atau sama dengan 767px */
        .card {
            max-width: 100%;
            /* Lebar kartu akan mengisi seluruh lebar tata letak */
        }
        .card img {
            width: 80px;
            /* Ukuran gambar profil lebih kecil pada layar kecil */
            height: 80px;
        }
        .card p {
            font-size: 10px;
            /* Ukuran font lebih kecil pada layar kecil */
        }
    }
    </style>
</head>
<body>
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

<!-- Karyawan -->
<a href="<?php echo base_url('absensi/karyawan') ?>">
 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
      <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
           </svg>
                 <span class="flex-1 ml-3 whitespace-nowrap">Karyawan</span>
</a>

</li>
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
<br>
<br>


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
                <?php echo $this->session->flashdata('sukses') ?>
                <?php echo $this->session->flashdata('message') ?>
                <div class="card mb-4 shadow">
                    <div class="card-body d-flex text-white justify-content-between align-items-center"
                        style="background-color:#2ab3ac">
                        <h1>Profile</h1>
                     
                  
                    <img src="https://media.tenor.com/VtFUW-durpoAAAAC/kururin-kuru-kuru.gif" />
                   
              
                    </div>
                                            </div>
             
                                            <div class="overview shadow-lg p-1 mb-3 bg-body rounded">
                <section class="card-body text-center">
                    <div class="home-content">
                    </div>
                    <div class="card">
                        <div class="card-body text-center">
                        <div><?php $this->session->flashdata('message') ?></div>
                        <?php $this->session->flashdata('message') ?></div>
              <div class="row d-flex">
                  <div class="row d-flex">
                  <center>
                   <button class="border border-0 btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <?php if (!empty($row->images)): ?>
                    <img class="rounded-circle" height="150" width="150" src="<?php echo $row->foto;?>">
                    <?php else: ?>
                    <img class="rounded-circle" height="150" width="150"
                        src="https://i.pinimg.com/originals/ca/df/24/cadf2484ff610b5bfbd3debcdb9debaf.jpg" />
                    <?php endif;?>
                </button>
               
                <form method="post" action="<?php echo base_url('absensi/edit_foto') ?>" enctype="multipart/form_data">
           
                    <div class="d-flex flex-row ">  
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
                                      
                                    </div>
                                    
                                </div>
                            </div>
                         
                        </div>
                        </div>
                        
                    </form>
                    
                </center>
                
             
                
                
                <!-- <div class="flex justify-content-center"> -->
                    
                    <!-- </div> -->
                    <h5 class="card-title">
                        <?php echo $this->session->userdata('username'); ?>
                    </h5>
                    
                    <p class="card-text">
                        <?php echo $this->session->userdata('email'); ?>
                    </p>
                    <p class="card-text">***********</p>
                    <!-- Tampilkan tanda bintang atau karakter lain sebagai ganti password -->
                    <!-- Tambahkan tombol "Ubah" pada halaman profil -->
                    
             
                </div>
                
            </div>
           
                <section class="home-section">
                    <div class="home-content">

                    </div>
                    <div class="card">
                        <div class="card-body text-center">
                            <form action="<?= base_url('absensi/aksi_profil'); ?>" method="post">
                                <div class="mb-8">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="Username Anda">
                                </div>
                                <div class="mb-8">
                                    <label for="nama_depan" class="form-label">Nama Depan</label>
                                    <input type="text" class="form-control" id="nama_depan" name="nama_depan"
                                        placeholder="Nama Depan Anda">
                                </div>
                                <div class="mb-8">
                                    <label for="nama_belakang" class="form-label">Nama Belakang</label>
                                    <input type="text" class="form-control" id="nama_belakang" name="nama_belakang"
                                        placeholder="Nama Belakang Anda">
                                </div>
                                <div class="mb-8">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="email@anda.com">
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="password_baru" class="form-label">Password Baru</label>
                                    <input type="password" class="form-control" id="password_baru" name="password_baru"
                                        placeholder="Masukan Password Baru">
                                </div>
                                <div class="mb-3">
                                    <label for="konfirmasi_password" class="form-label">Konfirmasi Password
                                        Baru</label>
                                    <input type="password" class="form-control" id="konfirmasi_password"
                                        name="konfirmasi_password" placeholder="Konfirmasi Password Baru">
                                </div> -->
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <a href="<?php echo base_url('absensi/profil') ?>" class="btn btn-danger">Kembali</a>
                            </form>
                        </div>
                    </div>
            </div>
        </div>

        </section>
        <br>
        <br>
        <div class="overview shadow-lg p-1 mb-3 bg-body rounded">


<div class="title ">
    <span class="text ">Password</span>

</div>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="overflow-auto" style="white-space: nowrap;">

                <form action="<?php echo base_url('absensi/ubah_password'); ?>"
                    enctype="multipart/form-data" method="post">
                    <div class="overview shadow-lg p-1 mb-3 bg-body rounded">
                        <div class="d-flex form-outline flex-fill mb-0  ">
                            <input type="password" name="password_lama" id="password1"
                                class="form-control relaltive" placeholder="Password Lama">

                            <button type="button" id="showPassword1"
                                onclick="togglePasswordVisibility('password1')"
                                class="far fa-eye-slash absolute p-2"></button>





                            <input type="password" name="konfirmasi_password" id="password2"
                                class="form-control relative" placeholder="Konfirmasi Password">
                            <button type="button" id="showPassword2"
                                onclick="togglePasswordVisibility('password2')"
                                class="far fa-eye-slash absolute p-2"></button>



                        </div><br>
                        <div class="d-flex form-outline flex-fill col-6  ">
                            <input type="password" name="password_baru" id="password3"
                                class="form-control relaltive" placeholder="Password Baru">

                            <button type="button" id="showPassword3"
                                onclick="togglePasswordVisibility('password3')"
                                class="far fa-eye-slash absolute p-2"></button>









                        </div>

                        <p>*Password harus memiliki 8 angka</p>
                    </div>


                    <div class="d-flex p-2 row justify-content-evenly ">
                        <button type="submit" class="btn btn-sm btn-dark col-5" name=" submit">Ubah
                            Password</button>


                    </div>

                    <br>

                </form>



            </div>
        </div>
    </div>
</div>
</div>
</section>




        <script>
        const arrows = document.querySelectorAll(".arrow");

        arrows.forEach((arrow) => {
            arrow.addEventListener("click", (e) => {
                const arrowParent = e.target.closest(".arrow").parentElement.parentElement;
                arrowParent.classList.toggle("showMenu");
            });
        });

        const sidebar = document.querySelector(".sidebar");
        const sidebarBtn = document.querySelector(".fa-bars");

        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <!-- LOGOUT -->
        <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Yakin mau LogOut?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?php echo base_url('auth/login') ?>";
                }
            });
        }
        </script>
        <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            var content = document.getElementById("content");
            sidebar.style.width = sidebar.style.width === "250px" ? "0" : "250px";
            content.style.marginLeft = content.style.marginLeft === "250px" ? "0" : "250px";
        }
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
             
        </section>
        <!-- <a href="<?php echo base_url('absensi/edit_profil') ?>" class="btn btn-danger">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path><path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path></svg> Ubah Profile</a> -->
                

                    
                    
                    
                    
        <script>
        const arrows = document.querySelectorAll(".arrow");
        arrows.forEach((arrow) => {
            arrow.addEventListener("click", (e) => {
                const arrowParent = e.target.closest(".arrow").parentElement.parentElement;
                arrowParent.classList.toggle("showMenu");
            });
        });
        const sidebar = document.querySelector(".sidebar");
        const sidebarBtn = document.querySelector(".fa-bars");
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <!-- LOGOUT -->
        <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Yakin mau LogOut?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?php echo base_url('auth/login') ?>";
                }
            });
        }
        </script>
        <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            var content = document.getElementById("content");
            sidebar.style.width = sidebar.style.width === "250px" ? "0" : "250px";
            content.style.marginLeft = content.style.marginLeft === "250px" ? "0" : "250px";
        }
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        
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