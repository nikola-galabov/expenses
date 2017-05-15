<form action="/incomes/{{ isset($income) ? $income->id : '' }}" method="POST">
    {{ csrf_field() }}

    @if(isset($income))
        <input type="hidden" name="_method" value="PUT">
    @endif

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="control-label">Name:</label>
        <input 
            id="name" 
            type="text" 
            class="form-control" 
            name="name" 
            value="{{ isset($income) ? $income->name : old('name') }}"
        >
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
        <label for="amount" class="control-label">Amount:</label>
        <input 
            id="amount" 
            type="number" 
            step="0.01" 
            class="form-control" 
            name="amount" 
            value="{{ isset($income) ? $income->amount : old('amount') }}"
        >
        @if ($errors->has('amount'))
            <span class="help-block">
                <strong>{{ $errors->first('amount') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
        <label for="type_id" class="control-label"></label>
        <select name="type_id" id="type_id" class="select2">
            @foreach($incomeTypes as $type)
                <option 
                    value="{{ $type->id }}"
                    {{ isset($income) && $income->type->id == $type->id ? 'selected' : ''}}
                >
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('type'))
            <span class="help-block">
                <strong>{{ $errors->first('type') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group clearfix">
        <button class="btn btn-primary pull-right">{{ isset($income) ? 'Update' : 'Create' }}</button>
    </div>
</form>