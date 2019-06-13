<?php
$tabDayFr[0]='dimanche';
    $tabDayFr[1]='lundi';
    $tabDayFr[2]='mardi';
    $tabDayFr[3]='mercredi';
    $tabDayFr[4]='jeudi';
    $tabDayFr[5]='vendredi';
    $tabDayFr[6]='samedi';
    $tabMonthFr[1]='janvier';
    $tabMonthFr[2]='février';
    $tabMonthFr[3]='mars';
    $tabMonthFr[4]='avril';
    $tabMonthFr[5]='mai';
    $tabMonthFr[6]='juin';
    $tabMonthFr[7]='juillet';
    $tabMonthFr[8]='août';
    $tabMonthFr[9]='septembre';
    $tabMonthFr[10]='octobre';
    $tabMonthFr[11]='novembre';
    $tabMonthFr[12]='décembre';

    $tabJourDateFestival['2019-01-23']=3;
    $tabJourDateFestival['2019-01-24']=4;
    $tabJourDateFestival['2019-01-25']=5;
    $tabJourDateFestival['2019-01-26']=6;
    $tabJourDateFestival['2019-01-27']=0;


 ?>
@extends('front::layouts.default')
@section('content')
@include('front::includes.billetterie_button')
<div class="b-bandeau" style="background: url({{ asset(media_url_if_not_null($detailprog[0]->media)) }})">
  <img src="{{ asset(media_url_if_not_null($detailprog[0]->media)) }}" alt="{{ media_alt_if_not_null($detailprog[0]->media['libelle_media'])}}">
</div>
<div class="breadcrum_background">
  <div class="container">
    <div class="row">
      <nav aria-label="breadcrumb" class="w-100 d-none d-md-flex">
        <ol class="breadcrumb col-sm-12 ">
          @foreach($breadcrumb as $bread)
          <li class="breadcrumb-item"><a href="{{ url($bread['url']) }}">{{ $bread['name']}}</a></li>
          @endforeach
          <li class="breadcrumb-item active" aria-current="page">{{ $detailprog[0]->titre_programmation }}</li>
        </ol>
      </nav>
      <div class="col-sm-12">
        <div class="title-header with-share">
          <!-- <a href="{{ url()->previous() }}" class="btn btn-retour d-none d-md-flex">RETOUR EXPOSITIONS</a> -->
          <div class="buttons-header">
            @include('front::includes.shareLink')
            <a href="#" class="icon-print"></a>
          </div>
          <h1>{{ $detailprog[0]->titre_programmation }}</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <!-- <div class="date-header"><div class="p">Le lundi 30 avril 2018 à 12h50</div></div> -->
            <div class="content-header">
                <h2 class="p">
                  {!! $detailprog[0]->small_description_programmation !!}
                </h2>
            </div>
            <div class="thumbs-header">
              @if($detailprog[0]->partenaire)
                @foreach($detailprog[0]->partenaire as $part)
                <img style="width: 11.2em" src="{{ asset(media_url_if_not_null($part->media))}}" alt="{{ media_alt_if_not_null($part->media['libelle_media'])}}">
                @endforeach
              @endif
            </div>

        </div>
    </div>
</div>

<div class="container container-concours mb-3">
  <div class="row">
    <div class="col-md-8">
      <div class="text-concours fz-16">
        <div class="d-block d-md-none">
          <div class="paragraphPageProfonde">{!! $detailprog[0]->description_programmation !!}</div>
        </div>
      </div>

      <div class="sidebar">
        <div class="box-shadow d-block d-md-none">
          @if($detailprog[0]->lieu)
          <div class="p"><strong>LIEU</strong>{{ $detailprog[0]->lieu->libelle_lieu }}</div>
          @endif
          @if($detailprog[0]->date_start_programmation)
          <div class="p"><strong>DATES</strong>
            <?php
            if($detailprog[0]->date_start_programmation==$detailprog[0]->date_end_programmation){
                $tabDateProgrammation=explode("-",$detailprog[0]->date_start_programmation);
                //Le jour_semaine xx mois
                $day_week=0;
                if(isset($tabJourDateFestival[$detailprog[0]->date_start_programmation])){
                  $day_week=$tabJourDateFestival[$detailprog[0]->date_start_programmation];
                }
                else{
                  $day_week=date("w",$detailprog[0]->date_start_programmation);
                }
  // echo'<pre>'.__LINE__.' :: '.$key.' -- data start : '.$value_prog['date_start_programmation'].' --> '.$day_week.'</pre>';
                $libelle_date=''.ucfirst($tabDayFr[$day_week]).' '.$tabDateProgrammation[2].' '.$tabMonthFr[$tabDateProgrammation[1]*1];
              }
              else{
                $tabDateProgrammationStart=explode("-",$detailprog[0]->date_start_programmation);
                $tabDateProgrammationEnd=explode("-",$detailprog[0]->date_end_programmation);;
                //test pour voir si le mois de debut et le mois de fin sont differents
                $label_month_start=($tabDateProgrammationStart[1]!=$tabDateProgrammationEnd[1])?' '.$tabMonthFr[$tabDateProgrammationStart[1]*1]:'';
                $libelle_date='Du '.$tabDateProgrammationStart[2].$label_month_start.' au '.$tabDateProgrammationEnd[2].' '.$tabMonthFr[$tabDateProgrammationEnd[1]*1];
              }

             ?>
            {{ $libelle_date }}
          </div>
          @endif
          @if($detailprog[0]->public)
          <div class="p"><strong>PUBLIC</strong>{{ $detailprog[0]->public->libelle_public }}</div>
          @endif
          @if($detailprog[0]->intervenant)
          <?php $previousValue = null; ?>
          @foreach($detailprog[0]->intervenant as $intervenants)
          @if($previousValue !== $intervenants->typeIntervenant->libelle_typeIntervenant)
          <div style="font-size: 16px; line-height: 1.1875; margin-top:20px;">
            <strong style="font-weight: 600">{{ strtoupper($intervenants->typeIntervenant->libelle_typeIntervenant) }}</strong>
            {{ $intervenants->prenom_intervenant }} {{ $intervenants->nom_intervenant }}
          </div>
          @else
          <div>{{ $intervenants->prenom_intervenant }} {{ $intervenants->nom_intervenant }}</div>
          @endif
          <?php  $previousValue = $intervenants->typeIntervenant->libelle_typeIntervenant;?>
          @endforeach

          @endif
        </div>
      </div>

      <div class="text-concours fz-16">
        <div class="d-none d-md-block">
          <div class="paragraphPageProfonde">{!! $detailprog[0]->description_programmation !!}</div>
        </div>
      </div>
    </div>
  <div class="col-md-4" style="margin-top: 30px;">
    <div class="sidebar" style="font-weight: 300">
      <div class="box-shadow d-none d-md-block">
        @if($detailprog[0]->lieu)
        <div class="p"><strong style="font-weight: 600">LIEU</strong>{{ $detailprog[0]->lieu->libelle_lieu }}</div>
        @endif
        @if($detailprog[0]->date_start_programmation)
        <div class="p"><strong style="font-weight: 600">DATES</strong>
          <?php
          if($detailprog[0]->date_start_programmation==$detailprog[0]->date_end_programmation){
              $tabDateProgrammation=explode("-",$detailprog[0]->date_start_programmation);
              //Le jour_semaine xx mois
              $day_week=0;
              if(isset($tabJourDateFestival[$detailprog[0]->date_start_programmation])){
                $day_week=$tabJourDateFestival[$detailprog[0]->date_start_programmation];
              }
              else{
                $day_week=date("w",$detailprog[0]->date_start_programmation);
              }
// echo'<pre>'.__LINE__.' :: '.$key.' -- data start : '.$value_prog['date_start_programmation'].' --> '.$day_week.'</pre>';
              $libelle_date=''.ucfirst($tabDayFr[$day_week]).' '.$tabDateProgrammation[2].' '.$tabMonthFr[$tabDateProgrammation[1]*1];
            }
            else{
              $tabDateProgrammationStart=explode("-",$detailprog[0]->date_start_programmation);
              $tabDateProgrammationEnd=explode("-",$detailprog[0]->date_end_programmation);;
              //test pour voir si le mois de debut et le mois de fin sont differents
              $label_month_start=($tabDateProgrammationStart[1]!=$tabDateProgrammationEnd[1])?' '.$tabMonthFr[$tabDateProgrammationStart[1]*1]:'';
              $libelle_date='Du '.$tabDateProgrammationStart[2].$label_month_start.' au '.$tabDateProgrammationEnd[2].' '.$tabMonthFr[$tabDateProgrammationEnd[1]*1];
            }

           ?>
          {{ $libelle_date }}
        </div>
        @endif
        @if($detailprog[0]->public)
        <div class="p"><strong style="font-weight: 600">PUBLIC</strong>{{ $detailprog[0]->public->libelle_public }}</div>
        @endif
        @if($detailprog[0]->intervenant)
        <?php $previousValue = null; ?>
        @foreach($detailprog[0]->intervenant as $intervenants)
        @if($previousValue !== $intervenants->typeIntervenant->libelle_typeIntervenant)
        <div style="font-size: 16px; line-height: 1.1875; margin-top: 20px;">
          <strong style="font-weight: 600">{{ strtoupper($intervenants->typeIntervenant->libelle_typeIntervenant) }}</strong>
          {{ $intervenants->prenom_intervenant }} {{ $intervenants->nom_intervenant }}
        </div>
        @else
        <div style="font-size: 16px; line-height: 1.1875;">{{ $intervenants->prenom_intervenant }} {{ $intervenants->nom_intervenant }}</div>
        @endif
        <?php  $previousValue = $intervenants->typeIntervenant->libelle_typeIntervenant;?>
        @endforeach

        @endif
      </div>
    </div>
    @if(isset($listVideo))
    @foreach($listVideo as $video)
    <div class="embed-responsive embed-responsive-21by9">
         <iframe class="embed-responsive-item" style="padding-bottom: 20px"src="https://www.youtube.com/embed/{{$video->code_video}}" allowfullscreen></iframe>
    </div>
    @endforeach
    @endif
  </div>
</div>
</div>



@endsection
