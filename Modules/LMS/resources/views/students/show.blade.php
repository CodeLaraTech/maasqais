@extends('layouts.base')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm">
            <a class="opacity-5 text-dark" href="{{ route('lms.students.index') }}">Students</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
            Show
        </li>
    </ol>
</nav>
@endsection

@section('content')
    @livewire('lms::students.show' , ['student' => $student])
@endsection
