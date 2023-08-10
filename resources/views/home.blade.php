<x-layout>
    <!-- la barre de navigation -->
    @include('partials._navbar')

    <div class="container">
        <h1 class="display-5">Bienvenue {{auth()->user()->firstname}}</h1>
        <hr class="hr">

        <div class="row mt-5">
            <div class="col-12 col-md-6">
                

               <div class="card mb-4">
                <div class="card-header">
                    <h4 class="mb-4">Vos amis</h4>
                </div>
                <div class="card-body">
                    @unless(count(auth()->user()->friends) == 0)
                    @foreach (auth()->user()->friends as $friend)
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div>{{ $friend->firstname }} {{ $friend->name }}</div>
                            <a href="" class="btn btn-info">Chat</a>
                        </div>
                    @endforeach
                    @else
                        <div class="text-danger">Vous n'avez aucun ami pour l'instant</div>
                    @endunless
                </div>
               </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card mb-4">
                    <div class="card-header"><h4 class="">Vos demandes d'amis</h4></div>
                    <div class="card-body">

                        @unless(count($friendRequests) == 0)
                        @foreach ($friendRequests as $request)
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div>{{ $request->sender->firstname }} {{ $request->sender->name }}</div>
                                <div class="d-flex gap-2">
                                    <form action="{{ route('friend-requests.accept', $request->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-info">Accepter</button>
                                    </form>
                                    <form action="{{ route('friend-requests.reject', $request->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Refuser</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                        @else
                            <div class="text-danger mb-3">Vous n'avez aucune demande d'ami pour l'instant</div>
                            <a href="/users" class="btn btn-primary">Voir tous les utilisateurs</a>
                        @endunless
                        
                    </div>
                </div>
                {{-- <div class="card mb-4">
                    <div class="card-header"><h4 class="">Recommandations d'amis</h4></div>
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div>Jason Isamene</div>
                            <a href="" class="btn btn-info">Envoyer</a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div>Jason Isamene</div>
                            <a href="" class="btn btn-info">Envoyer</a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div>Jason Isamene</div>
                            <a href="" class="btn btn-info">Envoyer</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</x-layout>