@extends('app')
@section('content')
    <div class="mdl-grid mdl-cell mdl-cell--12-col justify-content-center">
        <div class="mdl-card__title justify-content-between mdl-cell mdl-cell--10-col">
            <h5 class="mdl-card__title-text table_title color_white">
                <a href="{{route('form_survey')}}"
                   class="mdl-js-ripple-effect mdl-button--primary back-button">
                    <span class="fa fa-arrow-circle-left"></span>
                </a>
                Revenir au formulaire
            </h5>
            <form action="{{route('listing_survey_by_note')}}" method="POST" id="survey_form">
                {{csrf_field()}}
                <fieldset>
                        <span class="star-cb-group">
                            <input type="checkbox"
                                   class="filter-note-all mdl-checkbox__input"
                                   id="all"
                                   @if(sizeof($selected)==5)
                                   checked
                                   @endif
                                   name="all"/>
                            <label for="all" class="color_white">Tous</label>
                            @for ($i = 1; $i <= 5; $i++)
                                <input type="checkbox"
                                       class="filter-note mdl-checkbox__input"
                                       id="note-{{$i}}"
                                       name="note[]"
                                       @if(in_array($i,$selected))
                                       checked
                                       @endif
                                       value="{{$i}}"/>
                                <label for="note-{{$i}}" class="color_white">{{$i}}
                                    @if(in_array($i,$selected))
                                        <span class="star-checked filter-note-star-{{$i}} fa fa-star"></span>
                                    @else
                                        <span class="star-checked filter-note-star-{{$i}} fa fa-star-o"></span>
                                    @endif
                                </label>
                            @endfor
                             <input type="submit" id="filter-survey" value="filtrer"
                                    class="mdl-button mdl-js-button color_white"/>
                       </span>
                </fieldset>
            </form>
        </div>
        <div class="mdl-card__supporting-text  mdl-card ">
            <table class="mdl-cell mdl-cell--12-col mdl-data-table mdl-js-data-table mdl-shadow--2dp ju">
                <thead>
                <tr>
                    <th class="color_white">{{strtoupper('reference produit')}}</th>
                    <th class="color_white">{{strtoupper('avis')}}</th>
                    <th class="color_white">{{strtoupper('note')}}</th>
                    <th class="color_white">{{strtoupper('date')}}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($surveys as $survey)
                    <tr>
                        <td>{{strtoupper($survey->product_reference)}}</td>
                        <td>
                             <span class="mdl-list__item-primary-content">
                              <span class="fa fa-user"></span>
                            {{$survey->customer->pseudo}}
                            </span>
                            <p class="comment">
                                {!! $survey->comment !!}
                            </p>
                            @if(!in_array($survey->picture,[[],null]))
                                @forelse($survey->picture as $picture)
                                    <div>
                                        <img alt="{{$picture->link}}" class="image-comment"
                                             src="{{asset('storage/images/surveys/'.$picture->link)}}"/>
                                    </div>
                                @empty
                                @endforelse
                            @endif
                        </td>
                        <td>
                            <span class="d-none">{{$survey->note}}</span>
                            @for ($i = 0; $i < 5; $i++)
                                @if($i>=$survey->note)
                                    <span class="star-checked fa fa-star-o"></span>
                                @else
                                    <span class="star-checked fa fa-star"></span>
                                @endif
                            @endfor
                        </td>
                        <td>
                            <p class="date-original">{{$survey->created_at}}</p>{{$survey->created_at->format('j F Y , H:i:s')}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">{{strtoupper('aucun avis disponible')}}</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-none" id="image-render">
        <button type="button" class="close close-alert" data-dismiss="alert"><span class="fa fa-close fa-2x"></span>
        </button>
        <div id="image-card"></div>
    </div>
@endsection