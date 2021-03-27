<?php

require('config.php');

session_start();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}
require '../connection.php';
echo $email = $_SESSION['email'];
echo $name = $_SESSION['name'];
if ($success === true)
{
    
    $sql = "UPDATE jobskrreg SET status= 'Paid', paid_date = now() WHERE email = '$email';";
    $result = $connection->query($sql);
    if ($result === true AND !empty($_POST['razorpay_payment_id'])) {
        $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
        $sql = "INSERT INTO can_basic_info (user_id, name) VALUES ('$email', '$name')";
        $connection->query($sql);
        header("Location:../cand-dashboard.php");
        $_SESSION['paystat'] = "Paid";
    }
    else
    {
        $html = "<p>Error: Already Paid or Database Error{$connection->error}</p>";
        
    }

}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
