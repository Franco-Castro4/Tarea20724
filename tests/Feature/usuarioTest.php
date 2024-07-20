<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class usuarioTest extends TestCase
{
    public function test_CrearUsuario()
    {
        $estructuraEsperable = [
            'id',
            'nombre',
            'apellido',
            'telefono',
            'created_at',
            'updated_at',


        ];

        $datosDeUsuario = [
            "nombre" => "Carlos",
            "apellido" => "Carlitos",
            "telefono" => 1234
        ];

        $response = $this->post('/api/post', $datosDeUsuario);
        $response->assertStatus(201);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDeUsuario);

        $this->assertDatabaseHas('usuario', [
            "nombre" => "Carlos",
            "apellido" => "Carlitos",
            "telefono" => 1234
        ]);
    }

    public function test_ModificarUsuario()
    {
        $estructuraEsperable = [
            'id',
            'nombre',
            'apellido',
            'telefono',
            'created_at',
            'updated_at',


        ];

        $datosDeUsuario = [
            "nombre" => "Carlos",
            "apellido" => "Carlote",
            "telefono" => 1234
        ];


        $response = $this->put('/api/usuario/1', $datosDeUsuario);
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDeUsuario);
        $this->assertDatabaseHas('usuario', [
            "nombre" => "Carlos",
            "apellido" => "Carlote",
            "telefono" => 1234
        ]);
    }

    public function test_ObtenerListadoDeUsuario()
    {
        $estructuraEsperable = [
            '*' => [
                'id',
                'nombre',
                'apellido',
                'telefono',
                'created_at',
                'updated_at',
            ]
        ];

        $response = $this->get('/api/usuario');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }


    public function test_BuscarUsuario()
    {
        $estructuraEsperable = [
            'id',
            'nombre',
            'apellido',
            'telefono',
            'created_at',
            'updated_at',
        ];

        $response = $this->get('/api/usuario/1');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }

    public function test_EliminarUsuario()
    {
        $response = $this->delete('/api/usuario/1');
        $response->assertStatus(200);
        $response->assertJsonStructure(['mensaje']);
        $response->assertJsonFragment(['mensaje' => 'Post eliminado']);

        $this->assertDatabaseMissing('usuario', [
            'id' => '1',
            'deleted_at' => null
        ]);
    }
}
