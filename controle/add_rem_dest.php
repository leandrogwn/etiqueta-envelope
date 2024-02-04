<?php
	session_start();
	
	if($_SESSION['logado'] == 'logado'){
		
	$t_pessoa = $_POST['t_pessoa'];
	$trata = $_POST['trata'];
	$nome = $_POST['nome'];
	$cargo = $_POST['cargo'];
	$cep = $_POST['cep'];
	$uf = $_POST['uf'];
	$cidade = $_POST['cidade'];
	$bairro = $_POST['bairro'];
	$rua = $_POST['rua'];
	$numero = $_POST['numero'];
	
	include("../conexao/conecta_db.php");
	
	$insere = "insert into et_dest (tipo_pessoa, tratativa, nome_dest, cargo, estado, cidade, bairro, rua, numero, cep) values ('$t_pessoa','$trata','$nome','$cargo','$uf','$cidade','$bairro','$rua','$numero','$cep')";
	
	mysql_select_db($db, $con);
		$resultado = mysql_query($insere,$con) or die(mysql_error());
		if($resultado){
		?>
<script type="text/javascript">
				alert ("Os dados foram gravados com sucesso.");
				location. replace ("../pages/principal.php");
				
			</script>
<?php
	}else{
		?>
<script type="text/javascript">
				alert ("Algo deu errado na inserção, tente novamente.");
				location. replace ("../pages/principal.ph");
			</script>
<?php
	}
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