<?php
$equipements = [
  ['id' => 1, 'nom' => 'Salle Hoarau', 'type' => 'Gymnase', 'lieu' => 'Saint-Pierre', 'capacite' => '120 personnes', 'disponibilite' => '4 créneaux aujourd’hui', 'classe' => 'indigo', 'image' => true],
  ['id' => 2, 'nom' => 'Terrain des Tamarins', 'type' => 'Terrain extérieur', 'lieu' => 'Le Tampon', 'capacite' => '22 personnes', 'disponibilite' => 'Disponible dès 14h', 'classe' => 'green'],
  ['id' => 3, 'nom' => 'Minibus Horizon', 'type' => 'Transport', 'lieu' => 'Saint-Denis', 'capacite' => '9 places', 'disponibilite' => 'Disponible demain', 'classe' => 'orange'],
  ['id' => 4, 'nom' => 'Kit sonorisation Pro', 'type' => 'Matériel', 'lieu' => 'Siège de la ligue', 'capacite' => 'Jusqu’à 300 pers.', 'disponibilite' => 'Disponible aujourd’hui', 'classe' => 'purple'],
  ['id' => 5, 'nom' => 'Salle Mahé', 'type' => 'Salle polyvalente', 'lieu' => 'Saint-Paul', 'capacite' => '80 personnes', 'disponibilite' => '2 créneaux samedi', 'classe' => 'blue'],
  ['id' => 6, 'nom' => 'Chronomètres Elite', 'type' => 'Matériel', 'lieu' => 'Siège de la ligue', 'capacite' => 'Lot de 12', 'disponibilite' => 'Disponible dès 9h', 'classe' => 'red'],
];

function e(string $valeur): string {
  return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8');
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RéuniSport — Catalogue</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="reunisport.css">
</head>
<body>
<div class="app-shell">
  <header class="site-header">
    <a class="brand" href="#"><span class="brand-mark"><span>R</span></span><span class="brand-copy"><strong>Réuni<span>Sport</span></strong><small>La ligue en mouvement</small></span></a>
    <nav class="main-nav"><a class="active" href="#catalogue">Catalogue</a><a href="#reservations">Mes réservations <span class="nav-badge">2</span></a><a href="#">Aide</a></nav>
    <div class="user-menu"><div class="avatar">JP</div><div class="user-copy"><strong>Julie Payet</strong><span>Club Handball SP</span></div></div>
  </header>
  <main>
    <section class="hero">
      <div class="hero-photo"></div><div class="hero-overlay"></div>
      <div class="hero-content"><span class="eyebrow"><span class="live-dot"></span> Réservations ouvertes</span><h1>Votre prochain<br>terrain de jeu.</h1><p>Réservez les équipements de la ligue en quelques clics, sans doublon et sans attente.</p><a class="hero-link" href="#catalogue">Explorer le catalogue →</a></div>
      <div class="hero-stats"><div><strong>18</strong><span>équipements</span></div><div><strong>7</strong><span>lieux partenaires</span></div><div><strong>92%</strong><span>de créneaux confirmés</span></div></div>
    </section>
    <section class="content-wrap" id="catalogue">
      <div class="section-heading"><div><span class="section-kicker">ÉQUIPEMENTS</span><h2>Trouvez le bon équipement</h2><p>Des espaces et du matériel adaptés à chaque rendez-vous sportif.</p></div><button class="outline-button">Voir les disponibilités</button></div>
      <div class="search-row">
        <label class="search-box"><span>⌕</span><input id="search" placeholder="Rechercher un équipement, une ville..."></label>
        <div class="filter-tabs"><?php foreach (['Tous', 'Salles', 'Terrains', 'Matériel', 'Transport'] as $i => $filtre): ?><button class="<?= $i === 0 ? 'active' : '' ?>" data-filter="<?= e($filtre) ?>"><?= e($filtre) ?></button><?php endforeach; ?></div>
      </div>
      <div class="catalogue-layout">
        <div>
          <div class="results-meta"><span><strong id="count"><?= count($equipements) ?></strong> équipements disponibles</span><button>Trier par : <strong>Disponibilité</strong></button></div>
          <div class="equipment-grid">
            <?php foreach ($equipements as $item): ?>
            <article class="equipment-card" data-name="<?= e(strtolower($item['nom'].' '.$item['lieu'].' '.$item['type'])) ?>" data-type="<?= e($item['type']) ?>">
              <div class="card-visual <?= e($item['classe']) ?>"<?= !empty($item['image']) ? ' style="background-image:url(../public/assets/reunisport-gym.png)"' : '' ?>>
                <?php if (empty($item['image'])): ?><span class="abstract-sport"><?= $item['type'] === 'Transport' ? '09' : ($item['type'] === 'Matériel' ? 'PRO' : 'RS') ?></span><?php endif; ?>
                <span class="type-pill"><?= e($item['type']) ?></span><button class="favorite" aria-label="Ajouter aux favoris">♡</button>
              </div>
              <div class="card-body"><div class="availability"><span></span><?= e($item['disponibilite']) ?></div><h3><?= e($item['nom']) ?></h3><div class="card-facts"><span>⌖ <?= e($item['lieu']) ?></span><span>◎ <?= e($item['capacite']) ?></span></div><button class="card-action" data-book="<?= e($item['nom']) ?>" data-place="<?= e($item['lieu']) ?>">Voir les créneaux <span>›</span></button></div>
            </article>
            <?php endforeach; ?>
          </div>
        </div>
        <aside class="booking-panel" id="reservations">
          <div class="panel-head"><span class="mini-calendar"><b>13</b><small>DÉC</small></span><div><span>PROCHAINE RÉSERVATION</span><strong>Samedi, 09:00</strong></div></div>
          <div class="panel-content"><span class="status-pill">✓ Confirmée</span><h3>Salle Hoarau</h3><p>⌖ Saint-Pierre</p><div class="time-line"><span>◷ 09:00</span><span class="line"></span><span>12:00</span></div><div class="club-line"><span>CH</span><div><small>RÉSERVÉ POUR</small><strong>Club Handball SP</strong></div></div><button>Gérer la réservation <span>→</span></button></div>
          <div class="panel-foot"><span>Besoin d’aide ?</span><a href="#">Contacter la ligue</a></div>
        </aside>
      </div>
    </section>
  </main>
  <footer><div class="brand footer-brand"><span class="brand-mark"><span>R</span></span><span class="brand-copy"><strong>Réuni<span>Sport</span></strong><small>La ligue en mouvement</small></span></div><p>© 2026 Ligue RéuniSport. Une plateforme au service des clubs.</p><div><a href="#">Confidentialité</a><a href="#">Mentions légales</a></div></footer>
</div>
<div class="modal-backdrop" id="modal" hidden>
  <section class="booking-modal"><button class="modal-close" id="close">×</button><div id="form-view"><span class="section-kicker">NOUVELLE RÉSERVATION</span><h2 id="modal-title"></h2><p class="modal-location" id="modal-place"></p><div class="form-grid"><label><span>Date</span><input type="date" value="2026-12-13"></label><label><span>Heure de début</span><select><option>09:00</option><option>10:00</option></select></label><label><span>Heure de fin</span><select><option>12:00</option><option>13:00</option></select></label></div><div class="slot-note">✓<div><strong>Ce créneau est disponible</strong><span>Durée de la réservation : 3 heures</span></div></div><button class="confirm-button" id="confirm">Confirmer la réservation →</button></div><div class="success-view" id="success" hidden><span class="success-icon">✓</span><h2>Réservation confirmée</h2><p>Votre créneau a bien été ajouté à vos réservations.</p></div></section>
</div>
</body>
</html>
