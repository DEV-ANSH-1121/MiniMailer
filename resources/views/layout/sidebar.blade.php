<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link mt-3" href="{{ route('mailLog.create') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-pencil"></i></div>
                    Compose Mail
                </a>
                <a class="nav-link mt-1" href="{{ route('mailLog.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Sent Mails
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ auth()->user()->email }}
        </div>
    </nav>
</div>