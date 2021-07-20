<header class="blue accent-3 relative">
    <div class="container-fluid text-white">
        <div class="row justify-content-between">
            <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                @if (isset($account))
                <li class="nav-item">
                        <a class="nav-link" id="show" href="{{ route('accountOperator.show',$account) }}" role="tab" a>
                            <i class="icon icon-eye s-14"></i>
                            {{ __('Accounts Details')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contactsAsoc',$account) }}" id="contact"  role="tab" >
                            <i class="icon icon-contacts"></i> Account Contacts
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" id="docsInstruction" href="{!! route('docsInstruction.show', $account) !!}" role="tab" >
                            <i class="icon icon icon-playlist_add"></i> {{__('Docs Instructions')}}
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" id="courrier" href="{!! route('accountCourrier.show', $account) !!}" role="tab" >
                            <i class="icon icon-truck s-14"></i> {{__('Account Courrier')}}
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" id="courrier" href="{!! route('indexPatherAccount', $account) !!}" role="tab" >
                            <i class="icon icon-bank s-14"></i> {{__('Banks')}}
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</header>
