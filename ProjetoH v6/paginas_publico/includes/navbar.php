<!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top navbar-transparent" color-on-scroll="200">
            <div class="container">
                <div class="navbar-translate">
                    <a class="navbar-brand" href="home.php" rel="tooltip" title="Coded by Creative Tim" data-placement="bottom">
                        Projeto Haiti
                    </a>
                    <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="novo.php"><?php echo $idioma['link_cadastro'];?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listar.php"><?php echo $idioma['ver_curriculos'];?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="sobre.php"><?php echo $idioma['sobre'];?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contato.php"><?php echo $idioma['contato'];?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../login/login.php"><?php echo $idioma['login'];?></a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="dropdown-toggle nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../assets/img/<?php echo $idioma['idioma'];?>.png" style="width: 35px;">
                                </a>

                                <div class="dropdown-menu m-0 p-0" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="?lang=pt"><img src="../assets/img/pt.png" alt="Bandeira do Brasil" style="width: 35px;"> Português</a>
                                    <a class="dropdown-item" href="?lang=fr"><img src="../assets/img/fr.png" alt="Bandeira da França" style="width: 35px;"> Français</a>
                                    <a class="dropdown-item" href="?lang=en"><img src="../assets/img/en.png" alt="Bandeira dos Estados Unidos" style="width: 35px;"> English</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->