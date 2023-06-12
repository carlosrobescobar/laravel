<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ $action }}" method="POST">
                        @csrf
                        @isset ($method)
                            @method($method)
                        @endif
                        <div class="mb-4">
                            <label for="NombreProyecto" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Nombre') }}</label>
                            <input type="text" name="NombreProyecto" id="NombreProyecto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('name', $project->name) }}">
                            @error('NombreProyecto')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="fuenteFondos" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Fuente de fondos') }}</label>
                            <textarea name="fuenteFondos" id="fuenteFondos" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description', $project->description) }}</textarea>
                            @error('fuenteFondos')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="MontoPlanificado" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Monto planificado') }}</label>
                            <textarea name="MontoPlanificado" id="MontoPlanificado" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description', $project->description) }}</textarea>
                            @error('MontoPlanificado')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="MontoPatrocinado" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Monto patrocinado') }}</label>
                            <textarea name="MontoPatrocinado" id="MontoPatrocinado" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description', $project->description) }}</textarea>
                            @error('MontoPatrocinado')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="MontoFondosPropios" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Monto de fondos propios') }}</label>
                            <textarea name="MontoFondosPropios" id="MontoFondosPropios" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description', $project->description) }}</textarea>
                            @error('MontoFondosPropios')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ route('projects.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">{{ __('Cancelar') }}</a>
                            <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-dark font-bold py-2 px-4 rounded ml-2">{{ $buttonText }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>