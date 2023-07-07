<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="login.css">
        <link rel="icon" href="img/1.png" type ="image/x-icon">
        <title>Login</title>
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
                        <h1 class="font-weight-bold py-3">Masuk</h1>
                        <p>Halo! selamat datang kembali di InStall, silahkan masukan identitas anda.</p>
                        <form method="POST" action="loginFunction.php">
                            <script>
                                var remNotif = function() {
                                    document.getElementById('ems').innerHTML = "";
                                }
                            </script>
                            <div class="form-row">
                                <div class="col-lg-9">
                                    <input onkeypress="remNotif();" id="email" name="email" type="email" placeholder="Email" class="inf form-control my-3 p-3" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-9">
                                    <input onkeypress="remNotif();" id="pass" name="pass" type="password" placeholder="Password" class="inf form-control my-3 p-3" required>
                                    <?php
                                        if(isset($_GET["error"]) == TRUE){
                                            echo "<p id='ems' style='text-align: center; color: red'>Mohon maaf email atau passsword salah!</p>";
                                        } 
                                    ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-9">
                                    <button type="submit" name="submit" id="submit" class="btnLogin mt-3 mb-5">Masuk</button>
                                </div>
                            </div>
                            <a href="#">Lupa Password ?</a>
                            <p>Belum punya akun? <a href="register.php">Daftar disini</a></p>
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