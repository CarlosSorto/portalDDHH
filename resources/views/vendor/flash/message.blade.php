@foreach (session('flash_notification', collect())->toArray() as $message)
    {{-- @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class="alert
                    alert-{{ $message['level'] }}
                    {{ $message['important'] ? 'alert-important' : '' }}"
                    role="alert"
        >
            @if ($message['important'])
                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-hidden="true"
                >&times;</button>
            @endif

            {!! $message['message'] !!}
        </div>
    @endif --}}
    <div class="flex items-center justify-center pa4 bg-green white">
    <svg class="w1" data-icon="info" viewBox="0 0 32 32" style="fill:currentcolor">
    <title>info icon</title>
    <path d="M16 0 A16 16 0 0 1 16 32 A16 16 0 0 1 16 0 M19 15 L13 15 L13 26 L19 26 z M16 6 A3 3 0 0 0 16 12 A3 3 0 0 0 16 6"></path>
</svg>
<span class="lh-title ml3">Los datos se enviaron correctamente, esperar aprobación.</span>
</div>
@endforeach

{{ session()->forget('flash_notification') }}
