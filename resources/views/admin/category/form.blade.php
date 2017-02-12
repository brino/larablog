<div class="panel">
    <div class="panel-heading">
        Category
    </div>
    <div class="panel-block">
        {!! Form::label('name','Name',['class'=>'label']) !!}
        <p class="control">
            {!! Form::text('name',null,['class'=>$errors->has('name')?'input is-danger':'input','placeholder'=>'My New Category']) !!}
            @if ($errors->has('name'))
                <span class="help is-danger">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </p>

        {!! Form::label('icon','Icon',['class'=>'label']) !!}
        <p class="control">
            {!! Form::text('icon',null,['class'=>$errors->has('icon')?'input is-danger':'input','placeholder'=>'fa-user']) !!}
            @if ($errors->has('icon'))
                <span class="help is-danger">
                    {{ $errors->first('icon') }}
                </span>
            @endif
        </p>
    </div>
</div>

<div class="panel @if($errors->has('description')){{ 'is-danger' }}@endif">
    <div class="panel-heading">Summary</div>
    <div class="panel-block">
        {!! Form::label('description','Description',['class'=>'label']) !!}
        <p class="control">
            {!! Form::textarea('description',null,['id'=>'category-description','class'=>$errors->has('description')?'textareais-danger':'textarea','placeholder'=>'Description']) !!}

            @if ($errors->has('description'))
                <span class="help is-danger">
                    {{ $errors->first('description') }}
                </span>
            @endif
        </p>
    </div>
</div>

