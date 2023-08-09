<div class="d-flex align-items-center justify-content-between topbar mb-4">
    <div>
        <img src="img/logo.png" class="logo" draggable="false" alt="Logo Linked" />
    </div>
    <div class="hamburger">
        <button class="btn-circle-sm light">
            <i class="bi-three-dots-vertical fs-5"></i>
        </button>
    </div>
    <div class="d-flex align-items-center">
        <span class="me-3">{{auth()->user()->firstname}}</span>
        <div class="profile-pic">
            <a href="/">
                <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?cs=srgb&dl=pexels-pixabay-220453.jpg&fm=jpg" alt="Avatar par defaut" class="cover">
            </a>
        </div>
        <form action="/logout" method="POST" class="w-100 p-0 m-0">
            @csrf

            <button type="submit" class="side-link w-100 text-start">
                <i class="bi-door-open me-2"></i>
                Déconnexion
            </button>
        </form>
    </div>
</div>