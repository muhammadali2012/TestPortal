@extends('admin.layout')
@section('content')
    <li><a href="category/create"><i class="fa fa-circle-o"></i> ADD NEW CATEGORY </a></li>
    <div class="box">
        {{ csrf_field() }}
        <div class="box-header">
            <h3 class="box-title">All Categories</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" id="table_id">
                <thead>
                <tr>
                    <th >Category</th>
                    <th >Is Active </th>
                    <th >CREATED_AT</th>
                    <th >UPDATED_AT</th>
                    <th >ACTIONS</th>

                </tr>
                </thead>
                <tbody>
                @foreach($category as $item)
                    <tr class="item{{$item->id}}" >
                        <td id="{{$item->id}}" >{{$item->category}}</td>

                        <td>
                            @if ($item->is_active == 0)
                                Not Active
                            @else
                                Active
                            @endif
                        </td>
                        <td>{{ Carbon\Carbon::parse($item->created_at)->format('F d, Y  : H:i') }}</td>
                        <td>{{ Carbon\Carbon::parse($item->updated_at)->format('F d, Y  : H:i') }}</td>
                        <td>
                            <a  href="{{ URL::to('category/' . $item->id . '/edit') }}">   <button class="edit-modal btn btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</button></a>
                            <button class="delete-modal btn btn-danger" data-info="{{$item->id}},{{$item->category}},{{$item->is_active}}"><span class="glyphicon glyphicon-trash"></span> Delete</button></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!--Models-->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4   class="modal-title text-xs-left" ></h4>
                </div>
                <div class="modal-body">
                    <div class="deleteContent">
                        Are you Sure you want to delete <span class="dname"></span> ? <span
                                class="hidden did"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn actionBtn" data-dismiss="modal">
                            <span id="footer_action_button" class='glyphicon'> </span>
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- ./wrapper -->
    <script>

        $(function(){
            $('#table_id').DataTable();
        });


        $(document).on('click', '.delete-modal', function() {
            $('#footer_action_button').text(" Delete");
            $('#footer_action_button').removeClass('glyphicon-check');
            $('#footer_action_button').addClass('glyphicon-trash');
            $('.actionBtn').removeClass('btn-success');
            $('.actionBtn').addClass('btn-danger');
            $('.actionBtn').removeClass('edit');
            $('.actionBtn').addClass('delete');
            $('.modal-title').text('Delete');
            $('.deleteContent').show();
            $('.form-horizontal').hide();
            var stuff = $(this).data('info').split(',');
            $('.did').text(stuff[0]);
            $('.dname').html(stuff[1] +" category");
            $('#myModal').modal('show');
        });

        $('.modal-footer').on('click', '.delete', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'DELETE',
                url: '/category/'+$('.did').text(),
                success: function(response)
                {
                    location.reload();


                }
            });
        });
    </script>

@stop
