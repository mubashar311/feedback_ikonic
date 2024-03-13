@extends('layouts.app')
@section('title', __('All Users'))
@section('header')
{{ __('All feedbacks') }}
@endsection
@section('content')
<div class="row gy-3 mt-2 for_padding">

    <div class="head_flex">
        <div class="tit_bag_flex my-auto mb-0 ">
            <h2 class="title">{{ __('All feedbacks') }}</h2>
        </div>
        <a class="btn btn-theme mt-4" href="{{ route('feedbacks.create') }}">{{ __('Create Feedback') }}</a>

    </div>

<!--Table start here-->
<div class="col-12 viewtable" data-aos="zoom-in" data-aos-duration="1000">
    <div class="table-responsive text-nowrap ">
        <table id="listPage" class=" table border-0">
            <thead>
                <tr>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Category') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Vote Count') }}</th>
                    @if(Auth::user()->role == 'Admin')
                    <th>{{ __('Commenting Status') }}</th>
                    @endif
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($feedbacks as $feedback)
                @include('feedbacks.table')
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-12">
            {{-- {{$feedback->links()}} --}}
        </div>
    </div>
</div>
</div>
</div>
@endsection
