function openPopup() {
  document.getElementById("overlayId").style.display = "flex";
}

function closePopup() {
  document.getElementById("overlayId").style.display = "none";
}

function addBlog() {

  //Initialization of variables..

  var blogtitle = document.getElementById("title").value;
  var blogcont = document.getElementById("blogCont").value;


  //Replace the line spacing in textarea with <br> tag.

  var replace = blogcont.replace(/\n/g, '<br>');


  //Creating the required tags and classes to store the data in and append to the page.

  var subcont = document.createElement('div');
  subcont.classList.add("sub-cont");

  var subcomment = document.createElement('div');
  subcomment.classList.add("sub-comment");

  var blogtxtarea = document.createElement('textarea');
  var blogbtn = document.createElement('button');

  var txtareatxt = blogtxtarea.value;
  blogbtn.innerHTML = "Send";
  blogbtn.id = 'sendcom';

  blogbtn.addEventListener('click',function(){
    commentIt(this);
  })

  var newbt = document.createElement('h2');
  var newbc = document.createElement('p');

  newbt.innerHTML = blogtitle;
  newbc.innerHTML = replace;


  //Append the variables to the new blog

  subcont.appendChild(newbt);
  subcont.appendChild(newbc);

  subcomment.appendChild(blogtxtarea);
  subcomment.appendChild(blogbtn);

  subcont.appendChild(subcomment);

  contId.appendChild(subcont);
}


//Implementation of comments

function commentIt(button) {

  var parentDiv = button.parentNode;
  var gparentDiv = parentDiv.parentNode;
  
  var inputText = parentDiv.querySelector('textarea').value;
  var realText = inputText.replace(/\n/g, '<br>');

  var newDiv = document.createElement('div');
  newDiv.className = 'commented';

  newDiv.innerHTML = realText;

  gparentDiv.append(newDiv);

}
