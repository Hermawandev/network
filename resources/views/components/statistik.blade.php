<div class="relative py-3 sm:max-w-xl sm:mx-auto">
    <div
        class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
    </div>
    <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-8">
        <div class="max-w-md mx-auto">
            <div class="flex  items-center">
                <div id="dp" class="mr-5"><img
                        class="w-full h-full rounded-full border-4 border-blue-500 p-1" src="{{ $user->gravatar() }}
                        alt=" {{ $user->name }}"></div>
                <div class="">
                    <div id="un" class="font-semibold text-gray-700 text-2xl">
                        {{ $user->name }}
                    </div>
                    <div id="un" class="font-semibold text-gray-400 text-sm">
                        @ {{$user->username }}
                    </div>
                    <div id="un" class="font-semibold text-gray-500 text-xs mt-3">
                        <a href="{{ route('profile', $user->username) }}">Post {{ $user->statuses->count() }}</a>
                        &nbsp&nbsp&nbsp <a href="{{ route('following', [$user->username, 'following']) }}">Following
                            {{ $user->follows->count() }}</a> &nbsp&nbsp&nbsp <a
                            href="{{ route('following',[$user->username, 'follower']) }}">Followers
                            {{ $user->followers->count() }}</a>
                    </div>
                    <div class="font-semibold text-gray-500 text-xs mt-1">joined since
                        {{ $user->created_at->diffForHumans() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>