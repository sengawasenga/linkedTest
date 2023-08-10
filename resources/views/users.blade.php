<x-layout>
    <!-- la barre de navigation -->
    @include('partials._navbar')

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card mb-4">
                    <div class="card-header"><h4 class="">Les utilisateurs</h4></div>
                    <div class="card-body">

                        @unless(count($users) == 0)
                        @foreach ($users as $user)
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div>{{ $user->name }} {{ $user->firstname }}</div>
                                <form method="POST" action="{{ route('friend-requests.store') }}">
                                    @csrf
                                    <input type="hidden" name="recipient_id" value="{{ $user->id }}">
                                    <button class="btn btn-info" type="submit">Envoyer une demande</button>
                                </form>
                            </div>
                        @endforeach
                        @else
                            <div class="text-danger">Vous n'avez aucun ami pour l'instant</div>
                        @endunless
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>