<?php

require_once('log.php'); 
require_once('city.php'); 
require_once('sfera.php'); 
require_once('include/config.php'); 
require('include/paging.inc.php');

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
if ($action == 'getCity')
{
    if (isset($city[$_GET['region']]))
    {
        echo json_encode($city[$_GET['region']]); // возвраащем данные в JSON формате;
    }
    else
    {
        echo json_encode(array('Выберите область'));
    }

    exit;
}
if ($action == 'getpodsfera')
{
    if (isset($sferaphp[$_GET['sfera']]))
    {
        echo json_encode($sferaphp[$_GET['sfera']]); // возвраащем данные в JSON формате;
    }
    else
    {
        echo json_encode(array('Выберите сферу'));
    }

    exit;
}
if ($action == 'postResult')
{
    echo '<pre>' . htmlspecialchars(print_r($_POST, true)) . '</pre>';
    exit;
}
?>
<?php include "templates/include/header.php" ?>


<?php include "templates/include/section.php" ?>
 
 
<?php include "templates/include/footer.php" ?>