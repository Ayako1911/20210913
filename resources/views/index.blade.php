<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>COACHTECH</title>
  <link href="css/reset.css" rel="stylesheet">
  <link  href="css/style.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <div class="card">
      <p class="title mb-15">Todo List</p>
        <div class="todo">

        @if (count($errors)>0)
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
        @endif

<!--追加フォームと追加ボタン-->
        <form action="/todo/create" method="post" class="flex between mb-30">
          @csrf
          <input type="text" class="input-add" name="content" />
          <input class="button-add" type="submit" value="追加" />
        </form>
        <table>
          <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>更新</th>
            <th>削除</th>
          </tr>
          @foreach ($items as $item)
          <tr>
            <!-- 作成日 -->
            <td>
              {{$item->created_at}}
            </td>
            <!--タスク名-->
              <form action="/todo/update" method="post">
               @csrf
               <td>
                <input type="text" class= "input-update" value="{{$item->content}}" name="content"/>
                  <input type="hidden" value="{{$item->id}}" name="id" />
                </td>
                <!--更新ボタン-->
                <td>
                  <button class="button-update">更新</button>
                </td>
              </form>
            <!--削除-->
              <td>
              <form action="/todo/delete" method="post">
                <input type="hidden" name="id" value="{{$item->id}}">
                @csrf
                <button class="button-delete">削除</button>
              </form>
            </td>
          </tr>
        @endforeach
      </table>
      </div>
    </div>
  </div>
  </div>
</body>
</html>
