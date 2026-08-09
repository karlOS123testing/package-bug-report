@extends('layouts.layout')

@section('sidebar')
    @include('layouts.sidebar', ['sidebar'=> Menu::get('sidebar_admin')])
@endsection
@section('css')
@endsection
@section('content')
    <div class="container page-content" id="app-package-bug-report">
        <p class="lead">
        <h1>{{__('Samples')}}</h1>
        <div class="row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fas fa-search"></i>
                    </span>
                    </div>
                    <input v-model="filter" class="form-control" placeholder="{{__('Search')}}...">
                </div>
            </div>
            <div class="col-8">
                <b-btn v-b-modal.sample-modal class="float-right btn-action"><i class="fa fa-plus"></i> {{__('Sample')}}</b-btn>
            </div>
        </div>
        <div class="container-fluid">
            <sample-listing id="sample-list" ref="listing" :filter="filter" v-on:reload="reload"></sample-listing>
        </div>

        <b-modal id="sample-modal"
                 ref="modal"
                 ok-title="Save"
                 ok-variant="secondary"
                 @ok="onSubmit"
                 @hidden="clearForm"
                 cancel-title="Close"
                 cancel-variant="outline-secondary">
            <h5 slot="modal-header" class="modal-title">@{{ action }} Sample</h5>
            <button slot="modal-header" type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            <div class="form-group">
                <label for="username">{{ __('userName') }}</label>
                <input type="text" name="username" id="username" class="form-control" v-model="sample.username" :class="{'is-invalid': addError.username}">
                <div class="invalid-feedback" v-for="usernameError in addError.username" v-text="usernameError"></div>
            </div>
            <div class="form-group">
                <label for="status">{{ __('Status') }}</label>
                <select name="status" id="status" class="form-control" v-model="sample.status" :class="{'is-invalid': addError.status}">
                    <option value="ENABLED">ENABLED</option>
                    <option value="DISABLED">DISABLED</option>
                </select>
                <div class="invalid-feedback" v-for="statusError in addError.status" v-text="statusError"></div>
            </div>

        </b-modal>
    </div>
@section('js')
<script type="module" src="{{mix('/js/package.js', 'vendor/processmaker/packages/package-bug-report')}}"></script>
@endsection
@endsection
