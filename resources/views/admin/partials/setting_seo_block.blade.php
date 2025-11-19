<div class="row">
   <div class="col">
      <div class="regex-seo">
          <span><strong>%%sitename%%</strong> - Имя сайта</span>
          <span> | </span>
          <span><strong>%%sitedesc%%</strong> - Краткое описание сайта</span>
          @if(isset($additionRegex) && is_array($additionRegex))
              @foreach($additionRegex as $regex => $description)
                  <span> | </span>
                  <span><strong>{{$regex}}</strong> {{$description}}</span>
              @endforeach
          @endif
      </div>
   </div>
 </div>

<div class="row">
   <div class="col-xs-12 col-md-4">
       <div class="form-group">
           <label for="{{$name}}[title]" class="col-form-label">{{ __('Title') }}</label>

           <div>
               <input id="{{$name}}[title]" type="text" class="form-control{{ $errors->has($name.'.title') ? ' is-invalid' : '' }}" name="{{$name}}[title]" value="{{ old($name.'[title]', $seoModel->title) }}">

               @if ($errors->has($name.'.title'))
                   <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first($name.'.title') }}</strong>
                    </span>
               @endif

           </div>
       </div>
   </div>
   <div class="col-xs-12 col-md-4">
       <div class="form-group">
           <label for="{{$name}}[description]" class="col-form-label text-md-right">{{ __('Description') }}</label>

           <div>
               <textarea name="{{$name}}[description]" id="{{$name}}[description]" class="form-control">{{old($name.'.description', $seoModel->description)}}</textarea>

               @if ($errors->has($name.'.description'))
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first($name.'.description') }}</strong>
                   </span>
               @endif
           </div>
       </div>
   </div>
   <div class="col-xs-12 col-md-4">
       <div class="form-group">
           <label for="{{$name}}[keywords]" class="col-form-label text-md-right">{{ __('Keywords') }}</label>

           <div>
               <textarea name="{{$name}}[keywords]" id="{{$name}}[keywords]" class="form-control">{{old($name.'.keywords', $seoModel->keywords)}}</textarea>

               @if ($errors->has($name.'.keywords'))
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first($name.'.keywords') }}</strong>
                   </span>
               @endif
           </div>
       </div>
   </div>
</div>

<div class="row">
   <div class="col-xs-12 col-md-4">
       <div class="form-group">
           <label for="{{$name}}[canonical]" class="col-form-label">{{ __('Canonical') }}</label>

           <div>
               <input id="{{$name}}[canonical]" type="text" class="form-control{{ $errors->has($name.'.canonical') ? ' is-invalid' : '' }}" name="{{$name}}[canonical]" value="{{ old($name.'.canonical', $seoModel->canonical) }}">

               @if ($errors->has($name.'.canonical'))
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first($name.'.canonical') }}</strong>
                   </span>
               @endif

           </div>
       </div>
   </div>

   <div class="col-xs-12 col-md-4 pt-2 pl-3" >
       <label>Robots</label>

       <div class="row">
           <div class="col">
               <div class="form-check">
                   <input type="radio" id="{{$name}}_robot_index" class="form-check-input" name="{{$name}}[robot_index]" value="INDEX" {{ checked( 'INDEX', old($name.'.robot_index', $seoModel->robot_index) ) }}>
                   <label for="{{$name}}_robot_index">INDEX</label>
               </div>
               <div class="form-check">
                   <input type="radio" id="{{$name}}_robot_noindex" class="form-check-input" name="{{$name}}[robot_index]" value="NOINDEX" {{ checked( 'NOINDEX', old($name.'.robot_index', $seoModel->robot_index) ) }}>
                   <label for="{{$name}}_robot_noindex">NOINDEX</label>
               </div>
           </div>
           <div class="col">
               <div class="form-check">
                   <input type="radio" id="{{$name}}_robot_follow" class="form-check-input" name="{{$name}}[robot_follow]" value="FOLLOW" {{ checked( 'FOLLOW', old($name.'.robot_follow', $seoModel->robot_follow) ) }}>
                   <label for="{{$name}}_robot_follow">FOLLOW</label>
               </div>
               <div class="form-check">
                   <input type="radio" id="{{$name}}_robot_nofollow" class="form-check-input" name="{{$name}}[robot_follow]" value="NOFOLLOW" {{ checked( 'NOFOLLOW', old($name.'.robot_follow', $seoModel->robot_follow) ) }}>
                   <label for="{{$name}}_robot_nofollow">NOFOLLOW</label>
               </div>
           </div>
       </div>

   </div>
</div>

<div class="row">
    <h3 class="ml-4 mt-5 mb-3">Контент будет выведен на странице списка карт</h3>
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="{{$name}}[title_page]" class="col-form-label">{{ __('Title страницы') }}</label>

            <div>
                <input id="{{$name}}[title_page]" type="text" class="form-control{{ $errors->has($name.'.title_page') ? ' is-invalid' : '' }}" name="{{$name}}[title_page]" value="{{ old($name.'[title_page]', $seoModel->title_page) }}">

                @if ($errors->has($name.'.title_page'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first($name.'.title_page') }}</strong>
                    </span>
                @endif

            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label for="{{$name}}[subtitle_page]" class="col-form-label">{{ __('Надпись под Title(Subtitle)') }}</label>

            <div>
                <input id="{{$name}}[subtitle_page]" type="text" class="form-control{{ $errors->has($name.'.subtitle_page') ? ' is-invalid' : '' }}" name="{{$name}}[subtitle_page]" value="{{ old($name.'[subtitle_page]', $seoModel->subtitle_page) }}">

                @if ($errors->has($name.'.subtitle_page'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first($name.'.subtitle_page') }}</strong>
                    </span>
                @endif

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="form-group">
            <label for="{{$name}}[content_page]" class="col-form-label text-md-right">{{ __('Контент страницы') }}</label>

            <div>
                <textarea name="{{$name}}[content_page]" id="{{$name}}[content_page]" class="html-editor form-control">{{old($name.'.content_page', $seoModel->content_page)}}</textarea>

                @if ($errors->has($name.'.content_page'))
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first($name.'.content_page') }}</strong>
                   </span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-12" >
        <button type="submit" class="btn  btn-success">Сохранить все настройки</button>
    </div>
</div>
