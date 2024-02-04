<?php
session_start();
	
	if($_SESSION['logado'] == 'logado'){
?>
<!DOCTYPE html >

<head>
<meta charset="utf-8">
<title>Edição</title>
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
<div id="sair">
<a href="logout.php"><h4>Sair</h4></a>
</div>
</div>
<div id="logo_topo">
	
</div>

<section id="navegacao">
  <?php
  	include("../conexao/conecta_db.php");
	
	$editar = $_GET['e'];
	
	$busca = mysql_query("select * from et_dest where cod_dest = '$editar' ") or die ("Não foi possivel encontrar os dados no banco. ". mysql_error());
		
		$reg = mysql_fetch_assoc($busca);
		?>
        <div class="tab-content" align="center">
    <div class="tab-pane active" id="tab1">
      <div id="lista_cem">
        <ul id="titulo">
          <li>Informe os dados do Destinatário ou Remetente</li>
        </ul>
      </div>
  <form action="../controle/edt_rem_dest.php" method="post">
    <input type="hidden" id="cod_dest" name="cod_dest" value="<?php echo $editar; ?>">
    <ul>
      <li>
        <label>Tipo Pessoa:</label>
        <select id="t_pessoa" name="t_pessoa">
          <?php 
			$tipo = $reg['tipo_pessoa'];
			if($tipo == 0){
		?>
          <option value="0">Remetente</option>
          <?php
			}else{
		?>
          <option value="1">Destinatário</option>
          <?php
			}
		 ?>
          <option value="rem">Remetente</option>
          <option value="des">Destinatário</option>
        </select>
      </li>
      <li>
        <label>Tratamento:</label>
        <input type="text" name="trata" id="trata" data-provide="typehead" value="<?php echo $reg['tratativa']; ?>">
      </li>
      <li>
        <label>Nome:</label>
        <input type="text" name="nome" id="nome" data-provide="typehead" value="<?php echo $reg['nome_dest']; ?>" required>
      </li>
      <li>
        <label>Cargo:</label>
        <input type="text" name="cargo" id="cargo" data-provide="typehead" value="<?php echo $reg['cargo']; ?>">
      </li>
      <li>
        <label>CEP:</label>
        <input type="text" name="cep" id="cep" data-provide="typehead" value="<?php echo $reg['cep']; ?>" required>
      </li>
      <li>
        <label>Estado:</label>
        <input type="text" name="uf" id="uf" data-provide="typehead" value="<?php echo $reg['estado']; ?>" required>
      </li>
      <li>
        <label>Cidade:</label>
        <input type="text" name="cidade" id="cidade" data-provide="typehead" value="<?php echo $reg['cidade']; ?>" required>
      </li>
      <li>
        <label>Bairro:</label>
        <input type="text" name="bairro" id="bairro" data-provide="typehead" value="<?php echo $reg['bairro']; ?>" required>
      </li>
      <li>
        <label>Rua:</label>
        <input type="text" name="rua" id="rua" data-provide="typehead" value="<?php echo $reg['rua']; ?>" required>
      </li>
      <li>
        <label>Número:</label>
        <input type="text" name="numero" id="numero" data-provide="typehead" value="<?php echo $reg['numero']; ?>" required>
      </li>
    </ul>
    <ul>
      <li>
        <input type="submit" id="btn_entrar" value="Alterar" class="btn btn-primary">
      </li>
    </ul>
  </form>
  </div>
  </div>
</section>
</body>
</html><?php
mysql_close($con);
	}else{
		?>
<script>
				alert('Você não encontra-se logado na sessão. Por vafor digite seu login e senha para entra no sistema!');
				location.replace("../index.html");
			</script>
<?php	
	}
	
	
?>