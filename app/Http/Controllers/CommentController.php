<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'text' => 'required|string|max:130',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $request->post_id;
        $comment->text = $request->text;
        $comment->save();


        return redirect()->back();
    }
    public function destroy($id){

        $comment= Comment::find($id);
        if (!$comment) {
            return back()->with('error', 'Коментар не знайдено.');
        }

        // Перевірте, чи користувач має право видалити коментар (наприклад, перевірте авторство коментаря).
        if ($comment->user_id !== auth()->user()->id) {
            return back()->with('error', 'У вас немає прав для видалення цього коментаря.');
        }

        // Видаліть коментар.
        $comment->delete();

        return back()->with('success', 'Коментар видалено успішно.');
    }
}
