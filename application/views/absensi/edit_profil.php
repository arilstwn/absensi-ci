<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
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
    

   


    #content {
        flex: 1;
        margin-left: 10px;
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
</head>
<body id="jam">
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
  <?php $this->session->flashdata('message') ?></div>
<div class="row d-flex">
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