@extends('layouts.app')
@section('title')
    {{__('messages.vcard.edit_vcard')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1>{{__('messages.vcard.edit_vcard')}}</h1>
            <a class="btn btn-outline-primary float-end"
               href="{{ route('vcards.index') }}">{{ __('messages.common.back') }}</a>
        </div>
        <div class="col-12">
            @if(Session::has('success'))
                <p class="alert alert-success">{{ getSuccessMessage(Request::query('part')).Session::get('success') }}</p>
            @endif
            @include('layouts.errors')
            @include('flash::message')
        </div>
        @include('vcards.sub_menu')
        @if($partName !== 'services'&& $partName !=='products'&& $partName !=='testimonials' && $partName !=='galleries' && $partName !=='blogs')
        <div class="card">
            <div class="card-body">
                @endif
                {{ Form::hidden('is_true', Request::query('part') == 'business_hours',['id' => 'vcardCreateEditIsTrue']) }}
                @if($partName != 'services' && $partName != 'blogs' && $partName != 'testimonials' && $partName != 'products' && $partName != 'galleries')
                    {!! Form::open(['route' => ['vcards.update', $vcard->id], 'id' => 'editForm', 'method' => 'put', 'files' => 'true']) !!}
                    @include('vcards.fields')
                    {{ Form::close() }}
                @else
                    @if($partName === 'services')
                        @include('vcards.services.index')
                    @elseif($partName === 'products')
                        @include('vcards.products.index')
                    @elseif($partName === 'galleries')
                        @include('vcards.gallery.index')
                    @elseif($partName === 'blogs')
                        @include('vcards.blogs.index')
                    @else
                        @include('vcards.testimonials.index')
                    @endif
                @endif
                @if($partName !== 'services'&& $partName !=='products'&& $partName !=='testimonials' && $partName !=='galleries' && $partName !=='blogs')
            </div>
        </div>
        @endif
    </div>
@endsection
