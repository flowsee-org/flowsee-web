{{--
    Reusable dense binary band — decorative divider between sections.
    Usage: @include('partials.binary')
    Optional: @include('partials.binary', ['extraClass' => 'h-20'])
--}}

<div class="binary-field pointer-events-none my-2 h-28 w-full select-none {{ $extraClass ?? '' }}" aria-hidden="true">
    <canvas></canvas>
</div>