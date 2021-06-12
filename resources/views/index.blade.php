<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo</title>
  <!-- スタイルシート読み込み -->
  <link rel="stylesheet" href="{{asset('/assets/css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
</head>

<body>
  <main>
    <!-- エラーメッセージ -->
    @if(count($errors)>0)
    <ul class="error__message">
      <li>※入力に不備があります</li>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
    @endif
    <h1>Todo List</h1>
    <!-- 新規作成入力フォーム -->
    <form action="/todo/create" method="post" class="form__create">
      <!-- CSRF保護 -->
      @csrf
      <input type="text" name="content" id="content">
      <input type="submit" value="追加" class="submit__create">
    </form>
    <!-- 保存されたタスクをテーブルで表示 -->
    <table class="task__table">
      <!-- 1段目 -->
      <tr>
        <th>作成日</th>
        <th>タスク名</th>
        <th>更新</th>
        <th>削除</th>
      </tr>
      <!-- 2段目（渡されたレコードをforeachで1段ずつ表示） -->
      @if($items != null)
      @foreach($items as $item)
      <tr>
        <!-- 作成日 -->
        <td>{{$item->created_at}}</td>
        <!-- タスク名 -->
        <form action="/todo/update" method="post" class="form__content">
          @csrf
          <input type="hidden" name="id" value="{{$item->id}}">
          <td>
            <input type="text" name="content" class="input__content" value="{{$item->content}}">
          </td>
          <!-- 更新ボタン -->
          <td>
            <input type="submit" value="更新" class="submit__update">
          </td>
        </form>
        <!-- 削除ボタン -->
        <td>
          <form action="/todo/delete" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$item->id}}">
            <input type="submit" value="削除" class="submit__delete">
          </form>
        </td>
      </tr>
      @endforeach
      @endif
    </table>
  </main>
  <script>
    console.log('^q^');
  </script>
</body>

</html>