@extends('layouts.app')

@section('content')
    <div class="form-update-wrapper">
        <h1 class="title text-white">Submit an Update</h1>
        <div id="update-form" class="bg-white p-3">
            {!!Form::open()->route('update.submit')->attrs(['id' => 'update-form'])->errorBag('updateErrorBag') !!}
            {!!Form::errors("The form has errors")!!}
            {!!Form::select('update_status', 'Update status')->placeholder('Select one')->options(['new' => 'New', 'update' => 'Update'])->placeholder('Select one')!!}
            {!!Form::select('update_id', 'Business Name to update')->required()->attrs(['data-url' => '/statuses/name'])->wrapperAttrs(['id'=> 'update-id'])->autocomplete('off')!!}
            {!!Form::text('name', 'New Business Name')->required()->wrapperAttrs(['id'=> 'name']) !!}
            {!!Form::select('category', 'Category')->options($categories->prepend('Choose category', ''), 'name', 'id', '')->placeholder('Select one')!!}
            {!!Form::select('status', 'Current status')->options($statuses)->placeholder('Select one')!!}

            {!!Form::checkbox('delivery', 'Offering Delivery')->wrapperAttrs(['class'=> 'pb-3']) !!}
            {!!Form::checkbox('service_offered', 'Offering Collection Service')->wrapperAttrs(['class'=> 'pb-3']) !!}


            {!!Form::text('phone', 'Contact Phone Number')!!}
            {!!Form::text('link', 'Website/Social Media Link')!!}
            {!!Form::textarea('notes', 'Additional Notes')!!}

            <label for="submit-captcha" class="">Captcha</label>
            <p> {!! $captcha !!}</p>
            <p><input type="text" id="submit-captcha" name="captcha" required></p>

            {!!Form::submit('Send update')->attrs(['class' => 'submit-update'])!!}
            {!!Form::close()!!}
        </div>
    </div>
@endsection