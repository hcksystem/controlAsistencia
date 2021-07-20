<header class="blue accent-3 relative">
    <div class="container-fluid text-white">
        <div class="row justify-content-between">
            <ul class="nav nav-material nav nav-tabs nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
               
                    <li class="nav-item">
                        <a class="nav-link" id="show" href="{{ route('buildings.show',$building->id) }}" role="tab" a>
                            <i class="icon icon-eye s-14"></i>
                             {{ __('Informaciòn General') }}
                        </a>
                    </li>
               
                   
                   
                    @if(!Auth::user()->hasRole('corredor'))
                          <li class="nav-item">
                        <a class="nav-link" href="{{ route('anuncio.show',$building->id) }}" id="contact"  role="tab" >
                            <i class="icon icon-history"></i> {{ __('Anuncios') }}
                        </a>
                    </li>
                    @endif
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('edificios.document',$building->id) }}" id="document"  role="tab" >
                            <i class="icon icon-document2"></i> {{ __('Documentos') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('edificio.asamblea',$building->id) }}" id="document"  role="tab" >
                            <i class="icon icon-document2"></i> {{ __('Asambleas') }}
                        </a>
                    </li>
            </ul>
        </div>
    </div>
</header>