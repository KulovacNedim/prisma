<form class="w3-container w3-padding-16 w3-white w3-margin-top" action="{{ route('contact-us.store')}}" method="POST" name="usrform">
  @csrf
  <div class="w3-section">
    <label>Ime i prezime</label>
    <input class="w3-input" type="text" name="name" value="{{ old('name') }}" required>
  </div>
  <div class="w3-section">
    <label>Vaš email</label>
    <input class="w3-input" type="email" name="email" value="{{ old('email') }}" required>
  </div>
  <div class="w3-section">
    <label>Predmet</label>
    <input class="w3-input" type="text" name="subject" value="{{ old('subject') }}" required>
  </div>
  <div class="w3-section">
    <label>Tekst</label>
    <textarea rows="7" name="message" value="{{ old('message') }}" class="form-control" style="width: 100%; border: none; border-bottom: 1px solid lightgray" required></textarea>
  </div>
  <button type="submit" class="w3-button w3-right w3-blue w3-hover-red">Pošalji</button>
</form>