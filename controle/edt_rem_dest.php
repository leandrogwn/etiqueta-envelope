<?php
	session_start();
	
	if($_SESSION['logado'] == 'logado'){
		
	$cod_dest = $_POST['cod_dest'];	

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
	
	$atualiza = ("update et_dest set tipo_pessoa = '$t_pessoa', tratativa = '$trata', nome_dest = '$nome', cargo = '$cargo', estado = '$uf', cidade = '$cidade', bairro = '$bairro', rua = '$rua', numero = '$numero', cep = '$cep' where cod_dest = '$cod_dest' ");
	
	mysql_select_db($db, $con);
		$resultado = mysql_query($atualiza,$con) or die(mysql_error());
		if($resultado){
		?>
<script type="text/javascript">
				alert ("Os dados foram alterados com sucesso.");
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