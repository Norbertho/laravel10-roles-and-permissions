<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add a todo to your list.
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   
                    <form method="POST" action="/todos" class="w-full px-4 md:w-1/2 lg:w-1/3">
                        @csrf
                        <div class=" mb-6">
                            <label for="title" class="mb-3 block text-base font-medium text-black">
                            Add your todo:
                            </label>
                            <input
                            name="title"
                                type="text"
                                placeholder="What you have to do?"
                                class="border-form-stroke text-body-color placeholder-body-color focus:border-primary 
                                active:border-primary w-full rounded-lg border-[1.5px] py-3 px-5 font-medium outline-none 
                                transition disabled:cursor-default disabled:bg-[#F5F7FD]"
                                />
                                <label for="description" class="mt-6 block text-base font-medium text-black">
                                    Add your description:
                                    </label>
                                <textarea class=" mt-1 border-form-stroke text-body-color placeholder-body-color focus:border-primary 
                                active:border-primary w-full rounded-lg border-[1.5px] py-3 px-5 font-medium outline-none 
                                transition disabled:cursor-default disabled:bg-[#F5F7FD]" name="description" id="description" cols="30" rows="10"></textarea>
                        </div>
                        <button type="submit"
                                class="inline-block border border-1 py-2 px-4 border-green-500 mb-6 bg-green-200"
                                >
                                Add todo
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>