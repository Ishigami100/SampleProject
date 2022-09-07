<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>
</head>

<body>
    <header>
        ToDoアプリ
    </header>
    
    <main>
        <p>Start your task!</p>
        <form action="/tasks" method="post">
        @csrf
        
            <div>
                <label>
                    <input
                        placeholder="洗濯物をする..."
                        type="text"
                        name="task_name"
                    />
                        @error('task_name')
                        <div>
                            <p>
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                </label>
                <label>
                    <input
                        type="date"
                        name="task_due_date"
                    />
                </label>
            
                <button type="submit">
                    追加する
                </button>
            </div>
        </form>

        @if ($tasks->isNotEmpty())
            <div>
                <table border="1">
                    <thead>
                        <tr>
                            <th colspan="2">
                                <span>タスク</span>
                            </th>
                            <th colspan="3">
                                <span>Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $item)
                            <tr>
                                <div>
                                    <td>
                                        {{-- タスク名 --}}
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        {{-- 締め切り --}}
                                        Due date -{{ $item->due_date }}
                                    </td>
                                </div>
                                <div>
                                    <td>
                                        {{-- 完了ボタン --}}
                                        <form action="/tasks/{{ $item->id }}"
                                            method="post"
                                            role="menuitem" tabindex="-1">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="{{$item->status}}">
                                            <button type="submit">完了</button>
                                        </form>
                                    </td>
                                    <td>
                                        {{-- 編集ボタン --}}
                                        <a href="/tasks/{{ $item->id }}/edit/">編集</a>
                                    </td>
                                    <td>
                                        {{-- 削除ボタン --}}
                                        <form onsubmit="return deleteTask();"
                                            action="/tasks/{{ $item->id }}"
                                            method="post"
                                            role="menuitem" tabindex="-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">削除</button>
                                        </form>
                                    </td>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </main>

    <footer>
        <div>
            <p>ToDoアプリ</p>
            <a href="{{ url('/home') }}">ホームに戻る</a>
        </div>
    </footer>

<script>
    function deleteTask(){
        if (confirm('本当に削除しますか?')){
            return true;
        }else{
            return false;
        }
    }
</script>
</body>
</html>