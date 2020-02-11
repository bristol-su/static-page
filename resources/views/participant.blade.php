@extends('static-page::layouts.app')

@section('title', settings('title', 'Static Page'))

@section('module-content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    @if(settings('title') !== null)
                    <h1 class="">{{settings('title')}}</h1>
                    @endif
                    @if(settings('subtitle') !== null)
                        <h2 class="text-muted">{!! settings('subtitle') !!}</h2>
                    @endif
                        <div style="padding-top: 20px;">
                    <show-html
                        html="{{settings('html', 'No content has been set.')}}"></show-html>
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection

