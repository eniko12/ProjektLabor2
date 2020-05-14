@extends('layouts.app', ['activePage' => 'books', 'titlePage' => __('New Book')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">New Book</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('books.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="ISBN">ISBN</label>
                                    <input type="text" class="form-control" id="ISBN" name="ISBN"
                                           placeholder="Enter ISBN" required="required">
                                    @error("ISBN")
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title">title
                                    </label>
                                    <input type="text"
                                           class="form-control"
                                           id="title" name="title"
                                           placeholder="Enter title" required="required">@error("title")

                                    <div class="alert alert-danger">{{$message}}
                                    </div>@enderror
                                </div>


                                <div class="form-group">
                                    <label for="thumbnail">thumbnail
                                    </label>
                                    <input type="text"
                                           class="form-control"
                                           id="thumbnail"
                                           name="thumbnail"
                                           placeholder="Enter thumbnail"  required="required">@error("thumbnail")

                                    <div class="alert alert-danger">{{$message}}
                                    </div>@enderror
                                </div>


                                <div class="form-group">
                                    <label for="publish_year">publish_year
                                    </label>
                                    <input type="number" min="1900" max="2099" step="1" value="2020"
                                           class="form-control"
                                           id="publish_year"
                                           name="publish_year"
                                           placeholder="Enter publish_year"  required="required">@error("publish_year")

                                    <div class="alert alert-danger">{{$message}}
                                    </div>@enderror
                                </div>


                                <div class="form-group">
                                    <label for="language">language
                                    </label>
                                    <input type="text"
                                           class="form-control"
                                           id="language"
                                           name="language"
                                           placeholder="Enter language"  required="required">@error("language")

                                    <div class="alert alert-danger">{{$message}}
                                    </div>@enderror
                                </div>


                                <div class="form-group">
                                    <label for="page_count">page_count
                                    </label>
                                    <input type="number" min="1" max="99999" step="1" value="100"
                                           class="form-control"
                                           id="page_count"
                                           name="page_count"
                                           placeholder="Enter page_count" required="required">@error("page_count")

                                    <div class="alert alert-danger">{{$message}}
                                    </div>@enderror
                                </div>


                                <div class="form-group">
                                    <label for="description">description
                                    </label>
                                    <input type="text"
                                           class="form-control"
                                           id="description"
                                           name="description"
                                           placeholder="Enter description" required="required">@error("description")

                                    <div class="alert alert-danger">{{$message}}
                                    </div>@enderror
                                </div>


                                <div class="form-group">
                                    <label for="can_order">can_order
                                    </label>
                                    <input type="checkbox"
                                           class="form-control left"
                                           id="can_order"
                                           name="can_order"
                                           checked="checked"
                                           placeholder="Enter can_order">@error("can_order")

                                    <div class="alert alert-danger">{{$message}}
                                    </div>@enderror
                                    <label for="can_preorder">can_preorder
                                    </label>
                                    <input type="checkbox"
                                           class="form-control right"
                                           id="can_preorder"
                                           name="can_preorder"
                                           checked="checked"
                                           placeholder="Enter can_preorder">@error("can_preorder")

                                    <div class="alert alert-danger">{{$message}}
                                    </div>@enderror
                                </div>


                                <div class="form-group">
                                    <label for="in_stock">in_stock
                                    </label>
                                    <input type="number" min="0" max="99999" step="1" value="100"
                                           class="form-control"
                                           id="in_stock"
                                           name="in_stock"
                                           required="required"
                                           placeholder="Enter in_stock">@error("in_stock")

                                    <div class="alert alert-danger">{{$message}}
                                    </div>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="publisher_id">Publisher: </label>
                                    <select id="publisher_id"  required="required" name="publisher_id" class="form-control"> <!--multiple searchable-->
                                        @foreach(\App\Publisher::all() as $p)
                                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach
                                    </select>
                                    @error("publisher_id")
                                    <div class="alert alert-danger">{{$message}}
                                    </div>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="genres_selected">Genres: </label>
                                    <input type="text"  required="required" id="genres_selected" name="genres_selected" class="form-control" />
                                    @error("genres_selected")
                                    <div class="alert alert-danger">{{$message}}
                                    </div>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="authors_selected">Authors: </label>
                                    <input type="text"  required="required" id="authors_selected" name="authors_selected" class="form-control" />
                                    @error("authors_selected")
                                    <div class="alert alert-danger">{{$message}}
                                    </div>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="price">price
                                    </label>
                                    <input type="text"
                                           required="required"
                                           class="form-control"
                                           id="price" name="price"
                                           placeholder="Enter price">@error("price")

                                    <div class="alert alert-danger">{{$message}}
                                    </div>@enderror
                                </div>


                                <button type="submit" class="btn btn-primary">Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        let genre_selector = $('#genres_selected');
        let author_selector= $('#authors_selected');

        author_selector.amsifySuggestags({
            type : 'bootstrap',
            suggestions: [
                @foreach(\App\Author::all() as $a)
                {'tag': '{{ $a->name }}', 'value': {{$a->id}} },
                @endforeach
            ]
        });

        genre_selector.amsifySuggestags({
            type : 'bootstrap',
            suggestions: [
                    @foreach(\App\Genre::all() as $a)
                {'tag': '{{ $a->name_en }}', 'value': {{$a->id}} },
                @endforeach
            ]
        });
    </script>
@endpush
