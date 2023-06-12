<div>
    <table class="table-auto w-full">
        <tr>
            <td>
                Gobierno del Salvador
            </td>
            <td>
                Academia Nacional de Seguridad Publica
            </td>
            <td>
                <?php
                $dt = new DateTime();
                echo $dt->format('Y-m-d H:m:s');
                ?>
            </td>
        </tr>
    </table>
</div>
<div class="mt-4">
    <table class="table-auto w-full">
        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
            <tr>
                <th class="px-4 py-2">{{ __('Id') }}</th>
                <th class="px-4 py-2">{{ __('Nombre') }}</th>
                <th class="px-4 py-2">{{ __('Fuente de Fondos') }}</th>
                <th class="px-4 py-2">{{ __('Monto Planificado') }}</th>
                <th class="px-4 py-2">{{ __('Monto Patrocinado') }}</th>
                <th class="px-4 py-2">{{ __('Monto Fondos Propios') }}</th>
            </tr>
        </thead>
        <tbody class="text-sm divide-y divide-gray-100">
            @forelse ($projects as $project)
                <tr>
                    <td class="border px-4 py-2">{{ $project->id }}</td>
                    <td class="border px-4 py-2">{{ $project->NombreProyecto }}</td>
                    <td class="border px-4 py-2">{{ $project->fuenteFondos }}</td>
                    <td class="border px-4 py-2">{{ $project->MontoPlanificado }}</td>
                    <td class="border px-4 py-2">{{ $project->MontoPatrocinado }}</td>
                    <td class="border px-4 py-2">{{ $project->MontoFondosPropios }}</td>
                </tr>
            @empty
                <tr class="bg-red-400 text-dark text-center">
                    <td colspan="5" class="border px-4 py-2">{{ __('No hay proyectos para mostrar') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>