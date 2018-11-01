@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="d-flex justify-content-center card-header">할 일 등록하기</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('save') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" placeholder="Enter Title">
                            {{--<small id="titleHelp" class="form-text text-muted">Enter Title</small>--}}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Content</label>
                            <input type="text" class="form-control" id="content" name="content" aria-describedby="titleHelp" placeholder="Enter Content">
                        </div>

                        <div class="d-flex justify-content-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="priority" id="priorityRadios1" value="1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    1순위(중요O, 긴급O)
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="priority" id="priorityRadios2" value="2">
                                <label class="form-check-label" for="exampleRadios2">
                                    2순위(중요O, 긴급X)
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="priority" id="priorityRadios3" value="3">
                                <label class="form-check-label" for="exampleRadios3">
                                    3순위(중요X, 긴급O)
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="priority" id="priorityRadios4" value="4">
                                <label class="form-check-label" for="exampleRadios4">
                                    4순위(중요X, 긴급X)
                                </label>
                            </div>
                        </div>

                        <div class="mt-lg-4 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">할 일 등록</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
