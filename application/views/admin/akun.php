
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
    body {
        display: flex;

        margin: 0;
        min-height: 100vh;
        background-color: #1b77c7;

    }

    #sidebar {
        background-color: #272829;

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
        color: #fffcfc;
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
</head>

<body class="flex h-screen bg-gray">
    <!-- Sidebar -->
    <div id="sidebar" class="col-md-3 col-lg-2 d-md-block">
      <span class="ml-3">案内板 SISTEM INFORMASI</span>
      
        <a href="<?php echo base_url('admin/dasboard') ?>">
            <i class=" mr-2"></i> <li>案 Dasboard</li>
        </a>
        <a href="<?php echo base_url('admin/akun') ?>">
            <i class="fas mr-2"></i> <li>案 Akun</li>
        </a>
        <a href="<?php echo base_url('admin') ?>">
            <i class="fas mr-2"></i> <li>案 Lobi</li>
        </a>
        <aside id="separator-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
         

          
               </svg>
               
            
        
         
         <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"> 
        
            </a>
            <hr>
         
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            
               <hr>
            </a>
            <hr>
         
        
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
           
               <hr>
            </a>
            <hr>
        
        
       
      </div>
</aside>
      </div>
        </div>





        
    </div>
    <div id="content" role="main">
    <header class="flex justify-between items-center p-4 bg-white border-b-2 border-gray-200">
            <h1 class="text-4xl">Akun</h1>
            <div class="flex items-center space-x-2">

            </div>
        </header>
        <br>
      
    <div class="card w-40 m-auto p-3">
        <h3 class="text-center"><b>Akun</b></h3>
        <hr>
        <form action= "<?php echo base_url('admin/aksi_ubah_akun') ?>" enctype="multipart/form-data" method="post" class="row">
            <div class="mb-3 col-6">
                <label for="email" class="form-label"><b>Email</b></label>
                <input type="text" class="form-control" id="email" name="email">
                <hr>
            </div>
            <div class="mb-3 col-6">
                <label for="username" class="form-label"><b>Username</b></label>
                <input type="text" class="form-control" id="username" name="username">
                <hr>
            </div>
            <div class="mb-3 col-6">
                <label for="password_baru" class="form-label"><b>Password Baru</b></label>
                <input type="text" class="form-control" id="password_baru"  placeholder="Password Baru" name="password_baru">
                <hr>
            </div>
               <div class="mb-3 col-6">
               <label for="password_baru" class="form-label"><b>Konfirmasi Password</b></label>
               <input type="text" class="form-control" id="password_baru"  placeholder="Konfirmasi Password" name="password_baru">
               <hr>
               <button type="submit" class="btn btn-sm btn-primary">Ubah</button>        
            </div>
            
           
        </form>
                        </div>
                         <a href="<?php echo base_url('admin') ?>" class="btn btn-primary">Kembali</a>
                                
                    
                    </form>
                   
                   

                </div>
            </div><


                      <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</div>


<script>
   function hapus(id) {
      var yes = confirm ('yakin di hapus');
      if (yes == true) {
         window.location.href = "<?php echo base_url('admin/hapus_siswa/')?>" + id;
      }
   }
</script>

   
   
</body>

</html>