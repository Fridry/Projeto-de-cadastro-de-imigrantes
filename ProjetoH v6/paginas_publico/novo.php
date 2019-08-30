<?php
require_once '../conexao/conexao.php';
include_once './includes/header.php';
include_once './includes/navbar_1.php';

include_once '../classes/OrigemVO.php';
include_once '../classes/OrigemDAO.php';

$origemVO = new OrigemVO();
$origemDAO = new OrigemDAO();

$origem = $origemDAO->readAll($conexao);
?>


<div class="container-fluid mt-5" style="font-weight: 500; color: #000">
    <div class="row justify-content-md-center">
        <div class="col-md-8 mt-3">
            <h2 class="text-center"><?php echo $idioma['cad_novo'];?></h2>
            <form action="insere.php" method="POST">
                <div class="row">
                    <div class="col-md-12 col-sm-6">
                        <h5><?php echo $idioma['dados_pessoais'];?></h5>
                    </div>
                    <div class="col-md-9 col-sm-6 pr-1">
                        <div class="form-group">
                            <label><?php echo $idioma['nome'];?></label>
                            <input type="text" class="form-control" name="nome">
                        </div>
                    </div> 
                    <div class="col-md-3 col-sm-6 pl-1">
                        <div class="form-group">
                            <label><?php echo $idioma['data_nasc'];?></label>
                            <input type="date" class="form-control" name="data_nasc">
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-3 col-sm-6 pr-1">
                        <div class="form-group">
                            <label><?php echo $idioma['genero'];?></label>
                            <select id="inputState" class="form-control" name="genero">
                                <option selected><?php echo $idioma['escolha'];?>...</option>
                                <option value="Masculino"><?php echo $idioma['masculino'];?></option>
                                <option value="Feminino"><?php echo $idioma['feminino'];?></option>
                                <option value="Outro"><?php echo $idioma['outro'];?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 px-1">
                        <div class="form-group">
                            <label><?php echo $idioma['est_civil'];?></label>
                            <select id="inputState" class="form-control" name="est_civil">
                                <option selected><?php echo $idioma['escolha'];?>...</option>
                                <option value="Solteiro"><?php echo $idioma['solteiro'];?></option>
                                <option value="Casado"><?php echo $idioma['casado'];?></option>
                                <option value="Divorciado"><?php echo $idioma['divorciado'];?></option>
                                <option value="Viúvo"><?php echo $idioma['viuvo'];?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 px-1">
                        <div class="form-group">
                            <label><?php echo $idioma['pais_origem'];?></label>
                            <select id="inputState" class="form-control" name="origem">
                                <option selected><?php echo $idioma['escolha'];?>...</option>

                                <?php
                                foreach ($origem as $value) {
                                    $id_origem = $value->getId_origem();
                                    $pais_origem = $value->getPais();

                                    echo "<option value='$id_origem'>$pais_origem</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 pl-1">
                        <div class="form-group">
                            <label><?php echo $idioma['data_entrada'];?></label>
                            <input type="date" class="form-control" name="data_ent">
                        </div>
                    </div>
                </div>

                <div class="form-content">
                    <div class="row">
                        <div class="col-md-12">
                            <p class=""><button type="button" id="btnAdd" class="btn btn-primary btn-block"><i class="nc-icon nc-simple-add"></i></button></p>
                        </div>
                    </div>
                    <div class="row group">
                        <div class="col-md-3 col-sm-12 pr-1">
                            <div class="form-group">
                                <div class="form-group">
                                    <label><?php echo $idioma['parentes'];?></label>
                                    <select id="inputState" class="form-control" name="parentesco[]">
                                        <option selected><?php echo $idioma['escolha'];?>...</option>
                                        <option value="Conjugue"><?php echo $idioma['conjugue'];?></option>
                                        <option value="Filho"><?php echo $idioma['filho'];?></option>
                                        <option value="Filha"><?php echo $idioma['filha'];?></option>
                                        <option value="Irmão"><?php echo $idioma['irmao'];?></option>
                                        <option value="Irmã"><?php echo $idioma['irma'];?></option>
                                        <option value="Pai"><?php echo $idioma['pai'];?></option>
                                        <option value="Mãe"><?php echo $idioma['mae'];?></option>
                                        <option value="Outro"><?php echo $idioma['outro'];?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 px-1">
                            <div class="form-group">
                                <label><?php echo $idioma['data_nasc'];?></label>
                                <input type="date" class="form-control" name="data_nasc_parente[]">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 px-1">
                            <label><?php echo $idioma['mora_junto'];?></label>
                            <select id="inputState" class="form-control" name="mora_junto[]">
                                <option selected><?php echo $idioma['escolha'];?>...</option>
                                <option value="Sim"><?php echo $idioma['sim'];?></option>
                                <option value="Não"><?php echo $idioma['nao'];?></option>
                            </select>
                        </div>
                        <div class="col-md-3 pl-1">
                            <div class="form-group">
                                <button type="button" class="btn btn-danger btnRemove btn-block mt-4"><?php echo $idioma['remover'];?></button>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <h5><?php echo $idioma['info_contato'];?></h5>
                    </div>
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label><?php echo $idioma['email'];?></label>
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="col-md-5 pl-1">
                        <div class="form-group">
                            <label><?php echo $idioma['telefone'];?></label>
                            <input type="tel" class="form-control" name="telefone">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 pr-1">
                        <div class="form-group">
                            <label><?php echo $idioma['endereco'];?></label>
                            <input type="text" class="form-control" name="endereco">
                        </div>
                    </div>
                    <div class="col-md-4 pl-1">
                        <div class="form-group">
                            <label><?php echo $idioma['numero'];?></label>
                            <input type="number" class="form-control" name="numero">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 pr-1">
                        <div class="form-group">
                            <label><?php echo $idioma['bairro'];?></label>
                            <input type="text" class="form-control" name="bairro">
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label><?php echo $idioma['cep'];?></label>
                            <input type="number" class="form-control" name="cep">
                        </div>
                    </div>
                    <div class="col-md-4 pl-1">
                        <div class="form-group">
                            <label><?php echo $idioma['cidade'];?></label>
                            <input type="text" class="form-control" name="cidade">
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <h5><?php echo $idioma['formacao'];?></h5>
                    </div>
                    <div class="col-md-3 pr-1">
                        <div class="form-group">
                            <label><?php echo $idioma['escolaridade'];?></label>
                            <select id="inputState" class="form-control" name="escolaridade">
                                <option selected><?php echo $idioma['escolha'];?>...</option>
                                <option value="Fundamental"><?php echo $idioma['fundamental'];?></option>
                                <option value="Médio"><?php echo $idioma['medio'];?></option>
                                <option value="Técnico"><?php echo $idioma['tecnico'];?></option>
                                <option value="Superior"><?php echo $idioma['superior'];?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 px-1">
                        <div class="form-group">
                            <label><?php echo $idioma['ano_grad'];?></label>
                            <input type="number" class="form-control" name="graduacao">
                        </div>
                    </div>

                    <div class="col-md-2 px-1">
                        <div class="form-group">
                            <label><?php echo $idioma['instituicao'];?></label>
                            <input type="text" class="form-control" name="instituicao">
                        </div>
                    </div>
                    <div class="col-md-2 px-1">
                        <div class="form-group">
                            <label><?php echo $idioma['cidade'];?></label>
                            <input type="text" class="form-control" name="grad_cidade">
                        </div>
                    </div>
                    <div class="col-md-2 pl-1">
                        <div class="form-group">
                            <label><?php echo $idioma['pais'];?></label>
                            <input type="text" class="form-control" name="grad_pais">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-4 pr-1">
                        <div class="form-group">
                            <label><?php echo $idioma['profissao'];?></label>
                            <input type="text" class="form-control" name="profissao">
                        </div>
                    </div>
                    <div class="col-md-8 pl-1">
                        <div class="form-group">
                            <label><?php echo $idioma['descricao'];?></label>
                            <input type="text" class="form-control" name="prof_desc">
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row p-2">
                    <div class="col-md-12 col-sm-6">
                        <h5><?php echo $idioma['idiomas'];?></h5>
                    </div>
                    
                    <div class="col-md-3 col-sm-6 pr-1">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check" type="checkbox" name="idioma[]" value="Português">
                                <span class="form-check-sign"><?php echo $idioma['pt'];?>
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 pl-1">
                        <select id="inputState" class="form-control" name="fluencia[]">
                            <option selected><?php echo $idioma['fluencia'];?>...</option>
                            <option value="Básico"><?php echo $idioma['basico'];?></option>
                            <option value="Intermediário"><?php echo $idioma['intermediario'];?></option>
                            <option value="Fluente"><?php echo $idioma['fluente'];?></option>
                        </select>   
                    </div>

                    <div class="col-md-3 col-sm-6 pr-1">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check" type="checkbox"  name="idioma[]" value="Inglês">
                                <span class="form-check-sign"><?php echo $idioma['en'];?>
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 pl-1">
                        <select id="inputState" class="form-control" name="fluencia[]">
                            <option selected><?php echo $idioma['fluencia'];?>...</option>
                            <option value="Básico"><?php echo $idioma['basico'];?></option>
                            <option value="Intermediário"><?php echo $idioma['intermediario'];?></option>
                            <option value="Fluente"><?php echo $idioma['fluente'];?></option>
                        </select>   
                    </div>

                </div>

                <div class="row p-2">
                    <div class="col-md-3 col-sm-6 pr-1"> 
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check" type="checkbox" name="idioma[]" value="Crioulo">
                                <span class="form-check-sign"><?php echo $idioma['cr'];?>
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 pl-1">
                        <select id="inputState" class="form-control" name="fluencia[]">
                            <option selected><?php echo $idioma['fluencia'];?>...</option>
                            <option value="Básico"><?php echo $idioma['basico'];?></option>
                            <option value="Intermediário"><?php echo $idioma['intermediario'];?></option>
                            <option value="Fluente"><?php echo $idioma['fluente'];?></option>
                        </select>   
                    </div>

                    <div class="col-md-3 col-sm-6 pr-1"> 
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check" type="checkbox" name="idioma[]" value="Francês">
                                <span class="form-check-sign"><?php echo $idioma['fr'];?>
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 pl-1">
                        <select id="inputState" class="form-control" name="fluencia[]">
                            <option selected><?php echo $idioma['fluencia'];?>...</option>
                            <option value="Básico"><?php echo $idioma['basico'];?></option>
                            <option value="Intermediário"><?php echo $idioma['intermediario'];?></option>
                            <option value="Fluente"><?php echo $idioma['fluente'];?></option>
                        </select>   
                    </div>

                </div>

                <div class="row p-2">
                    <div class="col-md-3 col-sm-6 pr-1">

                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check" type="checkbox" name="idioma[]" value="Espanhol">
                                <span class="form-check-sign"><?php echo $idioma['es'];?>
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 pl-1">
                        <select id="inputState" class="form-control" name="fluencia[]">
                            <option selected><?php echo $idioma['fluencia'];?>...</option>
                            <option value="Básico"><?php echo $idioma['basico'];?></option>
                            <option value="Intermediário"><?php echo $idioma['intermediario'];?></option>
                            <option value="Fluente"><?php echo $idioma['fluente'];?></option>
                        </select>   
                    </div>

                    <div class="col-md-3 col-sm-6 pr-1"> 
                        <div class="form-group">
                            <input type="text" class="form-control" name="idioma[]" placeholder="<?php echo $idioma['outro'];?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 pl-1">
                        <select id="inputState" class="form-control" name="fluencia[]">
                            <option selected><?php echo $idioma['fluencia'];?>...</option>
                            <option value="Básico"><?php echo $idioma['basico'];?></option>
                            <option value="Intermediário"><?php echo $idioma['intermediario'];?></option>
                            <option value="Fluente"><?php echo $idioma['fluente'];?></option>
                        </select>   
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <h5><?php echo $idioma['exp_profissional'];?></h5>
                    </div>
                </div>

                <div class="form-content-exp">
                    <div class="row">
                        <div class="col-md-12">
                            <p class=""><button type="button" id="btnAddExp" class="btn btn-primary btn-block mb-4"><i class="nc-icon nc-simple-add"></i></button></p>
                        </div>
                    </div>
                    <div class="expConteudo">    
                        <div class="row group">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label><?php echo $idioma['empresa'];?></label>
                                    <input type="text" class="form-control" name="empresa[]">
                                </div>
                            </div>
                            <div class="col-md-2 px-1">
                                <div class="form-group">
                                    <label><?php echo $idioma['pais'];?></label>
                                    <input type="text" class="form-control" name="pais[]">
                                </div>
                            </div>
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label><?php echo $idioma['inicio'];?></label>
                                    <input type="date" class="form-control" name="data_inicio[]">
                                </div>
                            </div>
                            <div class="col-md-3 pl-1">
                                <div class="form-group">
                                    <label><?php echo $idioma['fim'];?></label>
                                    <input type="date" class="form-control" name="data_termino[]">
                                </div>
                            </div>
                        </div>

                        <div class="row group">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label><?php echo $idioma['cargo'];?></label>
                                    <input type="text" class="form-control" name="cargo[]">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label><?php echo $idioma['funcoes'];?></label>
                                    <input type="text" class="form-control" name="funcoes[]">
                                </div>
                            </div>
                        </div>

                        <div class="row group">
                            <div class="col-md-8 pr-1">
                                <div class="form-group">
                                    <label><?php echo $idioma['cont_referencia'];?></label>
                                    <input type="text" class="form-control" name="nome_referencia[]">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label><?php echo $idioma['telefone'];?></label>
                                    <input type="tel" class="form-control" name="telefone_referencia[]">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-danger btnRemoveExp btn-block mt-4 mb-4"><?php echo $idioma['remover'];?></button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round"><?php echo $idioma['cadastrar'];?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

    <?php
    include_once './includes/footer.php';
    ?>