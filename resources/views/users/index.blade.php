<x-app-layout>
    <x-container>
        <div class="grid grid-cols-4 gap-4">
            <x-following :users='$users'></x-following>
        </div>
        {{ $users->links() }}
    </x-container>
</x-app-layout>