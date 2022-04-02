window.onload = function(){ 




// Auto placeholder text
  timeout_var = null;

function typeWriter(selector_target, text_list, placeholder = false, i = 0, text_list_i=0, delay_ms=200) {
    if (!i) {
        if (placeholder) {
            document.querySelector(selector_target).placeholder = "";
        }
        else {
            document.querySelector(selector_target).innerHTML = "";
        }
    }
    txt = text_list[text_list_i];
    if (i < txt.length) {
        if (placeholder) {
            document.querySelector(selector_target).placeholder += txt.charAt(i);
        }
        else {
            document.querySelector(selector_target).innerHTML += txt.charAt(i);
        }
        i++;
        setTimeout(typeWriter, delay_ms, selector_target, text_list, placeholder, i, text_list_i);
    }
    else {
        text_list_i++;
        if (typeof text_list[text_list_i] === "undefined")  {
            setTimeout(typeWriter, (delay_ms*5), selector_target, text_list, placeholder);
        }
        else {
            i = 0;
            setTimeout(typeWriter, (delay_ms*8), selector_target, text_list, placeholder, i, text_list_i);
        }
    }
}

text_list = [
    "Paste in your text here...",
    "Shhh...no professors allowed. ;)",
    "Whatever this is, it better be good.",
    "It's not plagiarism if you're giving credit.",
    "A good poet will usually borrow from authors",
    "Keep up the hard work, you're doing great!",
    "Copy me, copying you, copying me, copy that???",
    "Don't show this to the boss.",
    "Share this with a friend so they stop copying you!",
    "This is your sign to get more coffee, and book that vacation!"
];

return_value = typeWriter("#main-text-box", text_list, true);


  //add word counter

  // Set the utility functions
  // function darkModeToggle() {
  //   document.body.style.backgroundColor = 'rgb(22 22 22)';
  //   document.body.style.color = '#fff';
  //   document.getElementById('toolbar').style.backgroundColor = 'rgb(22 22 22)';
  // }
  
  
    function closePWindow() {
      document.getElementById('p-results').style.display = 'none';
    }

    function showPWindow() {
      document.getElementById('p-results').style.display = 'block';
    }

    function copyToClipboard() {
      document.getElementById("main-text-box").select();
      document.execCommand('copy');
    }

    function delAllText() {
      let textarea = document.getElementById("main-text-box");
      textarea.value = '';
    }
  

    function maxPWindow() {
      document.getElementById('p-results').style.height = '218px';
      document.getElementById('p-results').style.overflowY = 'scroll';
      document.getElementById('max').style.display = 'none';
      document.getElementById('min').style.display = 'block';
    }

    function minPWindow() {
      document.getElementById('p-results').style.height = '19px';
      document.getElementById('p-results').style.overflowY = 'hidden';
      document.getElementById('min').style.display = 'none';
      document.getElementById('max').style.display = 'block';
    }

    function reScan() {
        let url = '/p-check/';
        window.location = url;
      }


    //Get buttons
    let closepbtn = document.getElementById('hide');

    let reScanBtn = document.getElementById('rescan');

    let minBtn = document.getElementById('min');

    let maxBtn = document.getElementById('max');

    let copyBtn = document.getElementById('copy');

    let delBtn = document.getElementById('del');

    let showpBtn = document.getElementById('show');
    

    // Call functions
    copyBtn.onclick = function () {
      copyToClipboard();
    }

    delBtn.onclick = function () {
      delAllText();
    }

    reScanBtn.onclick = function () {
        reScan();
        document.getElementById('p-results').style.display = 'none';
    }

    minBtn.onclick = function () {
      minPWindow();
    }

    maxBtn.onclick = function () {
      maxPWindow();
    }

    showpBtn.onclick = function () {
      showPWindow();
      showpBtn.style.display = 'none';
    }

    closepbtn.onclick = function () {
      closePWindow();
      showpBtn.style.display ='block';
    }
}