<?php 

  $ger_nome     = "Agenda";
  $ger_slug     = "agenda";
  $ger_arquivo  = "index.php";

  switch (@$_GET['act']) {
    case 'Gravar':
      $arrCampos['nome']      = $_POST['nome'];
      $arrCampos['telefone']  = $_POST['telefone'];
      $arrCampos['celular']   = $_POST['celular'];

      if (Agenda::cadastrar($arrCampos)) {
        $ger_msg 		= "Gravado com sucesso!";
        $ger_msg_tipo 	= 1;
        $_GET['act'] 	= null;
      } else {
        $ger_msg 		= "Um erro ocorreu.";
        $ger_msg_tipo 	= 0;
        $_GET['act'] 	= "Inserir";
      }
      break;
    case 'Atualizar':
      $arrCampos['nome'] 		= $_POST['nome'];
      $arrCampos['telefone'] 	= $_POST['telefone'];
      $arrCampos['celular'] 	= $_POST['celular'];
      $arrCampos['id'] 			= $_POST['id'];

      if (Agenda::editar($arrCampos)) {
        $ger_msg 		= "Alterado com sucesso!";
        $ger_msg_tipo 	= 1;
        $_GET['act'] 	= null;
      } else {
        $ger_msg 		= "Um erro ocorreu.";
        $ger_msg_tipo 	= 0;
        $_GET['act'] 	= "Alterar";
        $_GET['cod'] 	= $_POST['id'];
      }
      break;
    case 'Excluir':
      if (Agenda::deletar($_GET['cod'])){
        $ger_msg 		= "Excluído com sucesso!";
        $ger_msg_tipo 	= 1;
      } else {
        $ger_msg 		= "Um erro ocorreu.";
        $ger_msg_tipo 	= 0;
      }
      $_GET['act'] 		= null;
      break;
  }

  include_once("migalhas.php");

?>

  <section id="<?=$ger_slug?>">
    <div class="row">
          <div class="span3">
            <?php
              include_once("menu-lateral.php");
            ?>
          </div><!--/span-->

          <div class="span9">

        <h3><?=$ger_nome?></h3>

        <script>
          $(document).ready(function(){
            $("#cadform").bind("submit",function(){
              var error_status = false;

              $("#grp_nome").removeClass("error");
              $("#grp_telefone").removeClass("error");
              $("#grp_celular").removeClass("error");

              if ($("#nome").val() == "") {
                $("#grp_nome").addClass("error");
                $("#nome").focus();
                error_status = true;
                return false;

              } else if ($("#telefone").val() == "") {
                $("#grp_telefone").addClass("error");
                if (error_status == false) {
                  $("#telefone").focus();
                }
                return false;

              } else if ($("#celular").val() == "") {
                $("#grp_celular").addClass("error");
                if (error_status == false) {
                  $("#celular").focus();
                }
                return false;

              } else {
                return true;
              }
            });
            $(".botexcluir").bind("click",function(){
              popup_excluir("<?=$ger_arquivo?>",$(this).attr("rel"));
              return false;
            });
          }); // FIM document.ready
        </script>

        <?php
          $ger_msg_class = array( 0 => "alert-error" , 1 => "alert-success" , 2 => "alert-info");
          if (!empty($ger_msg)) {
        ?>
            <div class="alert alert-block <?=$ger_msg_class[$ger_msg_tipo]?>">
              <a class='close' data-dismiss='alert' href='#'>×</a><p class='alert-heading'><strong><?=$ger_msg?></strong></p>
            </div>
        <?php
          }

          switch(@$_GET['act']) {
            case "Inserir":
        ?>
              <form method="post" name="cadform" id="cadform" action="<?=$ger_arquivo?>?act=Gravar" class="well form-horizontal">
              <fieldset>
                <div class="control-group" id="grp_nome">
                  <label class="control-label">Nome</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="nome" id="nome" value="" maxlength="255">
                  </div>
                </div>
                <div class="control-group" id="grp_telefone">
                  <label class="control-label">Telefone</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="telefone" id="telefone" value="" maxlength="255">
                  </div>
                </div>
                <div class="control-group" id="grp_celular">
                  <label class="control-label">Celular</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="celular" id="celular" value="" maxlength="20">
                  </div>
                </div>
                <div class="form-actions">
                  <button class="btn btn-primary" type="submit">Inserir</button>
                  <a href="<?=$ger_arquivo?>" class="btn">Voltar</a>
                </div>
              </fieldset>
              </form>
        <?php
              break;
            case "Alterar":
  
              $rs = Agenda::getContato($_GET['cod']);
        ?>
              <form method="post" name="cadform" id="cadform" action="<?=$ger_arquivo?>?act=Atualizar" class="well form-horizontal">
              <fieldset>
                <div class="control-group" id="grp_nome">
                  <label class="control-label">Nome</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="nome" id="nome" value="<?=$rs[0]->nome?>" maxlength="255">
                  </div>
                </div>
                <div class="control-group" id="grp_telefone">
                  <label class="control-label">Telefone</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="telefone" id="telefone" value="<?=$rs[0]->telefone?>" maxlength="255">
                  </div>
                </div>
                <div class="control-group" id="grp_celular">
                  <label class="control-label">Celular</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="celular" id="celular" value="<?=$rs[0]->celular?>">
                  </div>
                </div>
                <div class="form-actions">
                  <input type="hidden" name="id" value="<?=$rs[0]->id?>">
                  <button class="btn btn-primary" type="submit">Alterar</button>
                  <a href="<?=$ger_arquivo?>" class="btn">Voltar</a>
                </div>
              </fieldset>
              </form>
        <?php
              break;
            default:
        ?>
              <p><a href="<?=$ger_arquivo?>?act=Inserir" class="btn btn-primary" id="add_bot">Inserir</a></p>
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Celular</th>
                    <th colspan="2">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $rs = Agenda::getContatos();
                  foreach ($rs as $key => $row) {
                  ?>
                    <tr>
                    <td><?=$row['nome']?></td>
                    <td><?=$row['telefone']?></td>
                    <td><?=$row['celular']?></td>
                    <td class="span1"><a href="index.php?act=Alterar&cod=<?=$row['id']?>"><i class="icon-edit"></i></a></td>
                    <td class="span1"><a href="#" class="botexcluir" rel="<?=$row['id']?>"><i class="icon-trash"></i></a></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
              </table>
        <?php
              break;
          }
        ?>

      </div>
  </section>
