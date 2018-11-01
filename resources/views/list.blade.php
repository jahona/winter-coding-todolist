@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table mt-lg-4">
                <thead class="table">
                    <tr>
                        {{--<td align="center" scope="col">#</td>--}}
                        <td align="center">Priority</td>
                        <td align="center">Title</td>
                        <td align="center" width="50%">Content</td>
                        <td align="center">Edit</td>
                        <td align="center">Delete</td>
                    </tr>
                </thead>
                <tbody class="table">
                {{--@php--}}
                    {{--$key = 0--}}
                {{--@endphp--}}
                @foreach ($results->items() as $post)
                    <tr>
                        {{--<td align="center" scope="row">{{ $post->id }}</td>--}}

                        @if ($post->priority == '1')
                            <td align="center"><span class="btn btn-danger">1순위</span></td>
                        @endif
                        @if ($post->priority == '2')
                            <td align="center"><span class="btn btn-warning">2순위</span></td>
                        @endif
                        @if ($post->priority == '3')
                            <td align="center"><span class="btn btn-info">3순위</span></td>
                        @endif
                        @if ($post->priority == '4')
                            <td align="center"><span class="btn btn-dark">4순위</span></td>
                        @endif

                        <td align="center">{{ $post->title }}</td>
                        <td align="center">{{ $post->content }}</td>
                        <td align="center"><a href="{{ route('edit', ['id' => $post->id]) }}"><i class="fas fa-pencil-alt"></i></a></td>
                        <td align="center"><a href="{{ route('delete', ['id' => $post->id]) }}"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item {{ $results->currentPage() == 1 ? 'disabled' : ''}}">
                        <a class="page-link" href="{{ $results->previousPageUrl() }}" tabindex="-1">Prev</a>
                    </li>

                    @php
                        $startPage = $results->currentPage() - 1;
                        if($startPage < 1) $startPage = 1;
                        $endPage = $startPage + 2;
                        if($endPage > $results->lastPage()) $endPage = $results->lastPage();
                    @endphp

                    @for($i=$startPage ; $i<=$endPage; $i++)
                        <li class="page-item {{ $i == $results->currentPage() ? 'active' : '' }}"><a class="page-link" href="{{ $results->url($i) }}">{{ $i }}</a></li>
                    @endfor
                    <li class="page-item {{ $results->currentPage() == $results->lastPage() ? 'disabled' : ''}}">
                        <a class="page-link" href="{{ $results->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
            </nav>

            <div class="d-flex justify-content-center mt-lg-4">
                <a href="{{ route('write') }}" class="btn btn-light btn-md ml-2 shadow p-3 mb-5 rounded" style="width:30%; font-size: large">할 일 등록하기</a>
                <a href="{{ route('write') }}" class="btn btn-light btn-md ml-2 shadow p-3 mb-5 rounded" style="width:30%; font-size: large">완료 처리하기</a>
            </div>
        </div>
    </div>
</div>
@endsection