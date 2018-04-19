@extends ('layouts.admin')

@section('content')

@if (Session::has('notification'))
<div class="alert alert-success" id="notify">
    <button data-dismiss="alert" class="close">×</button>
    {!! Session::get('notification') !!}
</div>
@endif

<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách bình luận</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh sản phẩm</th>
                            <th>Tên người dùng</th>
                            <th>Nội dung</th>
                            <th>Trả lời cho</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                            <th>Ngày duyệt</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments AS $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td >{{$comment->product ? $comment->product->name : 'Uncategorized'}}</td>
                            <td>
                                <img src="{{ $comment->product->thumbnail() ? asset($comment->product->thumbnail()->path): 'http://placehold.it/200x200' }}" style="width: 50px; height: 50px">
                            </td>

                            <td >
                                <a href="{{ route('admin.users.edit', $comment->user->id)}}">
                                {{$comment->user ? $comment->user->name : 'Uncategorized'}}
                                </a>
                            </td>
                            <td>{{$comment->content}}</td>
                            <td>
                                {{ $comment->parentComment ?  $comment->parentComment->content : '' }}
                            </td>
                            <td id="comment-status-{{$comment->id}}" data-id='{{$comment->status}}' >
                                @switch($comment->status)
                                @case(0)
                                {{'Đang chờ duyệt'}}
                                @break
                                @case(1)
                                {{'Đã duyệt'}}
                                @break
                                @default
                                {{'Không duyệt'}}
                                @endswitch
                            </td>
                            <td>{{ $comment->created_at }}</td>
                            <td>{{ $comment->updated_at }}</td>
                            <td>
                                <div style="display: block; width: max-content">
                                    <a class="button-a blue comment-update-modal" data-id="{{$comment->id}}" title="Cập nhật trang thái"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;  
                                    <div class="modal fade" id="update-form-{{$comment->id}}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-postion-20pc modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h5 style="font-weight: bold" class="modal-title">Cập nhật trạng thái cho bình luận</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                        Trang thái hiện tại: <b id="comment-status-mess-{{$comment->id}}"></b>
                                                    </p>
                                                    <form class="form" style="padding-left: 30%">
                                                        <div class="checkbox">
                                                            <label class="comment-inprocess-box">
                                                                <input type="radio" name="status" value="0"> Đang chờ duyệt 
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="comment-accepted-box">
                                                                <input type="radio" name="status" value="1"> Đã duyệt 
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="comment-unaccepted-box">
                                                                <input type="radio" name="status" value="2"> Không duyệt 
                                                            </label>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default close-2" data-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-primary update-comment-submit" data-id="{{$comment->id}}">Lưu thay đổi</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="text-align: center">
                        {{ $comments->render() }}
                    </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    @include ('admin.comments.notification_form')
</div>



@endsection

