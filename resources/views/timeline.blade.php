<x-app-layout>
    <x-container>
        <div class="grid grid-cols-12 gap-2">
            <div class="col-span-7">
                <x-card>
                    <form action="{{ route('statuses.store') }}" method="post">
                        @csrf
                        <div class="flex">
                            <div class="flex-shrink-0 mr-3">
                                <img class="w-10 h-10 rounded-full" src={{ Auth::user()->gravatar() }}
                                    alt="{{ Auth::user()->name }}">
                            </div>
                            <div class="w-full">
                                <div class="font-semibold text-gray-700">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="my-2">
                                    <textarea name="body" id="body" placeholder="what is your mind"
                                        class="form-textarea w-full text-gray-800 border-gray-300 rounded-xl resize-none focus:to-blue-500 focus:ring focus:ring-blue-200 transition duration-200"></textarea>
                                </div>
                                <div class="text-right">
                                    <x-button>Post</x-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </x-card>
                <div class="space-y-6 mt-6">
                    <div>
                        @foreach ($statuses as $status )
                        <x-card>
                            <div class="flex">
                                <div class="flex-shrink-0 mr-3">
                                    <img class="w-10 h-10 rounded-full" src="{{ $status->user->gravatar() }}"
                                        alt="{{ $status->user->name }}">
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-700">
                                        {{ $status->user->name }}
                                    </div>
                                    <div class="leading-relaxed">
                                        {{ $status->body }}
                                    </div>
                                    <div class="text-sm text-gray-600">
                                        {{ $status->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </x-card>
                        @endforeach
                    </div>
                </div>
            </div>
            @if (Auth::user()->follows->count())
            <div class="col-span-5">
                <div class="border p-5 rounded-xl bg-gray-50">
                    <h1 class="font-semibold mb-5">Recently Follows</h1>
                    <x-following :users='Auth::user()->follows()->limit(5)->get()'></x-following>
                </div>
            </div>
            @endif

        </div>
    </x-container>
</x-app-layout>