<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="icon" href="img/icon_SUS_256_256.png" type="image/png" sizes="16x16">
	<title>Cartão SUS</title>	
</head>
<body> 
	<h1>Pronto</h1>
	<h2>Imprima, recorte e platifique-o</h2>

	<figure id="container">
		<figcaption>
		
			<?php
				include "sus/sus.php";

				$nome = $_GET["texto-nome"];
				$data = $_GET["texto-data"];
				$sexo = $_GET["sexo"];
				$number = $_GET["texto-numero"];

				$data = new DateTime($data);
				$niver = $data->format("d/m/Y");

				$vetorsus = str_split($number);

				$pt1 = "$number[0]$number[1]$number[2]";
				$pt2 = "$number[3]$number[4]$number[5]$number[6]";
				$pt3 = "$number[7]$number[8]$number[9]$number[10]";
				$pt4 = "$number[11]$number[12]$number[13]$number[14]";

				

				echo "$nome<br>";
				echo "Data Nasc.: $niver<br>";
				echo "Sexo: $sexo<br>";
				echo $pt1." ".$pt2." ".$pt3." ".$pt4."<br>";

				################

		function geraCodigoBarra($numero){
		$fino = 1;
		$largo = 3;
		$altura = 20;
		
		$barcodes[0] = '00110';
		$barcodes[1] = '10001';
		$barcodes[2] = '01001';
		$barcodes[3] = '11000';
		$barcodes[4] = '00101';
		$barcodes[5] = '10100';
		$barcodes[6] = '01100';
		$barcodes[7] = '00011';
		$barcodes[8] = '10010';
		$barcodes[9] = '01010';
		
		for($f1 = 9; $f1 >= 0; $f1--){
			for($f2 = 9; $f2 >= 0; $f2--){
				$f = ($f1*10)+$f2;
				$texto = '';
				for($i = 1; $i < 6; $i++){
					$texto .= substr($barcodes[$f1], ($i-1), 1).substr($barcodes[$f2] ,($i-1), 1);
				}
				$barcodes[$f] = $texto;
			}
		}
		
		echo '<img src="imagens/p.gif" width="'.$fino.'" height="'.$altura.'" border="0" />';
		echo '<img src="imagens/b.gif" width="'.$fino.'" height="'.$altura.'" border="0" />';
		echo '<img src="imagens/p.gif" width="'.$fino.'" height="'.$altura.'" border="0" />';
		echo '<img src="imagens/b.gif" width="'.$fino.'" height="'.$altura.'" border="0" />';
		
		echo '<img ';
		
		$texto = $numero;
		
		if((strlen($texto) % 2) <> 0){
			$texto = '0'.$texto;
		}
		
		while(strlen($texto) > 0){
			$i = round(substr($texto, 0, 2));
			$texto = substr($texto, strlen($texto)-(strlen($texto)-2), (strlen($texto)-2));
			
			if(isset($barcodes[$i])){
				$f = $barcodes[$i];
			}
			
			for($i = 1; $i < 11; $i+=2){
				if(substr($f, ($i-1), 1) == '0'){
  					$f1 = $fino ;
  				}else{
  					$f1 = $largo ;
  				}
  				
  				echo 'src="imagens/p.gif" width="'.$f1.'" height="'.$altura.'" border="0">';
  				echo '<img ';
  				
  				if(substr($f, $i, 1) == '0'){
					$f2 = $fino ;
				}else{
					$f2 = $largo ;
				}
				
				echo 'src="imagens/b.gif" width="'.$f2.'" height="'.$altura.'" border="0">';
				echo '<img ';
			}
		}
		echo 'src="imagens/p.gif" width="'.$largo.'" height="'.$altura.'" border="0" />';
		echo '<img src="imagens/b.gif" width="'.$fino.'" height="'.$altura.'" border="0" />';
		echo '<img src="imagens/p.gif" width="1" height="'.$altura.'" border="0" />';
	}

	geraCodigoBarra('0123456789');
				
			?>
		
		
		</figcaption>
		<img src="img/2125x690-2.png" width="652" height="215">	
	</figure>
	<br>
	<a href="index.php">Voltar</a>
	<br>
	<a href="#" onclick="window.print();">Imprimir Página</a>

	
</body>
</html>