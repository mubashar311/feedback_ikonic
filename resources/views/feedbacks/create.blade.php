@extends('layouts.app')
@section('title', __('Create Feedback'))
@section('header')
{{ __('Create Feedback') }}
@endsection
@section('content')
<div class="row gy-3 mt-3 for_padding">
    <div class="col-md-6 ">
        <h2 class="title">{{ __('Create Feedback') }}</h2>
    </div>
    <div class="col-12 p-0">
        <div class="d-box">
            <form action="{{ route('feedbacks.store') }}" method="POST" enctype="multipart/form-data" id="myForm">
                @csrf
                <div class="row gy-3">
                    <div class="col-md-6">
                        <div class="form-group py-2">
                            <label for="mobileNumber">{{ __('Title') }} <sup><i class="fas fa-star required"></i></sup>
                            </label>
                            <div class="input-group">
                                <input type="text" name="title" class="form-control form-control-lg  form_input" placeholder="" value="{{ old('title') }}" autofocus="">
                            </div>
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group py-2">
                            <label for="category">{{ __('category') }} <sup><i class="fas fa-star required"></i></sup></label>
                            <select id="inputState" class="form-select form-control form-control-lg  form_input" name="category">
                                <option selected disabled>Select</option>
                                <option value="Bug report">Bug report</option>
                                <option value="Feature request">Feature request</option>
                                <option value="Improvement">Improvement</option>
                            </select>
                            @error('category')
                            <div class="alert alert-danger">{{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group py-2">
                            <label for="nic">{{ __('Description') }} <sup><i class="fas fa-star required"></i></sup>
                            </label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Write description here." id="floatingTextarea2" style="height: 100px" name="description">{{ old('description') }}</textarea>
                            </div>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12 text-end">
                    <button type="button" id="clearButton" class="btn clear_btn">{{ __('Clear') }}</button>
                    <button type="submit" class="btn btn-theme">{!! __('Create') !!}</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#clearButton').click(function() {
            $('#myForm input').val('');
        });
    });
</script>
@endsection