@extends('layouts.base')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm">
            <a class="opacity-5 text-dark" href="javascript:;">Courses</a>
        </li>
    </ol>
</nav>
@endsection

@section('content')
    @livewire('lms::courses.index')
@endsection
