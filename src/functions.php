<?php
/**
 * Generic_Sniffs_Methods_OpeningMethodBraceBsdAllmanSniff.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Alexander Velichko <alvi@mail.ua>
 * @copyright 2006 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   http://matrix.squiz.net/developer/tools/php_cs/licence BSD Licence
 * @version   CVS: $Id: OpeningFunctionBraceBsdAllmanSniff.php,v 1.8
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
/**
 * Description.
 *
 * @return void
 */
function task1()
{
    $xml = simplexml_load_file('files/data.xml') or die('Невозможно загрузить данные!');
    echo '<h1>Order #' . $xml['PurchaseOrderNumber'] . ' from ' . $xml['OrderDate'] . '</h1>';
    foreach ($xml->Address as $address) {
        echo '<h2>' . $address['Type'] . '</h2>';
        foreach ($address->children() as $element) {
            echo '<span>' . $element->getName() . ' : <b>' . $element . '</b><span><br>';
        }

    }
    echo '<br>Delivery Notes : <b>' . $xml->DeliveryNotes . '<b><br>';
    echo '<h2>Order Items</h2>';
    foreach ($xml->Items->children() as $orderItems) {
        echo '<h3>Part Number: ' . $orderItems['PartNumber'] . '</h3>';
        foreach ($orderItems->children() as $orderItemsProperty) {
            echo '<span>' . $orderItemsProperty->getName() . ' : <b>' . $orderItemsProperty . '</b><span><br>';
        }

    }
}
/**
 * Description.
 *
 * @return void
 */
function task2()
{
    $arrayForJson = [
        'test1' => 1,
        'test2' => 2,
        'test3' => 2,
        'test4' => ['fire' => 8]

    ];

    $jsonContent = json_encode($arrayForJson);
    file_put_contents('files/output.json', $jsonContent);
    $jsonContent = file_get_contents('files/output.json');
    if (rand(0, 1) === 1) {
        $arrForChange = json_decode($jsonContent, true);
        $arrForChange['test5'] = 8;
        file_put_contents('files/output2.json', json_encode($arrForChange));
    }
    $jsonContentNew = file_get_contents('files/output2.json');
    $arrOld = json_decode($jsonContent, true);
    $arrNew = json_decode($jsonContentNew, true);
    $diffResult = array_diff_assoc($arrNew, $arrOld);
    print_r($diffResult);
}

/**
 * Description.
 *
 * @return number
 */
function task3()
{
    $numbers = [];
    $sum = 0;
    for ($i = 1; $i <= 50; $i++) {
        $numbers[] = mt_rand(0, 50);
    }
    $stringForCvs = implode(';', $numbers);
    file_put_contents('files/data.cvs', $stringForCvs);
    if (($handle = fopen("files/data.cvs", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            foreach ($data as $number) {
                if ($number % 2 === 0) {
                    $sum += $number;
                }

            }
        }
        fclose($handle);
    }
    return $sum;
}

