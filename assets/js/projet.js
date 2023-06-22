// Récupère les liens d'inscription et de connexion et rendez-vous
var signupLink = document.getElementById("signup-link");
var loginLink = document.getElementById("login-link");
var logoutLink = document.getElementById("logout-link");
var rendez_vousLink = document.getElementById("rendez_vous-link");
   
// Récupère les formulaires d'inscription et de connexion
var signupForm = document.getElementById("signup-div");
var loginForm = document.getElementById("login-div");
var rendez_vousForm = document.getElementById("rendez_vous-form");
   
// Affiche le formulaire d'inscription lorsqu'on clique sur le lien "S'inscrire"
if( signupLink )
    signupLink.addEventListener("click", function(event) {
        event.preventDefault();
        loginForm.style.display = "none";
        signupForm.style.display = "block";
        //rendez_vousForm.style.display = "none";

        document.getElementById('nom').focus();
    });
    
   
// Affiche le formulaire de connexion lorsqu'on clique sur le lien "Se connecter"
if( loginLink )
    loginLink.addEventListener("click", function(event) {
        event.preventDefault();
        signupForm.style.display = "none";
        loginForm.style.display = "block";
        //rendez_vousForm.style.display = "none";

        
        document.getElementById('login_email').focus();
    });

if( logoutLink )
    logoutLink.addEventListener("click", function(event) {
        event.preventDefault();
        // envoyer la cmd de décopnnexion
        // redirection vers interface_logout.php
        document.location.href="../interface/interface_logout.php";
    });

// Affiche le formulaire de prise de rendez-vous"
if( rendez_vousLink )
    rendez_vousLink.addEventListener("click", function(event) {
        event.preventDefault();
        alert("rdv");
        signupForm.style.display = "none";
        loginForm.style.display = "none";
        rendez_vousForm.style.display = "block";
    });
    
    //
    //
    //
    //animation de fondu (fade) sur 5 secondes
    $(document).ready(function() {
        $('.rounded-image').hide().fadeIn(5000); 
        
    });
    //
    //
    //
    //animation de fondu (fade) sur 3 seconde sur le texte d'accueil
    $(document).ready(function() {
        $(".row.mb-2").hide().fadeIn(1000);
    });
   //
   //
   //
    //animation de fondu sur les images du carousel 8 secondes
    $(document).ready(function() {
        $('.carousel-item').eq(0).addClass('active');
    
        function fadeCarouselImages() {
            var activeItem = $('.carousel-item.active');
            activeItem.animate({ opacity: 0 }, 300, function() {
                activeItem.removeClass('active');
                var nextItem = activeItem.next('.carousel-item');
                if (nextItem.length === 0) {
                    nextItem = $('.carousel-item').eq(0);
                }
                nextItem.addClass('active').css('opacity', 0).animate({ opacity: 1 }, 2000);
            });
        }
    
        setInterval(fadeCarouselImages, 4000);
    });
    