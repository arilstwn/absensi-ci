<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
</head>

<body>
    <h1>DATA PEMBAYARAN</h1>
    <table style="font-size: 14px; font-weight: bold;">
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><?php echo $this->session->userdata('email') ?></td>
        </tr>
        <tr>
            <td>Username</td>
            <td>:</td>
            <td><?php echo $this->session->userdata('username') ?></td>
        </tr>
    </table>
    <hr>
    <br>
    <table border="1">
        <tr style="font-weight: bold;">
            <td>No</td>
            <td>Username</td>
            <td>Email</td>
            <td>Nama Depan</td>
            <td>Nama Belakang</td>
            <td>status</td>
        </tr>
        <?php $no= 1; 
		foreach ($data_pembayaran as $key) { ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $key->username ?></td>
            <td><?php echo $key->email ?></td>
            <td><?php echo $key->nama_depan ?></td>
            <td><?php echo $key->nama_belakang ?></td>
            <td><?php echo $key->status ?></td>
        </tr>
        <?php } ?>
    </table>


</body>

</html>