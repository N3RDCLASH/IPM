<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Services</h4>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#serviceModal"><i
                    class="nc-icon nc-simple-add"></i> Service
                Toevoegen</button>
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>
                            Naam
                        </th>
                        <th>
                            Beschrijving
                        </th>
                        <th>
                            Document
                        </th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="serviceModal" tabindex="-1" role="dialog" aria-labelledby="serviceModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="serviceModalLabel">Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="serviceInputNaam">Service Naam</label>
                        <input type="text" class="form-control" id="serviceInputNaam" name="service_naam"
                            aria-describedby="naamHelp" placeholder="Vul service naam in...">
                        <small id="naamHelp" class="form-text text-muted">idk yet...</small>
                    </div>
                    <div class="form-group">
                        <label for="serviceInputBeschrijving">Service Beschrijving</label>
                        <input type="text" class="form-control" id="serviceInputBeschrijving"
                            name="service_beschrijving" aria-describedby="beschrijvingHelp"
                            placeholder="Vul service beschrijving in...">
                        <small id="beschrijvingHelp" class="form-text text-muted">still dunno lol....</small>
                    </div>
                    <div class="form-group">
                        <label for="serviceInputDocument">Service Document</label>
                        <input type="file" accept=".doc/.docx" class="form-control-file" id="serviceInputDocument"
                            name="service_document">

                        {{-- <small id="beschrijvingHelp" class="form-text text-muted">still dunno lol....</small> --}}
                    </div>


                    <button type="submit" id="serviceSubmitButton" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>