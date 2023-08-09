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
            <h1 class="fs-2 text-primary">Se connecter</h1>
            <p class="text-light-md">
              Connectez-vous pour avoir accès au système.
            </p>
          </div>

          <form action="/users/authenticate" method="post">
            @csrf

            <div class="mb-3">
              <label for="email" class="text-light-sm">Votre email</label>
              <input type="text" name="email" id="email" class="input" value="{{old('email')}}">

              @error('email')
                <p class="small text-danger">{{$message}}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password" class="text-light-sm">Votre mot de passe</label>
              <input type="password" name="password" id="password" class="input" value="{{old('password')}}">

              @error('password')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
            <div>
              <button type="submit" class="btn-core">Se connecter</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-layout>