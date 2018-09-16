<div class="container">

    <h1 class="my-4">Sveiki atvykę</h1>


    <div class="row">

        <div class="col-md-8">
            <img class="img-fluid" src="https://media.timeout.com/images/103900885/1024/576/image.jpg" alt="">
        </div>

        <div class="col-md-4">
            <h3 class="my-3">Aprašymas</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
            <h3 class="my-3">Project Details</h3>
            <ul>
                <li>Lorem Ipsum</li>
                <li>Dolor Sit Amet</li>
                <li>Consectetur</li>
                <li>Adipiscing Elit</li>
            </ul>
        </div>

    </div>

    <div class="row forma">
        <div class="col-lg-8 mb-4">
            <h3>Užsirezervuokite kirpimą</h3>
            <form name="sentMessage" id="contactForm" novalidate>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Pilnas vardas:</label>
                        <input type="text" class="form-control" id="name" required data-validation-required-message="Prašome įrašyti savo vardą">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Telefono nr.:</label>
                        <input type="tel" class="form-control" id="phone" required data-validation-required-message="Prašome įrašyti savo tel. nr.">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Data:</label>
                        <input type="date" class="form-control" id="date" required data-validation-required-message="Prašau pasirinkite datą">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Laikas:</label>
                        <select list="time" class="form-control" id="time" name="time" required data-validation-required-message="Prašau pasirinkite datą">
                            <option value="8:00">8:00</option>
                            <option value="9:00">9:00</option>
                            <option value="10:00">10:00</option>
                            <option value="..">..</option>
                        </select>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Komentarai:</label>
                        <textarea rows="10" cols="100" class="form-control" id="message" maxlength="999" style="resize:none"></textarea>
                    </div>
                </div>
                <div id="success"></div>
                <!-- For success/fail messages -->
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Patvirtinti užsaymą</button>
            </form>
        </div>
    </div>

</div>
