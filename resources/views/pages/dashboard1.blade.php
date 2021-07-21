@extends('layouts.app')
@section('title')
<h1 class="nav-title text-white"> <i class="icon-home2"></i>
    Tablero @if(session()->has('idEdificio')) | {{ session('nameEdificio')}} @endif</h1>
@endsection

@section('maincontent')

<div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort" style="margin-top:-40px;">

            <div class="d-flex row row-eq-height my-3">
                <div class="col-md-8">
                    <div class="card">
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="white">
                        <div class="card">
                   
                            <div class="card-body no-p">
                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
</div>

@endsection
@section('js')
<script>
   
</script>
@endsection
