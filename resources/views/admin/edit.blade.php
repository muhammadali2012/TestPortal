@extends('admin.layout')


@section('content')

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-auto">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Category </h3>
                    </div>
                    <!--{{--<form role="form" id="categoryForm" method="patch" action="{{action('CategoryController@update', $category->id)}}">--}}-->
                    {{ Form::model($category, array('route' => array('category.update', $category->id), 'method' => 'PUT',"id"=>'catFom'))  }}
                    {{ method_field('PUT') }}
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                                <label  for="category">Category</label>
                                <input type="text" class="form-control" id="category" value="{{$category->category}}"  name="category"/>
                            </div>
                            <p class="category_error error text-center alert alert-danger hidden"></p>

                            <div class="checkbox">
                                <label  for="is_active">
                                    <input type="checkbox"   id="is_active" name="is_Active"
                                           @if ($category->is_active === 1)
                                           checked
                                           @endif
                                    >IS Active
                                </label>
                            </div>
                            <div class="modal-footer box-footer ">
                                <button type="submit" class="btn actionBtn btn-success" data-dismiss="modal" id="AddButton">
                                    <span class='glyphicon glyphicon-edit'> Edit </span>
                                </button>
                                <a href="/category"><button type="button" class="btn btn-warning" data-dismiss="modal">
                                        <span class='glyphicon glyphicon-remove'></span> Cancel
                                    </button></a>
                            </div>
                        </div>
                    <!--</form>-->
                    {{ Form::close() }}


                </div>
            </div>
        </div>
    </section>

    <script>
        $(function () {
           // setTimeout(function(){ },1000)

            $('#catFom').validate
            ({
                rules: {
                    category: {
                        required:true,
                        minlength: 3
                    }
                },
                messages: {
                    category:{
                        required:"Please enter category",
                        minlength: jQuery.validator.format("At least {0} characters for category name  required!")

                    }
                }
            });
        });
    </script>



@stop
