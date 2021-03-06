<?php
    include "../admin/include/header_admin.php";
    $trang=0;

    if(isset($_GET["trang"]))
        $trang=$_GET["trang"];

    // $select="dondat.* , thanhvien.HoTen  hotentv , nhanvien.HoTen  hotennv ";
    // $from="dondat INNER JOIN thanhvien ON dondat.TenDangNhap=thanhvien.TenDangNhap
    //                 INNER JOIN nhanvien ON dondat.MaNhanVien=nhanvien.MaNhanVien";
    $select="dondat.* , thanhvien.HoTen hotentv";
    $from="dondat INNER JOIN thanhvien ON dondat.TenDangNhap=thanhvien.TenDangNhap ORDER BY dondat.MaDonDat DESC";

    $layDuLieu=phan_trang($select,$from,"",50,$trang,"");

    $truyvan_layDuLieu=$layDuLieu;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
       
    <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>????n ?????t h??ng</title>
        
    </head>
    <body class="sb-nav-fixed">
        <!-- Navbar -->
        <?php include 'include/navbaradmin.php'?>
        <!-- Navbar -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include 'include/layoutSidenav_nav.php'?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">????n ?????t h??ng</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Trang Ch???</a></li>
                            <li class="breadcrumb-item active">????n ?????t h??ng</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                
                            </div>
                        </div>
                        <!-- Danh s??ch lo???i s???n ph???m-->
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                ????n ?????t h??ng
                            </div>
                            <div  class="card-body" >
                                <table id="datatablesSimple" >
                                    <thead>
                                        <tr>
                                            <th>M?? h??a ????n</th>
                                            <th>Ng?????i nh???n</th>
                                            <th>Tr???ng th??i</th>
                                            <th>?????a ch??? giao h??ng</th>
                                            <th>Ng??y ?????t h??ng</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>M?? h??a ????n</th>
                                            <th>Ng?????i nh???n</th>
                                            <th>Tr???ng th??i</th>
                                            <th>?????a ch??? giao h??ng</th>
                                            <th>Ng??y ?????t h??ng</th>
                                            <th></th>
                                        </tr>
                                        </tfoot>
                                    <tbody>
                                    <?php
                                        while($cot=mysqli_fetch_array($truyvan_layDuLieu))
                                        {
                                    ?>
                                        <tr>
                                            <td><?php echo $cot["MaDonDat"];?></td>
                                            <td><?php echo $cot["hotentv"];?></td>
                                            <!---Tr???ng th??i -->
                                            <td>
                                                <?php if(trim($cot["TrangThai"])==0){
                                                    echo "<span class='text-danger'>Ch??a giao h??ng (Ch???c nh??n vi??n l?????i)</span>";
                                                }else{
                                                    echo "<span class='text-success'>???? giao h??ng r???i nha</span>";
                                                } ?>
                                            </td>
                                            <td><?php echo $cot["NoiGiao"];?></td>
                                            <td><?php echo date("d/m/Y",strtotime($cot["NgayDat"]));?></td>
                                            <td>
                                                <a href="DonDatHang_Xem.php?MaDonDat=<?php echo $cot["MaDonDat"]; ?>" class="btn btn-success">Detail</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                   </tbody>
                                </table>
                              
                            </div>
                        </div>
                    </div>
                </main>
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script>
            $(document).ready(function () {
                <?php
                echo  "$('.divtrang_".$trang."').addClass('divtrangactive');";
                ?>

                $('.XoaDuLieu').click(function(){
                    if(!confirm("B???n c?? th???c mu???n x??a !"))
                        return false;
                });

                $('#btn-timkiem').click(function (){
                    location="comment.php?noidung="+$('#txt-timkiem').val();
                });
            });
        </script>
        <?php include_once "include/footeradmin.php"?>
    </body>
</html>
