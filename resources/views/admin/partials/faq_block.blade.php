<hr/>

<div class="row mt-4 mb-3">
    <div class="col">
        <h3>
            <button class="btn btn-block btn-default" type="button" data-toggle="collapse" data-target="#collapseFaq" aria-expanded="true" aria-controls="collapseFaq">
                FAQ <span class="badge badge-secondary"><i class="fa fa-angle-down"></i></span>
            </button>
        </h3>
    </div>
</div>

<div id="collapseFaq" class="collapse" aria-labelledby="headingFaq">
   <div class="row">
       <div class="col">
           <div id="faq-fields" class="form-group multi-fields">
               @foreach (old('faqs', $faqs) as $key => $faq)

                   <div class="multi-field">
                       <div class="mt-4 mb-4">
                           <a href="javascrit:void(0);" class="remove_multi_field btn btn-danger">Удалить</a>
                       </div>
                       <div class="row">
                           <div class="col-xs-12 col-md-6">
                               <div class="form-group">
                                   <label class="col-form-label text-md-right">{{ __('Вопрос') }}</label>

                                   <div>
                                       <input type="text" class="form-control" name="faqs[{{$key}}][question]" value="{{ old('faqs['.$key.'][question]', $faq['question']) }}">
                                   </div>
                               </div>

                           </div>
                           <div class="col-xs-12 col-md-6">
                               <div class="form-group">
                                   <label class="col-form-label text-md-right">{{ __('Ответ') }}</label>

                                   <div>
                                       <textarea name="faqs[{{$key}}][answer]" class="form-control">{{ old('faqs['.$key.'][answer]', $faq['answer']) }}</textarea>
                                   </div>
                               </div>

                           </div>
                       </div>

                   </div>

               @endforeach
               <div class="multi-fields-container">

               </div>
               <div class="mt-4 mb-4">
                   <a href="javascrit:void(0);" class="add_multi_field btn btn-success" data-template="#faqs">Добавить Вопрос/Ответ</a>
               </div>
           </div>
       </div>
   </div>
</div>

<script type="text/template" id="faqs">
    <div class="multi-field">
        <div class="mt-4 mb-4">
            <a href="javascrit:void(0);" class="remove_multi_field btn btn-danger">Удалить</a>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    <label class="col-form-label text-md-right">{{ __('Вопрос') }}</label>

                    <div>
                        <input type="text" class="form-control" name="faqs[<%= count %>][question]" >
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    <label class="col-form-label text-md-right">{{ __('Ответ') }}</label>

                    <div>
                       <textarea name="faqs[<%= count %>][answer]" class="form-control"></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</script>

