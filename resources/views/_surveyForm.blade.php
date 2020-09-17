@extends('app')
@section('content')
    <div class="mdl-cell mdl-cell--6-col justify-content-center mdl-card mdl-shadow--2dp">
        <div class="mdl-card__title justify-content-center">
            <h5 class="mdl-card__title-text">Votre avis compte, cliquez sur les étoiles</h5>
        </div>
        <form action="{{route('post_survey')}}" enctype="multipart/form-data" method="POST" id="survey_form">
        {{csrf_field()}}
        <!--NOTE-->
            <div class="mdl-grid justify-content-center">
                <fieldset>
                        <span class="star-cb-group">
                            @forelse([1,2,3,4,5] as $note)
                                <input type="checkbox"
                                       class="rating"
                                       id="rating-{{$note}}"
                                       name="rating[]"
                                       value="{{$note}}"/>
                                <label for="rating-{{$note}}">
                                    <span class="fa fa-star-o star-checked fa-2x"
                                          id="star-rating-{{$note}}">
                                    </span>
                                </label>
                            @empty
                            @endforelse
                       </span>
                </fieldset>
            </div>
            <!--END NOTE-->

            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col">
                    <!--EMAIL-->
                    <div class="form-group">
                        <label for="email">{{ucfirst('email')}}</label>
                        @if($errors->has('email'))
                            <small class="alert-warning">{{$errors->first('email')}}</small>
                        @endif
                        <input type="text" class="form-control" id="email"
                               aria-describedby="titleHelp" name="email"
                               placeholder="...@..."
                               value="{{old('email')}}" required/>
                    </div>
                    <!--END EMAIL-->
                    <!--PSEUDO-->
                    <div class="form-group">
                        <label for="pseudo">{{ucfirst('pseudo')}}</label>
                        @if($errors->has('pseudo'))
                            <small class="alert-warning">{{$errors->first('pseudo')}}</small>
                        @endif
                        <input type="text" class="form-control" id="pseudo"
                               aria-describedby="titleHelp" name="pseudo"
                               placeholder="mr muscle"
                               value="{{old('pseudo')}}" required/>
                    </div>
                    <!--END PSEUDO-->
                    <!--PRODUCT REFERENCE-->
                    <div class="form-group">
                        <label for="product_reference">{{ucfirst('Reférence du produit')}}</label>
                        @if($errors->has('product_reference'))
                            <small class="alert-warning">{{$errors->first('product_reference')}}</small>
                        @endif
                        <input type="text" class="form-control" id="product_reference"
                               aria-describedby="titleHelp" name="product_reference"
                               placeholder="B3010"
                               value="{{old('product_reference')}}"/>
                    </div>
                    <!--END PRODUCT REFERENCE-->
                    <!--COMMENTAIRE-->
                    <div class="form-group">
                        <label for="description">Commentaire</label>
                        @if($errors->has('comment'))
                            <small class="alert-warning">{{$errors->first('comment')}}</small>
                        @endif
                        <textarea class="comment" name="comment" id="comment">{{old('comment')}}</textarea>
                    </div>
                    <!--END COMMENT-->
                </div>
                <!--PICTURE-->
                <div class="mdl-cell mdl-cell--12-col form-group">
                    @if($errors->has('survey_pictures'))
                        <small class="alert-warning">{{$errors->first('survey_pictures')}}</small>
                    @endif
                    <div class="mdl-cell mdl-cell--12-col">
                        <div class="mdl-cell mdl-cell--12-col upload-file">
                            <button type="button" class="mdl-button mdl-js-button mdl-button--primary">
                                <input type="file" id="survey_pictures" name="survey_pictures[]"
                                       multiple="multiple">
                                ajouter des photos <i class="fa fa-picture-o fa-2x"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--12-col" id="images-preview">
                </div>
                <!--END PICTURE-->
            </div>
            <div class="mdl-grid mdl-cell mdl-cell--12-col justify-content-around">
                <a href="{{route('listing_survey')}}"
                   class="mdl-button mdl-js-button mdl-button--primary">
                    Consulter les avis
                </a>
                <button type="submit" id="submit-survey"
                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary">
                    Postez votre avis
                </button>
            </div>
        </form>
    </div>
@endsection