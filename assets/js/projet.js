
		 // Récupère les liens d'inscription et de connexion et rendez-vous
		 var signupLink = document.getElementById("signup-link");
		 var loginLink = document.getElementById("login-link");
		 var rendez_vousLink = document.getElementById("rendez_vous-link");
	   
		 // Récupère les formulaires d'inscription et de connexion
		 var signupForm = document.getElementById("signup-form");
		 var loginForm = document.getElementById("login-form");
		 var rendez_vousForm = document.getElementById("rendez_vous-form");
	   
		 // Affiche le formulaire d'inscription lorsqu'on clique sur le lien "S'inscrire"
		 signupLink.addEventListener("click", function(event) {
		   event.preventDefault();
		   alert('inscription');
		   loginForm.style.display = "none";
		   signupForm.style.display = "block";
		   rendez_vousForm.style.display = "none";
		 });
	   
		 // Affiche le formulaire de connexion lorsqu'on clique sur le lien "Se connecter"
		 loginLink.addEventListener("click", function(event) {
		   event.preventDefault();
		   alert("connexion");
		   signupForm.style.display = "none";
		   loginForm.style.display = "block";
		   rendez_vousForm.style.display = "none";
		 });
		 // Affiche le formulaire de prise de rendez-vous"
		 rendez_vousLink.addEventListener("click", function(event) {
		   event.preventDefault();
		   alert("rdv");
		   signupForm.style.display = "none";
		   loginForm.style.display = "none";
		   rendez_vousForm.style.display = "block";
		 });