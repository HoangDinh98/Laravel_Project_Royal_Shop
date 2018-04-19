<?php

namespace App\Http\Controllers\Admin;
date_default_timezone_set("Asia/Ho_Chi_Minh");
use App\Http\Controllers\Controller;
use App\Comment;
use App\User;
use App\Product;
use Illuminate\Http\Request;

class AdminCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $comments = Comment::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updateAjax(Request $request) {
        $message_option = [
            0 => 'Đang chờ duyệt ',
            1 => 'Đã duyệt',
            2 => 'Không duyệt',        
        ];

        if ($request->ajax()) {
            $comment = Comment::findOrFail($request->id);

            $old_status = $comment->status;

            if ($comment->status != $request->status) {
                $comment->status = $request->status;
                $comment->save();
                $message = '<br><b> ' . $message_option[$old_status] . ' -> <span class="blue">' . $message_option[$comment->status] . '</span></b>';

                return response()->json([
                            'is_changed' => 1,
                            'status' => $comment->status,
                            'status_text' => $message_option[$comment->status],
                            'message' => $message
                ]);
            }

            return response()->json(['is_changed' => 0, 'status' => $comment->status, 'message' => '']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
