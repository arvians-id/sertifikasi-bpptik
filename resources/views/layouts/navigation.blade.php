<nav class="navbar navbar-expand navbar-dark bg-dark" style="background-color:#181D33 !important;">
    <div class="container">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="https://www.facebook.com/lsptd/"><i class="fab fa-facebook-f"></i></a>
            <a class="nav-item nav-link" href="https://www.instagram.com/lsp.td/"><i class="fab fa-instagram"></i></a>
            <a class="nav-item nav-link" href="https://www.youtube.com/channel/UCzzAznco5deIbDVZS4acb9w"><i
                    class="fab fa-youtube"></i></a>
            <a class="nav-item nav-link" href="/">BNSP-LSP-1565-ID</a>
        </div>
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="/login">Login</a>
        </div>
    </div>
</nav>
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light py-0">
    <div class="container">
        <a href="/" aria-current="page" class="navbar-brand">
            <img class="img-fluid" src="/images/icon.png" width="80">
        </a>
        <button class="navbar-toggler" type="button" onclick="openNav()">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <div class="navbar-nav ml-auto text-uppercase">
                <a href="/" aria-current="page" class="nav-item nav-link">Home</a>
                <a href="{{ route('visi-misi') }}" aria-current="page" class="nav-item nav-link">Visi & Misi</a>
                <a href="{{ route('artikel') }}" aria-current="page" class="nav-item nav-link">Artikel</a>
                <a href="{{ route('website-bpptik') }}" aria-current="page" class="nav-item nav-link">Website
                    BPPTIK</a>
                <a href="{{ route('tugas-fungsi') }}" aria-current="page" class="nav-item nav-link">Tugas & Fungsi</a>
            </div>
        </div>

        <div id="mySidebar" class="sidebar bg-light d-block d-md-none shadow">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <a href="/" class="text-secondary"><i class="fas fa-home"></i> Home</a>
            <a href="{{ route('visi-misi') }}" class="text-secondary"><i class="fas fa-file-alt"></i> Visi & Misi</a>
            <a href="{{ route('artikel') }}" class="text-secondary"><i class="fas fa-newspaper"></i> Artikel</a>
            <a href="{{ route('website-bpptik') }}" class="text-secondary"><i class="fas fa-window-maximize"></i>
                Website BPPTIK</a>
            <a href="{{ route('tugas-fungsi') }}" class="text-secondary"><i class="far fa-building"></i> Tugas
                & Fungsi</a>
        </div>
    </div>
</nav>
