@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="d-flex justify-content-center card-header">할 일 수정하기</div>

                <div class="card-body">
                    <form id="editForm" method="POST" action="{{ route('update', ['id' => $post->id]) }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" aria-describedby="titleHelp" placeholder="Enter Title">
                            {{--<small id="titleHelp" class="form-text text-muted">Enter Title</small>--}}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Content</label>
                            <input type="text" class="form-control" id="content" name="content" value="{{ $post->content }}" aria-describedby="titleHelp" placeholder="Enter Content">
                        </div>

                        <div class="d-flex justify-content-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="priority" id="priorityRadios1" value="1" {{ $post->priority == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="exampleRadios1">
                                    1순위(중요O, 긴급O)
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="priority" id="priorityRadios2" value="2" {{ $post->priority == '2' ? 'checked' : ''}}>
                                <label class="form-check-label" for="exampleRadios2">
                                    2순위(중요O, 긴급X)
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="priority" id="priorityRadios3" value="3" {{ $post->priority == '3' ? 'checked' : ''}}>
                                <label class="form-check-label" for="exampleRadios3">
                                    3순위(중요X, 긴급O)
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="priority" id="priorityRadios4" value="4" {{ $post->priority == '4' ? 'checked' : ''}}>
                                <label class="form-check-label" for="exampleRadios4">
                                    4순위(중요X, 긴급X)
                                </label>
                            </div>
                        </div>

                        <div style="position: relative">
                            <strong>Due date:</strong>
                            <input class="timepicker form-control" type="text" name="due_date">
                        </div>

                        <div class="mt-lg-4 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">할 일 수정</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">
    window.onload = function() {
        $('.timepicker').datetimepicker({
            format: 'Y-m-d H:i:s'
        });

        function validate() {
            var title = document.getElementById("title").value;
            var content = document.getElementById("content").value;

            if(title == "" || content == "") return false;
            return true;
        }

        document.getElementById("editForm").onsubmit = function() {
            var result = validate();

            if(result) {
                return true;
            } else {
                alert('제목 혹은 내용을 입력해주세요.');
                return false;
            }
        };
    };
</script>
