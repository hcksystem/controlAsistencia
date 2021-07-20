<h1 class="nav-title text-white">
    <i class="icon-person"></i>
  
    <a href="{{ route('buildings.index')}}">{{ __('Edificio') }}</a> > <a  href="{{ route('buildings.show',$building) }}">{{$building->name}}</a> > {{ __($title) }} 
</h1>