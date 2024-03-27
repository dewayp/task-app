<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a new task</title>
</head>

<body>
    <h1>Edit task</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('tasks.update', ['task' => $task])}}">
        @csrf
        @method('put')
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="name" value="{{$task->name}}">
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description" placeholder="description" value="{{$task->description}}">
        </div>
        <div>
            <label>Deadline</label>
            <input type="date" name="deadline" placeholder="Deadline" value="{{$task->deadline}}">
        </div>
        <div>
            <input type="submit" value="Update Task">
        </div>
    </form>
</body>

</html>