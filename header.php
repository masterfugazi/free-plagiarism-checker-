<?php
if(isset($_GET['query'])) {
    $query = $_GET['query'];
    $query; 
} else {
    $query = " ";
}

// Requesting URL data array
$postData = array (
'key' => "1206445468e237a588cc67f919d27fea",
'query' => "'". $query."'"
);
$data = http_build_query($postData);
$url = "https://www.check-plagiarism.com/apis/checkSentence";
//$url = "https://www.check-plagiarism.com/apis/"; //Checks how many querys have been made

// Initlizing cURL
$ch =  curl_init();

// URL to submit 
curl_setopt($ch, CURLOPT_URL, $url);

// Return output instead of outtputting it
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// wE ARE DAOING A POST REQUEST
curl_setopt($ch, CURLOPT_POST, 1);

// ADDING THE VARIABLES TO THE REQUEST
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// EXECUTE THE REQUEST
$output = curl_exec($ch);

if($output === FALSE) {
    echo "cURL Error:". curl_error($ch);
} else {
    $decode = json_decode($output, true);
}

curl_close($ch);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="100% Free Plagiarism scanner for your school, work, blog, or any type of writing project.">
    <meta name="keywords" content="Plagiarism, scanner, Plagiarism scanner, free">
    <meta name="author" content="FreePlagiarismChecks.com">
    <title>Free Plagiarism Checker</title>
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="stylesheet" href="./assets/trumbowyg/dist/ui/trumbowyg.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
    <!-- Hotjar Tracking Code for https://freeplagiarismchecks.com -->
<!-- <script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:2902213,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script> -->
</head>
<body>