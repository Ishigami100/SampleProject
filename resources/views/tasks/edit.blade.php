<!DOCTYPE html>
<html lang='ja'>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo</title>
</head>

<body>
    <header>
            <div>
                <p>ToDoアプリ-編集画面</p>
            </div>
    </header>

    <main>
        <form action="/tasks/{{ $task->id }}" method="post">
        @csrf
        @method('PUT')
            <div>
                <label>
                    <input
                    type="text" name="task_name" value="{{ $task->name }}"
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
                    type="date" name="task_due_date" value="{{ $task->due_date }}"
                    />
                </label>
                <div>
                    <a href="/tasks">
                    戻る
                    </a>
                    <button type="submit">
                        編集    
                    </button>
                </div>
            </div>
        </form>
    </main>

    <footer>
        <p>ToDoアプリ</p>
    </footer>
</body>

</html>