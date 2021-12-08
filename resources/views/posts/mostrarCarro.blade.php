<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-6 bg-white">
                    @if($errors->any())
                        <div class="my-3">
                        @foreach($errors->all() as $error)
                            <x-alerts.error :message="$error"/>
                        @endforeach
                        </div>
                    @endif
                    <livewire:shopping-cart/>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
