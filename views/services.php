<?php
session_start();
require_once('../header.php');

// initialise moin programme

//require_once('app/config.php');
require_once('../app/classe.apprdvtherapeute.php');
?>
<main class="flex-shrink-0">
  <div class="container">
    <h1>Nos Services</h1>

    <div class="service">
      <h2>Thérapie individuelle</h2>
      <p>Nous proposons des séances de thérapie individuelle pour vous aider à faire face aux défis de la vie
        quotidienne. Que vous soyez confronté à des problèmes de stress, d'anxiété, de relations ou de développement
        personnel, nous sommes là pour vous soutenir.</p>
    </div>

    <div class="service">
      <h2>Thérapie de couple</h2>
      <p>Si vous et votre partenaire traversez des difficultés dans votre relation, notre thérapie de couple peut vous
        aider à améliorer la communication, à résoudre les conflits et à renforcer votre lien. Nous travaillerons
        ensemble pour trouver des solutions et construire une relation épanouissante.</p>
    </div>

    <div class="service">
      <h2>Thérapie familiale</h2>
      <p>La thérapie familiale est conçue pour aider les familles à surmonter les obstacles et à améliorer leurs
        relations. Nous offrons un espace sécurisé où chaque membre de la famille peut s'exprimer, comprendre les
        dynamiques familiales et travailler vers des changements positifs.</p>
    </div>

    <div class="service">
      <h2>Coaching de vie</h2>
      <p>Si vous avez des objectifs personnels ou professionnels que vous souhaitez atteindre, notre coaching de vie
        peut vous aider à développer vos compétences, à renforcer votre confiance en vous et à créer un plan d'action
        pour réaliser vos aspirations.</p>
    </div>
  </div>
</main>
<?php
require_once('../footer.php');
?>