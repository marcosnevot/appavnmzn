<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asuntos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique(); // Nombre del asunto
            $table->timestamps();
        });

        // Insertar opciones iniciales
        DB::table('asuntos')->insert([
            ['nombre' => 'REQUERIMIENTO 2022'],
            ['nombre' => 'RENTA 2022 COMPLEMENTARIA'],
            ['nombre' => 'INSPECCION TRABAJO'],
            ['nombre' => 'REQUERIMIENTO ADUANAS'],
            ['nombre' => 'REVISION CESE ACTIVIDAD'],
            ['nombre' => 'COMPLEMENTO PATERNIDAD'],
            ['nombre' => 'MODELO 390 2023 rectificacion'],
            ['nombre' => 'PISCINAS BINACED'],
            ['nombre' => 'INGRESOS MINIMO VITAL'],
            ['nombre' => 'AYUDA ALQUILER'],
            ['nombre' => 'ALTA CENTRO TRABAJO'],
            ['nombre' => 'MODELO 037 IAE/RETENCIONES ALQ/TRAB'],
            ['nombre' => 'DEVOLUCION FIANZA'],
            ['nombre' => 'ENCUESTA'],
            ['nombre' => 'ESCRITO SOLICITUD COBRO RENTA 2023'],
            ['nombre' => 'RENTAS 2022/21/20/19/18'],
            ['nombre' => 'CERTIFICADOS HACIENDA Y SEG SOCIAL'],
            ['nombre' => 'REQUERIMIENTO INSCRIPCION REGITRO JUEGO'],
            ['nombre' => 'COMPLEMENTO MATERNIDAD'],
            ['nombre' => 'RECTIFICACION RENTAS 22/21/20/19'],
            ['nombre' => 'alta centro trabajo/baja centro trabajo'],
            ['nombre' => 'CONTRATO ARRAS'],
            ['nombre' => 'RENTA 2022 - Rectificar'],
            ['nombre' => 'ADUANAS'],
            ['nombre' => 'CONTRATO ALQUILER'],
            ['nombre' => 'ANULACION RENTA 2023'],
            ['nombre' => 'COMPLEMENTARIAS RENTAS 2018/2019'],
            ['nombre' => 'RECTIFICACION RENTA 2022'],
            ['nombre' => 'CONTRATO PRESTAMO'],
            ['nombre' => 'REGISTRO ALIMENTACION ANIMAL'],
            ['nombre' => 'M'],
            ['nombre' => 'BECA MOVILIDAD ARAGON'],
            ['nombre' => 'REQUERIMIENTO HACIENDA'],
            ['nombre' => 'RENTAS 2020/2021/2022'],
            ['nombre' => 'ALEGACIONES PPTA LIQ PROV RENTA 2022'],
            ['nombre' => 'RENTA 2023 MODIFICACION'],
            ['nombre' => 'COMPROBACION ORIGEN ADUANAS'],
            ['nombre' => 'BAJA ACTIVIDAD'],
            ['nombre' => 'PACTO SUCESORIO'],
            ['nombre' => 'BAJA ACTIVIDAD/AUTONOMO'],
            ['nombre' => 'SOLCITUD NIF INTRACOMUNITARIO'],
            ['nombre' => 'RECIBOS'],
            ['nombre' => 'SOLICITUD NOTAS SIMPLES'],
            ['nombre' => 'CERTIFICADO DIGITAL'],
            ['nombre' => 'CONTRATO ALQUILER/FIANZA'],
            ['nombre' => 'INGRESO MINIMO VITAL'],
            ['nombre' => 'RECARGO LIQUIDACION RENTAS 2021/22'],
            ['nombre' => 'MODELO 037'],
            ['nombre' => 'REQUERIMIENTO SOCIEDADES 2022'],
            ['nombre' => 'CERTIFICADO ULTIMAS VOLUNTADES'],
            ['nombre' => 'REQUERIMIENTO RENTA 2023'],
            ['nombre' => 'ALTA ACTIVIDAD'],
            ['nombre' => 'ALTA AUTONOMO COLABORADOR'],
            ['nombre' => 'ALEGACIONES SANCIONES RENTAS 2019/2021'],
            ['nombre' => 'HERENCIA'],
            ['nombre' => 'COMPROBACION CENSAL'],
            ['nombre' => 'MUTUALIDADES'],
            ['nombre' => 'DOCUMENTACION BANCO'],
            ['nombre' => 'CONCURSO BARRAS FIESTAS MONZON'],
            ['nombre' => 'DOCUMENTACION'],
            ['nombre' => 'modelo 055'],
            ['nombre' => 'SOLICITAR CITA NIE TASA Y SOLICITUD'],
            ['nombre' => 'DOCUMENTACION BBVA'],
            ['nombre' => 'SOLICITUD MUTUALIDADES EN RENTA'],
            ['nombre' => 'PATERNIDAD'],
            ['nombre' => 'ALTA ASOC. CULTURAL'],
            ['nombre' => 'ALTA AUTONOMO'],
            ['nombre' => 'LIQUIDACION DE HERENCIA'],
            ['nombre' => 'MODFICACION RENTA 2023 AFINSA'],
            ['nombre' => 'BAJA AUTONOMO'],
            ['nombre' => 'LIQUIDACION ESCRITURA COMPRA'],
            ['nombre' => 'CONTRATO DONACION'],
            ['nombre' => 'SOLICITUD PRUEBAS A LA EXPORTACION'],
            ['nombre' => 'Contrato arras venta vivienda'],
            ['nombre' => 'COMPRA NEGOCIO'],
            ['nombre' => 'REQUERIMIENTO RENTAS 2023'],
            ['nombre' => 'SOLICITUD PATERNIDAD'],
            ['nombre' => 'LIQUIDACION HERENCIA'],
            ['nombre' => 'CONTRATO DE TRABAJO'],
            ['nombre' => 'DECLARACION RESPONSABLE'],
            ['nombre' => 'PAGO SANCION'],
            ['nombre' => 'JUBILACION'],
            ['nombre' => 'REQUERIMIENTO HACIENDA RENTA 2023'],
            ['nombre' => 'CAMBIAR NUMERO CUENTA AUTONOMO'],
            ['nombre' => 'VIVIENDA VACACIONAL'],
            ['nombre' => 'VIDA LABORAL'],
            ['nombre' => 'CONSTITUIR ASOCIACION'],
            ['nombre' => 'PAGO HACIENDA FAMILIA NUMEROSA'],
            ['nombre' => 'FACTURACION ADMINISTRACION'],
            ['nombre' => 'BAJA RETENCIONES TRABAJADORES'],
            ['nombre' => 'NOTA SIMPLE'],
            ['nombre' => 'CONTRATO DE ALQUILER'],
            ['nombre' => 'CONTRATO ALQUILER/REGISTRO'],
            ['nombre' => 'AYUDAS AUTONOMO COLABORADOR'],
            ['nombre' => 'KIT DIGITAL'],
            ['nombre' => 'CHEQUES INSPECCION HACIENDA'],
            ['nombre' => 'REVISAR CONTRATOS ALQUILER LOCAL'],
            ['nombre' => 'BAJA IVA'],
            ['nombre' => 'BAJA M037  RETENCIONES TRABAJADORES'],
            ['nombre' => 'BAJA AUTONOMO COLABORADOR'],
            ['nombre' => 'IMPUESTO TRANSMISIONES CONST.SOCIEDAD'],
            ['nombre' => 'EMBARGOS ACCELERA/CANDIDO'],
            ['nombre' => 'ALEGACIONES PPTA LIQ PROVISONAL IMPTO TRANSMISIONES'],
            ['nombre' => 'SOLICITUD IT'],
            ['nombre' => 'ADQUISICION NEGOCIO'],
            ['nombre' => 'ALEGACIONES PAC'],
            ['nombre' => 'DATOS INGRESO MINIMO VITAL'],
            ['nombre' => 'NACIMIENTO HIJO F NUMEROSA'],
            ['nombre' => 'RECLAMACION CDAD REG CANAL DE ARAGON'],
            ['nombre' => 'SOLICITUD AMPLIACION PLAZO RECOGIDA RESIDUOS'],
            ['nombre' => 'NOTAS SIMPLES'],
            ['nombre' => 'PENSION NO CONTRIBUTIVA'],
            ['nombre' => 'M 037 BAJA BAR ALMUNIA SAN JUAN'],
            ['nombre' => 'DEPOSITO FIANZA CONTRATO ALQUILER VIVIENDA EN DGA'],
            ['nombre' => 'SOLICITAR DEVOLUCION RENTA23'],
            ['nombre' => 'CERTIFICADO TRABAJADORES DESPLAZADOS A1'],
            ['nombre' => 'REQUERIMIENTO ABONO ANTIC DEDUCCION DESC DISCAPACITADO'],
            ['nombre' => 'CONTRATO ALQUILER LOCAL'],
            ['nombre' => 'LIQUIDACION ITP COMPRA  NEGOCIO'],
            ['nombre' => 'CONTRATO PRESTAMO 4'],
            ['nombre' => 'CAMBIAR NUMERO DE CUENTA'],
            ['nombre' => 'M037 ALTA ALQUILERES'],
            ['nombre' => 'CUENTAS ANUALES 2023 MODIFICACION'],
            ['nombre' => 'ESCRITURA COMPRA GRANJA'],
            ['nombre' => 'SOLICITUD DEVOLUCION FIANZA DGA'],
            ['nombre' => 'LIQUIDACION SOCIEDAD'],
            ['nombre' => 'ALTA ACTIVIDAD ALQUILERES'],
            ['nombre' => 'VARIACION INGRESO MINIMO VITAL'],
            ['nombre' => 'ALTA ACTIVIDAD HACIENDA'],
            ['nombre' => 'SOLICITUD TARJETA ASISTENCIA SANITARIA'],
            ['nombre' => 'REQUERIMIENTO IVA 2023'],
            ['nombre' => 'CERTIFICADO CORRIENTE PAGO'],
            ['nombre' => 'NIF DEFINITIVO/OBLIGACIONES FISCALES'],
            ['nombre' => 'MODELOS NO RESIDENTES INMUEBLES'],
            ['nombre' => 'CAMBIAR CUENTA BANCO'],
            ['nombre' => 'CAMBIO DOMICILIACION AUTONOMO'],
            ['nombre' => 'MODELOS 583 ENERGIA SOLAR'],
            ['nombre' => 'PROCEDIMIENTO RECTIFICACION CENSAL'],
            ['nombre' => 'SOLICITUD DEVOLUCION FIANZA'],
            ['nombre' => 'REQUERIMIENTO ABONO ANTIC FAMILIA NUMEROSA'],
            ['nombre' => 'MODELO 036 ALTA RETENCIONES ALQUILERES'],
            ['nombre' => 'BAJA IAE'],
            ['nombre' => 'ALTA M115 RETENCIONES ALQUILERES'],
            ['nombre' => 'CONTRATO ARRENDAMIENTO LOCAL'],
            ['nombre' => 'ALTA ACTIVIDAD ALQUILERES/VIA'],
            ['nombre' => 'CATASTRO MODELO 900'],
            ['nombre' => 'CAMBIO DIRECCION POSTAL'],
            ['nombre' => 'ALTA IAE ALQUILERES'],
            ['nombre' => 'BAJA ALQUILERES']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asuntos');
    }
};
