@extends('layout',[$title = 'Trackers'])

@section('content')
    <div class="overflow-y-scroll md:h-[600px]">
        <div class="grid grid-cols-1 gap-4 mt-8 md:grid-cols-3">

            @foreach ($trackers as $tracker)
                <x-tracker :tracker="$tracker"/>
            @endforeach
    
        </div>

        <x-modal.confirm-delete :type="'tracker'"/>
    </div>
@endsection