<?php include 'includes/header.php'; ?>

<section>
  <h2>Tietoja minusta</h2>

  <p>Hei! Olen harrastaja, joka tykkää musiikista, käsillä tekemisestä ja luonnosta. Tässä vähän tietoa harrastuksistani:</p>

  <h3>Kitaransoitto</h3>
  <p>Soitan akustista ja sähkökitaraa vapaa-ajalla. Harjoittelen sekä sooloja että säestystä ja tykkään erityisesti bluesin ja folk-musiikin soundeista.</p>

  <h3>Keramiikka</h3>
  <p>Rakastan saven muovaamista ja lasittamista. Keramiikka on rauhoittava harrastus, jossa voi kokeilla erilaisia muotoja ja pintoja.</p>

  <h3>Luonto & valokuvat</h3>
  <p>Pidän valokuvaamisesta erityisesti eläin- ja luontokuvien parissa. Klikkaa kuvaa nähdäksesi isomman version ja lisätietoa:</p>

  <div class="gallery">
    <figure>
      <img
        src="https://upload.wikimedia.org/wikipedia/commons/8/81/2012_Suedchinesischer_Tiger.JPG"
        alt="Suedchinesischer tiikeri"
        data-large="https://upload.wikimedia.org/wikipedia/commons/8/81/2012_Suedchinesischer_Tiger.JPG"
        data-title="Eteläkiinalainen tiikeri"
        data-info="Eteläkiinalainen tiikeri on yksi harvoista tiikerin alalajeista; se on erittäin uhanalainen ja luonnossa lähes kadonnut."
      />
      <figcaption>Tiikeri 1</figcaption>
    </figure>

    <figure>
      <img
        src="https://upload.wikimedia.org/wikipedia/commons/4/49/Panthera_tigris_tigris.jpg"
        alt="Tiikeri lähikuvassa"
        data-large="https://upload.wikimedia.org/wikipedia/commons/4/49/Panthera_tigris_tigris.jpg"
        data-title="Bengalin tiikeri"
        data-info="Bengalin tiikeri elää pääasiassa Intiassa ja on yksi maailman tunnetuimmista tiikerialalajeista. Sen suojelu on tärkeää lajin säilymiselle."
      />
      <figcaption>Tiikeri 2</figcaption>
    </figure>
  </div>

  <!-- Lightbox / modal -->
  <div id="lightbox" class="lightbox" aria-hidden="true" role="dialog" aria-label="Kuvagalleria">
    <div class="lightbox-content" role="document">
      <button class="lightbox-close" aria-label="Sulje">&times;</button>
      <img class="lightbox-img" src="" alt="" />
      <div class="lightbox-meta">
        <h4 class="lightbox-title"></h4>
        <p class="lightbox-info"></p>
      </div>
    </div>
  </div>

  <p>Jos haluat tietää lisää tai vaihtaa kokemuksia, ota rohkeasti yhteyttä!</p>
</section>

<script>
// Lightbox: avaa kuvaa klikatessa ja näyttää lisätiedon
(function () {
  const lightbox = document.getElementById('lightbox');
  const lbImg = lightbox.querySelector('.lightbox-img');
  const lbTitle = lightbox.querySelector('.lightbox-title');
  const lbInfo = lightbox.querySelector('.lightbox-info');
  const closeBtn = lightbox.querySelector('.lightbox-close');

  function openLightbox(src, alt, title, info) {
    lbImg.src = src;
    lbImg.alt = alt || '';
    lbTitle.textContent = title || '';
    lbInfo.textContent = info || '';
    lightbox.classList.add('open');
    lightbox.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
    closeBtn.focus();
  }

  function closeLightbox() {
    lightbox.classList.remove('open');
    lightbox.setAttribute('aria-hidden', 'true');
    lbImg.src = '';
    document.body.style.overflow = '';
  }

  // Klikkaus kuviin
  document.querySelectorAll('.gallery img').forEach(img => {
    img.style.cursor = 'zoom-in';
    img.addEventListener('click', () => {
      openLightbox(img.dataset.large || img.src, img.alt, img.dataset.title, img.dataset.info);
    });
  });

  // Sulkemistoiminnot
  closeBtn.addEventListener('click', closeLightbox);
  lightbox.addEventListener('click', (e) => {
    if (e.target === lightbox) closeLightbox();
  });
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && lightbox.classList.contains('open')) closeLightbox();
  });
})();
</script>

<?php include 'includes/footer.php'; ?>