<?php
	require_once('city.php'); // ���������� ������ � ��������
	require_once('sfera.php'); 
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

// ���������� ������ �������
if ($action == 'getCity')
{
    if (isset($city[$_GET['region']]))
    {
        echo json_encode($city[$_GET['region']]); // ���������� ������ � JSON �������;
    }
    else
    {
        echo json_encode(array('�������� �������'));
    }

    exit;
}
if ($action == 'getpodsfera')
{
    if (isset($sferaphp[$_GET['sfera']]))
    {
        echo json_encode($sferaphp[$_GET['sfera']]); // ���������� ������ � JSON �������;
    }
    else
    {
        echo json_encode(array('�������� �����'));
    }

    exit;
}
if ($action == 'postResult')
{
    echo '<pre>' . htmlspecialchars(print_r($_POST, true)) . '</pre>';
    exit;
}
?>
	
