<x-layout>
  <div class="row h-full">
    <div class="col-0 col-md-2 col-lg-3 bg-lightgray d-none d-md-block"></div>
    <div class="col-12 col-md-10 col-lg-9">
      <div class="container py-5 d-flex align-items-center justify-content-center h-100 flex-column">
        <div class="text-center mb-5">
          <img src="img/logo.png" class="logo" draggable="false" alt="Logo Linked" />
        </div>

        <div class="bg-lightgray rounded-md py-5 px-4 w-md">
          <div class="mb-5">
            <h1 class="fs-2 text-primary">Créer un compte</h1>
            <p class="text-light-md">
              Remplissez le formulaire pour créer un compte
            </p>
          </div>

          <form action="/users/create" method="post">
            @csrf

            <div class="mb-3">
              <label for="name" class="text-light-sm">Votre nom</label>
              <input type="text" name="name" id="name" class="input" value="{{old('name')}}">

              @error('name')
                <p class="small text-danger">{{$message}}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="firstname" class="text-light-sm">Votre prenom</label>
              <input type="text" name="firstname" id="firstname" class="input" value="{{old('firstname')}}">

              @error('firstname')
                <p class="small text-danger">{{$message}}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email" class="text-light-sm">Votre email</label>
              <input type="text" name="email" id="email" class="input" value="{{old('email')}}">

              @error('email')
                <p class="small text-danger">{{$message}}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="number" class="text-light-sm">Votre numero</label>
              <input type="text" name="number" id="number" class="input" value="{{old('number')}}">

              @error('poste')
                <p class="small text-danger">{{$message}}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password" class="text-light-sm">Votre mot de passe</label>
              <input type="password" name="password" id="password" class="input" value="{{old('password')}}">

              @error('password')
                <p class="small text-danger">{{$message}}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password_confirmation" class="text-light-sm">Confirmer mot de passe</label>
              <input type="password" name="password_confirmation" id="password_confirmation" class="input" value="{{old('password_confirmation')}}">

              @error('password_confirmation')
                <p class="small text-danger">{{$message}}</p>
              @enderror
            </div>
            <div>
              <button type="submit" class="btn-core">Créer le compte</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-layout>