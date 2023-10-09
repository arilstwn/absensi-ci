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
      
        <a href="<?php echo base_url('keuangan') ?>">
            <i class="fas fa-wallet mr-2"></i> Keuangan
        </a>
        <a href="<?php echo base_url('keuangan/pembayaran') ?>">
            <i class="fas fa-money-bill mr-2"></i> pembayaran
        </a>
        <aside id="separator-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
         

          
               </svg>
               
            
        
         <li>
         <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"> 
         案 Dasboard
            </a>
            <hr>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            案 Pembayaran
               <hr>
            </a>
            <hr>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            案 Log out.
               <hr>
            </a>
            <hr>
         </li>
        
         </ul>
      </div>
</aside>
      </div>
        </div>





        
    </div>
    <div id="content" role="main">
        <header class="flex justify-between items-center p-4 bg-white border-b-2 border-gray-200">
            <h1 class="text-4xl">Pembayaran</h1>
            <div class="flex items-center space-x-2">

            </div>
        </header>
        <br>
        <div class="row ">
            <div class="col-12 card p-7">
                <div class="card-body min-vh-200  align-items-center">
                    <div class="card w-40 m-auto p-3">
                        <table class="table  table-striped"> 
                            <center><h1><b>Daftar Pembayaran</b></h1></center>
                            <hr>
                        <!-- <img src="https://o.remove.bg/downloads/08abdb44-01af-4324-a097-a546a0d0bffa/png-transparent-computer-icons-three-people-black-%D0%BD%D0%BE%D0%B2%D1%8B%D0%B5-%D0%BF%D1%80%D0%B0%D0%B2%D0%B8%D0%BB%D0%B0-user-removebg-preview-removebg-preview.png" alt="" width="330" height="330"> -->
                        
                        
                            <center><thead>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                 <!-- Data Modal -->
                                 <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                 Modal
                                 </button>
                                <!-- Export -->
                               <a href="<?php echo base_url('keuangan/export') ?>" class="btn btn-info">Export</a>
                                <!-- Tambah -->
                                <a href="<?php echo base_url('keuangan/tambah_pembayaran') ?>" class="btn btn-primary">Tambah</a> 




                                <tr>
                                    <th scope="col">No </th>
                                    <th scope="col">ID Siswa </th>
                                    <th scope="col">Kelas </th>
                                    <th scope="col">Jenis Pembayaran </th>
                                    <th scope="col">Total Pembayaran </th>
                                    <th scope="col">Aksi</th>
                                    
                                </tr>
                            </thead></center>
                            <tbody>
                              
                                <?php
                 $no= 0;foreach ($pembayaran as $row  ) :$no++                          
                    ?>
                                <tr>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $no ?></td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo tampil_full_siswa($row->id_siswa )?></td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->id ?></td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->jenis_pembayaran ?>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->total_pembayaran ?></td>
                                 </td>
                                 <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                 <a href="<?php echo base_url('keuangan/ubah_pembayaran/').$row->id?>" class="btn btn-warning">Update</a>
                                 <button onclick="hapus(<?php echo $row->id ?>)" class="btn btn-danger">Delete</button>
                                 
                                 
                                 
                                
         
                                  </td>
                              </tr>
                              <?php endforeach ?>
                           </table>
                         <form class="mt-5" method="post" enctype="multipart/form-data" 
        action="<?= base_url('keuangan/import') ?>">
      <input type="file" name="file"/>
      <button type="submit" class="btn btn-outline-success" name="submit">Import</button>
      <div class="d-grid gap-2 d-md-block"></div>
       <hr>

      </form>

                        <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Lihat Data
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>



<script>
        function hapus(id) {
            swal.fire({
                title: 'Yakin untuk menghapus data ini?',
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
                        window.location.href = "<?php echo base_url('admin/hapus_siswa/')?>" + id;
                    });
                }
            });
        }
        </script>


   
   
</body>

</html>