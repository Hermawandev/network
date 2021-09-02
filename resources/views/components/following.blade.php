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
                @if ($user->pivot)
                {{ $user->pivot->created_at->diffForHumans() }}
                @endif
                @if (request()->routeIs('users.index'))
                <div class="mt-2">
                    <form action="{{ route('following.store', $user) }}" method="post">
                        @csrf
                        <x-buttonfollow> 
                            @if (Auth::user()->follows()->where('following_user_id', $user->id)->first())
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-x-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z" />
                            </svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                <path fill-rule="evenodd"
                                    d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                            </svg>
                            @endif
                        </x-buttonfollow>
                    </form>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endforeach