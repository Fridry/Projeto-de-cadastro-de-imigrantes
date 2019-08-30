 <?php 
    include_once './includes/header.php';
    include_once './includes/navbar.php';
 ?>

        <div class="page-header" data-parallax="true" style="background-image: url('../assets/img/login-image.jpg');">
            <div class="filter"></div>
            <div class="container">
                <div class="motto text-center">
                    <h1><?php echo $idioma['titulo'];?></h1>
                    <h3><?php echo $idioma['sub_titulo'];?></h3>
                    <div class="mt-5">
                    <a class="btn btn-round btn-lg btn-default" href="novo.php" role="button"><?php echo $idioma['link_cadastro'];?></a>
                    <!--<button class="btn btn-round btn-lg btn-outline-info">Cadastrar Curriculo</button>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
    <script src="../assets/js/jquery.multifield.min.js"></script>
    <script src="../assets/js/main.js"></script>
    </body>
</html>
 