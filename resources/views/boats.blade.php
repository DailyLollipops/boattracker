@extends('layout',[$title = 'Boats'])

@section('content')
    <div class="overflow-y-scroll md:h-[600px]">
        <div class="grid grid-cols-1 gap-3 mt-8 md:grid-cols-2">
    
            @foreach($boats as $boat)
                <x-card.boat :boat="$boat"/>
            @endforeach

        </div>

        <x-modal.confirm-delete :type="'boat'"/>
        <x-modal.update-boat :owners="$owners"/>
    </div>
    
    <script src="{{ asset('/js/boat.js') }}"></script>
@endsection