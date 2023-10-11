<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
   <style>
        body {
          background-image: url('https://c4.wallpaperflare.com/wallpaper/771/728/930/digital-bright-night-stars-field-hd-wallpaper-preview.jpg');
          background-repeat: no-repeat;
          background-attachment: fixed; 
          background-size: 100% 100%;
        }
       </style>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
*{
    margin: 10;
    padding: 10;
    font-family: 'poppins',sans-serif;
}
section{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    width: 100%;
    
    background: url('background6.jpg')no-repeat;
    background-position: center;
    background-size: cover;
}
.form-box{
    position: relative;
    width: 450px;
    height: 650px;
    background: transparent;
    border: 2px solid rgba(255, 255, 255, 0.5);
    border-radius: 20px;
    backdrop-filter: blur(15px);
    display: flex;
    justify-content: center;
    align-items: center;

}
h2{
    font-size: 2em;
    color: #fff;
    text-align: center;
}
.inputbox{
    position: relative;
    margin: 30px 0;
    width: 310px;
    border-bottom: 2px solid #fff;
}
.inputbox label{
    position: absolute;
    top: 50%;
    left: 5px;
    transform: translateY(-50%);
    color: #fff;
    font-size: 1em;
    pointer-events: none;
    transition: .5s;
}
input:focus ~ label,
input:valid ~ label{
top: -5px;
}
.inputbox input {
    width: 100%;
    height: 50px;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    padding:0 35px 0 5px;
    color: #fff;
}
.inputbox ion-icon{
    position: absolute;
    right: 8px;
    color: #fff;
    font-size: 1.2em;
    top: 20px;
}

.forget{
    margin: -15px 0 15px ;
    font-size: .9em;
    color: #fff;
    display: flex;
    justify-content: space-between;  
}

.forget label input{
    margin-right: 3px;
    
}
.forget label a{
    color: #fff;
    text-decoration: none;
}
.forget label a:hover{
    text-decoration: underline;
}
button{
    width: 100%;
    height: 40px;
    border-radius: 40px;
    background: #fff;
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1em;
    font-weight: 600;
}
.register{
    font-size: .9em;
    color: #fff;
    text-align: center;
    margin: 25px 0 10px;
}
.register p a{
    text-decoration: none;
    color: #fff;
    font-weight: 600;
}
.register p a:hover{
    text-decoration: underline;
}

</style>

</head>

<body>
    
<section>
        <div class="form-box">
            <div class="form-value">
                   
                   
                   <form class="content " action="<?php echo base_url('Auth/aksi_register') ?>" method="post">
                    <h2>Register</h2>
                    <div class="inputbox">
                    <ion-icon name="person"></ion-icon>
                        <input type="text" name="username" required>
                        <label for="">Username</label>
                    </div>

                    <div class="inputbox">
                    <ion-icon name="mail"></ion-icon>
                        <input type="text" name="email" required>
                        <label for="">Email</label>
                    </div>

                    <div class="inputbox">
                    <ion-icon name="key"></ion-icon>
                        <input type="text" name="password" required>
                        <label for="">Password</label>
                    </div>

                    <div class="inputbox">
                    <ion-icon name="person"></ion-icon>
                        <input type="text" name="nama_depan" required>
                        <label for="">Nama Depan</label>
                    </div>

                    <div class="inputbox">
                    <ion-icon name="person"></ion-icon>
                        <input type="text" name="nama_belakang" required>
                        <label for="">Nama Belakang</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                    <br>
                    <br>
                    <a href="<?php echo base_url('absensi/login') ?>" class="text-primary">Login</a>
                    <br>
                    <a href="<?php echo base_url('absensi/register_karyawan') ?>">Register Karyawan </a>
                    <br>
                    <div class="register">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</body>
</html>