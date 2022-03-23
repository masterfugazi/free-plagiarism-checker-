<?php 

include 'header.php';

if(isset($_GET['query'])) {
    $query = $_GET['query'];
    $query; 
} else {
    $query = " ";
}
// Requesting URL data array
$postData = array (
'key' => "14aab70406dccece24d4eac854cf87b9",
'data' => "'". $query."'"
);
$data = http_build_query($postData);
$url = "https://www.check-plagiarism.com/apis/checkPlag";
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

<!-- <h1>Plagiarism Checker</h1>
<p>THIS IS YOUR DATA:</p>
<?php 
print_r($decode);
?> -->
<!-- <br>
<br>
<br>
<p>THIS IS THE INITAL ARRAY DATA</p>
<?php print_r($data); ?>
<br>
<br>
<br> -->

<Section id="hero-section">
    <div class="header-tile-section">
        <h2>Scan Text Here For Plagiarism</h2>
    </div>  
    <div class="form-section">
        <form method="get">
                <textarea class="main-text-area" name="query" id="test" cols="30" rows="50" spellcheck="true"><?php echo $query; ?></textarea>
                    <div class="submit-scan-box">
                        <input type="submit" name="submit">
                    </div>
            </form>
    </div>  
</Section>
<section id="results-section">
    <div class="results-box">
        <?php
            if(empty($decode)) { //Checks if array is empty or not
                echo 'Nothing to scan yet!';
            } else {
                ?>
                <h2>Plagiarism Results:</h2> 
                <?php
                foreach($decode['details'] as $key => $value) {
                echo $value['query']  .'<br>';
                ?> 
                <p>Here's the url's found!</p> 

                <?php 
                $filter = array_filter($value['matched_urls']); //Removes missing array values
                foreach( $filter as $key => $urls) {
                    echo $urls . '<br>';
                } ?>
                
                <p>Total Matches: <?php echo $value['totalMatches']  .'<br>'; ?> </p>
                <?php
                }
            }
        ?>

<?php 
        if(isset($_GET['query'])) { ?>
             <div class="submit-scan-box">
                <a id="rescan-btn" type="button" href="/p-check/">New Scan <img class="btn-icon" src="./assets/icons/refresh-2-24.png"></a>
            </div>
        <?php
        }
    ?>
    </div>
</section>