@extends('layouts.app', ['activePage' => 'books', 'titlePage' => __('Book List')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Books</h4>
                            <p class="card-category"> Here you can manage books</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('books.create') }}" class="btn btn-sm btn-primary">Add book</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="data_table1" class="table display">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            ISBN
                                        </th>
                                        <th>
                                            Title
                                        </th>
                                        <th>
                                            Published
                                        </th>
                                        <th>
                                            Stock
                                        </th>
                                        <th>
                                            Price
                                        </th>
                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr></thead>
                                    <tbody>
                                    @foreach($books as $b)
                                        <tr>
                                            <td>
                                                {{ $b->ISBN }}
                                            </td>
                                            <td>
                                                <a href="{{ route('books.show', $b->id) }}">{{ $b->title }}</a>
                                            </td>
                                            <td>
                                                {{ $b->publish_year }}
                                            </td>
                                            <td>
                                                {{ $b->in_stock }}
                                            </td>
                                            <td>
                                                {{ $b->price }}
                                            </td>
                                            <td class="td-actions text-right">
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('books.edit', $b->id) }}" data-original-title="" title="">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
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
