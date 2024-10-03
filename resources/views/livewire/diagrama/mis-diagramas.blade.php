<div>
    <!-- Filters -->
    <div class="mb-4 border-b border-slate-200">

        
    </div>

    <!-- show event -->
    <div>


        <div class="mt-8 ">
            @if ($diagrams->isEmpty())
                <h2 class="text-xl leading-snug text-black  mb-5">No existe ningun registro coincidente
                </h2>
            @else
                <h2 class="text-xl  text-black  mb-5">Proyectos Creados</h2>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($diagrams as $diagram)
                    <div class="col-span-full sm:col-span-1 bg-gray-300 shadow-lg rounded-lg border border-gray-300 overflow-hidden">
                        <div class="flex flex-col h-full">
                            <!-- Image -->
                            <div class="relative">
                                <img class="ml-9 mt-3 w-3/4" src="{{ asset('images/DB20.png') }}" width="286" height="160" alt="Application 09" />
                            </div>
                            <!-- Card Content -->
                            <div class="grow flex flex-col p-5">
                                <div class="grow">
                                    <header class="mb-2">
                                        <h3 class="text-lg text-slate-800 font-semibold">{{ $diagram->diagram_name }}</h3>
                                    </header>
                                    <ul class="text-sm space-y-2 mb-5">
                                        <li class="flex items-center">
                                            <svg class="w-4 h-4 fill-current text-slate-400 shrink-0 mr-3" viewBox="0 0 16 16">
                                                <path d="M15 2h-2V0h-2v2H9V0H7v2H5V0H3v2H1a1 1 0 00-1 1v12a1 1 0 001 1h14a1 1 0 001-1V3a1 1 0 00-1-1zm-1 12H2V6h12v8z" />
                                            </svg>
                                            <div class="text-gray-700">Fecha: {{ $diagram->created_at }}</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mb-4">
                                    <a href="{{route('diagrama.editar.colaboradores',$diagram->id)}}" class="rounded-none flex flex-row justify-center gap-2 btn-sm w-full bg-gray-600 hover:bg-gray-500 text-black">
                                        Invitar a compañeros
                                    </a>
                                </div>
                                <div class="mb-4">
                                    <a class="rounded-none flex flex-row justify-center gap-2 btn-sm w-full bg-gray-600 hover:bg-gray-500 text-black" href="{{ route('diagrama.edit',$diagram->id) }}">
                                        Diseñar diagramas de DB
                                    </a>
                                </div>
                                <div>
                                    <a wire:click="$emit('deleteDiagram',{{ $diagram->id }})" class="rounded-none flex flex-row justify-center gap-2 btn-sm w-full bg-gray-600 hover:bg-gray-500 text-black" href="#">
                                        Eliminar proyecto
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>

        <div class="px-6 py-3">

            {{ $diagrams->links() }}

        </div>
    </div>
</div>
