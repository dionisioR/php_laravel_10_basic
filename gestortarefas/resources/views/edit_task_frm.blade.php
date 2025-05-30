@extends('templates/main_layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h4>Editar Tarefa</h4>
            <hr>
            <form action="{{ route('edit_task_submit')}}" method="post">
                @csrf
                {{-- task id --}}
                <input type="hidden" name="task_id" value="{{ Crypt::encrypt($task->id) }}">


                {{-- task name --}}
                <div class="mb-3">
                    <label class="form-label" for="text_task_name">Nome da Tarefa</label>
                    <input class="form-control" type="text" id="text_task_name" name="text_task_name" placeholder="Nome da Tarefa" required value="{{old('text_task_name', $task->task_name)}}">
                    @error('text_task_name')
                        <div class="text-warning">{{ $errors->get('text_task_name')[0] }}</div>
                    @enderror
                </div>

                {{-- task description --}}
                <div class="mb-3">
                    <label for="text_task_description" class="form-label">Descrição da tarefa</label>
                    <textarea name="text_task_description" id="text_task_description" class="form-control" rows="5" required>{{ old('text_task_description', $task->task_description) }}</textarea>
                    @error('text_task_description')
                        <div class="text-warning">{{ $errors->get('text_task_description')[0] }}</div>
                    @enderror
                </div>

                {{-- task status --}}
                <div class="mb-3">

                    <label class="form-label" for="text_task_status">Status da Tarefa</label>
                    <select class="form-select w-25" id="text_task_status" name="text_task_status" required>
                        <option value="new" {{old('text_task_status', $task->task_status) == 'new' ? 'selected':''}}>Nova</option>
                        <option value="in_progress"  {{old('text_task_status', $task->task_status) == 'in_progress' ? 'selected':''}}>Em Progresso</option>
                        <option value="cancelled"  {{old('text_task_status', $task->task_status) == 'cancelled' ? 'selected':''}}>Cancelada</option>
                        <option value="completed"  {{old('text_task_status', $task->task_status) == 'completed' ? 'selected':''}}>Concluída</option>
                    </select>
                    @error('text_task_status')
                        <div class="text-warning">{{ $errors->get('text_task_status')[0] }}</div>
                    @enderror
                  
                </div>

                {{-- cancel or submit --}}
                <div class="mb-3 text-center">
                    <a href="{{ route('index') }}" class="btn btn-dark px-5 m-2">
                        <i class="bi bi-x-circle me-2"></i>
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-success px-5 m-2">
                        <i class="bi bi-floppy me-2"></i>
                        Salvar
                    </button>
                </div>
            </form>

            @if(session()->has('task_error'))
                <div class="alert alert-danger p-2 text-center">
                    <small class="m-0">{{ session()->get('task_error') }}</small>
                </div>
            @endif
    
        </div>
    </div>
</div>
@endsection