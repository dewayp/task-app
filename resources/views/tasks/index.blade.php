<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Task</h1>
    <div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
    </div>
    <div>
        <div>
            <a href="{{route('tasks.create')}}">Add</a>
        </div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Deadline</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @forelse($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->deadline }}</td>
                <td>
                    <a href="{{route('tasks.edit', ['task' => $task])}}">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{route('tasks.delete', ['task' => $task])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete">
                    </form>
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="4">No tasks found.</td>
            </tr>
            @endforelse
        </table>
    </div>
</body>

</html>