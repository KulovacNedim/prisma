<form class="w3-container w3-card-4 w3-padding-16 w3-white w3-margin-top" action="/action_page.php" id="usrform">
  <div class="w3-section">
    <label>Ime i prezime</label>
    <input class="w3-input" type="text" name="Name" required>
  </div>
  <div class="w3-section">
    <label>Vaš email</label>
    <input class="w3-input" type="text" name="Email" required>
  </div>
  <div class="w3-section">
    <label>Predmet</label>
    <input class="w3-input" type="text" name="Message" required>
  </div>
  <div class="w3-section">
    <label>Tekst</label>
    <textarea rows="7" name="comment" form="usrform" style="width: 100%; border: none; border-bottom: 1px solid lightgray" required></textarea>
  </div>
  <button type="submit" class="w3-button w3-right w3-blue w3-hover-red">Pošalji</button>
</form>