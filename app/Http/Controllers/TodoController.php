<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Taskモデル
use App\Models\Task;
// DBクラス
use Illuminate\Support\Facades\DB;
// TodoRequest
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    // index.blade/phpを表示
    public function index(Request $request)
    {
        // 全てのレコードを取得
        // $items = Task::all();
        $items = Task::orderBy('created_at', 'asc')->get();
        return view('index', ['items' => $items]);
    }
    // タスクを新規作成
    public function create(TodoRequest $request)
    {
        // ★モデルを用いてレコード保存
        // バリデーションチェック
        // $this->validate($request, Task::$rules);
        // Taskモデルのインスタンスを生成
        $task = new Task;
        // formの値を取得
        $form = $request->all();
        // tokenを削除
        unset($form['_token_']);
        // 新規レコードを保存
        // $task->fill($form)->save();
        $task->create($form);

        // ★DBクラスを用いてレコード保存
        // $param = [
        //     'content' => $request->content,
        // ];
        // DB::table('Tasks')->insert($param);
        return redirect('/');
    }
    // タスクを更新
    public function update(TodoRequest $request)
    {
        // ★モデルを用いてレコード保存
        // バリデーションチェック
        // $this->validate($request, Task::$rules);
        // 指定IDのインスタンスを取得
        $task = Task::find($request->id);
        // formの値を取得
        $form = $request->all();
        // tokenを削除
        unset($form['_token_']);
        // 変更後のレコードを保存
        $task->fill($form)->save();
        return redirect('/');
    }
    // タスクを削除
    public function delete(Request $request)
    {
        Task::find($request->id)->delete();
        return redirect('/');
    }
}
