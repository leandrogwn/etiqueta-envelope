<?php
	session_start();
	
	if($_SESSION['logado'] == 'logado'){

include("../conexao/conecta_db.php");

		$trata = $_POST['trata'];
		$cod = $_POST['rem_dest'];
		$obs = $_POST['obs'];
		
		$busca = mysql_query("select * from et_dest where cod_dest = '$cod' ") or die ("Não foi possivel selecionar os dados. ".mysql_error());
		
		$reg = mysql_fetch_assoc($busca);
		
		?>
<style type="text/css">
body, td, th {
	font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
	font-style: normal;
	font-weight: bold;
	font-size: 9px;
}
</style>
<div style="text-transform:uppercase;">
  
    <?php 
				if($reg['tipo_pessoa'] == 1){
					echo 'DESTINATARIO';
				}else{
					echo 'REMETENTE';
				};
			?><br>
  <?php echo $reg['tratativa']; ?><br>
 <?php echo $reg['nome_dest']; ?><br>
  <?php echo $reg['cargo']; ?><br>
  Rua <?php echo $reg['rua'];?>, <?php echo $reg['numero'];?> - <?php echo $reg['bairro'];?><br>
  <?php echo $reg['cep'];?> - 
  <?php echo $reg['cidade'];?>, 
  <?php echo $reg['estado'];?><br>
  
  OBSERVAÇÕES: <?php echo $obs; ?><br>
</div>
<script>
		function funcaoImprimir(){
			window.print();
		}
		</script><br>
        <br>
        <br>
        <br>
        <br>
        <input type="button" value="Imprimir" onclick="javascript:document.title = ''; funcaoImprimir()" />
        <?php
	}else{
		?>
        <script>
	alert('Você não encontra-se logado na sessão. Por vafor digite seu login e senha para entra no sistema!');
	location.replace("../index.html");
</script>
        <?php	
	}
?>
