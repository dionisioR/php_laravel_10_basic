@extends('templates/main_layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">

            <div class="row align-items-center">
                <div class="col">
                    <h4>Tarefas</h4>
                </div>
                <div class="col text-end">
                    <a href="{{route('new_task')}}" class="btn text-success">
                        <i class="bi bi-plus-square me-2"></i>Nova tarefa
                    </a>
                </div>
            </div>


            @if(count($tasks) != 0)
            <hr>

                <table class="table table-striped table-bordered w-100 my-2" id="table_tasks">
                    <thead class="table-dark">
                        <tr>
                            <th class="w-75">Tarefas</th>
                            <th class="text-center">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                </table>

            @else

                <p class="text-center opacity-50 my-5">Não existem tarefas registradas</p>

            @endif
        </div>
    </div>
</div>

<script>
    $(document).ready(
        function(){
            $('#table_tasks').DataTable({
                data:@json($tasks),
                columns:[
                    {data:'task_name'},
                    {data:'task_status', className:'text-center'},
                    {data:'task_actions', className:'text-center'},

                ],
            })
        }
    )
</script>
@endsection