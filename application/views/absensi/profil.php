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
        background-color: #185b58;
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
        color: #6699ff;
        font-size: 18px;
    }
    .profile-details .job {
        font-size: 12px;
    }
    /* CSS untuk card */
    .card {
        border: 1px solid #6699ff;
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
        border: 2px solid #6699ff;
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
    <div class="container-fluid">
        <div class="row">
            <div id="sidebar" class="col-md-3 col-lg-2 d-md-block">
                <h3> <i class="fas fa-chart-line mr-2"></i></h3>
                <a href="<?php echo base_url('karyawan') ?>"><i class="fas fa-user-tag mr-2"></i>
                   
                </a>
                <a href="<?php echo base_url('karyawan/history') ?>"><i class="fas fa-file mr-2"></i>
                  
                </a>
                <a href="<?php echo base_url('karyawan/menu_absen') ?>"><i class="fas fa-calendar-check mr-2"></i>
                    
                </a>
                <a href="<?php echo base_url('karyawan/menu_izin') ?>"><i class="fas fa-user-check mr-2"></i>
                   
                </a>
                <a href="<?php echo base_url('karyawan/profile') ?>"><i class="fas fa-user mr-2"></i>
                    
                </a>
                <a type="button" onclick="confirmLogout()">
                    <i class="fas fa-sign-out-alt text-danger">LogOut</i>
                </a>
            </div>

            
            <div id="content" role="main">
                <div class="card mb-4 shadow">
                    <div class="card-body d-flex text-white justify-content-between align-items-center"
                        style="background-color:#1D267D">
                        <h1>Profile</h1>
                    </div>
             
                <section class="home-section">
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
                    <img class="rounded-circle" height="150" width="150" src="<?php echo base64_decode($row->foto);?>">
                    <?php else: ?>
                    <img class="rounded-circle" height="150" width="150"
                        src="https://i.pinimg.com/1200x/6d/59/5d/6d595dee730e6d73a78f866f386f9a3c.jpg" />
                    <?php endif;?>
                </button>
                <form method="post" action="<?php echo base_url('absensi/upload_image') ?>" enctype="multipart/form_data">
           
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
                <a href="<?php echo base_url('') ?>" class="btn btn-primary">Edit
                    
                <a href="<?php echo base_url('absensi/edit_profil') ?>" class="btn btn-danger">Ubah
                    Profile</a>
                    
                    
                    
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
                    window.location.href = "<?php echo base_url('/') ?>";
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
</html>