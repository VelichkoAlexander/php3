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

