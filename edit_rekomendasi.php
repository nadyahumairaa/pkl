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
                $norangka = $_SESSION['norangka'];
                $nomesin = $_SESSION['nomesin'];
                $kodetrayek = $_SESSION['kodetrayek'];
                $nouji = $_SESSION['nouji'];
                $reg_no = $_SESSION['reg_no'];
                $lintastrayek = $_SESSION['lintastrayek'];
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
                                                    if($ukuran < 2300000){

                                                        $id_surat = $_REQUEST['id_surat'];
                                                        $query = mysqli_query($config, "SELECT file FROM tbl_rekomendasi WHERE id_surat='$id_surat'");
                                                        list($file) = mysqli_fetch_array($query);

                                                        //jika file tidak kosong akan mengeksekusi script dibawah ini
                                                        if(!empty($file)){
                                                            unlink($target_dir.$file);

                                                            move_uploaded_file($_FILES['file']['tmp_name'], $target_dir.$nfile);

                                                            $query = mysqli_query($config, "UPDATE tbl_rekomendasi SET nokendaraan='$nokendaraan',no_surat='$no_surat',asal_surat='$asal_surat',isi='$isi',kode='$nkode',indeks='$indeks',tgl_surat='$tgl_surat',file='$nfile',keterangan='$keterangan',id_user='$id_user' WHERE id_surat='$id_surat'");

                                                            if($query == true){
                                                                $_SESSION['succEdit'] = 'SUKSES! Data berhasil diupdate';
                                                                header("Location: ./admin.php?page=tsr");
                                                                die();
                                                            } else {
                                                                $_SESSION['errQ'] = 'ERROR! Ada masalah dengan query';
                                                                echo '<script language="javascript">window.history.back();</script>';
                                                            }
                                                        } else {

                                                            //jika file kosong akan mengeksekusi script dibawah ini
                                                            move_uploaded_file($_FILES['file']['tmp_name'], $target_dir.$nfile);

                                                            $query = mysqli_query($config, "UPDATE tbl_rekomendasi SET nokendaraan='$nokendaraan',namapemilik='$namapemilik',alamat='$alamat',type='$type',jenis='$jenis',thpembuatan='$thpembuatan',isisilinder='$isisilinder',norangka='$norangka',nomesin='$nomesin',kodetrayek='$kodetrayek',nouji='$nouji',reg_no='$reg_no',lintastrayek='$lintastrayek' ,id_user='$id_user'WHERE id_surat='$id_surat'");

                                                            if($query == true){
                                                                $_SESSION['succEdit'] = 'SUKSES! Data berhasil diupdate';
                                                                header("Location: ./admin.php?page=tsr");
                                                                die();
                                                            } else {
                                                                $_SESSION['errQ'] = 'ERROR! Ada masalah dengan query';
                                                                echo '<script language="javascript">window.history.back();</script>';
                                                            }
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
                                                $id_surat = $_REQUEST['id_surat'];

                                                $query = mysqli_query($config, "UPDATE tbl_rekomendasi SET nokendaraan='$nokendaraan',namapemilik='$namapemilik',alamat='$alamat',type='$type',jenis='$jenis',thpembuatan='$thpembuatan',isisilinder='$isisilinder',norangka='$norangka',nomesin='$nomesin',kodetrayek='$kodetrayek',nouji='$nouji',reg_no='$reg_no',lintastrayek='$lintastrayek' ,id_user='$id_user' WHERE id_surat='$id_surat'");

                                                if($query == true){
                                                    $_SESSION['succEdit'] = 'SUKSES! Data berhasil diupdate';
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
    } else {

        $id_surat = mysqli_real_escape_string($config, $_REQUEST['id_surat']);
        $query = mysqli_query($config, "SELECT id_surat, nokendaraan, namapemilik, alamat, type, jenis, thpembuatan, isisilinder, norangka, nomesin, kodetrayek, nouji, reg_no, file lintastrayek, id_user FROM tbl_rekomendasi WHERE id_surat='$id_surat'");
        list($id_surat, $nokendaraan, $namapemilik, $alamat, $type, $jenis, $thpembuatan, $isisilinder, $norangka, $nomesin, $kodetrayek, $nouji, $reg_no, $lintastrayek, $id_user ) = mysqli_fetch_array($query);

        if($_SESSION['id_user'] != $id_user AND $_SESSION['id_user'] != 1){
            echo '<script language="javascript">
                    window.alert("ERROR! Anda tidak memiliki hak akses untuk mengedit data ini");
                    window.location.href="./admin.php?page=tsr";
                  </script>';
        } else {?>

            <!-- Row Start -->
            <div class="row">
                <!-- Secondary Nav START -->
                <div class="col s12">
                    <nav class="secondary-nav">
                        <div class="nav-wrapper blue-grey darken-1">
                            <ul class="left">
                                <li class="waves-effect waves-light"><a href="#" class="judul"><i class="material-icons">edit</i> Edit Data Surat Masuk</a></li>
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
                <form class="col s12" method="POST" action="?page=tsr&act=edit" enctype="multipart/form-data">

                    <!-- Row in form START -->
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="hidden" name="id_surat" value="<?php echo $id_surat ;?>">
                            <i class="material-icons prefix md-prefix">looks_one</i>
                            <input id="nokendaraan" type="number" class="validate" value="<?php echo $nokendaraan ;?>" name="nokendaraan" required>
                                <?php
                                    if(isset($_SESSION['enokendaraan'])){
                                        $enokendaraan = $_SESSION['enokendaraan'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$enokendaraan.'</div>';
                                        unset($_SESSION['enokendaraan']);
                                    }
                                ?>
                            <label for="no_agenda">Nomor Agenda</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">bookmark</i>
                            <input id="kode" type="text" class="validate" name="kode" value="<?php echo $kode ;?>" required>
                                <?php
                                    if(isset($_SESSION['ekode'])){
                                        $ekode = $_SESSION['ekode'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$ekode.'</div>';
                                        unset($_SESSION['ekode']);
                                    }
                                ?>
                            <label for="kode">Kode Klasifikasi</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">place</i>
                            <input id="namapemilik" type="text" class="validate" name="namapemilik" value="<?php echo $namapemilik ;?>" required>
                                <?php
                                    if(isset($_SESSION['enamapemilik'])){
                                        $enamapemilik = $_SESSION['enamapemilik'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$enamapemilik.'</div>';
                                        unset($_SESSION['enamapemilik']);
                                    }
                                ?>
                            <label for="asal_surat">Nama Pemilik</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">storage</i>
                            <input id="alamat" type="text" class="validate" name="alamat" value="<?php echo $alamat ;?>" required>
                                <?php
                                    if(isset($_SESSION['ealamat'])){
                                        $ealamat = $_SESSION['ealamat'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$ealamat.'</div>';
                                        unset($_SESSION['ealamat']);
                                    }
                                ?>
                            <label for="indeks">Alamat</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">looks_two</i>
                            <input id="type" type="text" class="validate" name="type" value="<?php echo $type ;?>" required>
                                <?php
                                    if(isset($_SESSION['etype'])){
                                        $etype = $_SESSION['etype'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$etype.'</div>';
                                        unset($_SESSION['etype']);
                                    }
                                ?>
                            <label for="no_surat">Type/Merk</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">date_range</i>
                            <input id="jenis" type="text" class="materialize-textarea validate" name="jenis"  value="<?php echo $jenis ;?>" required>
                                <?php
                                    if(isset($_SESSION['ejenis'])){
                                        $ejenis = $_SESSION['ejenis'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$ejenis.'</div>';
                                        unset($_SESSION['ejenis']);
                                    }
                                ?>
                            <label for="tgl_surat">Jenis/Model</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">description</i>
                            <textarea id="thpembuatan" class="datepicker" name="thpembuatan" required><?php echo $thpembuatan ;?></textarea>
                                <?php
                                    if(isset($_SESSION['ethpembuatan'])){
                                        $ethpembuatan = $_SESSION['ethpembuatan'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$ethpembuatan.'</div>';
                                        unset($_SESSION['ethpembuatan']);
                                    }
                                ?>
                            <label for="isi">Tahun Pembuatan</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">featured_play_list</i>
                            <input id="isisilinder" type="text" class="validate" name="isisilinder" value="<?php echo $isisilinder ;?>" required>
                                <?php
                                    if(isset($_SESSION['eisisilinder'])){
                                        $eisisilinder = $_SESSION['eisisilinder'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$eisisilinder.'</div>';
                                        unset($_SESSION['eisisilinder']);
                                    }
                                ?>
                            <label for="keterangan">Isi Silinder</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">featured_play_list</i>
                            <input id="norangka" type="text" class="validate" name="norangka" value="<?php echo $norangka ;?>" required>
                                <?php
                                    if(isset($_SESSION['enorangka'])){
                                        $enorangka = $_SESSION['enorangka'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$enorangka.'</div>';
                                        unset($_SESSION['enorangka']);
                                    }
                                ?>
                            <label for="keterangan">No Rangka</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">featured_play_list</i>
                            <input id="nomesin" type="text" class="validate" name="nomesin" value="<?php echo $nomesin ;?>" required>
                                <?php
                                    if(isset($_SESSION['enomesin'])){
                                        $enomesin = $_SESSION['enomesin'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$enomesin.'</div>';
                                        unset($_SESSION['enomesin']);
                                    }
                                ?>
                            <label for="keterangan">No Mesin</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">featured_play_list</i>
                            <input id="kodetrayek" type="text" class="validate" name="kodetrayek" value="<?php echo $kodetrayek ;?>" required>
                                <?php
                                    if(isset($_SESSION['ekodetrayek'])){
                                        $ekodetrayek = $_SESSION['ekodetrayek'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$ekodetrayek.'</div>';
                                        unset($_SESSION['ekodetrayek']);
                                    }
                                ?>
                            <label for="keterangan">Kode Trayek</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">featured_play_list</i>
                            <input id="nouji" type="text" class="validate" name="nouji" value="<?php echo $nouji ;?>" required>
                                <?php
                                    if(isset($_SESSION['enouji'])){
                                        $enouji = $_SESSION['enouji'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$enouji.'</div>';
                                        unset($_SESSION['enouji']);
                                    }
                                ?>
                            <label for="keterangan">No Uji</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">featured_play_list</i>
                            <input id="reg_no" type="text" class="validate" name="reg_no" value="<?php echo $reg_no ;?>" required>
                                <?php
                                    if(isset($_SESSION['ereg_no'])){
                                        $ereg_no = $_SESSION['ereg_no'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$ereg_no.'</div>';
                                        unset($_SESSION['ereg_no']);
                                    }
                                ?>
                            <label for="keterangan">Reg. No</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">featured_play_list</i>
                            <input id="lintastrayek" type="text" class="validate" name="lintastrayek" value="<?php echo $lintastrayek ;?>" required>
                                <?php
                                    if(isset($_SESSION['elintastrayek'])){
                                        $elintastrayek = $_SESSION['elintastrayek'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$elintastrayek.'</div>';
                                        unset($_SESSION['elintastrayek']);
                                    }
                                ?>
                            <label for="keterangan">Lintas Trayek</label>
                        </div>
                        <div class="input-field col s6">
                            <div class="file-field input-field">
                                <div class="btn light-green darken-1">
                                    <span>File</span>
                                    <input type="file" id="file" name="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" value="<?php echo $file ;?>" placeholder="Upload file/scan gambar surat masuk">
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
    }
?>
