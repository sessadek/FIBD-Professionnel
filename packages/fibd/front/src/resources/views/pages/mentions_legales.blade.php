@extends('front::layouts.default')
@section('content')
        <div class="header__middle--right d-flex d-md-none">
            <a href="#" class="btn btn-danger">BILLETTERIE</a>
            <div class="b-search">
                <span class="search-overlay"></span>
                <a style="display: none" href="#" class="btn-search"></a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-header">
                      <h1>{{ $choice[0]->titre_categoriePage }}</h1>
                      <h1>{{ trans('front::home.partenaires') }}</h1>
                    </div>
                </div>
              </div>
        </div>

        <div class="container container-adress">
          {!! $detail[0]->blocPage[0]->description_blocPage !!}
        </div>
@endsection
