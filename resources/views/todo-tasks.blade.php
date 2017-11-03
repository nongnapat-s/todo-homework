
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>Todo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        html, body {
            font-family: 'Lato', Arial;
        }
        body {
            padding-top: 30px;
        }
        li.active {
            color: #666663!important;
            border-color: #E8E8E8!important;
            background-color: #fffff6!important;
            text-align: center;
            font-weight: bold;
            font-style: italic;
        }
    </style>
    <title>TODO - List</title>
</head>
    <body>
        <div class="container">
            <div class="col-sm-12">
                <form action="/{{ $project }}/store" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="project" value="{{ $project }}">
                    <div class="alert alert-info" role="alert">
                        <div class="text-center">
                            <input type="text" name="task" class="form-control input-lg" placeholder="type your Task then press ENTER">
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-sm-6">
                <ul class="list-group">
                    <li class="list-group-item active">Todo Tasks</li>
                        @foreach ($tasks as $task)
                            @if($task->status ==0)
                                <a href="/{{ $project }}/update?_token={{ csrf_token() }}&id={{ $task->id }}" type="button" class="list-group-item list-group-item-warning">
                                <span class="badge">{{ $task->created_at->diffForHumans() }}</span>
                                {{ $task->note }}
                                </a>
                            @endif
                        @endforeach 
                </ul>
            </div>

            <div class="col-sm-6">
                <ul class="list-group">
                    <li class="list-group-item active">Completed Tasks</li>
                        @foreach($tasks as $task)
                            @if($task->status == 1)
                                <li class="list-group-item list-group-item-success">
                                <span class="badge">{{ $task->created_at->diffForHumans($task->updated_at) }}</span>
                                <s>{{ $task->note }}</s>
                                </li>
                            @endif
                        @endforeach
                </ul>
            </div>
        </div>
	</script>
</body>
</html>