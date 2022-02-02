@extends('site.app')
@section('body')

    {{-- Sub page Header --}}
    @include('site.sections.subpage_header')
    {{-- Newsletter --}}
    @include('site.sections.timetable')
    {{-- Newsletter --}}
    @include('site.sections.services')
    {{-- Contact --}}
    @include('site.sections.contact')
    {{-- Newsletter --}}
    @include('site.sections.newsletter')
    {{-- Articles --}}
    @include('site.sections.articles')

@stop
