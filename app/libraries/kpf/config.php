<?php
/*******************************************************************************
* config                                                                      	*
* Página de configuración del comercio                                                                      	*
* Version: 1.0                                                                 	*
* Date:    2014-02-20                                                          	*
* Author:  flow.cl                                                     			*
********************************************************************************/


/**
 * Ingrese aquí la URL de su página de éxito
 * Ejemplo: http://www.comercio.cl/kpf/exito.php
 * 
 * @var string
 */
$flow_url_exito = 'http://www.chicasbuenas.dev/kpf/exito';

/**
 * Ingrese aquí la URL de su página de fracaso
 * Ejemplo: http://www.comercio.cl/kpf/fracaso.php
 * 
 * @var string
 */
$flow_url_fracaso = 'http://www.chicasbuenas.dev/kpf/fracaso';

/**
 * Ingrese aquí la URL de su página de confirmación
 * Ejemplo: http://www.comercio.cl/kpf/confirmacion.php
 * 
 * @var string
 */
$flow_url_confirmacion = 'http://www.chicasbuenas.dev/kpf/confirma';

/**
 * Ingrese aquí la tasa de comisión de Flow que usará
 * Valores posibles:
 * Pago siguiente día hábil = 1 (Expreso)
 * Pago a tres días hábiles = 2 (Veloz)
 * Pago a cinco días hábiles = 3 (Normal)
 * 
 * @var int
 */
$flow_tasa_default = 3;

/**
 * Ingrese aquí la página de pago de Flow
 * Ejemplo:
 * Sitio de pruebas = http://flow.tuxpan.com/app/kpf/pago.php
 * Sitio de produccion = https://www.flow.cl/app/kpf/pago.php
 * 
 * @var string
 */
$flow_url_pago = 'http://flow.tuxpan.com/app/kpf/pago.php';

# Commerce specific config

/**
 * Ingrese aquí la ruta (path) en su sitio donde están las llaves
 * 
 * @var string
 */
$flow_keys = app_path() . '/libraries/kpf/keys';

/**
 * Ingrese aquí la ruta (path) en su sitio donde estarán los archivos de logs
 * 
 * @var string
 */
$flow_logPath = storage_path() . '/logs';

/**
 * Ingrese aquí el email con el que está registrado en Flow
 * 
 * @var string
 */
$flow_comercio = 'kattatzu@gmail.com';
?>
