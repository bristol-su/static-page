@extends('static-page::layouts.app')

@section('title', settings('title', 'Static Page'))

@section('module-content')
    <p-page-content title="{{settings('title')}}" subtitle="{{settings('subtitle')}}">
        <p-tabs>
            <p-tab title="Button Clicks">
                <button-clicks></button-clicks>
            </p-tab>
            <p-tab title="Page Views">
                <page-views></page-views>
            </p-tab>
        </p-tabs>
    </p-page-content>
@endsection

