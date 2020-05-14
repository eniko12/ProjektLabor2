@extends('layouts.app', ['activePage' => 'books', 'titlePage' => __('Book Data')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Book data</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data_table1" class="table display">
                                    <thead class=" text-primary">
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            Id
                                        </td>
                                        <td>
                                            {{ $book->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Title
                                        </td>
                                        <td>
                                            {{ $book->title }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            ISBN
                                        </td>
                                        <td>
                                            {{ $book->ISBN }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Thumbnail:
                                        </td>
                                        <td>
                                            {{ $book->thumbnail }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Published
                                        </td>
                                        <td>
                                            {{ $book->publish_year }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Description:
                                        </td>
                                        <td>
                                           {{ $book->description }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Price:
                                        </td>
                                        <td>
                                            {{ $book->price }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Actions
                                        </td>
                                        <td>
                                            <a href="{{ route('books.delete', $book->id) }}">Delete</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
