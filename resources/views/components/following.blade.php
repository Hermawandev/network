@foreach ($users as $user )
<div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-8 mb-4">
    <div class="flex items-center mb-5">
        <div class="flex-shrink-0 mr-3">
            <img class="w-10 h-10 rounded-full" src={{ $user->gravatar() }} alt="{{ $user->name }}">
        </div>
        <div>
            <div class="font-semibold text-gray-700">
                {{ $user->name }}
            </div>
            <div class="text-sm text-gray-600">
                {{ $user->pivot->created_at->diffForHumans() }}
            </div>
        </div>
    </div>
</div>
@endforeach