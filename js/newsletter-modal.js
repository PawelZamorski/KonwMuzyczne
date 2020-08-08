/* 
* author: Pawel Zamorski
*/

function closeNewsletterModal() {
  document.getElementById('newsletterModal').style.display = "none";
  /*Show 'id=scrollUp' element*/
  document.getElementById('scrollUp').style.visibility = "visible";
  /*Remove eventListener from the window*/
  window.removeEventListener("keydown", closeNewsletterModalOnEscapeKey);
  /*Remove eventListener from the window*/
  window.removeEventListener("click", closeNewsletterModalOnClick);  
}

function closeNewsletterModalOnClick(event) {
	if(event.target === newsletterModal) {
		closeNewsletterModal();
	}
}

function closeNewsletterModalOnEscapeKey(event){
  if (event.keyCode === 27) {
    closeNewsletterModal();
  }
}

function openNewsletterModal() {
  document.getElementById('newsletterModal').style.display = "block";
  /* Hide 'id=scrollUp' element*/
  document.getElementById('scrollUp').style.visibility = "hidden";
  /*Add enventListener to the window - escape key*/
  window.addEventListener("keydown", closeNewsletterModalOnEscapeKey);  
  /*Add eventListener to the window - close modal when clicking on element with class .modal*/
  window.addEventListener("click", closeNewsletterModalOnClick);
}


// NEW FUNCTIONS

// Open modal with delay if it was not submitted before
function showNewsletter() {
  if (! localStorage.newsletterSubmit) {
    setTimeout(openNewsletterModal, 3000);
  }else{
    // REMOVE clear localhost
    // localStorage.removeItem("newsletterSubmit");
  }
}

// Submit newsletter (AJAX)
function submitNewsletter() {
  // Flag
  var process = true;

  //value is either empty or contains whitespace characters do not append the value
  if (!document.getElementById('newsletterName').checkValidity()){
    process = false;
    document.getElementById("nameError").innerHTML = "* Pole wymagane";
  } else {
    document.getElementById("nameError").innerHTML = "";
  }

  //validate email
  if (!document.getElementById('newsletterEmail').checkValidity()){
    process = false;
    document.getElementById("emailError").innerHTML = "* Pole wymagane";
  } else {
    document.getElementById("emailError").innerHTML = "";
  }

  //validate checkbox
  if (document.getElementById('newsletterCheckbox').checked === false){
    process = false;
    document.getElementById("checkboxError").innerHTML = "* Pole wymagane";
  }else {
    document.getElementById("checkboxError").innerHTML = "";
  }

  if(process){
    var name = document.getElementById('newsletterName').value;
    var email = document.getElementById('newsletterEmail').value;
    var checkbox = document.getElementById('newsletterCheckbox').checked;
    sendData(name, email, checkbox);

    // Store info that the subscription was submitted
    localStorage.setItem("newsletterSubmit", "true");

    // Close newsletter modal
    // closeNewsletterModal();

    // Display message
    document.getElementById("infoContainer").innerHTML = "<div style='padding-right:10px;'><h1 style='text-align: center;'>Dziękuję</h1><br><p> za Twoją chęć subskrypcji newslettera Konwersatoriummuzyczne.pl.<br>Za chwilę otrzymasz e-mail z prośbą o potwierdzenie subskrypcji.<br>Wystarczy kliknąć w link w e-mailu, żeby zakończyć cały proces.</p><br><p>P.S. Jeśli e-mail z prośbą o potwierdzenie subskrypcji nie znajdzie się w Twojej skrzynce odbiorczej w ciągu maks. 2 minut, zajrzyj do folderu SPAM.</p><br><br>";
  }
}

// Send data (AJAX)
function sendData(name, email, checkbox) {
  var data = "name=" + name + "&email=" + email + "&checkbox=" + checkbox;
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
//    document.getElementById("newsletterProcessResponse").innerHTML = this.responseText;
    }
  };

  xhttp.open("POST", "newsletter/processSubscription.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(data);
}

// Execute functions
showNewsletter();