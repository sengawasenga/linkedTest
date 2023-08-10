<x-layout>
    <!-- la barre de navigation -->
    @include('partials._navbar')

    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Vos amis</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div>Jason Isamene</div>
                            <div class="text-primary">En ligne</div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div>Jason Isamene</div>
                            <div class="text-muted">Déconnecté</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        <h4>Chats</h4>
                    </div>
                    <div class="card-body">
                        <div class="message-boxes">
                            <div class="message-box me">Hey ca va ?</div>
                            <div class="message-box friend">Super et toi?</div>
                        </div>
                        <hr class="hr">
                        <form action="">
                            <div class="row">
                                <div class="col-10">
                                    <textarea name="" id="" cols="30" rows="2" placeholder="Ecrire un message" class="form-control"></textarea>
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-primary">Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>