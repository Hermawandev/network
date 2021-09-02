<div class="relative py-3 sm:max-w-xl sm:mx-auto">
    <div
        class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
    </div>
    <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-8">
        <div class="max-w-md mx-auto">
            <div class="flex justify-between">
                <div id="dp"><img class="w-full h-full rounded-full border-4 border-blue-500 p-1"
                        src="{{ $user->gravatar() }}" alt=" {{ $user->name }}"></div>
                <div class="self-center">
                    <div id="un" class="font-semibold text-gray-700 text-2xl">
                        {{ $user->name }}

                    </div>
                    <div id="un" class="font-semibold text-gray-400 text-sm flex">
                        <div>@</div>{{$user->username }}
                    </div>
                    <div id="un" class="font-semibold text-gray-500 text-xs mt-3">
                        <a href="{{ route('profile', $user->username) }}">Post {{ $user->statuses->count() }}</a>
                        &nbsp&nbsp&nbsp <a href="{{ route('following.index', [$user->username, 'following']) }}">Following
                            {{ $user->follows->count() }}</a> &nbsp&nbsp&nbsp <a
                            href="{{ route('following.index',[$user->username, 'follower']) }}">Followers
                            {{ $user->followers->count() }}</a>
                    </div>
                    <div class="font-semibold text-gray-500 text-xs mt-1">joined since
                        {{ $user->created_at->diffForHumans() }}</div>
                </div>
                <div class="self-start">
                    @if (Auth::User()->isNot($user))
                    <form action="{{ route('following.store', $user) }}" method="post">
                        @csrf
                        <x-buttonfollow>
                            @if (Auth::user()->follows()->where('following_user_id', $user->id)->first())
                                Unfollow
                            @else
                                Follow   
                            @endif

                        </x-buttonfollow>
                    </form>
                    @else
                        <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-2 py-2 bg-blue-500 border border-transparent rounded-lg font-semibold text-xs text-white tracking-widest hover:bg-blue-550 active:bg-blue-550 focus:outline-none focus:border-blue-500 focus:ring ring-blue-500 disabled:opacity-25 transition ease-in-out duration-150">
                            Edit Profile
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>