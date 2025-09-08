<?php
session_start();

$otp = rand(100000, 999999);
$_SESSION['otp'] = $otp;
$mobile = $_POST['contact']; // 📌 number entered by user

$message = "Your OTP is $otp";

// 🔐 Replace YOUR_API_KEY with your Fast2SMS API Key
$fields = array(
    "sender_id" => "FSTSMS",
    "message" => $message,
    "language" => "english",
    "route" => "p",
    "numbers" => $mobile,
    "flash" => "0"
);

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($fields),
    CURLOPT_HTTPHEADER => array(
        "authorization: DKjROeg0LbFv7ydJ25UAQo3XlkGT6cHYst84S9BxuEnPwimICfXzANJYk5gaDHPiswF0yBGp3v2UmchZ",
        "accept: */*",
        "cache-control: no-cache",
        "content-type: application/json"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo "<script>
            alert('OTP sent successfully ✅');
            window.location.href = 'enter_otp.php';
        </script>";
}
?>
