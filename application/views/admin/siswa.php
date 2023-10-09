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
        background-color: #61677A;

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
            <h1 class="text-4xl">Data Siswa</h1>
            <div class="flex items-center space-x-2">

            </div>
        </header>
        <br>
        <div class="row ">
            <div class="col-12 card p-7">
                <div class="card-body min-vh-200  align-items-center">
                    <div class="card w-40 m-auto p-3">
                        <table class="table  table-striped"> 
                            <center><h1><b>Daftar Siswa</b></h1></center>
                            <hr>
                        <!-- <img src="https://o.remove.bg/downloads/08abdb44-01af-4324-a097-a546a0d0bffa/png-transparent-computer-icons-three-people-black-%D0%BD%D0%BE%D0%B2%D1%8B%D0%B5-%D0%BF%D1%80%D0%B0%D0%B2%D0%B8%D0%BB%D0%B0-user-removebg-preview-removebg-preview.png" alt="" width="330" height="330"> -->
                        
                        
                            <center><thead>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                 <!-- Data Modal -->
                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                  Modal
                                 </button>
                                <!-- Export -->
                               <a href="<?php echo base_url('admin/export') ?>" class="btn btn-info">Export</a>
                                <!-- Tambah -->
                                <a href="<?php echo base_url('admin/tambah_siswa') ?>" class="btn btn-primary">Tambah</a> 




                                <tr>
                                <th scope="col">No </th>
                                    <th scope="col">Nama </th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">NISN </th>
                                    <th scope="col"> Gender </th>
                                    <th scope="col"> Kelas </th>
                                    <th scope="col"> Sekolah </th>
                                    <th scope="col">Aksi</th>

                                    
                                </tr>
                            </thead></center>
                            <tbody>
                              
                                <?php
                 $no= 0;foreach ($siswa as $row  ) :$no++                          
                    ?>
                                   <tr>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo$no ?></td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->nama_siswa ?></td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                        <img src="<?php echo base_url('images/siswa/'.$row->foto) ?>" width="50">
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->nisn ?></td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->gender ?>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->id_kelas ?>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->nama_sekolah ?>
                                 </td>
                                 <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                 <a href="<?php echo base_url('admin/ubah_siswa/').$row->id_siswa?>" class="btn btn-warning">Ubah</a>
                              <button onclick="hapus(<?php echo $row->id_siswa ?>)" class="btn btn-danger">Hapus</button>
         
                                  </td>
                              </tr><?php endforeach ?>
                           </table>
                           <form class="mt-5" method="post" enctype="multipart/form-data" 
        action="<?= base_url('keuangan/import') ?>">
      <input type="file" name="file"/>
      <button type="submit" class="btn btn-outline-success" name="submit">Import</button>
      <div class="d-grid gap-2 d-md-block"></div>
       <hr>

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