<?php
	require_once('city.php'); // подключаем список с городами
	require_once('sfera.php'); 
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

// возвращаем список городов
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
	
