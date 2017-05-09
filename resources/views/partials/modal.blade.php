@php
    $openModalButtonClass = isset($modal['openButtonClass']) ? $modal['openButtonClass'] : 'btn-primary';
    $modalId = isset($modal['id']) ? $modal['id'] : 'modal-deffault';
    $modalBody = isset($modal['body']) ? $modal['body'] : '';
    $modalFooter = isset($modal['footer']) ? $modal['footer'] : null;
    $confirmButtonId = isset($modal['confirmBtnId']) ? $modal['confirmBtnId'] : 'confirm-' . $modalId . '-btn';
    $confirmButtonClass = isset($modal['confirmButtonClass']) ? $modal['confirmButtonClass'] : 'btn-primary';
    $confirmButtonText = isset($modal['confirmButtonText']) ? $modal['confirmButtonText'] : 'Confirm';
    $modalWithFooter = true;
    if(isset($modal['noFooter']) && $modal['noFooter'] === true) {
        $modalWithFooter = false;
    }
@endphp

<button 
    class="btn {{ $openModalButtonClass }}" 
    data-toggle="modal" 
    data-target="#{{$modalId}}"
>
    {!! $modal['openButtonText'] !!}
</button>

<div 
    class="modal fade" 
    id="{{ $modalId }}" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="{{ $modalId . 'Label'}}"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="{{ $modalId }}Label">
                    {{ isset($modal['header']) ? $modal['header'] : '' }}
                </h4>
            </div>
            <div class="modal-body">
                @if(View::exists($modalBody))
                    @include($modalBody) 
                @else
                    {!! $modalBody !!}
                @endif
            </div>
            @if($modalWithFooter)
                <div class="modal-footer">
                    @if(!is_null($modalFooter))
                        @includeIf($modalFooter)
                    @else
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button id="{{ $confirmButtonId }}" type="button" class="modal-confirm-btn btn {{ $confirmButtonClass }}">
                            {{ $confirmButtonText }}
                        </button>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>