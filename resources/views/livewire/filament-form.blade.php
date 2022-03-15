<div class="">
    <div class="flex flex-col min-h-screen">
        <div class="w-1/3 m-auto">
            <form wire:submit.prevent="submit">
                {{ $this->form }}

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>
