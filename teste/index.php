<html>
<head>
<title>Localização de endereço através do CEP usando jQuery e PHP</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script src="jquery.js" type="text/javascript"></script>
<script src="getEndereco.js" type="text/javascript"></script>
<script type="text/javascript">
    function funcao(){
            
                getEndereco($("#cep").val());
            
	}
</script>
</head>
<body>
Cep:
<input type="text" maxlength="8" value="" id="cep" onBlur="funcao()"/>
<br/>
<p id="loadingCep"></p>
Cidade:
<input type="text" id="cidade"/>
<br/>
Estado:
<input type="text" readonly="readonly" id="estado"/>
</body>
</html>