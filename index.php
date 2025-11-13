<?php include 'includes/header.php'; ?>
<section>
 <h2>Tervetuloa Juho</h2>
 <p>Tämä on harjoitustyö — portfolio/etusivu.</p>

 <figure class="profile">
   <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/Bengal_tiger_%28Panthera_tigris_tigris%29_female_3_crop.jpg/1024px-Bengal_tiger_%28Panthera_tigris_tigris%29_female_3_crop.jpg" alt="Kuva minusta">
 </figure>

 <hr>

 <section class="quiz" aria-labelledby="quiz-title">
   <h3 id="quiz-title">Pieni tiikeri-visailu</h3>
   <form id="quiz-form">
     <ol>
       <li>
         <p>Missä maassa Bengalin tiikeri elää pääosin?</p>
         <label><input type="radio" name="q1" value="a"> Australia</label><br>
         <label><input type="radio" name="q1" value="b"> Intia</label><br>
         <label><input type="radio" name="q1" value="c"> Kanada</label>
       </li>
       <li>
         <p>Mikä seuraavista on tiikerin pääasiallinen ruokavalio?</p>
         <label><input type="radio" name="q2" value="a"> Kasvit</label><br>
         <label><input type="radio" name="q2" value="b"> Hyönteiset</label><br>
         <label><input type="radio" name="q2" value="c"> Liha</label>
       </li>
       <li>
         <p>Kuinka monta alalajia tiikerillä on historiallisesti ollut (noin)?</p>
         <label><input type="radio" name="q3" value="a"> Yli 6</label><br>
         <label><input type="radio" name="q3" value="b"> 1</label><br>
         <label><input type="radio" name="q3" value="c"> 0</label>
       </li>
     </ol>

     <button type="submit">Tarkista vastaukset</button>
   </form>

   <div id="quiz-result" aria-live="polite" style="margin-top:1rem; display:none;"></div>
 </section>

</section>

<script>
(function () {
  const form = document.getElementById('quiz-form');
  const result = document.getElementById('quiz-result');

  const answers = { q1: 'b', q2: 'c', q3: 'a' };
  const explanations = {
    q1: 'Bengalin tiikeri elää pääosin Intiassa.',
    q2: 'Tiikeri on lihansyöjä (pedon rooli).',
    q3: 'Historiallisesti tiikerillä on ollut yli kuusi alalajia (useita alalajeja ovat kadonneet).'
  };

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    const formData = new FormData(form);
    let score = 0;
    const details = [];

    for (const q of Object.keys(answers)) {
      const given = formData.get(q);
      if (given === answers[q]) {
        score++;
        details.push(`<strong>${q}</strong>: oikein`);
      } else if (given === null) {
        details.push(`<strong>${q}</strong>: ei valintaa — oikein: ${answers[q]}`);
      } else {
        details.push(`<strong>${q}</strong>: väärin — ${explanations[q]}`);
      }
    }

    result.style.display = 'block';
    result.innerHTML = `<p>Sait ${score} / ${Object.keys(answers).length} oikein.</p><ul>${details.map(d => '<li>'+d+'</li>').join('')}</ul>`;
    result.focus();
  });
})();
</script>

<?php include 'includes/footer.php'; ?>