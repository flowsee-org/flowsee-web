<x-app-layout>
    @include('partials.hero')
    @include('partials.binary')
    @include('partials.about')

    {{-- Empty binary terminal divider — leads into OUR TEAM --}}
    @include('partials.binary')
    @include('partials.team')

    @include('partials.contact')
</x-app-layout>