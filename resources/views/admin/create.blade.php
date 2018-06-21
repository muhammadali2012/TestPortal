@extends('admin.layout')


@section('content')

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-auto">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add new Category </h3>
                    </div>
                    <form role="form" id="categoryForm" method="post" action="{{url('/category')}}">
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                                <label  for="category">Category</label>
                                <input type="text" class="form-control" id="category"  name="category"/>
                            </div>
                            <p class="category_error error text-center alert alert-danger hidden"></p>

                            <div class="checkbox">
                                <label  for="is_active">
                                    <input type="checkbox"   id="is_active" name="is_Active" checked>IS Active
                                </label>
                            </div>
                            <div class="modal-footer box-footer ">
                                <button type="submit" class="btn  btn-success" data-dismiss="modal" id="AddButton">
                                    <span  class='glyphicon glyphicon-plus'>ADD</span>
                                </button>
                                <a href="/category"><button type="button" class="btn btn-warning" data-dismiss="modal">
                                    <span class='glyphicon glyphicon-remove'></span> Cancel
                                </button></a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

        <script>
           $('#categoryForm').validate
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

        </script>



@stop
