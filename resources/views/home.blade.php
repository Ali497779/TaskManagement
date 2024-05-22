@extends('layouts.layouts') <!-- Extend the layout file -->

@section('title', 'Task Management') <!-- Define the title -->

@section('content') <!-- Fill in the content section -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <table class="table table-responsive table-bordered">
        <thead>
            <div class="row m-3">
                <div class="col">
                    <h2>Task List</h2>
                </div>
                <div class="col  text-end">
                    <button class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#exampleModal">Create</i></button>
                </div>   
            </div>
        </thead>
        <thead>
            <tr>
                <th>Sno.</th>
                <th>
                    <div class="d-flex align-items-center">
                        <span>Title</span>
                        <button id="sort-button" class="btn btn-link" style="padding: 0 4px;"><i class="bi bi-sort-alpha-down"></i></button>
                    </div>
                </th>
                <th>Description</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="task-table">
            @foreach($tasks as $task)
            <tr id="task-{{$task->id}}">
                <td>{{$loop->iteration}}</td>
                <td>{{$task->title}}</td>
                <td>{{$task->description}}</td>
                <td>{{$task->deadline}}</td>
                <td id="status-{{$task->id}}">
                    <span id="status-text-{{$task->id}}">{{$task->status}}</span>
                    <select id="status-select-{{$task->id}}" style="display: none;">
                        <option value="" selected disabled>Select Status Option</option>
                        <option value="Completed">Completed</option>
                        <option value="Incompleted">Incomplete</option>
                        <option value="Delayed">Delayed</option>
                    </select>
                </td>
                <td>
                    <button class="btn btn-success"  onclick="markTask({{$task->id}})" >Mark</button>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalEdit" onclick="editTask({{$task->id}})">Edit</button>
                    <button class="btn btn-danger" onclick="deleteTask({{$task->id}})">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- End Page content -->
    <!-- ============================================================== -->

    {{-- Create Model --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Task</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form  id="CreateTask">
               
                <div class="row mt-2">
                    <div class="col">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" required placeholder="Enter Title" name="title" class="form-control">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="description" class="form-label">Description</label>
                        <textarea type="text" required placeholder="Enter Description" name="description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="Deadline" class="form-label">Deadline</label>
                        <input type="date" required placeholder="Enter Deadline" min="{{ now()->format('Y-m-d') }}" name="deadline" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    {{--End Create Model --}}

    {{-- Edit Model --}}
    <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Task</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="" id="UpdateTask">
                <input type="text" name="id" id="id_update">
                <div class="row mt-2">
                    <div class="col">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" required placeholder="Enter Title" id="title_update" name="title" class="form-control">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="title" class="form-label">Title</label>
                        <textarea type="text" required placeholder="Enter description" id="description_update" name="description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="date" class="form-label">DeadLine</label>
                        <input type="date" required placeholder="Enter Deadline" id="deadline_update" name="deadline" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
            </div>
        </div>
        </div>
    </div>
    {{-- End Edit Model --}}

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
    $(document).ready(function(){
        $('#sort-button').click(function(){
            var tbody = $('#task-table tbody');
            tbody.find('tr').sort(function(a, b) {
                var titleA = $(a).find('td:eq(1)').text().toUpperCase();
                var titleB = $(b).find('td:eq(1)').text().toUpperCase();
                return (titleA < titleB) ? -1 : (titleA > titleB) ? 1 : 0;
            }).appendTo(tbody);
        });
    });
    </script>
    <script>
        // Store Ajax
        $(document).ready(function(){
            $('#CreateTask').submit(function(event){
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: 'task/store', 
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    success: function(response){
                        $('#task-table').append('<tr id="task-' + response.id + '">' +
                        '<td>' + response.id + '</td>' +
                        '<td>' + response.title + '</td>' +
                        '<td>' + response.description + '</td>' +
                        '<td>' + response.deadline + '</td>' +
                        '<td id="status-' + response.id + '">' +
                        '<span id="status-text-' + response.id + '">' + response.status + '</span>' +
                        '<select id="status-select-' + response.id + '" style="display: none;">' +
                        '<option value="" selected disabled>Select Status Option</option>' +
                        '<option value="Completed">Completed</option>' +
                        '<option value="Incompleted">Incomplete</option>' +
                        '<option value="Delayed">Delayed</option>' +
                        '</select>' +
                        '</td>' +
                        '<td>' +
                        '<button class="btn btn-success"  onclick="markTask(' + response.id + ')" >Mark</button>' +
                        '<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalEdit" onclick="editTask(\'' + response.id + '\')">Edit</button>' +
                        '<button class="btn btn-danger">Delete</button>' +
                        '</td>' +
                        '</tr>');
                        },
                    error: function(xhr, status, error){
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    
        // Search JS
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#task-table tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        // Filter Ajax
        $(document).ready(function(){
            $('#filter-form').submit(function(event){
                event.preventDefault(); 
                var formData = $(this).serialize(); 
                console.log(formData);
                $.ajax({
                    url: 'task/filter',
                    method: 'get',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    success: function(response){
                        $('#task-table').empty();
                        $.each(response.data, function(index, task) {
                            var status = task.status !== null ? task.status : ''; 
                            $('#task-table').append('<tr id="task-' + task.id + '">' +
                                '<td>' + (index + 1) + '</td>' +
                                '<td>' + task.title + '</td>' +
                                '<td>' + task.description + '</td>' +
                                '<td>' + task.deadline + '</td>' +
                                '<td id="status-' + task.id + '">' +
                                '<span id="status-text-' + task.id + '">' + status + '</span>' +
                                '<select id="status-select-' + task.id + '" style="display: none;">' +
                                '<option value="" selected disabled>Select Status Option</option>' +
                                '<option value="Completed">Completed</option>' +
                                '<option value="Incompleted">Incomplete</option>' +
                                '<option value="Delayed">Delayed</option>' +
                                '</select>' +
                                '</td>' +
                                '<td>' +
                                '<button class="btn btn-success"  onclick="markTask(' + task.id + ')" >Mark</button>' +
                                '<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalEdit" onclick="editTask(\'' + task.id + '\')">Edit</button>' +
                                '<button class="btn btn-danger">Delete</button>' +
                                '</td>' +
                                '</tr>');
                        });
                    },
                    error: function(xhr, status, error){
                        console.error(xhr.responseText);
                    }
                });
            });
        });

        // Mark Js
        function markTask(id) {
            $('#status-text-' + id).toggle();
            $('#status-select-' + id).toggle().change(function() {
                var selectedStatus = $(this).val();
                updateTask(id, selectedStatus);
            });
        }

        // Mark Ajax
        function updateTask(taskId, status) {
            $.ajax({
                url: 'task/update/' + taskId,
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    status: status
                },
                success: function(response) {
                    $('#status-text-' + taskId).text(status);
                    $('#status-text-' + taskId).show();
                    $('#status-select-' + taskId).hide();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        // Update Model JS
        function editTask(id) {
            var taskRow = $('#task-' + id);
            var sno = taskRow.find('td:eq(0)').text();
            var title = taskRow.find('td:eq(1)').text();
            var description = taskRow.find('td:eq(2)').text();
            var deadline = taskRow.find('td:eq(3)').text();
            $('#id_update').val(id);
            $('#title_update').val(title);
            $('#description_update').val(description);
            $('#deadline_update').val(deadline);
        }

        // Update Ajax
        $(document).ready(function(){
            $('#UpdateTask').submit(function(e){
                e.preventDefault();
                var formData = $(this).serialize();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'task/taskupdate',
                    data: formData,
                    success: function(response) {
                        var taskRow = $('#task-' + response.id);
                        taskRow.find('td:eq(1)').text(response.title); 
                        taskRow.find('td:eq(2)').text(response.description); 
                        taskRow.find('td:eq(3)').text(response.deadline); 
                        $('#exampleModalEdit').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });

        // Delete Ajax
        function deleteTask(id) {
        $.ajax({
            type: 'GET',
            url: 'task/delete/' + id,
            success: function(response) {
                // If the request is successful, remove the corresponding <tr> element
                $('#task-' + id).remove();
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    }

        
        </script>

@endsection
