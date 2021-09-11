<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {

        if(isset($_REQUEST['submit'])){

            //validasi form kosong
            if($_REQUEST['nokendaraan'] == "" || $_REQUEST['namapemilik'] == "" || $_REQUEST['alamat'] == "" || $_REQUEST['merk'] == "" || $_REQUEST['jenis'] == "" || $_REQUEST['thpembuatan'] == "" || $_REQUEST['isisilinder'] == "" || $_REQUEST['norangka'] == "" || $_REQUEST['nomesin'] == ""  || $_REQUEST['asalkendaraan'] == "" || $_REQUEST['nokendaraan2'] == "" || $_REQUEST['namapemilik2'] == "" || $_REQUEST['alamat2'] =="" || $_REQUEST['merk2'] == "" || $_REQUEST['thpembuatan2'] == "" || $_REQUEST['isisilinder2'] == "" || $_REQUEST['norang2'] == "" || $_REQUEST['nomesin2'] == "" || $_REQUEST['nouji2'] == "" || $_REQUEST['kodetrayek2'] == "" || $_REQUEST['kodeangkutan'] == "" || $_REQUEST['reg_no'] == ""){
                $_SESSION['errEmpty'] = 'ERROR! Semua form wajib diisi';
                echo '<script language="javascript">window.history.back();</script>';
            } else {

                $nokendaraan = $_REQUEST['nokendaraan'];
                $namapemilik = $_REQUEST['namapemilik'];
                $alamat = $_REQUEST['alamat'];
                $type = $_REQUEST['merk'];
                $jenis = $_REQUEST['jenis'];
                $thpembuatan = $_REQUEST['thpembuatan'];
                $isisilinder = $_REQUEST['isisilinder'];
                $norangka = $_SESSION['norangka'];
                $nomesin = $_SESSION['nomesin'];
                $asalkendaraan = $_SESSION['asalkendaraan'];
                $nokendaraan2 = $_SESSION['nokendaraan2'];
                $namapemilik2 = $_SESSION['namapemilik2'];
                $alamat2 = $_SESSION['alamat2'];
                $merk2 = $_SESSION['merk2'];
                $thpembuatan2 = $_SESSION['thpembuatan2'];
                $isisilinder2 = $_SESSION['isisilinder2'];
                $norang2 = $_SESSION['norang2'];
                $nomesin2 = $_SESSION['nomesin2'];
                $nouji2 = $_SESSION['nouji2'];
                $kodetrayek = $_SESSION['kodetrayek2'];
                $kodeangkutan = $_SESSION['kodeangkutan'];
                $reg_no = $_SESSION['reg_no'];

                //validasi input data
                if(!preg_match("/^[a-zA-Z0-9.\/ -]*$/", $nokendaraan)){
                    $_SESSION['nokendaraan'] = 'Form Nomor harus diisi!';
                    echo '<script language="javascript">window.history.back();</script>';
                } else {

                    if(!preg_match("/^[a-zA-Z0-9.\/ -]*$/", $namapemilik)){
                        $_SESSION['namapemilik'] = 'Form Nama hanya boleh mengandung karakter huruf, angka, spasi, titik(.), minus(-) dan garis miring(/)';
                        echo '<script language="javascript">window.history.back();</script>';
                    } else {

                        if(!preg_match("/^[a-zA-Z0-9.\/ -]*$/", $alamat)){
                        $_SESSION['alamat'] = 'Form Nama hanya boleh mengandung karakter huruf, angka, spasi, titik(.), minus(-) dan garis miring(/)';
                        echo '<script language="javascript">window.history.back();</script>';
                    } else {

                        if(!preg_match("/^[a-zA-Z0-9.,() \/ -]*$/", $merk)){
                            $_SESSION['merk'] = 'Form Type hanya boleh mengandung karakter huruf, angka, spasi, titik(.), koma(,), minus(-),kurung() dan garis miring(/)';
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

                                                 if(!preg_match("/^[a-zA-Z0-9., -]*$/", $asalkendaraan)){
                                                    $_SESSION['asalkendaraan'] = 'Form hanya boleh mengandung karakter huruf, angka, spasi, titik(.) dan koma(,) dan minus (-)';
                                                     echo '<script language="javascript">window.history.back();</script>';
                                                 } else {

                                                    if(!preg_match("/^[a-zA-Z0-9., -]*$/", $nokendaraan2)){
                                                        $_SESSION['nokendaraan2'] = 'Form hanya boleh mengandung karakter huruf, angka, spasi, titik(.) dan koma(,) dan minus (-)';
                                                         echo '<script language="javascript">window.history.back();</script>';
                                                    } else {

                                                        if(!preg_match("/^[a-zA-Z0-9., -]*$/", $namapemilik2)){
                                                             $_SESSION['namapemilik2'] = 'Form Reg hanya boleh mengandung karakter huruf, angka, spasi, titik(.) dan koma(,) dan minus (-)';
                                                            echo '<script language="javascript">window.history.back();</script>';
                                                        } else {

                                                            if(!preg_match("/^[a-zA-Z0-9., -]*$/", $alamat2)){
                                                                 $_SESSION['alamat2'] = 'Form hanya boleh mengandung karakter huruf, angka, spasi, titik(.) dan koma(,) dan minus (-)';
                                                                 echo '<script language="javascript">window.history.back();</script>';
                                                            } else {

                                                                if(!preg_match("/^[a-zA-Z0-9., -]*$/", $merk2)){
                                                                 $_SESSION['merk2'] = 'Form hanya boleh mengandung karakter huruf, angka, spasi, titik(.) dan koma(,) dan minus (-)';
                                                                 echo '<script language="javascript">window.history.back();</script>';
                                                            } else {

                                                                if(!preg_match("/^[a-zA-Z0-9., -]*$/", $jenis2)){
                                                                 $_SESSION['jenis2'] = 'Form hanya boleh mengandung karakter huruf, angka, spasi, titik(.) dan koma(,) dan minus (-)';
                                                                 echo '<script language="javascript">window.history.back();</script>';
                                                            } else {

                                                                if(!preg_match("/^[a-zA-Z0-9., -]*$/", $thpembuatan2)){
                                                                 $_SESSION['thpembuatan2'] = 'Form hanya boleh mengandung karakter huruf, angka, spasi, titik(.) dan koma(,) dan minus (-)';
                                                                 echo '<script language="javascript">window.history.back();</script>';
                                                            } else {

                                                                if(!preg_match("/^[a-zA-Z0-9., -]*$/", $isisilinder2)){
                                                                 $_SESSION['isisilinder2'] = 'Form hanya boleh mengandung karakter huruf, angka, spasi, titik(.) dan koma(,) dan minus (-)';
                                                                 echo '<script language="javascript">window.history.back();</script>';
                                                            } else {

                                                                if(!preg_match("/^[a-zA-Z0-9., -]*$/", $norang2)){
                                                                 $_SESSION['norang2'] = 'Form hanya boleh mengandung karakter huruf, angka, spasi, titik(.) dan koma(,) dan minus (-)';
                                                                 echo '<script language="javascript">window.history.back();</script>';
                                                            } else {

                                                                if(!preg_match("/^[a-zA-Z0-9., -]*$/", $nomesin2)){
                                                                 $_SESSION['nomesin2'] = 'Form hanya boleh mengandung karakter huruf, angka, spasi, titik(.) dan koma(,) dan minus (-)';
                                                                 echo '<script language="javascript">window.history.back();</script>';
                                                            } else {

                                                                if(!preg_match("/^[a-zA-Z0-9., -]*$/", $nouji2)){
                                                                 $_SESSION['nouji2'] = 'Form hanya boleh mengandung karakter huruf, angka, spasi, titik(.) dan koma(,) dan minus (-)';
                                                                 echo '<script language="javascript">window.history.back();</script>';
                                                            } else {

                                                                if(!preg_match("/^[a-zA-Z0-9., -]*$/", $kodetrayek2)){
                                                                 $_SESSION['kodetrayek2'] = 'Form hanya boleh mengandung karakter huruf, angka, spasi, titik(.) dan koma(,) dan minus (-)';
                                                                 echo '<script language="javascript">window.history.back();</script>';
                                                            } else {

                                                                if(!preg_match("/^[a-zA-Z0-9., -]*$/", $kodeangkutan2)){
                                                                 $_SESSION['kodeangkutan2'] = 'Form hanya boleh mengandung karakter huruf, angka, spasi, titik(.) dan koma(,) dan minus (-)';
                                                                 echo '<script language="javascript">window.history.back();</script>';
                                                            } else {

                                                                if(!preg_match("/^[a-zA-Z0-9., -]*$/", $reg_no)){
                                                                 $_SESSION['reg_no'] = 'Form hanya boleh mengandung karakter huruf, angka, spasi, titik(.) dan koma(,) dan minus (-)';
                                                                 echo '<script language="javascript">window.history.back();</script>';
                                                            } else {


                                                $cek = mysqli_query($config, "SELECT * FROM tbl_peremajaan WHERE nokendaraan='$nokendaraan'");
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
                                                    $target_dir = "upload/surat_peremajaan/";

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

                                                                $query = mysqli_query($config, "INSERT INTO nokendaraan,namapemilik,alamat,type,jenis,thpembuatan,isisilinder,norangka,nomesin,asalkendaraan,nokendaraan2,namapemilik2,alamat2,merk2,jenis2,thpembuatan2,norangka2,nomesin2,nouji2,kodetrayek2,kodeangkutan2,reg_no)
                                                                        VALUES('$nokendaraan','$namapemilik','$alamat','$type','$jenis','$thpembuatan','$','$isisilinder','$norangka','$nomesin','$asalkendaraan','$nokendaraan2','$namapemilik2','$alamat2','$merk2','$jenis2','$thpembuatan2','$norangka2','$nomesin2','$nouji2','$kodetrayek2','$kodeangkutan2','$reg_no')");

                                                                if($query == true){
                                                                    $_SESSION['succAdd'] = 'SUKSES! Data berhasil ditambahkan';
                                                                    header("Location: ./admin.php?page=tsp");
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
                                                        $query = mysqli_query($config, "INSERT INTO nokendaraan,namapemilik,alamat,type,jenis,thpembuatan,isisilinder,norangka,nomesin,asalkendaraan,nokendaraan2,namapemilik2,alamat2,merk2,jenis2,thpembuatan2,norangka2,nomesin2,nouji2,kodetrayek2,kodeangkutan2,reg_no)
                                                        VALUES('$nokendaraan','$namapemilik','$alamat','$type','$jenis','$thpembuatan','$','$isisilinder','$norangka','$nomesin','$asalkendaraan','$nokendaraan2','$namapemilik2','$alamat2','$merk2','$jenis2','$thpembuatan2','$norangka2','$nomesin2','$nouji2','$kodetrayek2','$kodeangkutan2','$reg_no')");

                                                        if($query == true){
                                                            $_SESSION['succAdd'] = 'SUKSES! Data berhasil ditambahkan';
                                                            header("Location: ./admin.php?page=tsp");
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
                                <li class="waves-effect waves-light"><a href="?page=tsp&act=add" class="judul"><i class="material-icons">mail</i> Tambah Data Surat Peremajaan</a></li>
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
                <form class="col s12" method="POST" action="?page=tsp&act=add" enctype="multipart/form-data">

                    <!-- Row in form START -->
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">looks_one</i>
                            <?php
                            echo '<input id="nokendaraan" type="number" class="validate" name="nokendaraan" value="';
                                $sql = mysqli_query($config, "SELECT nokendaraan FROM tbl_peremajaan");
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
                                    $no_agenda = $_SESSION['nokendaraan'];
                                    echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$nokendaraan.'</div>';
                                    unset($_SESSION['nokendaraan']);
                                }
                            ?>
                            <label for="no_agenda">Nomor Kendaraan</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">bookmark</i>
                            <input id="kode" type="text" class="validate" name="namapem" required>
                                <?php
                                    if(isset($_SESSION['namapemilik'])){
                                        $kode = $_SESSION['namapemilik'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$namapemilik.'</div>';
                                        unset($_SESSION['namapemilik']);
                                    }
                                ?>
                            <label for="kode">Nama Pemilik</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">place</i>
                            <input id="asal_surat" type="text" class="validate" name="alamat" required>
                                <?php
                                    if(isset($_SESSION['alamat'])){
                                        $asal_surat = $_SESSION['alamat'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$alamat.'</div>';
                                        unset($_SESSION['alamat']);
                                    }
                                ?>
                            <label for="asal_surat">Alamat</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">storage</i>
                            <input id="indeks" type="text" class="validate" name="type" required>
                                <?php
                                    if(isset($_SESSION['type'])){
                                        $indeks = $_SESSION['type'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$type.'</div>';
                                        unset($_SESSION['type']);
                                    }
                                ?>
                            <label for="indeks">Type/Merk</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">looks_two</i>
                            <input id="no_surat" type="text" class="validate" name="jenis" required>
                                <?php
                                    if(isset($_SESSION['jenis'])){
                                        $no_surat = $_SESSION['jenis'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$jenis.'</div>';
                                        unset($_SESSION['jenis']);
                                    }
                                ?>
                            <label for="no_surat">Jenis/Model</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">date_range</i>
                            <input id="tgl_surat" type="text" name="tahun" class="datepicker" required>
                                <?php
                                    if(isset($_SESSION['thpembuatan'])){
                                        $tgl_surat = $_SESSION['thpembuatan'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$thpembuatan.'</div>';
                                        unset($_SESSION['thpembuatan']);
                                    }
                                ?>
                            <label for="tgl_surat">Tahun Pembuatan</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">description</i>
                            <input id="isi" type="text" class="materialize-textarea validate" name="isi" required></input>
                                <?php
                                    if(isset($_SESSION['isisilinder'])){
                                        $isi = $_SESSION['isisilinder'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$isisilinder.'</div>';
                                        unset($_SESSION['isisilinder']);
                                    }
                                ?>
                            <label for="isi">Isi Silinder</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">featured_play_list</i>
                            <input id="keterangan" type="text" class="validate" name="norang" required>
                                <?php
                                    if(isset($_SESSION['norangka'])){
                                        $keterangan = $_SESSION['norangka'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$norangka.'</div>';
                                        unset($_SESSION['norangka']);
                                    }
                                ?>
                            <label for="keterangan">Nomor Rangka</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">featured_play_list</i>
                            <input id="keterangan" type="text" class="validate" name="nosin" required>
                                <?php
                                    if(isset($_SESSION['nomesin'])){
                                        $keterangan = $_SESSION['nomesin'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$nomesin.'</div>';
                                        unset($_SESSION['nomesin']);
                                    }
                                ?>
                            <label for="keterangan">Nomor Mesin</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">featured_play_list</i>
                            <input id="keterangan" type="text" class="validate" name="asal" required>
                                <?php
                                    if(isset($_SESSION['asalkendaraan'])){
                                        $keterangan = $_SESSION['asalkendaraan'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$asalkendaraan.'</div>';
                                        unset($_SESSION['asalkendaraan']);
                                    }
                                ?>
                            <label for="keterangan">Asal Kendaraan</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">bookmark</i>
                            <input id="kode" type="text" class="validate" name="namapem" required>
                                <?php
                                    if(isset($_SESSION['namapemilik2'])){
                                        $kode = $_SESSION['namapemilik2'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$namapemilik2.'</div>';
                                        unset($_SESSION['namapemilik2']);
                                    }
                                ?>
                            <label for="kode">Nama Pemilik</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">place</i>
                            <input id="asal_surat" type="text" class="validate" name="alamat" required>
                                <?php
                                    if(isset($_SESSION['alamat2'])){
                                        $asal_surat = $_SESSION['alamat2'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$alamat2.'</div>';
                                        unset($_SESSION['alamat2']);
                                    }
                                ?>
                            <label for="asal_surat">Alamat</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">storage</i>
                            <input id="indeks" type="text" class="validate" name="merk" required>
                                <?php
                                    if(isset($_SESSION['merk2'])){
                                        $indeks = $_SESSION['type'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$merk2.'</div>';
                                        unset($_SESSION['merk2']);
                                    }
                                ?>
                            <label for="indeks">Type/Merk</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">looks_two</i>
                            <input id="no_surat" type="text" class="validate" name="jenis" required>
                                <?php
                                    if(isset($_SESSION['jenis2'])){
                                        $no_surat = $_SESSION['jenis2'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$jenis2.'</div>';
                                        unset($_SESSION['jenis2']);
                                    }
                                ?>
                            <label for="no_surat">Jenis/Model</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">date_range</i>
                            <input id="tgl_surat" type="text" name="tahun" class="datepicker" required>
                                <?php
                                    if(isset($_SESSION['thpembuatan2'])){
                                        $tgl_surat = $_SESSION['thpembuatan2'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$thpembuatan2.'</div>';
                                        unset($_SESSION['thpembuatan2']);
                                    }
                                ?>
                            <label for="tgl_surat">Tahun Pembuatan</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">description</i>
                            <input id="isi" type="text" class="materialize-textarea validate" name="isi" required></input>
                                <?php
                                    if(isset($_SESSION['isisilinder2'])){
                                        $isi = $_SESSION['isisilinder2'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$isisilinder2.'</div>';
                                        unset($_SESSION['isisilinder2']);
                                    }
                                ?>
                            <label for="isi">Isi Silinder</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">featured_play_list</i>
                            <input id="keterangan" type="text" class="validate" name="norang" required>
                                <?php
                                    if(isset($_SESSION['norangka2'])){
                                        $keterangan = $_SESSION['norangka2'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$norangka2.'</div>';
                                        unset($_SESSION['norangka2']);
                                    }
                                ?>
                            <label for="keterangan">Nomor Rangka</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">featured_play_list</i>
                            <input id="keterangan" type="text" class="validate" name="nosin" required>
                                <?php
                                    if(isset($_SESSION['nomesin2'])){
                                        $keterangan = $_SESSION['nomesin2'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$nomesin2.'</div>';
                                        unset($_SESSION['nomesin2']);
                                    }
                                ?>
                            <label for="keterangan">Nomor Mesin</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">featured_play_list</i>
                            <input id="keterangan" type="text" class="validate" name="nouji" required>
                                <?php
                                    if(isset($_SESSION['nouji2'])){
                                        $keterangan = $_SESSION['nouji2'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$nouji2.'</div>';
                                        unset($_SESSION['nouji2']);
                                    }
                                ?>
                            <label for="keterangan">Nomor Uji</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">featured_play_list</i>
                            <input id="keterangan" type="text" class="validate" name="kode" required>
                                <?php
                                    if(isset($_SESSION['kodetrayek2'])){
                                        $keterangan = $_SESSION['kodetrayek2'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$kodetrayek2.'</div>';
                                        unset($_SESSION['kodetrayek2']);
                                    }
                                ?>
                            <label for="keterangan">Kode Trayek</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">featured_play_list</i>
                            <input id="keterangan" type="text" class="validate" name="angkutan" required>
                                <?php
                                    if(isset($_SESSION['kodeangkutan2'])){
                                        $keterangan = $_SESSION['kodeangkutan2'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$kodeangkutan2.'</div>';
                                        unset($_SESSION['kodeangkutan2']);
                                    }
                                ?>
                            <label for="keterangan">Kode Angkutan</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">featured_play_list</i>
                            <input id="keterangan" type="text" class="validate" name="reg" required>
                                <?php
                                    if(isset($_SESSION['reg_no'])){
                                        $keterangan = $_SESSION['reg_no'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$reg_no.'</div>';
                                        unset($_SESSION['reg_no']);
                                    }
                                ?>
                            <label for="keterangan">Reg.No</label>
                        </div>
                        
                        <div class="input-field col s6">
                            <div class="file-field input-field">
                                <div class="btn light-green darken-1">
                                    <span>File</span>
                                    <input type="file" id="file" name="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload file/scan gambar surat peremajaan">
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
                            <a href="?page=tsp" class="btn-large deep-orange waves-effect waves-light">BATAL <i class="material-icons">clear</i></a>
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
