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
     <table class="quiz-table" summary="Kysymykset ja vastausvaihtoehdot">
       <thead>
         <tr>
           <th>Kysymys</th>
           <th>Vastaus</th>
         </tr>
       </thead>
       <tbody>
         <tr>
           <td>Missä maassa Bengalin tiikeri elää pääosin?</td>
           <td>
             <div class="options">
               <label class="option"><input type="radio" id="q1_a" name="q1" value="a"> <span>Australia</span></label>
               <label class="option"><input type="radio" id="q1_b" name="q1" value="b"> <span>Intia</span></label>
               <label class="option"><input type="radio" id="q1_c" name="q1" value="c"> <span>Kanada</span></label>
             </div>
           </td>
         </tr>
         <tr>
           <td>Mikä seuraavista on tiikerin pääasiallinen ruokavalio?</td>
           <td>
             <div class="options">
               <label class="option"><input type="radio" id="q2_a" name="q2" value="a"> <span>Kasvit</span></label>
               <label class="option"><input type="radio" id="q2_b" name="q2" value="b"> <span>Hyönteiset</span></label>
               <label class="option"><input type="radio" id="q2_c" name="q2" value="c"> <span>Liha</span></label>
             </div>
           </td>
         </tr>
         <tr>
           <td>Kuinka monta alalajia tiikerillä on historiallisesti ollut (noin)?</td>
           <td>
             <div class="options">
               <label class="option"><input type="radio" id="q3_a" name="q3" value="a"> <span>Yli 6</span></label>
               <label class="option"><input type="radio" id="q3_b" name="q3" value="b"> <span>1</span></label>
               <label class="option"><input type="radio" id="q3_c" name="q3" value="c"> <span>0</span></label>
             </div>
           </td>
         </tr>
       </tbody>
     </table>

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