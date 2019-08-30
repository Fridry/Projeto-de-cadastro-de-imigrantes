<?php
include_once '../includes/header.php';
include_once '../includes/sidebar.php';
include_once '../includes/menu.php';
?>
<!-- Inicio Conteúdo -->
<div class="content">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Curriculos Cadastrados</h4>

                        <form class="form-inline" method="GET" action="pesquisar.php">
                            <div class="form-group has-white">
                                <input type="search" class="form-control" placeholder="Procurar..." name="pesquisar">
                            </div>
                            <button type="submit" class="btn btn-success btn-raised btn-fab btn-fab-mini">
                                <i class="nc-icon nc-zoom-split"></i>
                            </button>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Gênero</th>
                                <th>Profissão</th>
                                <th colspan="3" class="text-center">Ações</th>
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

                                    if (!isset($_GET['pesquisar'])) {
                                        header("Location: listar.php");
                                    } else {
                                        $criterio = $_GET['pesquisar'];
                                    }

                                    $pessoaVO = new PessoaVO();
                                    $pessoaDAO = new PessoaDAO();
                                    $formVO = new FormacaoVO();
                                    $formDAO = new FormacaoDAO();

                                    $total_registros = $pessoaDAO->numRegistrosLike($conexao, $criterio);

                                    $qntd_reg_pag = 10;

                                    $qntd_pag = ceil($total_registros / $qntd_reg_pag);


                                    $inicio = ($qntd_reg_pag * $pagina) - $qntd_reg_pag;


                                    $readAll = $pessoaDAO->paginacaoComLike($conexao, $inicio, $qntd_pag, $criterio);

                                    foreach ($readAll as $pessoa) {
                                        $id_pessoa = $pessoa->getId_pessoa();
                                        $nome_pessoa = $pessoa->getNome();
                                        $genero_pessoa = $pessoa->getSexo();

                                        echo "<tr>";
                                        echo "<th scope = 'row'>" . $id_pessoa . "</th>";
                                        echo "<td>" . $nome_pessoa . "</td>";
                                        echo "<td>" . $genero_pessoa . "</td>";
                                        
                                        $profissao = $formDAO->read($conexao, $id_pessoa);
                                        $profissao_nome = $profissao->getProfissao();
                                        echo "<td>$profissao_nome</td>";
                                    
                                        echo "<td><a href='detalhes.php?id=$id_pessoa' class='btn btn-info' role='button'>Ver</a></td>";
                                        echo "<td><a href='edita.php?id=$id_pessoa' class='btn btn-success' role='button'>Editar</a></td>";
                                        echo '<td><a class="btn btn-danger" href="javascript:func()" onclick="confirmacao(' . $id_pessoa . ')" role="button">Excluir</i></a></td>';
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
                                    </div>
                                    </div>

                                    <?php
                                    include_once '../includes/footer.php';


                                    