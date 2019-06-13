@extends('front::layouts.default')
@section('content')
@include('front::includes.billetterie_button')
        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb" class="w-100 d-none d-md-flex">
                    <ol class="breadcrumb col-sm-12 ">
                      <?php $count = 0; ?>
                      @foreach($breadcrumb as $bread)
                      <?php if($count == count($breadcrumb)-1) break; ?>
                        <li class="breadcrumb-item"><a href="{{ url($bread['url']) }}">{{ $bread['name'] }}</a></li>
                        <?php $count++; ?>
                      @endforeach
                        <li class="breadcrumb-item active" aria-current="page">{{ $choice[0]->titre_categoriePage }}</li>
                    </ol>
                </nav>
                <div class="col-sm-12">
                    <div class="title-header with-share">
                        <!-- <a href="{{ url()->previous() }}" class="btn btn-retour d-none d-md-flex">RETOUR ACCESSIBILITÉ</a> -->
                        <div class="buttons-header">
                          @include('front::includes.shareLink')
                            <a href="#" class="icon-print"></a>
                        </div>
                        <h1>{{ $choice[0]->titre_categoriePage }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container container-concours mb-10">
            <div class="row">
                <div class="col-sm-12">
                  @foreach($page as $bloc)
                  <!-- <div class="title-header">
                      {{ $bloc->titre_blocPage }}
                  </div> -->
                    <div class="text-info">
                        {!! $bloc->description_blocPage !!}
                    </div>
                  @endforeach
                </div>
            </div>
        </div>

    @endsection
