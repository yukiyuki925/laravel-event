<x-event-layout>
    <div class="bg-white py-6 sm:py-8 lg:py-12 mt-5">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="mb-6 flex items-end justify-between gap-4">
                <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">Selected</h2>

                <a href="#"
                    class="inline-block rounded-lg border bg-white px-4 py-2 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-100 focus-visible:ring active:bg-gray-200 md:px-8 md:py-3 md:text-base">Show
                    more</a>
            </div>

            <div class="grid gap-x-4 gap-y-8 sm:grid-cols-2 md:gap-x-6 lg:grid-cols-3 xl:grid-cols-4">
                <div>
                    <a href="#"
                        class="group relative mb-2 block h-80 overflow-hidden rounded-lg bg-gray-100 lg:mb-3">
                        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&q=75&fit=crop&w=600"
                            loading="lazy" alt="Photo by Rachit Tank"
                            class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                        <span
                            class="absolute left-0 top-0 rounded-br-lg bg-red-500 px-3 py-1.5 text-sm uppercase tracking-wider text-white">sale</span>
                    </a>

                    <div>
                        <a href="#"
                            class="hover:gray-800 mb-1 text-gray-500 transition duration-100 lg:text-lg">Timely
                            Watch</a>

                        <div class="flex items-end gap-2">
                            <span class="font-bold text-gray-800 lg:text-lg">$15.00</span>
                            <span class="mb-0.5 text-red-500 line-through">$30.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-event-layout>
