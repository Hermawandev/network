@foreach ($statuses as $status )
<div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-8 mb-4">

    <div class="flex">
        <div class="flex-shrink-0 mr-3">
            <img class="w-10 h-10 rounded-full" src="{{ $status->user->gravatar() }} alt=" {{ $status->user->name }}">
        </div>
        <div>
            <div class="font-bold text-m text-gray-700">
                {{ $status->user->name }}
            </div>
            <div class="leading-relaxed text-base text-gray-800">
                {{ $status->body }}
            </div>
            <div class="text-sm text-gray-400">
                {{ $status->created_at->diffForHumans() }}
            </div>
        </div>
    </div>
</div>
@endforeach