<?php

use Illuminate\Database\Seeder;
use papusclub\Models\Postulante;
class PostulanteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Postulante::create([
        	'id_postulante'=>1,
        	'ruc'=>78451296,
        	'direccion_nacimiento'=>'avenida prueba 123',
        	'pais_nacimiento'=>'Perú',
        	'lugar_nacimiento'=>'Lima',
        	'colegio_primario'=>'maranguita',
        	'colegio_secundario'=>'piedras gordas',
        	'universidad'=>'Alcatraz',
        	'profesion'=>'Burrier',
        	'centro_trabajo'=>'La calle',
        	'cargo_trabajo'=>'planificador',
        	'direccion_laboral'=>'callao callao callao',
        	'estado_civil'=>'viudo',
        	'nro_hijos'=>20,
        	'domicilio'=>'La perla',
        	'telefono_domicilio'=>84516235,
        	'telefono_celular'=>989456123]);

        Postulante::create([
        	'id_postulante'=>2,
        	'direccion_nacimiento'=>'avenida prueba 123',
        	'pais_nacimiento'=>'Perú',
        	'lugar_nacimiento'=>'Lima',
        	'colegio_primario'=>'maranguita',
        	'colegio_secundario'=>'piedras gordas',
        	'universidad'=>'Alcatraz',
        	'profesion'=>'Burrier',
        	'centro_trabajo'=>'La calle',
        	'cargo_trabajo'=>'planificador',
        	'direccion_laboral'=>'callao callao callao',
        	'estado_civil'=>'viudo',
        	'nro_hijos'=>20,
        	'domicilio'=>'La perla',
        	'telefono_domicilio'=>84516235,
        	'telefono_celular'=>989456123]);
    }
}
