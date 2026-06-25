@extends('admin.layouts.app')

@section('title','Task management')

@section('style')
</style>
@endsection

@section('header','Task management')

@section('content')
<div class="mb-3">
    <div class="row mb-3">
        <div class="col-12">

            <button class="btn btn-primary" id="create-action">
            <i class="fa-solid fa-plus me-1"></i>
            Create
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" id="task">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea type="text" class="form-control" id="description"></textarea>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" id="saveTask">
                    <i class="fa-solid fa-plus me-1" id="action-icon"></i>
                    <span id="action-label">Save</span>    
                </button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row tasks">
        @foreach($tasks as $task)
            <div class="col-md-6 mb-3">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $task['task'] }}</h6>
                        <p class="card-text">{{ $task['description'] }}</p>
                        <button class="btn btn-success edit-task" data-id="{{ $task['id'] }}">
                        <i class="fa-regular fa-pen-to-square me-1"></i>
                            Edit
                        </button>
                        <button class="btn btn-danger delete-task" data-id="{{ $task['id'] }}">
                            <i class="fa-regular fa-trash-can me-1"></i>
                            Delete
                        </button>
                    </div>
                </div>
            </div> 
        @endforeach
    </div>
</div>
@endsection

@section('script')
<script>
    $('document').ready(()=>{
        let actionState = "create"
        $('#task').focus();

        $('#create-action').click(()=>{
            $('#task').val('')
            $('#description').val('')
            $('#task').focus()
            $('#saveTask').attr('class','btn btn-primary')
            $('#action-icon').attr('data-icon','plus');
            $('#action-label').html('Save')
            actionState = "create"
        })

        $('#saveTask').click(()=>{
            const task = $('#task').val();
            const description = $('#description').val();            
            
            if(task == ''){
                alert('Please enter task title')
                $('#task').focus();
            }else if( description == ''){
                alert('Please enter task description')
                $('#description').focus();
            }

            if(actionState == "create"){
                $.ajax({
                // key colon value coma
                // type : "POST" ,
                type: "POST",
                url: "/admin/session/tasks",
                data: {
                    task : task,
                    description : description ,
                    _token : '{{ csrf_token() }}'
                },
                success:(response)=>{
                    const tasks = response.data 
                    loadTasks(tasks);

                    //clear fileds
                    $('#task').val('')
                    $('#description').val('')
                    $('#task').focus()
                },
            });
        }
        else{
            alert('edit')
        }  


        })

        $(document).on('click','.edit-task',(event)=>{
            const button = $(event.currentTarget)
            const taskId = button.data('id');
            // console.log(taskId);
            const taskVal = button.parent().children().eq(0).html();
            const descriptionVal = button.parent().children().eq(1).html();
            $('#task').val(taskVal)
            $('#description').val(descriptionVal)
            $('#saveTask').attr('class','btn btn-success')
            $('#action-icon').attr('data-icon','pen-to-square');
            $('#action-label').html('Edit')
            actionState = "edit"
        })

        $(document).on('click','.delete-task',(event)=>{
            // console.log(event.currentTarget);
            //This converts the clicked element into a jQuery object
            const button = $(event.currentTarget)
            
            const taskId = button.data('id');
            console.log(taskId);
            
            deleteTask(taskId).then((response) => {
                // const tasks = response
                loadTasks(response)
            });
        })

        const deleteTask = async(taskId) => {
            const response = await fetch('/admin/session/tasks/' + taskId ,{
                'method' : 'delete',
                headers : {
                    'Content-Type' : 'application/json',
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                }
            })
            return response.json();
        }

        const loadTasks = (tasks) =>{
            $('.tasks').empty()
                    //update tasks
                    tasks.forEach(task => {
                        const _task = `
                             <div class="col-md-6 mb-3">
                                <div class="card" style="width: 100%;">
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-2 text-body-secondary">${task.task}</h6>
                                        <p class="card-text">${task.description}</p>
                                        <button class="btn btn-success edit-task" data-id="${task.id}">
                                         <i class="fa-regular fa-pen-to-square me-1"></i>
                                         Edit
                                        </button>
                                        <button class="btn btn-danger delete-task" data-id="${task.id}">
                                            <i class="fa-regular fa-trash-can"></i>
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>    
                    `
                        $('.tasks').append(_task)
             });
        }
    })
    
</script>
@endsection