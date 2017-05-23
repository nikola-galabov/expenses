<form action="/budgets/{{ isset($budget) ? $budget->id : '' }}" method="POST">
    {{ csrf_field() }}

    @if(isset($budget))
        <input type="hidden" name="_method" value="PUT">
    @endif

    <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
        <label for="start_date" class="control-label">From:</label>
        <input 
            id="start_date" 
            type="date" 
            class="form-control" 
            name="start_date" 
            value="{{ isset($budget) ? $budget->start_date->format('Y-m-d') : old('start_date') }}"
        >

        @if ($errors->has('start_date'))
            <span class="help-block">
                <strong>{{ $errors->first('start_date') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
        <label for="end_date" class="control-label">To:</label>
        <input 
            id="end_date" 
            type="date" 
            class="form-control" 
            name="end_date" 
            value="{{ isset($budget) ? $budget->end_date->format('Y-m-d') : old('end_date') }}"            
        >

        @if ($errors->has('end_date'))
            <span class="help-block">
                <strong>{{ $errors->first('end_date') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group clearfix">
        <button class="btn btn-primary pull-right">{{ isset($budget) ? 'Update' : 'Create' }}</button>
    </div>
</form>