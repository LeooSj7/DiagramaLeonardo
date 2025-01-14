<div class="overflow-hidden w-4/6 rounded-none bg-gray-700 border border-spacing-3 p-4 lg:p-12 lg:ml-2">
    <style>
        li .select2-selection_choice {
            background-color: red;
        }

        [data-title]:hover:after {
            opacity: 1;
            transition: all 0.1s ease 0.5s;
            visibility: visible;
        }

        [data-title]:after {
            content: attr(data-title);
            background-color: rgb(250, 250, 250);
            color: rgb(0, 0, 0);
            font-size: 14px;
            font-weight: bold;
            font-family: Raleway;
            position: absolute;
            padding: 3px 20px;
            bottom: -1.6em;
            left: 100%;
            white-space: nowrap;
            box-shadow: 1px 1px 3px #222222;
            opacity: 0;
            border: 1px solid #7c7c7c;
            z-index: 99999;
            visibility: hidden;
            border-radius: 6px;

        }

        [data-title] {
            position: relative;
        }
    </style>
<h1 class="text-2xl font-serif hover:text-gray-700 text-center">Configuración de colaboraciones</h1>
<div class="my-3">
    <label for="diagram_name" class="block mb-2 text-sm font-serif font-medium text-black">Proyecto nombre</label>
    <input type="text" id="diagram_name" wire:model="name"
            class="bg-gray-500 border border-gray-300 text-black text-sm rounded-none focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5"
            value="{{ $name }}" required>
    </div>
    <div class="my-3">
        <label for="diagram_type" class="block mb-2 text-sm font-medium text-black font-serif">Estilo del diagrama de DB</label>
        <input type="text" id="diagram_type" wire:model="type"
            class="bg-gray-500 border border-gray-300 text-gray-900 text-sm rounded-none focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5"
            value="{{ $type }}" required>
    </div>
    <div class="grid my-3 justify-end">
        <button wire:click="diagramUpdate"
            class="text-black bg-gray-800 hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-indigo-400 font-medium rounded-none text-sm w-full sm:w-auto px-5 py-2.5 text-center">Modificar</button>
    </div>
    <h1 class="text-2xl font-bold  text-center mt-7 font-serif">Usuarios</h1>
    <p class="text-sm text-gray-400 text-center mb-7">Añade compañeros</p>
    {{-- {{ json_encode($select_users) }} --}}
    <div class="w-full mb-5" wire:ignore>
        <select data-placeholder="Selecciona a uno o más usuarios" name="select" id="select" class="select w-full"
             multiple>
            @foreach ($users as $user)
                @if (!in_array($user->id, $diagram_user) && Auth::user()->id != $user->id)
                    <option value="{{ $user->id }}">{{ $user->email }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="grid my-3 justify-end">
        <button type="button" wire:click="addCollaborators" id="btn_add"
            class="text-black bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-none text-sm w-full sm:w-auto px-5 py-2.5 text-center {{ $select_users == null ? 'cursor-not-allowed opacity-70' : '' }}" {{ $select_users == null ? 'disabled' : '' }}>Invitar a un compañero</button>
    </div>
    <table class="min-w-max w-full table-auto">
        <thead class="">
            <tr class="bg-indigo-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Colaborador</th>
                <th class="py-3 px-6 text-left">Inicio</th>
                <th class="py-3 px-6 text-center">Estado</th>
                <th class="py-3 px-6 text-center">Acciones</th>
            </tr>
        </thead>

        <tbody class="text-gray-600 text-sm font-light">
            @if (count($user_has_diagrams) > 0)
                @foreach ($user_has_diagrams as $user_has_diagram)
                    <tr class="border-b border-gray-200 hover:bg-blue-50">


                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                <div class="mr-2">
                                    <img class="w-6 h-6 rounded-full"
                                        src="https://randomuser.me/api/portraits/men/1.jpg" />
                                </div>
                                <div class="grid">
                                    <span>{{ $user_has_diagram->name }}</span>
                                    <span>{{ $user_has_diagram->email }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="py-3 text-center">
                            <div class="flex items-center justify-center">
                                {{ $user_has_diagram->created_at->toFormattedDateString() }}
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Active</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <button onclick="deleteOneCollaborator({{ $user_has_diagram->id }})" type="button"
                                    class="flex flex-row justify-center gap-2 btn-sm w-full bg-indigo-500 hover:bg-indigo-600 text-white"
                                        href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6"
                                    x-tooltip="tooltip">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </div>
                        </td>


                    </tr>
                @endforeach
            @endif
        </tbody>

    </table>
    @if (!count($user_has_diagrams) > 0)
        <p class="text-center text-md text-gray-500 my-5">Sin colaboradores</p>
        <hr>
    @endif
    <script>
        window.initSelect2 = () => {
            $('.select').select2({
                theme: "classic",
                minimumResultsForSearch: 2,
                allowClear: true
            });
        }

        initSelect2();


        $(document).ready(function() {
            $('#select').on('change', function(e) {
                var data = $('#select').select2("val");
                @this.set('select_users', data);
            });
        });


        Livewire.on('collaboratorsAdded', () => {
            $('#select').val('').trigger('change');
        })

        function deleteOneCollaborator(id) {
            Swal.fire({
                title: '¿Estás seguro de eliminar a este colaborador?',
                text: "Este cambio no es reversible...",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteOneCollaborator', id)
                    Swal.fire(
                        'Listo!',
                        'Eliminado correctamente',
                        'success'
                    )
                }
            })
        }
    </script>
</div>
