<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {

        if(isset($_REQUEST['submit'])){

            //validasi form kosong
            if($_REQUEST['nokendaraan'] == "" || $_REQUEST['namapemilik'] == "" || $_REQUEST['alamat'] == "" || $_REQUEST['type'] == "" || $_REQUEST['jenis'] == "" || $_REQUEST['thpembuatan'] == "" || $_REQUEST['isisilinder'] == "" || $_REQUEST['norangka'] == "" || $_REQUEST['nomesin'] == ""  || $_REQUEST['kodetrayek'] == "" || $_REQUEST['nouji'] == "" || $_REQUEST['reg_no'] == "" || $_REQUEST['lintastrayek'] ==""){
                $_SESSION['errEmpty'] = 'ERROR! Semua form wajib diisi';
                echo '<script language="javascript">window.history.back();</script>';
            } else {

                $nokendaraan = $_REQUEST['nokendaraan'];
                $namapemilik = $_REQUEST['namapemilik'];
                $alamat = $_REQUEST['alamat'];
                $type = $_REQUEST['type'];
                $jenis = $_REQUEST['jenis'];
                $thpembuatan = $_REQUEST['thpembuatan'];
                $isisilinder = $_REQUEST['isisilinder'];
                $norangka = $_REQUEST['norangka'];
                $nomesin = $_REQUEST['nomesin'];
                $kodetrayek = $_REQUEST['kodetrayek'];
                $nouji = $_REQUEST['nouji'];
                $reg_no =$_REQUEST['reg_no'];
                $lintastrayek = $_REQUEST['lintastrayek'];
                $id_user = $_SESSION['id_user'];

                //validasi input data
                if(!preg_match("/^[a-zA-Z0-9.\/ -]*$/", $nokendaraan)){
                    $_SESSION['nokendaraan'] = 'Form Nomor harus diisi!';
                    echo '<script language="javascript">window.history.back();</script>';
                } else {

                    if(!preg_match("/^[a-zA-Z0-9.\/ -]*$/", $namapemilik)){
                        $_SESSION['namapemilik'] = 'Form Nama hanya boleh mengandung karakter huruf, angka, spasi, titik(.), minus(-) dan garis miring(/)';
                        echo '<script language="javascript">window.history.back();</script>';
                    } else {

                        if(!preg_match("/^[a-zA-Z0-9.,() \/ -]*$/", $type)){
                            $_SESSION['type'] = 'Form Type hanya boleh mengandung karakter huruf, angka, spasi, titik(.), koma(,), minus(-),kurung() dan garis miring(/)';
                            echo '<script language="javascript">window.history.back();</script>';
                        } else {

                            if(!preg_match("/^[a-zA-Z0-9.,_()%&@\/\r\n -]*$/", $jenis)){
                                $_SESSION['jenis'] = 'Form Isi Ringkas hanya boleh mengandung karakter huruf, angka, spasi, titik(.), koma(,), minus(-), garis miring(/), kurung(), underscore(_), dan(&) persen(%) dan at(@)';
                                echo '<script language="javascript">window.history.back();</script>';
                            } else {

                                if(!preg_match("/^[0-9.-]*$/", $thpembuatan)){
                                    $_SESSION['thpembuatan'] = 'Form Tanggal Surat hanya boleh mengandung angka dan minus(-)';
                                    echo '<script language="javascript">window.history.back();</script>';
                                } else {

                                    if(!preg_match("/^[a-zA-Z0-9., -]*$/", $isisilinder)){
                                        $_SESSION['isisilinder'] = 'Form Isi Silinder hanya boleh mengandung karakter huruf, angka, spasi, titik(.) dan koma(,) dan minus (-)';
                                        echo '<script language="javascript">window.history.back();</script>';
                                    } else {

                                        if(!preg_match("/^[a-zA-Z0-9., -]*$/", $norangka)){
                                            $_SESSION['norangka'] = 'Form Isi Silinder hanya boleh mengandung karakter huruf, angka, spasi, titik(.) dan koma(,) dan minus (-)';
                                            echo '<script language="javascript">window.history.back();</script>';
                                        } else {

                                            if(!preg_match("/^[a-zA-Z0-9., -]*$/", $nomesin)){
                                                $_SESSION['nomesin'] = 'Form Isi Silinder hanya boleh mengandung karakter huruf, angka, spasi, titik(.) dan koma(,) dan minus (-)';
                                                echo '<script language="javascript">window.history.back();</script>';
                                            } else {

                                                 if(!preg_match("/^[a-zA-Z0-9., -]*$/", $kodetrayek)){
                                                    $_SESSION['kodetrayek'] = 'Form Kode Trayek hanya boleh mengandung karakter huruf, angka, spasi, titik(.) dan koma(,) dan minus (-)';
                                                     echo '<script language="javascript">window.history.back();</script>';
                                                 } else {

                                                    if(!preg_match("/^[a-zA-Z0-9., -]*$/", $nouji)){
                                                        $_SESSION['nouji'] = 'Form Isi Silinder hanya boleh mengandung karakter huruf, angka, spasi, titik(.) dan koma(,) dan minus (-)';
                                                         echo '<script language="javascript">window.history.back();</script>';
                                                    } else {

                                                        if(!preg_match("/^[a-zA-Z0-9., -]*$/", $reg_no)){
                                                             $_SESSION['reg_no'] = 'Form Reg hanya boleh mengandung karakter huruf, angka, spasi, titik(.) dan koma(,) dan minus (-)';
                                                            echo '<script language="javascript">window.history.back();</script>';
                                                        } else {

                                                            if(!preg_match("/^[a-zA-Z0-9., -]*$/", $lintastrayek)){
                                                                 $_SESSION['lintastrayek'] = 'Form Lintas Trayek hanya boleh mengandung karakter huruf, angka, spasi, titik(.) dan koma(,) dan minus (-)';
                                                                 echo '<script language="javascript">window.history.back();</script>';
                                                            } else {


                                                $cek = mysqli_query($config, "SELECT * FROM tbl_rekomendasi WHERE nokendaraan='$nokendaraan'");
                                                $result = mysqli_num_rows($cek);

                                                if($result > 0){
                                                    $_SESSION['errDup'] = 'Nomor Surat sudah terpakai, gunakan yang lain!';
                                                    echo '<script language="javascript">window.history.back();</script>';
                                                } else {

                                                    $ekstensi = array('jpg','png','jpeg','doc','docx','pdf');
                                                    $file = $_FILES['file']['name'];
                                                    $x = explode('.', $file);
                                                    $eks = strtolower(end($x));
                                                    $ukuran = $_FILES['file']['size'];
                                                    $target_dir = "upload/surat_rekomendasi/";

                                                    if (! is_dir($target_dir)) {
                                                        mkdir($target_dir, 0755, true);
                                                    }

                                                    //jika form file tidak kosong akan mengeksekusi script dibawah ini
                                                    if($file != ""){

                                                        $rand = rand(1,10000);
                                                        $nfile = $rand."-".$file;

                                                        //validasi file
                                                        if(in_array($eks, $ekstensi) == true){
                                                            if($ukuran < 2500000){

                                                                move_uploaded_file($_FILES['file']['tmp_name'], $target_dir.$nfile);

                                                                $query = mysqli_query($config, "INSERT INTO tbl_rekomendasi(nokendaraan,namapemilik,alamat,type,jenis,thpembuatan,isisilinder,norangka,nomesin,kodetrayek,nouji,reg_no,file,lintastrayek,id_user)
                                                                    VALUES('$nokendaraan','$namapemilik','$alamat','$type','$jenis','$thpembuatan','$isisilinder','$norangka','$nomesin','$kodetrayek','$nouji','$reg_no','$nfile','$lintastrayek','$id_user')");

                                                                if($query == true){
                                                                    $_SESSION['succAdd'] = 'SUKSES! Data berhasil ditambahkan';
                                                                    header("Location: ./admin.php?page=tsr");
                                                                    die();
                                                                } else {
                                                                    $_SESSION['errQ'] = 'ERROR! Ada masalah dengan query';
                                                                    echo '<script language="javascript">window.history.back();</script>';
                                                                }
                                                            } else {
                                                                $_SESSION['errSize'] = 'Ukuran file yang diupload terlalu besar!';
                                                                echo '<script language="javascript">window.history.back();</script>';
                                                            }
                                                        } else {
                                                            $_SESSION['errFormat'] = 'Format file yang diperbolehkan hanya *.JPG, *.PNG, *.DOC, *.DOCX atau *.PDF!';
                                                            echo '<script language="javascript">window.history.back();</script>';
                                                        }
                                                    } else {

                                                        //jika form file kosong akan mengeksekusi script dibawah ini
                                                        $query = mysqli_query($config, "INSERT INTO tbl_rekomendasi(nokendaraan,namapemilik,alamat,type,jenis,thpembuatan,isisilinder,norangka,nomesin,kodetrayek,nouji,reg_no,file,lintastrayek,id_user)
                                                        VALUES('$nokendaraan','$namapemilik','$alamat','$type','$jenis','$thpembuatan','$','$isisilinder','$norangka','$nomesin','$kodetrayek','$nouji','$reg_no','$lintastrayek','$id_user')");

                                                        if($query == true){
                                                            $_SESSION['succAdd'] = 'SUKSES! Data berhasil ditambahkan';
                                                            header("Location: ./admin.php?page=tsr");
                                                            die();
                                                        } else {
                                                            $_SESSION['errQ'] = 'ERROR! Ada masalah dengan query';
                                                            echo '<script language="javascript">window.history.back();</script>';
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
}
} else {?>

            <!-- Row Start -->
            <div class="row">
                <!-- Secondary Nav START -->
                <div class="col s12">
                    <nav class="secondary-nav">
                        <div class="nav-wrapper blue-grey darken-1">
                            <ul class="left">
                                <li class="waves-effect waves-light"><a href="?page=tsr&act=add" class="judul"><i class="material-icons">mail</i> Tambah Data Surat Rekomendasi</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- Secondary Nav END -->
            </div>
            <!-- Row END -->

            <?php
                if(isset($_SESSION['errQ'])){
                    $errQ = $_SESSION['errQ'];
                    echo '<div id="alert-message" class="row">
                            <div class="col m12">
                                <div class="card red lighten-5">
                                    <div class="card-content notif">
                                        <span class="card-title red-text"><i class="material-icons md-36">clear</i> '.$errQ.'</span>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    unset($_SESSION['errQ']);
                }
                if(isset($_SESSION['errEmpty'])){
                    $errEmpty = $_SESSION['errEmpty'];
                    echo '<div id="alert-message" class="row">
                            <div class="col m12">
                                <div class="card red lighten-5">
                                    <div class="card-content notif">
                                        <span class="card-title red-text"><i class="material-icons md-36">clear</i> '.$errEmpty.'</span>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    unset($_SESSION['errEmpty']);
                }
            ?>

            <!-- Row form Start -->
            <div class="row jarak-form">

                <!-- Form START -->
                <form class="col s12" method="POST" action="?page=tsr&act=add" enctype="multipart/form-data">

                    <!-- Row in form START -->
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">looks_one</i>
                            <?php
                            echo '<input id="nokendaraan" type="number" class="validate" name="nokendaraan" value="';
                                $sql = mysqli_query($config, "SELECT nokendaraan FROM tbl_rekomendasi");
                                $nokendaraan = "1";
                                if (mysqli_num_rows($sql) == 0){
                                    echo $nokendaraan;
                                }

                                $result = mysqli_num_rows($sql);
                                $counter = 0;
                                while(list($nokendaraan) = mysqli_fetch_array($sql)){
                                    if (++$counter == $result) {
                                        $nokendaraan++;
                                        echo $nokendaraan;
                                    }
                                }
                                echo '" required>';

                                if(isset($_SESSION['nokendaraan'])){
                                    $nokendaraan = $_SESSION['nokendaraan'];
                                    echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$nokendaraan.'</div>';
                                    unset($_SESSION['nokendaraan']);
                                }
                            ?>
                            <label for="nokendaraan">Nomor Kendaraan</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">bookmark</i>
                            <input id="namapemilik" type="text" class="validate" name="namapemilik" required>
                                <?php
                                    if(isset($_SESSION['namapemilik'])){
                                        $namapemilik = $_SESSION['namapemilik'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$namapemilik.'</div>';
                                        unset($_SESSION['namapemilik']);
                                    }
                                ?>
                            <label for="namapemilik">Nama Pemilik</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">place</i>
                            <input id="alamat" type="text" class="validate" name="alamat" required>
                                <?php
                                    if(isset($_SESSION['alamat'])){
                                        $alamat = $_SESSION['alamat'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$alamat.'</div>';
                                        unset($_SESSION['alamat']);
                                    }
                                ?>
                            <label for="alamat">Alamat</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">storage</i>
                            <input id="type" type="text" class="validate" name="type" required>
                                <?php
                                    if(isset($_SESSION['type'])){
                                        $type = $_SESSION['type'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$type.'</div>';
                                        unset($_SESSION['type']);
                                    }
                                ?>
                            <label for="type">Type/Merk</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">looks_two</i>
                            <input id="jenis" type="text" class="validate" name="jenis" required>
                                <?php
                                    if(isset($_SESSION['jenis'])){
                                        $jenis = $_SESSION['jenis'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$jenis.'</div>';
                                        unset($_SESSION['jenis']);
                                    }
                                ?>
                            <label for="no_surat">Jenis/Model</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">date_range</i>
                            <input id="thpembuatan" type="text" name="thpembuatan" class="datepicker" required>
                                <?php
                                    if(isset($_SESSION['thpembuatan'])){
                                        $thpembuatan = $_SESSION['thpembuatan'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$thpembuatan.'</div>';
                                        unset($_SESSION['thpembuatan']);
                                    }
                                ?>
                            <label for="thpembuatan">Tahun Pembuatan</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">description</i>
                            <input id="isisilinder" type="text" class="materialize-textarea validate" name="isisilinder" required>
                                <?php
                                    if(isset($_SESSION['isisilinder'])){
                                        $isisilinder = $_SESSION['isisilinder'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$isisilinder.'</div>';
                                        unset($_SESSION['isisilinder']);
                                    }
                                ?>
                            <label for="isisilinder">Isi Silinder</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">featured_play_list</i>
                            <input id="norangka" type="text" class="validate" name="norangka" required>
                                <?php
                                    if(isset($_SESSION['norangka'])){
                                        $norangka = $_SESSION['norangka'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$norangka.'</div>';
                                        unset($_SESSION['norangka']);
                                    }
                                ?>
                            <label for="norangka">Nomor Rangka</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">featured_play_list</i>
                            <input id="nomesin" type="text" class="validate" name="nomesin" required>
                                <?php
                                    if(isset($_SESSION['nomesin'])){
                                        $nomesin = $_SESSION['nomesin'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$nomesin.'</div>';
                                        unset($_SESSION['nomesin']);
                                    }
                                ?>
                            <label for="nomesin">Nomor Mesin</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">featured_play_list</i>
                            <input id="kodetrayek" type="text" class="validate" name="kodetrayek" required>
                                <?php
                                    if(isset($_SESSION['kodetrayek'])){
                                        $kodetrayek = $_SESSION['kodetrayek'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$kodetrayek.'</div>';
                                        unset($_SESSION['kodetrayek']);
                                    }
                                ?>
                            <label for="kodetrayek">Kode Trayek</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">featured_play_list</i>
                            <input id="nouji" type="text" class="validate" name="nouji" required>
                                <?php
                                    if(isset($_SESSION['nouji'])){
                                        $nouji = $_SESSION['nouji'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$nouji.'</div>';
                                        unset($_SESSION['nouji']);
                                    }
                                ?>
                            <label for="nouji">Nomor Uji</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">featured_play_list</i>
                            <input id="reg_no" type="text" class="validate" name="reg_no" required>
                                <?php
                                    if(isset($_SESSION['reg_no'])){
                                        $reg_no = $_SESSION['reg_no'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$reg_no.'</div>';
                                        unset($_SESSION['reg_no']);
                                    }
                                ?>
                            <label for="reg_no">Reg.No</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">featured_play_list</i>
                            <input id="lintastrayek" type="text" class="validate" name="lintastrayek" required>
                                <?php
                                    if(isset($_SESSION['lintastrayek'])){
                                        $lintastrayek = $_SESSION['lintastrayek'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$lintastrayek.'</div>';
                                        unset($_SESSION['lintastrayek']);
                                    }
                                ?>
                            <label for="lintastrayek">Lintas Trayek</label>
                        </div>
                        <div class="input-field col s6">
                            <div class="file-field input-field">
                                <div class="btn light-green darken-1">
                                    <span>File</span>
                                    <input type="file" id="file" name="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload file/scan gambar surat rekomendasi">
                                        <?php
                                            if(isset($_SESSION['errSize'])){
                                                $errSize = $_SESSION['errSize'];
                                                echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$errSize.'</div>';
                                                unset($_SESSION['errSize']);
                                            }
                                            if(isset($_SESSION['errFormat'])){
                                                $errFormat = $_SESSION['errFormat'];
                                                echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$errFormat.'</div>';
                                                unset($_SESSION['errFormat']);
                                            }
                                        ?>
                                    <small class="red-text">*Format file yang diperbolehkan *.JPG, *.PNG, *.DOC, *.DOCX, *.PDF dan ukuran maksimal file 2 MB!</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row in form END -->

                    <div class="row">
                        <div class="col 6">
                            <button type="submit" name="submit" class="btn-large blue waves-effect waves-light">SIMPAN <i class="material-icons">done</i></button>
                        </div>
                        <div class="col 6">
                            <a href="?page=tsr" class="btn-large deep-orange waves-effect waves-light">BATAL <i class="material-icons">clear</i></a>
                        </div>
                    </div>

                </form>
                <!-- Form END -->

            </div>
            <!-- Row form END -->

<?php
        }
    }
?>
