
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('title', trans('validation.attributes.backend.content.article.title'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.content.article.title')]) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('slug', trans('validation.attributes.backend.content.article.slug'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.content.article.slug')]) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('excerpt', trans('validation.attributes.backend.content.article.excerpt'), ['class' => 'col-lg-2 control-label', 'placeholder' => trans('validation.attributes.backend.content.article.excerpt')]) !!}
                    <div class="col-lg-10">
                        {!! Form::text('excerpt', null, ['class' => 'form-control']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('content', trans('validation.attributes.backend.content.article.content'), ['class' => 'col-lg-2 control-label', 'placeholder' => trans('validation.attributes.backend.content.article.content')]) !!}
                    <div class="col-lg-10">
                        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                    </div>
                </div><!--form control-->
                
                <div class="form-group">
                    {!! Form::label('category_id', trans('validation.attributes.backend.content.article.category_id'), ['class' => 'col-lg-2 control-label', 'placeholder' => trans('validation.attributes.backend.content.article.content')]) !!}
                    <div class="col-lg-10">
                        {!! Form::select('category_id', App\Models\Content\ArticleCategory\ArticleCategory::categoriesList(), null, ['placeholder' => 'Select a category...', 'class' => 'form-control']); !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">{{ trans('validation.attributes.backend.content.article.status') }}</label>
                    <div class="col-lg-1">
                        <!--<input type="checkbox" value="1" name="status" checked="checked" />-->
                        {!! Form::hidden('status', false, ['class' => 'form-control']) !!}
                        {!! Form::checkbox('status', true) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('created_at', trans('validation.attributes.backend.content.article.created_at'), ['class' => 'col-lg-2 control-label', 'placeholder' => trans('validation.attributes.backend.content.article.created_at')]) !!}
                    <div class="col-lg-10">
                        {!! Form::text('created_at', null, ['class' => 'form-control']) !!}
                    </div>
                </div><!--form control-->
                
                <div class="form-group">
                    {!! Form::label('updated_at', trans('validation.attributes.backend.content.article.updated_at'), ['class' => 'col-lg-2 control-label', 'placeholder' => trans('validation.attributes.backend.content.article.updated_at')]) !!}
                    <div class="col-lg-10">
                        {!! Form::text('updated_at', null, ['class' => 'form-control']) !!}
                    </div>
                </div><!--form control-->
                
            </div><!-- /.box-body -->