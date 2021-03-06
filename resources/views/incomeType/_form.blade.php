<form class="form" action="/incomeTypes/{{ isset($type) ? $type->id : '' }}" method="POST">
    {{ csrf_field() }}

    @if(isset($type))
        <input type="hidden" name="_method" value="PUT">
    @endif
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="control-label">Name:</label>
        <input id="name" type="text" class="form-control" name="name" value="{{ isset($type) ? $type->name : old('name') }}">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group clearfix">
        <button class="btn btn-primary pull-right">{{ isset($type) ? 'Update' : 'Create' }}</button>
    </div>
</form>