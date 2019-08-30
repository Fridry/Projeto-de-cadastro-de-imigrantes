<?php
include_once './includes/header.php';
include_once './includes/navbar_1.php';
?>


<div class="container-fluid d-flex justify-content-center mt-5">
    <div class="col-md-8 mt-4"  style="font-weight: 500; color: #000">
                <div class="d-flex justify-content-between mb-4 mt-3">
                           <h3>Curriculos Cadastrados</h3>

                    <form class="form-inline" method="GET" action="pesquisar.php">
                        <div class="form-group has-white">
                            <input type="search" class="form-control" placeholder="Procurar..." name="pesquisar">
                        </div>
                        <button type="submit" class="btn btn-success btn-raised btn-fab btn-fab-mini">
                            <i class="nc-icon nc-zoom-split"></i>
                        </button>
                    </form>
                </div>
            <div class="table-responsive table-bordered text-center">
                <table class="table">
                    <thead class=" text-primary">
                    <th>ID</th>
                    <th><?php echo $idioma['nome'];?></th>
                    <th><?php echo $idioma['genero'];?></th>
                    <th><?php echo $idioma['profissao'];?></th>
                    <th colspan="3"><?php echo $idioma['acao'];?></th>
                    </thead>
                    <tbody>

                        <?php
                        include_once '../conexao/conexao.php';
                        include_once '../classes/PessoaVO.php';
                        include_once '../classes/PessoaDAO.php';
                        include_once '../classes/FormacaoVO.php';
                        include_once '../classes/FormacaoDAO.php';

                        //paginação
                        if (!isset($_GET['pagina'])) {
                            $pagina = 1;
                        } else {
                            $pagina = $_GET['pagina'];
                        }

                        $pessoaVO = new PessoaVO();
                        $pessoaDAO = new PessoaDAO();
                        $formVO = new FormacaoVO();
                        $formDAO = new FormacaoDAO();

                        $total_registros = $pessoaDAO->numRegistros($conexao);

                        $qntd_reg_pag = 10;

                        $qntd_pag = ceil($total_registros / $qntd_reg_pag);


                        $inicio = ($qntd_reg_pag * $pagina) - $qntd_reg_pag;


                        $readAll = $pessoaDAO->paginacao($conexao, $inicio, $qntd_reg_pag);

                        foreach ($readAll as $pessoa) {
                            $id_pessoa = $pessoa->getId_pessoa();
                            $nome_pessoa = $pessoa->getNome();
                            $genero_pessoa = $pessoa->getSexo();

                            echo "<tr>";
                            echo "<th scope = 'row'>" . $id_pessoa . "</th>";
                            echo "<td class='h6'>" . $nome_pessoa . "</td>";
                            echo "<td class='h6'>" . $genero_pessoa . "</td>";

                            $profissao = $formDAO->read($conexao, $id_pessoa);
                            $profissao_nome = $profissao->getProfissao();
                            echo "<td class='h6'>$profissao_nome</td>";

                            $infos = $idioma['infos'];
                            echo "<td><a href='detalhes.php?id=$id_pessoa' class='btn btn-info' role='button'>$infos</a></td>";

                            echo "</tr>";
                        }
                        ?>

                    </tbody>
                </table>
                <?php
                $pagina_ant = $pagina - 1;
                $pagina_seg = $pagina + 1;
                ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <?php if ($pagina_ant != 0) { ?>
                            <li class="page-item">
                                <a class="page-link" href="listar.php?pagina= <?php echo $pagina_ant ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php
                        // Apresentar a paginação
                        for ($i = 1; $i <= $qntd_pag; $i++) {
                            echo "<li class='page-item'><a class='page-link' href='listar.php?pagina=$i'>$i</a></li>";
                        }
                        ?>

                        <?php if ($pagina_seg <= $qntd_pag) { ?>
                            <li class="page-item">
                                <a class="page-link" href="listar.php?pagina= <?php echo $pagina_seg ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        <?php } ?>
                </div>
            </div>
</div>




<?php
 include_once './includes/footer.php';
?>