@extends('static-page::layouts.app')

@section('title', settings('title', 'Static Page'))

@section('module-content')
    <p-page-content title="{{settings('title')}}" subtitle="{{settings('subtitle')}}">
        <p-card-group>
            <show-html
                html="{{settings('html', 'No content has been set.')}}"
                :can-click-button="{{(app(\BristolSU\Support\Permissions\Contracts\PermissionTester::class)->evaluate('static-page.click-button')?'true':'false')}}"
                :can-unsubmit="{{(app(\BristolSU\Support\Permissions\Contracts\PermissionTester::class)->evaluate('static-page.delete-button-click')?'true':'false')}}"
                button-text="{{settings('button_text', 'Submit')}}"></show-html>
        </p-card-group>
    </p-page-content>
@endsection

