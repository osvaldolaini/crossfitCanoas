@extends('site.app')
@section('body')
    {{-- Sub page Header --}}
    @include('site.sections.subpage_header')
    {{-- Articles --}}
    @include('site.sections.contact_sections')
    {{-- About --}}
    @include('site.sections.newsletter')

@stop
