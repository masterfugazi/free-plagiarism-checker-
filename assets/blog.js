  //just a text editor init
$('#editor-container').trumbowyg({
    plugins: {
      resizimg: {
          minSize: 64,
          step: 16,
      }
  }
});

// Set functions
function saveEditorContent() {
  localStorage.setItem('EditedContent', blogContent);
  console.log('Data Saved');
}

// Dclares and Sets array for local storage items
let newEdits = localStorage.getItem('EditedContent') || "";
let valueChanger = 1;
let edits = [newEdits];
// console.log(localStorage.getItem('EditedContent'));

$("#editor-container").keyup(function(){
let updates = $('#editor-container').html();
localStorage.setItem('updatedText', updates);
console.log('Changed happned.');
});

getUpdates = localStorage.getItem('updatedText').replace(/[\[\],"]+/g,'');  + "<br>" ;
$("#editor-container").html(getUpdates);



// Saves Draft data to local storage
$("#saveAsDraft").click(function(){
let newEdits = $('#editor-container').html();
edits.push(newEdits);
localStorage.setItem('EditedContent', edits);
// console.log(localStorage.getItem('EditedContent'));

});

function getTextArray(){
 let savedEdits = document.getElementById('prevouseBlogs')
  for (i = 0; i < localStorage.length; i++) {
    text = localStorage.getItem('EditedContent').replace(/[\[\],"]+/g,'');  + "<br>" ;
    savedEdits.innerHTML += text; 
  }
}
getTextArray();


