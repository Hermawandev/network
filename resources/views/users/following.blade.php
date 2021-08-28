<x-app-layout>
    <x-container>
        <div class="grid grid-cols-12 gap-2 mt-11">
            <div class="col-span-12">
                <x-statistik :user='$user'/>
                <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                    <div class="grid grid-cols-2 gap-5">
                        <x-following :users='$follows'></x-following>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
</x-app-layout>