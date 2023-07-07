<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="register.css">
        <link rel="icon" href="img/1.png" type ="image/x-icon">
        <title>Register</title>
    </head>

    <body>
        <section class="Form my-4 mx-5 mt-5">
            <div class="container">
                <div class="row g-0">
                    <div class="col-lg-6">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/1.png" class="d-block w-100" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/1.png" class="d-block w-100" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/1.png" class="d-block w-100" alt="">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-6 px-5 pt-5">
                        <h1 class="font-weight-bold py-3">Registrasi</h1>
                        <p>Halo! selamat datang di InStall, silahkan masukan identitas anda.</p>
                        <form action="registerFunction.php" method="POST">
			                <script>
                                var check = function(){
                                    if(document.getElementById('pass').value ==
                                    document.getElementById('pass2').value) {
                                        document.getElementById('notif').style.color = 'green';
                                        document.getElementById('notif').innerHTML = 'Password Sama';
                                    } else {
                                        document.getElementById('notif').style.color = 'red';
                                        document.getElementById('notif').innerHTML = 'Password Tidak Sama';
                                    }
                                }

                                var remNotif = function(){
                                    document.getElementById('ems').innerHTML = "";
                                }

                            </script>
                            <div class="form-row">
                                <div class="col-lg-9">
                                    <input onfocus="remNotif();" id="nama" name="nama" type="text" placeholder="Nama Lengkap" class="inf form-control my-4 p-3" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-9">
                                    <input onfocus="remNotif();" id="email" name="email" type="email" placeholder="Email" class="inf form-control my-3 p-3" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-9">
                                    <input onkeyup='check(); remNotif();'  id="pass" name="pass" type="password" placeholder="Password" class="inf form-control my-3 p-3" required>
                                </div>
                            </div>
			                <div class="form-row">
                                <div class="col-lg-9">
                                    <input onkeyup='check(); remNotif();' id="pass2" name="pass2" type="password" placeholder="Konfirmasi Password" class="inf form-control my-3 p-3" required>
                                    <p id="notif" class="notif"></p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-9">
                                    <select name="type" id="type" class="inf form-control my-3 p-3" required>
                                        <option style="text-align: center;" value="" disabled selected>-- Pilih jenis akun anda --</option>
                                        <option value="2" id="2">Investor</option>
                                        <option value="3" id="3">Pengusaha</option>
                                        <option value="4" id="4">Pembeli</option>
                                    </select>
                                    <?php
                                        if(isset($_GET["error"]) == TRUE){
                                            echo "<p id='ems' style='text-align: center; color: red'>Mohon maaf email sudah terdaftar!</p>";
                                        } 
                                    ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-9">
                                    <button type="submit" name="submit" id="submit" class="btnDaftar mt-3 mb-5">Daftar</button>
                                </div>
                            </div>
                            <a href="#">Lupa Password ?</a>
                            <p>Sudah punya akun? <a href="login.php">Masuk disini</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    </body>
</html>
