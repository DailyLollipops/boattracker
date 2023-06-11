@extends('layout',[$title = 'Personnels'])

@section('content')
<div class="overflow-y-scroll md:h-[600px]">
    <div class="grid grid-cols-1 gap-4 mt-8 md:grid-cols-3">

        @foreach ($personnels as $personnel)
            <x-card.personnel :personnel="$personnel"/>
        @endforeach

    </div>
</div>
@endsection