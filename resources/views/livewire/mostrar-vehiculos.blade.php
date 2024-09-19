

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                <p class="mb-8">En este módulo podrá visualizar todos los vehiculos.</p>
                

                <div class="flex justify-between mb-4">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500"
                                fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>

                        <input type="text" wire:model.live.debounce.300ms="search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full pl-10 p-2 "
                            placeholder="Buscar..." required="">
                    </div>

                    <div class="">
                        <button wire:click="showModal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Crear nuevo vehiculo
                        </button>
                    </div>
                </div>


                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Marca
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Modelo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Año
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Color
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Precio
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kilometraje
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehiculos as $vehiculo)
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                       {{ $vehiculo->marca }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $vehiculo->modelo }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $vehiculo->ano }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $vehiculo->color }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $vehiculo->precio }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $vehiculo->kilometraje }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <button wire:click="showModalEdit({{ $vehiculo->vehiculo_id }})" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                            Editar
                                        </button>
                                        <button wire:click="eliminar({{ $vehiculo->vehiculo_id }})" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $vehiculos->links() }}
            </div>
        </div>

        <div class="{{ $create ? 'hidden' : '' }} fixed z-50 inset-0 flex items-center justify-center overflow-hidden">
            <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <div class="bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Crear nuevo vehiculo
                    </h3>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Marca</label>
                            <input type="text" wire:model="marca" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            @error('marca') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Modelo</label>
                            <input type="text" wire:model="modelo" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            @error('modelo') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Año</label>
                            <input type="number" wire:model="ano" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            @error('ano') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Color</label>
                            <input type="text" wire:model="color" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            @error('color') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Precio</label>
                            <input type="number" wire:model="precio" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            @error('precio') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Kilometraje</label>
                            <input type="number" wire:model="kilometraje" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            @error('kilometraje') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                    <button
                        type="button"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                        wire:click="crearVehiculo"
                    >
                    Crear
                    </button>

                    <button
                        type="button"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                        wire:click="showModal"
                    >
                    Cancelar
                    </button>
                </div>

            </div>
        </div>

        <div class="{{ $edit ? 'hidden' : '' }} fixed z-50 inset-0 flex items-center justify-center overflow-hidden">
            <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <div class="bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Editar el vehiculo
                    </h3>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Marca</label>
                            <input type="text" wire:model="edit_marca" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            @error('edit_marca') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Modelo</label>
                            <input type="text" wire:model="edit_modelo" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            @error('edit_modelo') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Año</label>
                            <input type="number" wire:model="edit_ano" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            @error('edit_ano') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Color</label>
                            <input type="text" wire:model="edit_color" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            @error('edit_color') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Precio</label>
                            <input type="number" wire:model="edit_precio" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            @error('edit_precio') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Kilometraje</label>
                            <input type="number" wire:model="edit_kilometraje" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            @error('edit_kilometraje') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                    <button
                        type="button"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                        wire:click="actualizarVehiculo"
                    >
                    Actualizar
                    </button>

                    <button
                        type="button"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                        wire:click="closeModalEdit"
                    >
                    Cancelar
                    </button>
                </div>

            </div>
        </div>
        
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('livewire:init', () => {
       Livewire.on('success', (menssage) => {
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: menssage,
            showConfirmButton: false,
            timer: 1500
        });
       });

       Livewire.on('delete', (id) => {
        Swal.fire({
            title: "Are you sure?",
            text: "No podra revertir los cambios!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, eliminar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('eliminar', id);
                }
            });
       });
    });
</script>