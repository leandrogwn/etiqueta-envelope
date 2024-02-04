<?php
session_start();
	//conexão com o banco
	include("../conexao/conecta_db.php");
	
	$usuario = preg_replace('/[^[:alnum:]_]/', '',$_POST['usuario']);
	$senha =  preg_replace('/[^[:alnum:]_]/', '',$_POST['senha']);
	
	$busca = mysql_query("select * from et_admin where login = '$usuario'") or die ("Não foi possivel carregar os dados admin. ".mysql_error());
	
	$res_busca = mysql_fetch_assoc($busca);
	$logindb = $res_busca['login'];
	$senhadb = $res_busca['senha'];
	
	
	if($usuario == $logindb && $senha == $senhadb){
		$_SESSION['logado'] = 'logado';
?>
<!DOCTYPE html >

<head>
<meta charset="utf-8">
<title>Envelopes</title>
<!-- Bootstrap -->
<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../css/style.css" rel="stylesheet" media="screen">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.js" type="text/javascript"></script>
<script src="../js/getCep.js"></script>
</head>
<body>
<div id="topo">
  <div id="sair"> <a href="logout.php">
    <h4>Sair</h4>
    </a> </div>
</div>
<div id="logo_topo"> </div>
<section id="navegacao">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Cadastrar Remetente / Destinatário</a></li>
    <li><a href="#tab2" data-toggle="tab">Listar Remetente / Destinatário</a></li>
    <li><a href="#tab3" data-toggle="tab">Gerar Etiqueta</a></li>
  </ul>
  <div class="tab-content" align="center">
    <div class="tab-pane active" id="tab1">
      <div id="lista_cem">
        <ul id="titulo">
          <li>Informe os dados do Destinatário ou Remetente</li>
        </ul>
      </div>
      <form action="../controle/add_rem_dest.php" method="post">
        <ul>
          <li>
            <label>Tipo Pessoa:</label>
            <select id="t_pessoa" name="t_pessoa">
              <option value="0">Remetente</option>
              <option value="1">Destinatário</option>
            </select>
          </li>
          <li>
            <label>Tratamento:</label>
            <input type="text" name="trata" id="trata" data-provide="typehead" >
          </li>
        </ul>
        <ul>
          <li>
            <label>Nome:</label>
            <input type="text" name="nome" id="nome" data-provide="typehead" required>
          </li>
          <li>
            <label>Cargo:</label>
            <input type="text" name="cargo" id="cargo" data-provide="typehead">
          </li>
        </ul>
        <ul>
          <li>
            <label>CEP:</label>
            <input type="text" name="cep" id="cep" data-provide="typehead" required>
          </li>
          <li>
            <label>Estado:</label>
            <input type="text" name="uf" id="uf" data-provide="typehead" required>
          </li>
        </ul>
        <ul>
          <li>
            <label>Cidade:</label>
            <input type="text" name="cidade" id="cidade" data-provide="typehead" required>
          </li>
          <li>
            <label>Bairro:</label>
            <input type="text" name="bairro" id="bairro" data-provide="typehead" required>
          </li>
        </ul>
        <ul>
          <li>
            <label>Rua:</label>
            <input type="text" name="rua" id="rua" data-provide="typehead" required>
          </li>
          <li>
            <label>Número:</label>
            <input type="text" name="numero" id="numero" data-provide="typehead" required>
          </li>
        </ul>
        <ul>
          <li>
            <input type="submit" id="btn_entrar" value="Gravar" class="btn btn-primary">
          </li>
        </ul>
      </form>
    </div>
    <div class="tab-pane" id="tab2">
      <?php
	  	$busca = mysql_query("select * from et_dest order by nome_dest") or die("Não foi possível carregar dados do banco. ".mysql_error());
			?>
      <div id="lista">
        <ul id="titulo">
          <li>Tipo</li>
          <li>Tratatamento</li>
          <li>Nome</li>
          <li>Ações</li>
        </ul>
        <?php
		while ($reg = mysql_fetch_assoc($busca)){
		?>
        <ul>
          <li>
            <?php 
				if($reg['tipo_pessoa'] == 1){
					echo 'DESTINATARIO';
				}else{
					echo 'REMETENTE';
				};
			?>
          </li>
          <li><?php echo $reg['tratativa'];?></li>
          <li><?php echo $reg['nome_dest'];?></li>
          <li><a href="editar.php?e=<?php echo $reg['cod_dest'];?>">Alterar</a> - <a href="../controle/rem_rem_dest.php?r=<?php echo $reg['cod_dest'];?>" onclick="javascript:return confirm('Atenção!  Deseja excluir esse registro?')">Excluir</a></li>
          <hr>
        </ul>
        <?php
		}
	  ?>
      </div>
    </div>
    <div class="tab-pane" id="tab3">
      <div id="lista_ger">
        <ul id="titulo">
          <li>Selecione o Destinatario ou Remetente para Gerar a Etiqueta</li>
        </ul>
      </div>
      <?php
	$busca_gerar = mysql_query("select * from et_dest order by nome_dest") or die ("Não foi possivel localizar os dados no banco. ".mysql_error());
?>
      <form action="../controle/gerar.php"  target="_blank" method="post">
        <ul>
          <li>Remetente / Destinatario</li>
          <li>
            <select name="rem_dest" id="rem_dest">
              <?php
		while($reg_gerar = mysql_fetch_assoc($busca_gerar)){
		?>
              <option value="<?php echo $reg_gerar['cod_dest']; ?>"><?php echo $reg_gerar['nome_dest']; ?></option>
              <?php
	}
		?>
            </select>
          </li>
        </ul>
        <ul>
          <li>Observações</li>
          <li>
            <input type="text" name="obs" id="obs" data-provide="typehead">
          </li>
        </ul>
        <ul>
          <li>
            <input type="submit" id="btn_entrar" value="Gerar" class="btn btn-primary">
          </li>
        </ul>
      </form>
    </div>
  </div>
</section>
</body>
</html><?php
	}else{
		?>
<script>
				alert('Usuário ou senhas não conferem! Tente novamente.')
				location.replace("../../publicar/indexr.php");
			</script>
<?php 
	}
?>
