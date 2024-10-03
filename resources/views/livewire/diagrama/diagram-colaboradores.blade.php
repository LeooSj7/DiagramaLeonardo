<div>
    <!-- Filters -->
    <!-- show event -->
    <div>

        <div class="mt-8">
            @if ($diagram_has_users->isEmpty())
                <h2 class="text-xl leading-snug text-black font-sans mb-5">NADA
                </h2>
            @else
                <h2 class="text-xl leading-snug text-black font-sans mb-5">Proyectos con colaboraciones y compañeros</h2>
            @endif

            <div class="grid grid-cols-12 gap-6">
                @foreach ($diagram_has_users as $diagram_has_user)
                    <div
                        class="col-span-full sm:col-span-6 xl:col-span-3 bg-gray-300 shadow-lg rounded-none border border-gray-600 overflow-hidden">
                        <div class="flex flex-col h-full">
                            <!-- Image -->
                            <div class="relative">
                                <img class="ml-9 mt-3 w-3/4" src="{{ asset('images/DB20.png') }}" width="286"
                                    height="160" alt="Application 09" />
                                <!-- Like button -->
                       
                            </div>
                            <!-- Card Content -->
                            <div class="grow flex flex-col p-5">
                                <!-- Card body -->
                                <div class="grow">
                                    <!-- Header -->
                                    <header class="mb-2">
                                        <h3 class="text-lg text-black font-semibold">{{ $diagram_has_user->diagram_name }}
                                        </h3>
                                    </header>
                                    <!-- List -->
                                    <ul class="text-sm space-y-2 mb-5">
                                     
                                        <li class="flex items-center">
                                            
                                            <div class="text-gray-700">Fecha: {{ $diagram_has_user->created_at }}</div>
                                        </li>

                                    </ul>
                                </div>

                                <!-- Card footer -->

                                {{-- editar diagrama --}}
                                <div class="mb-4">
                                    <a 
                                        class="flex flex-row justify-center gap-2 btn-sm w-full bg-gray-600 hover:bg-gray-400 text-black rounded-none font-bold"
                                        href="{{route("diagrama.edit",$diagram_has_user->diagram_id)}}">
                                       
                                        Seguir diseñando
                                    </a>

                                </div>     
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="px-6 py-3">

            {{ $diagram_has_users->links() }}

        </div>
    </div>
</div>
