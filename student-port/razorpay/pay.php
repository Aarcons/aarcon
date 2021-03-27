<?php

require('config.php');
require('razorpay-php/Razorpay.php');
session_start();
$serv_name = $_SESSION['serv_name'];
require '../../connection.php';
$sql = "SELECT * FROM stu_srv_req_rate WHERE service = '$serv_name'";
$result = $connection->query($sql);
$row = $result->fetch_assoc();
$rate = $row['rate'];
// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => rand(),
    'amount'          => $rate * 100, // 2000 rupees in paise//$rate
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'automatic';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
{
    $checkout = $_GET['checkout'];
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => $_SESSION['name'],
    "description"       => $_SESSION['serv_name'],
    "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
    "prefill"           => [
    "name"              => $_SESSION['name'],
    "email"             => "",
    "contact"           => $_SESSION['mobile'],
    ],
    "notes"             => [
    "address"           => $_SESSION['address'],
    "merchant_order_id" => "ST".rand(),
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

require("checkout/{$checkout}.php");
$_SESSION['amount'] = $rate;