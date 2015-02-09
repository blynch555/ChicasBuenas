<?php
class DistrictTableSeeder extends Seeder {

    public function run()
    {
        DB::table('districts')->truncate();

        // Región Metropolitana
        District::create(['city_id' =>1, 'name' => 'Santiago']);
        District::create(['city_id' =>1, 'name' => 'Cerrillos']);
        District::create(['city_id' =>1, 'name' => 'Cerro Navia']);
        District::create(['city_id' =>1, 'name' => 'Conchalí']);
        District::create(['city_id' =>1, 'name' => 'El Bosque']);
        District::create(['city_id' =>1, 'name' => 'Estación Central']);
        District::create(['city_id' =>1, 'name' => 'Huechuraba']);
        District::create(['city_id' =>1, 'name' => 'Independencia']);
        District::create(['city_id' =>1, 'name' => 'La Cisterna']);
        District::create(['city_id' =>1, 'name' => 'La Florida']);
        District::create(['city_id' =>1, 'name' => 'La Granja']);
        District::create(['city_id' =>1, 'name' => 'La Pintana']);
        District::create(['city_id' =>1, 'name' => 'La Reina']);
        District::create(['city_id' =>1, 'name' => 'Las Condes']);
        District::create(['city_id' =>1, 'name' => 'Lo Barnechea']);
        District::create(['city_id' =>1, 'name' => 'Lo Espejo']);
        District::create(['city_id' =>1, 'name' => 'Lo Prado']);
        District::create(['city_id' =>1, 'name' => 'Macul']);
        District::create(['city_id' =>1, 'name' => 'Maipú']);
        District::create(['city_id' =>1, 'name' => 'Ñuñoa']);
        District::create(['city_id' =>1, 'name' => 'Pedro Aguirre Cerda']);
        District::create(['city_id' =>1, 'name' => 'Peñalolén']);
        District::create(['city_id' =>1, 'name' => 'Providencia']);
        District::create(['city_id' =>1, 'name' => 'Pudahuel']);
        District::create(['city_id' =>1, 'name' => 'Quilicura']);
        District::create(['city_id' =>1, 'name' => 'Quinta Normal']);
        District::create(['city_id' =>1, 'name' => 'Recoleta']);
        District::create(['city_id' =>1, 'name' => 'Renca']);
        District::create(['city_id' =>1, 'name' => 'San Joaquín']);
        District::create(['city_id' =>1, 'name' => 'San Miguel']);
        District::create(['city_id' =>1, 'name' => 'San Ramón']);
        District::create(['city_id' =>1, 'name' => 'Vitacura']);
        District::create(['city_id' =>1, 'name' => 'Puente Alto']);
        District::create(['city_id' =>1, 'name' => 'San Bernardo']);
        District::create(['city_id' =>1, 'name' => 'Padre Hurtado']);
        District::create(['city_id' =>1, 'name' => 'Pirque']);
        District::create(['city_id' =>1, 'name' => 'San José de Maipo']);
        District::create(['city_id' =>1, 'name' => 'Colina']);
        District::create(['city_id' =>1, 'name' => 'Lampa']);
        District::create(['city_id' =>1, 'name' => 'Batuco']);
        District::create(['city_id' =>1, 'name' => 'Tiltil']);
        District::create(['city_id' =>1, 'name' => 'Buin']);
        District::create(['city_id' =>1, 'name' => 'Alto Jahuel']);
        District::create(['city_id' =>1, 'name' => 'Bajos de San Agustín']);
        District::create(['city_id' =>1, 'name' => 'Paine']);
        District::create(['city_id' =>1, 'name' => 'Hospital']);
        District::create(['city_id' =>1, 'name' => 'Melipilla']);
        District::create(['city_id' =>1, 'name' => 'Curacaví']);
        District::create(['city_id' =>1, 'name' => 'Talagante']);
        District::create(['city_id' =>1, 'name' => 'El Monte']);
        District::create(['city_id' =>1, 'name' => 'Isla de Maipo']);
        District::create(['city_id' =>1, 'name' => 'La Islita']);
        District::create(['city_id' =>1, 'name' => 'Peñaflor']);
        // Arica
        District::create(['city_id' =>2, 'name' => 'Arica']);
        // Tarapacá
        District::create(['city_id' =>3, 'name' => 'Iquique']);
        District::create(['city_id' =>3, 'name' => 'Pozo Almonte']);
        // Antofagasta
        District::create(['city_id' =>4, 'name' => 'Pozo Almonte']);
        District::create(['city_id' =>4, 'name' => 'Antofagasta']);
        District::create(['city_id' =>4, 'name' => 'Calama']);
        District::create(['city_id' =>4, 'name' => 'Tocopilla']);
        District::create(['city_id' =>4, 'name' => 'Taltal']);
        District::create(['city_id' =>4, 'name' => 'Mejillones']);
        District::create(['city_id' =>4, 'name' => 'María Elena']);
        // Atacama
        District::create(['city_id' =>5, 'name' => 'Copiapó']);
        District::create(['city_id' =>5, 'name' => 'Caldera']);
        District::create(['city_id' =>5, 'name' => 'Tierra Amarilla']);
        District::create(['city_id' =>5, 'name' => 'Chañaral']);
        District::create(['city_id' =>5, 'name' => 'Diego de Almagro']);
        District::create(['city_id' =>5, 'name' => 'El Salvador']);
        District::create(['city_id' =>5, 'name' => 'Vallenar']);
        District::create(['city_id' =>5, 'name' => 'Huasco']);
        // Coquimbo
        District::create(['city_id' =>6, 'name' => 'La Serena']);
        District::create(['city_id' =>6, 'name' => 'Coquimbo']);
        District::create(['city_id' =>6, 'name' => 'Andacollo']);
        District::create(['city_id' =>6, 'name' => 'Vicuña']);
        District::create(['city_id' =>6, 'name' => 'Illapel']);
        District::create(['city_id' =>6, 'name' => 'Los Vilos']);
        District::create(['city_id' =>6, 'name' => 'Salamanca']);
        District::create(['city_id' =>6, 'name' => 'Ovalle']);
        District::create(['city_id' =>6, 'name' => 'Combarbalá']);
        District::create(['city_id' =>6, 'name' => 'Monte Patria']);
        District::create(['city_id' =>6, 'name' => 'El Palqui']);
        // Valparaíso
        District::create(['city_id' =>7, 'name' => 'Valparaíso']);
        District::create(['city_id' =>7, 'name' => 'Concón']);
        District::create(['city_id' =>7, 'name' => 'Viña del Mar']);
        District::create(['city_id' =>7, 'name' => 'Villa Alemana']);
        District::create(['city_id' =>7, 'name' => 'Quilpué']);
        District::create(['city_id' =>7, 'name' => 'Placilla de Peñuelas']);
        District::create(['city_id' =>7, 'name' => 'San Antonio']);
        District::create(['city_id' =>7, 'name' => 'Santo Domingo']);
        District::create(['city_id' =>7, 'name' => 'Cartagena)']);
        District::create(['city_id' =>7, 'name' => 'Quillota']);
        District::create(['city_id' =>7, 'name' => 'Hijuelas']);
        District::create(['city_id' =>7, 'name' => 'La Calera']);
        District::create(['city_id' =>7, 'name' => 'La Cruz']);
        District::create(['city_id' =>7, 'name' => 'San Felipe']);
        District::create(['city_id' =>7, 'name' => 'Casablanca']);
        District::create(['city_id' =>7, 'name' => 'Las Ventanas']);
        District::create(['city_id' =>7, 'name' => 'Quintero']);
        District::create(['city_id' =>7, 'name' => 'Los Andes']);
        District::create(['city_id' =>7, 'name' => 'Calle Larga']);
        District::create(['city_id' =>7, 'name' => 'Rinconada']);
        District::create(['city_id' =>7, 'name' => 'San Esteban']);
        District::create(['city_id' =>7, 'name' => 'La Ligua']);
        District::create(['city_id' =>7, 'name' => 'Cabildo']);
        District::create(['city_id' =>7, 'name' => 'Limache']);
        District::create(['city_id' =>7, 'name' => 'Nogales']);
        District::create(['city_id' =>7, 'name' => 'El Melón']);
        District::create(['city_id' =>7, 'name' => 'Olmué']);
        District::create(['city_id' =>7, 'name' => 'Algarrobo']);
        District::create(['city_id' =>7, 'name' => 'El Quisco']);
        District::create(['city_id' =>7, 'name' => 'El Tabo']);
        District::create(['city_id' =>7, 'name' => 'Catemu']);
        District::create(['city_id' =>7, 'name' => 'Llaillay']);
        District::create(['city_id' =>7, 'name' => 'Putaendo']);
        District::create(['city_id' =>7, 'name' => 'Villa Los Almendros']);
        District::create(['city_id' =>7, 'name' => 'Santa María']);
        // Lib. Gral. Bernardo OHiggins
        District::create(['city_id' =>8, 'name' => 'Rancagua']);
        District::create(['city_id' =>8, 'name' => 'Machalí']);
        District::create(['city_id' =>8, 'name' => 'Gultro']);
        District::create(['city_id' =>8, 'name' => 'Codegua']);
        District::create(['city_id' =>8, 'name' => 'Doñihue']);
        District::create(['city_id' =>8, 'name' => 'Lo Miranda']);
        District::create(['city_id' =>8, 'name' => 'Graneros']);
        District::create(['city_id' =>8, 'name' => 'Las Cabras']);
        District::create(['city_id' =>8, 'name' => 'San Francisco de Mostazal']);
        District::create(['city_id' =>8, 'name' => 'Peumo']);
        District::create(['city_id' =>8, 'name' => 'Punta Diamante']);
        District::create(['city_id' =>8, 'name' => 'Quinta de Tilcoco']);
        District::create(['city_id' =>8, 'name' => 'Rengo']);
        District::create(['city_id' =>8, 'name' => 'Requínoa']);
        District::create(['city_id' =>8, 'name' => 'San Vicente de Tagua Tagua']);
        District::create(['city_id' =>8, 'name' => 'Pichilemu']);
        District::create(['city_id' =>8, 'name' => 'San Fernando']);
        District::create(['city_id' =>8, 'name' => 'Chimbarongo']);
        District::create(['city_id' =>8, 'name' => 'Nancagua']);
        District::create(['city_id' =>8, 'name' => 'Palmilla']);
        District::create(['city_id' =>8, 'name' => 'Santa Cruz']);
        // Maule
        District::create(['city_id' =>9, 'name' => 'Talca']);
        District::create(['city_id' =>9, 'name' => 'Curicó']);
        District::create(['city_id' =>9, 'name' => 'Linares']);
        District::create(['city_id' =>9, 'name' => 'Constitución']);
        District::create(['city_id' =>9, 'name' => 'San Clemente']);
        District::create(['city_id' =>9, 'name' => 'Cauquenes']);
        District::create(['city_id' =>9, 'name' => 'Hualañé']);
        District::create(['city_id' =>9, 'name' => 'Molina']);
        District::create(['city_id' =>9, 'name' => 'Teno']);
        District::create(['city_id' =>9, 'name' => 'Longaví']);
        District::create(['city_id' =>9, 'name' => 'Parral']);
        District::create(['city_id' =>9, 'name' => 'San Javier']);
        District::create(['city_id' =>9, 'name' => 'Villa Alegre']);
        // Biobio
        District::create(['city_id' =>10, 'name' => 'Concepción']);
        District::create(['city_id' =>10, 'name' => 'Talcahuano']);
        District::create(['city_id' =>10, 'name' => 'Chiguayante']);
        District::create(['city_id' =>10, 'name' => 'Coronel']);
        District::create(['city_id' =>10, 'name' => 'Hualqui']);
        District::create(['city_id' =>10, 'name' => 'Lota']);
        District::create(['city_id' =>10, 'name' => 'Penco']);
        District::create(['city_id' =>10, 'name' => 'Tomé']);
        District::create(['city_id' =>10, 'name' => 'Hualpén']);
        District::create(['city_id' =>10, 'name' => 'San Pedro de la Paz']);
        District::create(['city_id' =>10, 'name' => 'Chillán']);
        District::create(['city_id' =>10, 'name' => 'Chillán Viejo']);
        District::create(['city_id' =>10, 'name' => 'Los Ángeles']);
        District::create(['city_id' =>10, 'name' => 'Santa Juana']);
        District::create(['city_id' =>10, 'name' => 'Lebu']);
        District::create(['city_id' =>10, 'name' => 'Arauco']);
        District::create(['city_id' =>10, 'name' => 'Cañete']);
        District::create(['city_id' =>10, 'name' => 'Curanilahue']);
        District::create(['city_id' =>10, 'name' => 'Los Álamos']);
        District::create(['city_id' =>10, 'name' => 'Cabrero']);
        District::create(['city_id' =>10, 'name' => 'Monte Águila']);
        District::create(['city_id' =>10, 'name' => 'Conurbación La Laja-San Rosendo']);
        District::create(['city_id' =>10, 'name' => 'Mulchén']);
        District::create(['city_id' =>10, 'name' => 'Nacimiento']);
        District::create(['city_id' =>10, 'name' => 'Santa Bárbara']);
        District::create(['city_id' =>10, 'name' => 'Huépil']);
        District::create(['city_id' =>10, 'name' => 'Yumbel']);
        District::create(['city_id' =>10, 'name' => 'Bulnes']);
        District::create(['city_id' =>10, 'name' => 'Coelemu']);
        District::create(['city_id' =>10, 'name' => 'Coihueco']);
        District::create(['city_id' =>10, 'name' => 'Quillón']);
        District::create(['city_id' =>10, 'name' => 'Quirihue']);
        District::create(['city_id' =>10, 'name' => 'San Carlos']);
        District::create(['city_id' =>10, 'name' => 'Yungay']);
        // Araucanía
        District::create(['city_id' =>11, 'name' => 'Temuco']);
        District::create(['city_id' =>11, 'name' => 'Padre Las Casas']);
        District::create(['city_id' =>11, 'name' => 'Labranza']);
        District::create(['city_id' =>11, 'name' => 'Carahue']);
        District::create(['city_id' =>11, 'name' => 'Cunco']);
        District::create(['city_id' =>11, 'name' => 'Freire']);
        District::create(['city_id' =>11, 'name' => 'Gorbea']);
        District::create(['city_id' =>11, 'name' => 'Lautaro']);
        District::create(['city_id' =>11, 'name' => 'Loncoche']);
        District::create(['city_id' =>11, 'name' => 'Nueva Imperial']);
        District::create(['city_id' =>11, 'name' => 'Pitrufquén']);
        District::create(['city_id' =>11, 'name' => 'Pucón']);
        District::create(['city_id' =>11, 'name' => 'Villarrica']);
        District::create(['city_id' =>11, 'name' => 'Angol']);
        District::create(['city_id' =>11, 'name' => 'Collipulli']);
        District::create(['city_id' =>11, 'name' => 'Curacautín']);
        District::create(['city_id' =>11, 'name' => 'Purén']);
        District::create(['city_id' =>11, 'name' => 'Renaico']);
        District::create(['city_id' =>11, 'name' => 'Traiguén']);
        District::create(['city_id' =>11, 'name' => 'Victoria']);
        // Los Ríos
        District::create(['city_id' =>12, 'name' => 'Valdivia']);
        District::create(['city_id' =>12, 'name' => 'Futrono']);
        District::create(['city_id' =>12, 'name' => 'La Unión']);
        District::create(['city_id' =>12, 'name' => 'Lanco']);
        District::create(['city_id' =>12, 'name' => 'Los Lagos']);
        District::create(['city_id' =>12, 'name' => 'San José de la Mariquina']);
        District::create(['city_id' =>12, 'name' => 'Paillaco']);
        District::create(['city_id' =>12, 'name' => 'Panguipulli']);
        District::create(['city_id' =>12, 'name' => 'Río Bueno']);
        // Los Lagos
        District::create(['city_id' =>13, 'name' => 'Puerto Montt']);
        District::create(['city_id' =>13, 'name' => 'Puerto Varas']);
        District::create(['city_id' =>13, 'name' => 'Calbuco']);
        District::create(['city_id' =>13, 'name' => 'Fresia']);
        District::create(['city_id' =>13, 'name' => 'Frutillar']);
        District::create(['city_id' =>13, 'name' => 'Los Muermos']);
        District::create(['city_id' =>13, 'name' => 'Llanquihue']);
        District::create(['city_id' =>13, 'name' => 'Castro']);
        District::create(['city_id' =>13, 'name' => 'Ancud']);
        District::create(['city_id' =>13, 'name' => 'Quellón']);
        District::create(['city_id' =>13, 'name' => 'Osorno']);
        District::create(['city_id' =>13, 'name' => 'Purranque']);
        District::create(['city_id' =>13, 'name' => 'Río Negro']);
        // Aysén
        District::create(['city_id' =>14, 'name' => 'Coyhaique']);
        District::create(['city_id' =>14, 'name' => 'Puerto Aysén']);
        // Magallanes
        District::create(['city_id' =>15, 'name' => 'Punta Arenas']);
        District::create(['city_id' =>15, 'name' => 'Puerto Natales']);
    }
}