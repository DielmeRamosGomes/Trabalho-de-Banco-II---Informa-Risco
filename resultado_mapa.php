<?php
require("conexao.php");
//include_once("conexao.php");

function parseToXML($htmlStr){
	$xmlStr=str_replace('<','&lt;',$htmlStr);
	$xmlStr=str_replace('>','&gt;',$xmlStr);
	$xmlStr=str_replace('"','&quot;',$xmlStr);
	$xmlStr=str_replace("'",'&#39;',$xmlStr);
	$xmlStr=str_replace("&",'&amp;',$xmlStr);
	return $xmlStr;
}

// Select all the rows in the markers table
$result_markers = "CALL MOSTRA_BOLETIM(); ";
$resultado_markers = mysqli_query($conexao, $result_markers);

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row_markers = mysqli_fetch_assoc($resultado_markers)){
  // Add to XML document node
  echo '<marker ';
  echo 'id="' . $row_markers['id'] . '" ';
  echo 'name="' . parseToXML($row_markers['name']) . '" ';
  echo 'address="' . parseToXML($row_markers['address']) . '" ';
  echo 'lat="' . $row_markers['lat'] . '" ';
  echo 'lng="' . $row_markers['lng'] . '" ';
  echo 'type="' . $row_markers['type'] . '" ';
  echo 'horaOcorrencia="' . "Hora: " . $row_markers['horaOcorrencia'] . '" ';
  echo 'dataOcorrencia="' . "Data: " . $row_markers['dataOcorrencia'] . '" ';

  if($row_markers['generoVitima'] == 1){
    $genero_aux = "Genero: Feminino";
  }
  else{
    $genero_aux = "Genero: Masculino";
  }
  echo 'generoVitima="' . $genero_aux . '" ';

  if($row_markers['fezBO'] == 1){
    $fezBO_aux = "Boletim de Ocorrencia: Reportado";
  }
  else{
    $fezBO_aux = "Boletim de Ocorrencia: Não Reportado";
  }
  echo 'fezBO="' . $fezBO_aux . '" ';
  echo 'nomeObjeto="' . "Objeto Roubado: " . $row_markers['nomeObjeto'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

