<?php

namespace Tests\Feature;

use App\Models\CarroCompra;
use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use SebastianBergmann\Type\VoidType;
use Tests\TestCase;

class Prueba1Test extends TestCase
{
    public function setUp():void
    {
        parent::setUp(); // laravel hacer la carga inicial.
        Producto::truncate();
        CarroCompra::truncate();
        $prod=new Producto();
        $prod->nombre="cocacola";
        $prod->imagen="cocacola.png";
        $prod->save();
        $carro=new CarroCompra();
        $carro->idproducto=$prod->id;
        $carro->cantidad=2;
        $carro->preciounitario=5;
        $carro->save();
    }
    /**
     * A basic feature test example.
     */
    public function test_db(): void
    {
        $this->assertDatabaseHas('productos', [
            'nombre' => 'cocacola',
        ]);

        $carro=CarroCompra::find(1);
        dump($carro);
        $this->assertEquals(10,$carro->subtotal);
        $this->assertDatabaseHas('carrocompras', [
            'idproducto' => '1',
        ]);

        $carro=CarroCompra::with(['producto'])->find(1);
        $this->assertEquals("cocacola",$carro->producto->nombre);
    }
    public function test_listar_productos():void
    {
        $response = $this->get('/producto');
        $response->assertStatus(200);
        $response->assertSee("cocacola");
    }
}
