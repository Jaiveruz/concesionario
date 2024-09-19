<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Vehiculo;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithFileUploads;


#[Layout('layouts.app')] 
class MostrarVehiculos extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search, $marca, $modelo, $ano, $color, $kilometraje, $precio, $edit_marca, $edit_modelo, $edit_ano, $edit_color, $edit_kilometraje, $edit_precio, $vehiculo_id, $image, $edit_image;
    public $create = true;
    public $edit = true;

    public function showModal() 
    {
        $this->create = !$this->create;
    }

    public function crearVehiculo()
    {
        $this->validate([
            'marca' => 'required|string|min:3|max:255',
            'modelo' => 'required|string|min:3|max:255',
            'ano' => 'required|numeric|min:3',
            'color' => 'required|string|min:3|max:255',
            'kilometraje' => 'required|numeric',
            'precio' => 'required|numeric|min:3',
            'image' => 'required|image',
        ]);


        $vehiculo = Vehiculo::create([
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'ano' => $this->ano,
            'color' => $this->color,
            'kilometraje' => $this->kilometraje,
            'precio' => $this->precio,
        ]);

        if ( $this->image ) {
            $imageName = time() . '.' . $this->image->extension();
            $this->image->storeAs('vehiculos_image', $imageName, 'public');
            $vehiculo->image = $imageName;
            $vehiculo->save();
        }

        $this->create = !$this->create;
        $this->dispatch('success', 'Vehículo creado con éxito'); 
        $this->reset();
        $this->render();
    }

    public function showModalEdit(Vehiculo $vehiculo)
    {
        $this->edit = !$this->edit;
        $this->vehiculo_id = $vehiculo->vehiculo_id;  
        $this->edit_marca = $vehiculo->marca;  
        $this->edit_modelo = $vehiculo->modelo;
        $this->edit_ano = $vehiculo->ano;
        $this->edit_color = $vehiculo->color;
        $this->edit_kilometraje = $vehiculo->kilometraje;
        $this->edit_precio = $vehiculo->precio;
    }

    public function closeModalEdit()
    {
        $this->edit = !$this->edit;
        $this->edit_marca = null;  
        $this->edit_modelo = null;
        $this->edit_ano = null;
        $this->edit_color = null;
        $this->edit_kilometraje = null;
        $this->edit_precio = null;
    }


    public function actualizarVehiculo()
    {
        $this->validate([
            'edit_marca' => 'required|string|min:3|max:255',
            'edit_modelo' => 'required|string|min:3|max:255',
            'edit_ano' => 'required|numeric|min:3',
            'edit_color' => 'required|string|min:3|max:255',
            'edit_kilometraje' => 'required|numeric',
            'edit_precio' => 'required|numeric|min:3',
        ]);

        $vehiculo = Vehiculo::find($this->vehiculo_id);

        $vehiculo->update([
            'marca' => $this->edit_marca,
            'modelo' => $this->edit_modelo,
            'ano' => $this->edit_ano,
            'color' => $this->edit_color,
            'kilometraje' => $this->edit_kilometraje,
            'precio' => $this->edit_precio,
        ]);

        if ($this->edit_image) {
            dd($this->edit_image);
            $imageName = time() . '.' . $this->edit_image->extension();
            $this->edit_image->storeAs('vehiculos_image', $imageName, 'public');
            $vehiculo->image = $imageName;
            $vehiculo->save();
        }

        $this->edit = !$this->edit;
        $this->dispatch('success', 'Vehículo actualizado con éxito'); 
        $this->reset();
        $this->render();
    }

    public function eliminar($id)
    {
        $this->dispatch('delete', $id); 
    }

    #[On('eliminar')]
    public function eliminarVehiculo($id) 
    {
        $vehiculo = Vehiculo::find($id);
        $vehiculo->delete();
        $this->dispatch('success', 'Vehículo eliminado con éxito'); 
        $this->render();
    }

    public function render()
    {
        $vehiculos = Vehiculo::when($this->search, function($query) {
            $query->where('marca', 'LIKE', '%'. $this->search. '%')
                ->orWhere('marca', 'LIKE', '%'. $this->search. '%');
        })
        ->paginate(5);

        return view('livewire.mostrar-vehiculos', compact('vehiculos'));
    }
}
