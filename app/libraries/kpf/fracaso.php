<?php
/**
 * Página de fracaso del Comercio
 * Esta página será invocada por Flow cuando la transacción no se logre pagar
 * y el usuario presione el botón para retornar al comercio desde Flow
 */
include 'flowAPI.php';

// Inicializa la clase de flowAPI
$flowAPI = new flowAPI();

try {
	// Lee los datos enviados por Flow
	$flowAPI->read_result();
} catch (Exception $e) {
	error_log($e->getMessage());
	header($_SERVER['SERVER_PROTOCOL'] . ' 500 Ha ocurrido un error interno', true, 500);
	return;
}

//Recupera los datos enviados por Flow
$ordenCompra = $flowAPI->getOrderNumber();
$monto = $flowAPI->getAmount();
$concepto = $flowAPI->getConcept();
$pagador = $flowAPI->getPayer();
$flowOrden = $flowAPI->getFlowNumber();


?>

<html>
<head>
	<title>Página de fracaso de comercio</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<h1>Página de fracaso de Comercio</h1>
Su pago ha fracasado<br><br>
Orden de Compra: <?php echo $ordenCompra?><br />
Monto: <?php echo $monto?><br />
Descripción: <?php echo $concepto?><br />
Pagador: <?php echo $pagador?><br />
Flow Orden N°: <?php echo $flowOrden?><br />
<br>
<a href="../index.php">Intente nuevamente</a>
</body>
</html>