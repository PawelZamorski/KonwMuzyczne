/* 
* author: Pawel Zamorski
* Lazy Load: Download youtube thumbnails and append them to the gallery
* 
*/

var youtube = document.querySelectorAll( ".youtube-img-container" );
for (var i = 0; i < youtube.length; i++) {
    var id = youtube[i].dataset.youtubeid;
	youtube[i].setAttribute("onclick", "openModal('" + id + "')");
	var source = "https://img.youtube.com/vi/"+ id +"/sddefault.jpg";
	// Load the image asynchronously
    var image = new Image();
        image.src = source;
		image.alt = "youtube thumbnail";
		image.setAttribute("class", "youtube-img");
//		image.onclick = function() {openModal(id)}		
        image.addEventListener( "load", function() {
            youtube[ i ].appendChild( image );
        }( i ) );
}

/* Modal Functions */
function openModal(movieID) {
  myModal = document.getElementById('myModal');  
  myModal.style.display = "block";
  var parent = document.getElementById('iframe-modal');
  /*Create iframe with 'source' argument*/
  var movieSource = "https://www.youtube.com/embed/" + movieID + "?&rel=0&autoplay=1";
  var iframe = document.createElement("iframe");
  iframe.id = "iframeModal";
  iframe.src = movieSource;
  iframe.setAttribute('allowfullscreen', '1');
  parent.appendChild(iframe);
  /* Hide 'id=scrollUp' element*/
  document.getElementById('scrollUp').style.visibility = "hidden";
  /*Add enventListener to the window - escape key*/
  window.addEventListener("keydown", closeModalOnEscapeKey);  
  /*Add eventListener to the window - close modal when clicking on element with class .modal*/
  window.addEventListener("click", closeModalOnClick);
}

function closeModal() {
  /*Remove iframe element*/
  var iframe = document.getElementById('iframeModal');
  iframe.parentNode.removeChild(iframe);
  document.getElementById('myModal').style.display = "none";
  /*Show 'id=scrollUp' element*/
  document.getElementById('scrollUp').style.visibility = "visible";
  /*Remove eventListener from the window*/
  window.removeEventListener("keydown", closeModalOnEscapeKey);
  /*Remove eventListener from the window*/
  window.removeEventListener("click", closeModalOnClick);  
}

function closeModalOnClick(event) {
	if(event.target === myModal) {
		closeModal();
	}
}

function closeModalOnEscapeKey(event){
  if (event.keyCode === 27) {
    closeModal();
  }
}
