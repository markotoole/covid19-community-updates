@extends('layouts.app')

@section('content')
    <div class="form-update-wrapper tint-gray">
        <h1 class="title text-white pl-4">Submit an Update</h1>
        <div id="update-form" class="bg-white p-3">
            {!!Form::open()->route('update.submit')->attrs(['id' => 'update-form'])->errorBag('updateErrorBag') !!}
            {!!Form::errors("The form has errors")!!}
            {!!Form::select('update_status', 'Update status')->placeholder('Select one')->required()->wrapperAttrs(['class'=> 'required'])->options(['' => 'Select from list..', 'new' => 'New', 'update' => 'Update'])->placeholder('Select one')!!}
            {!!Form::select('update_id', 'Business Name')->required()->wrapperAttrs(['class'=> 'required'])->attrs(['data-url' => '/statuses/name'])->wrapperAttrs(['id'=> 'update-id'])->autocomplete('off')!!}
            {!!Form::text('name', 'Business Name Correction/Update')->required()->wrapperAttrs(['class'=> 'required'])->wrapperAttrs(['id'=> 'name']) !!}
            {!!Form::select('category', 'Category')->required()->wrapperAttrs(['class'=> 'required'])->options($categories->prepend('Choose category', ''), 'name', 'id', '')!!}
            {!!Form::select('status', 'Current status')->required()->wrapperAttrs(['class'=> 'required'])->options($statuses)!!}

            {!!Form::checkbox('delivery', 'Offering Delivery')->wrapperAttrs(['class'=> 'pt-2 pb-2 mobile-checkbox']) !!}
            {!!Form::checkbox('service_offered', 'Offering Collection Service')->wrapperAttrs(['class'=> 'pt-2 pb-2 mobile-checkbox']) !!}


            {!!Form::text('phone', 'Contact Phone Number')->required()->wrapperAttrs(['class'=> 'required'])!!}
            {!!Form::text('link', 'Website/Social Media Link')->required()->wrapperAttrs(['class'=> 'required'])!!}
            {!!Form::textarea('notes', 'Other relevant information')->help('Please enter any other relevant information about your business like special opening hours, vouchers, online ordering, hiring etc.')!!}

            <label for="submit-captcha" class="required">Captcha</label>
            <p> {!! $captcha !!}</p>
            <p><input type="text" id="submit-captcha" name="captcha" required></p>

            {!!Form::submit('Send update')->attrs(['class' => 'submit-update'])!!}
            {!!Form::close()!!}
        </div>
    </div>
@endsection
