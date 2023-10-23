<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />


    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Profile</title>
</head>
<style>
/* ===== Google Font Import - Poppins ===== */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

:root {
    /* ===== Colors ===== */
    --primary-color: #0E4BF1;
    --panel-color: #FFF;
    --text-color: #000;
    --black-light-color: #707070;
    --border-color: #e6e5e5;
    --toggle-color: #DDD;
    --box1-color: #4DA3FF;
    --box2-color: #FFE6AC;
    --box3-color: #E7D1FC;
    --title-icon-color: #fff;

    /* ====== Transition ====== */
    --tran-05: all 0.5s ease;
    --tran-03: all 0.3s ease;
    --tran-03: all 0.2s ease;
}

body {
    min-height: 100vh;
    background-color: var(--danger-color);
}

body.dark {
    --danger-color: #3A3B3C;
    --panel-color: #242526;
    --text-color: #CCC;
    --black-light-color: #CCC;
    --border-color: #4D4C4C;
    --toggle-color: #FFF;
    --box1-color: #3A3B3C;
    --box2-color: #3A3B3C;
    --box3-color: #3A3B3C;
    --title-icon-color: #CCC;
}



.menu-items li {
    list-style: none;
}

.menu-items li a {
    display: flex;
    align-items: center;
    height: 50px;
    text-decoration: none;
    position: relative;
}

.nav-links li a:hover:before {
    content: "";
    position: absolute;
    left: -7px;
    height: 5px;
    width: 5px;
    border-radius: 50%;
    background-color: var(--primary-color);
}

body.dark li a:hover:before {
    background-color: var(--text-color);
}

.menu-items li a i {
    font-size: 24px;
    min-width: 45px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--black-light-color);
}

.menu-items li a .link-name {
    font-size: 18px;
    font-weight: 400;
    color: var(--black-light-color);
    transition: var(--tran-05);
}

nav.close li a .link-name {
    opacity: 0;
    pointer-events: none;
}

.nav-links li a:hover i,
.nav-links li a:hover .link-name {
    color: var(--primary-color);
}

body.dark .nav-links li a:hover i,
body.dark .nav-links li a:hover .link-name {
    color: var(--text-color);
}

.menu-items .logout-mode {
    padding-top: 10px;
    border-top: 1px solid var(--border-color);
}

.menu-items .mode {
    display: flex;
    align-items: center;
    white-space: nowrap;
}

.menu-items .mode-toggle {
    position: absolute;
    right: 14px;
    height: 50px;
    min-width: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.mode-toggle .switch {
    position: relative;
    display: inline-block;
    height: 22px;
    width: 40px;
    border-radius: 25px;
    background-color: var(--toggle-color);
}

.switch:before {
    content: "";
    position: absolute;
    left: 5px;
    top: 50%;
    transform: translateY(-50%);
    height: 15px;
    width: 15px;
    background-color: var(--panel-color);
    border-radius: 50%;
    transition: var(--tran-03);
}

body.dark .switch:before {
    left: 40px;
}

.dashboard {
    position: relative;
    left: 250px;
    background-color: var(--panel-color);
    min-height: 100vh;
    width: calc(100% - 250px);
    padding: 10px 14px;
    transition: var(--tran-05);
}

nav.close~.dashboard {
    left: 73px;
    width: calc(100% - 73px);
}





.top img {
    width: 40px;
    border-radius: 50%;
}

.dashboard .dash-content {
    padding-top: 50px;
}

.dash-content .title {
    display: flex;
    align-items: center;
    margin: 60px 0 30px 0;
}








   
  

   




 

    

   

    
    

    

  
   

 


</style>

<body>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>


        </div>

        <div class="dash-content mx-auto">
            <div class="overview shadow-lg p-1 mb-3 bg-body rounded">
                <div class="title ">

                    <span class="text ">Profile Account</span>

                </div>

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="overflow-auto" style="white-space: nowrap;">
                                <?php $no = 0;
foreach ($user as $row) : $no++; ?>
                                <div class="w-100 m-auto p-3">
                                    <br>
                                    <div><?php echo $this->session->flashdata('message'); ?></div>
                                    <div><?php echo $this->session->flashdata('sukses'); ?></div>
                                    <div class="row d-flex">
                                        <input name="id" type="hidden" value="<?php echo $row->id ?>">


                                        <span class="border border-0 btn btn-link">
                                            <?php if (!empty($row->foto)): ?>
                                            <img src="<?php echo  base_url('./image/' . $row->foto) ?>" height="150"
                                                width="150" class="rounded-circle">

                                            <?php else: ?>
                                            <img class="rounded-circle " height="150" width="150"
                                                src="https://slabsoft.com/wp-content/uploads/2022/05/pp-wa-kosong-default.jpg" />
                                            <?php endif;?>
                                        </span>

                                        <br>
                                        <br>
                                        <form method="post"
                                            action="<?php echo base_url('karyawan/aksi_update_profile'); ?>"
                                            enctype="multipart/form-data">
                                            <input name="id" type="hidden" value="<?php echo $row->id; ?>">
                                            <div class="d-flex flex-row ">
                                                <div class="p-2 col-6">
                                                    <label for="" class="form-label fs-5">Nama
                                                        <br>
                                                        Depan </label>
                                                    <input type="text" class="form-control" id="nama_depan"
                                                        name="nama_depan" placeholder="Nama Depan"
                                                        value="<?php echo $row->nama_depan; ?>">
                                                    <label for="" class="form-label fs-5">Username </label>
                                                    <input type="text" class="form-control" id="username"
                                                        name="username" placeholder="Username"
                                                        value="<?php echo $row->username; ?>">
                                                </div>
                                                <br>
                                                <div class="p-2 col-6">
                                                    <label for="" class="form-label fs-5">Nama
                                                        <br>
                                                        Belakang </label>
                                                    <input type="text" class="form-control" id="nama_belakang"
                                                        name="nama_belakang" placeholder="Nama Belakang"
                                                        value="<?php echo $row->nama_belakang; ?>">



                                                </div>
                                            </div>
                                            <input type="file" name="foto" class="p-3">
                                    </div>
                                </div>
                                <?php endforeach; ?>



                                <div class="d-flex p-2 row justify-content-evenly ">
                                    <button type="submit" class="btn btn-sm btn-dark col-5" name=" submit">Ubah
                                        Profile</button>

                                    <a class="btn btn-danger col-5"
                                        href="<?php echo base_url('karyawan/hapus_image'); ?>">
                                        Hapus
                                        Foto</a>
                                </div>

                                <br>

                                </form>






                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overview shadow-lg p-1 mb-3 bg-body rounded">


                <div class="title ">
                    <span class="text ">Password</span>

                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="overflow-auto" style="white-space: nowrap;">

                                <form action="<?php echo base_url('karyawan/aksi_ubah_password'); ?>"
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
    // show password

    function togglePasswordVisibility(inputId) {
        var passwordInput = document.getElementById(inputId);
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            togglePassword.classList.remove('fa-eye-slash');
            togglePassword.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            togglePassword.classList.remove('fa-eye');
            togglePassword.classList.add('fa-eye-slash');
        }
    }
    // jam
    function updateClock() {
        var now = new Date();
        var clock = document.getElementById('clock');
        clock.innerHTML = now.toLocaleTimeString();
    }

    // Memperbarui jam setiap detik
    setInterval(updateClock, 1000);

    function updateClock2() {
        var now = new Date();
        var clock = document.getElementById('clock2');
        clock.innerHTML = now.toLocaleTimeString();
    }

    // Memperbarui jam setiap detik
    setInterval(updateClock2, 1000);
    </script>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    <script src="script.js"></script>
    <script>
    const body = document.querySelector("body"),
        modeToggle = body.querySelector(".mode-toggle");
    sidebar = body.querySelector("nav");
    sidebarToggle = body.querySelector(".sidebar-toggle");

    let getMode = localStorage.getItem("mode");
    if (getMode && getMode === "dark") {
        body.classList.toggle("dark");
    }

    let getStatus = localStorage.getItem("status");
    if (getStatus && getStatus === "close") {
        sidebar.classList.toggle("close");
    }

    modeToggle.addEventListener("click", () => {
        body.classList.toggle("dark");
        if (body.classList.contains("dark")) {
            localStorage.setItem("mode", "dark");
        } else {
            localStorage.setItem("mode", "light");
        }
    });

    sidebarToggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
        if (sidebar.classList.contains("close")) {
            localStorage.setItem("status", "close");
        } else {
            localStorage.setItem("status", "open");
        }
    })
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