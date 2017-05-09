<form class="form" action="/expenses{{ isset($expense) ? '/' . $expense->id : '' }}" method="POST">
    {{ csrf_field() }}

    @if(isset($expense))
        <input type="hidden" name="_method" value="PUT">
    @endif
    <div class="form-group{{ $errors->has('product') ? ' has-error' : '' }}">
        <label for="product" class="control-label">Product</label>
        <input 
            id="product" 
            type="text" 
            class="form-control" 
            name="product" 
            value="{{ isset($expense) ? $expense->product : old('product') }}">

        @if ($errors->has('product'))
            <span class="help-block">
                <strong>{{ $errors->first('product') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
        <label for="price" class="control-label">Price</label>
        <input 
            id="price" 
            type="number"
            step="0.01"
            class="form-control" 
            name="price" 
            value="{{ isset($expense) ? $expense->price : old('price') }}"
        >

        @if ($errors->has('price'))
            <span class="help-block">
                <strong>{{ $errors->first('price') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('type_id') ? ' has-error' : '' }}">
        <label for="type_id" class="control-label">Type:</label>
        <select class="select2" name="type_id" id="type_id">
            @foreach($types as $type)
                @php
                    $selected = false;
                    if(isset($expense) && $expense->type->id === $type->id) {
                        $selected = true;
                    }
                @endphp

                <option value="{{$type->id}}" {{ $selected ? 'selected' : '' }}>{{$type->name}}</option>
            @endforeach
        </select>
        
        @if ($errors->has('type_id'))
            <span class="help-block">
                <strong>{{ $errors->first('type_id') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <button class="btn btn-primary">
            {{ isset($expense) ? 'Update' : 'Create' }}
        </button>
    </div>
</form>