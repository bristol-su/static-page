@extends('bristolsu::base')

@section('content')
    <div id="static-page-root">
        @yield('module-content')
    </div>
@endsection

@push('styles')
    <link href="{{ asset('modules/static-page/css/module.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('modules/static-page/js/module.js') }}"></script>
@endpush
