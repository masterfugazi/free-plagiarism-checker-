<?php include 'header.php'; ?>

<!-- <?php print_r($decode); ?> 
<?php print_r($data); ?>  -->
<body>
<section id="hero-section">
    <div class="header-tile-section">
        <h2>Scan Your Text For Plagiarism</h2>
        <p>Powered by FreePlagiarismChecks</p>
        <div class="tool-bar" id="toolbar">
            <button title="Copy All Your Text" class="icon-btn" id="copy"><img src="./assets/icons/copy.svg" alt="Copy all text"></button>
            <button title="Delete All Your Text" class="icon-btn" id="del"><img src="./assets/icons/trash.svg" alt="Delete all text"></button>
            <?php if(isset($_GET['query'])) { ?>
                <button title="Run a New Scan" id="rescan" class="icon-btn"><img src="./assets/icons/codescan-checkmark.svg" alt="New Scan"></button>
                <?php } ?>
                <button title="Show Window" id="show" class="icon-btn" style="display: none;"><img src="./assets/icons/eye.svg" alt="show Window"></button>
            <div><p id="word-counter"></p></div>
        </div>
    </div>  
    <div class="form-section">
        <form method="get">
                <textarea class="main-text-area" name="query" id="main-text-box" cols="30" rows="50" spellcheck="true"><?php if(isset($_GET['query'])) { echo $query;} else {}?></textarea>
                    <div class="submit-scan-box">
                    <?php if(isset($_GET['query'])) { ?>
                        <input type="submit" name="submit" value="Rescan Text">
                        <?php } else { ?>
                            <input type="submit" name="submit" value="Scan Text">
                    <?php } ?>
                        </div>
            </form>
    </div>  
</section>

        <?php
            if(!isset($_GET['query'])) { //Checks if array is empty or not
                    echo '<p class="nothing-to-scan-text">Nothing to scan yet...</p>';
            } else {
                ?>
                <div id="p-results" class="results-box" style="display:block;">
                <div class="p-box-controls">
                <button title="Close Window" id="hide" class="icon-btn"><img src="./assets/icons/x-circle.svg" alt="Close Window"></button>
                <button title="Minimize Window" id="min" class="icon-btn"><img src="./assets/icons/eye-closed.svg" alt="minimize"></button>
                <button style="display: none;" title="Maximize Window" id="max" class="icon-btn"><img src="./assets/icons/eye.svg" alt="minimize"></button>
                </div>
                <div class="title-box">

                <div class="title-description">
                <p>Text scanned:</p>
                </div>
                <p class="results-p-bold"><?php echo $decode['query']?></p>
                <div class="title-description">
                <p>Total Matches Found:  <span class="results-p-bold"><?php echo $decode['totalMatches']?></span></p>
                </div>
                </div>
                <?php
                foreach($decode['webs'] as $key => $value) {
                ?>
                <div class="results-border">
                <div class="title-description"><p>Website Title:</p></div>
                <p class="results-p"><?php echo $value['title'];?></p>

                <div class="title-description"><p>Similair Text:</p></div>
                    <p class="results-p"><?php echo $value['desc']; ?></p>

                <div class="title-description"><p>Url with similar text:</p></div>
                <a class="results-link" target="_blank" href="<?php echo $value['url']; ?>"><?php echo $value['url']; ?></a>
                </div>
                <?php
                }
            }
        ?>
</div>
<!-- <section id="who-we-are">
    <div class="content-row">
<div class="box">1</div>
<div class="box">2</div>
<div class="box">3</div>
</div>
</section> -->
</body>
<script type="text/javascript" src="./assets/main.js"></script>
