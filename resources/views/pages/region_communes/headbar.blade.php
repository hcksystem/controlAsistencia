<header class="blue accent-3 relative">
    <div class="container-fluid text-white">
        <div class="row justify-content-between">
            <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                <li>
                    <a class="nav-link" href="{{ route('regions.index') }}" role="tab" id="countries">
                        <i class="icon icon-globe s-14"></i> Regiones
                    </a>
                </li>
                <li>
                    <a class="nav-link" id="ports" href="{!! route('commune.index') !!}" role="tab"
                    aria-controls="v-pills-buyers">
                        <i class="icon icon-anchor amber-text s-14"></i> Comunas
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>
