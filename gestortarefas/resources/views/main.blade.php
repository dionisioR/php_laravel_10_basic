@extends('templates/main_layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">

            <div class="row align-items-center">
                <div class="col">
                    <h4>Tarefas</h4>
                </div>

                <div class="col-6 text-center">
                    <form action="{{route('search_submit')}}" method="POST">
                        @csrf
                        <div class="d-flex">
                            <input type="text" name="text_search" id="text_search" class="form-control" placeholder="Pesquisar">
                            <button type="submit" class="btn btn-primary ms-3">
                                <i class="bi bi-search"></i>
                            </button>
                            
                            <span class="mx-3"></span>
                            
                            <label class="me-2 align-self-center">Estado:</label>
                            <select name='filter' id='filter' class="form-select">
                                <option value="{{ Crypt::encrypt('all') }}" @php echo (!empty($filter) && $filter == 'all') ? 'selected': '' @endphp>Todos</option>
                                <option value="{{ Crypt::encrypt('new') }}" @php echo (!empty($filter) && $filter == 'new') ? 'selected': '' @endphp>Nova</option>
                                <option value="{{ Crypt::encrypt('in_progress') }} @php echo (!empty($filter) && $filter == 'in_progress') ? 'selected': '' @endphp">Em progresso</option>
                                <option value="{{ Crypt::encrypt('cancelled') }}" @php echo (!empty($filter) && $filter == 'cancelled') ? 'selected': '' @endphp>Cancelada</option>
                                <option value="{{ Crypt::encrypt('completed') }}" @php echo (!empty($filter) && $filter == 'completed') ? 'selected': '' @endphp>Concluída</option>
                            </select>
                        </div>

                    </form>
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
                    <thead class="table-primary">
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
                    {data:'task_status', className:'text-center align-middle'},
                    {data:'task_actions', className:'text-center align-middle'},

                ],
            })
        }
    )

    let filter = document.querySelector('#filter')
    filter.addEventListener('change', ()=>{
        let value = filter.value
        window.location.href = "{{ url('/filter') }}/" + value
    })
</script>
@endsection