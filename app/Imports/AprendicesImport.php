<?php

namespace App\Imports;

use App\Models\Aprendiz;
use App\Models\Ficha;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\DB;
use Throwable;

class AprendicesImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation
{
    private $fichas;

    public function __construct()
    {
        $this->fichas = Ficha::pluck('id', 'ficha');
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Aprendiz([
            'tipo_documento' => $row['tipo_documento'],
            'numero_documento' => $row['numero_documento'],
            'nombre_completo' => $row['nombre'],
            'estado' => $row['estado'],
            'ficha_id' => $this->fichas[$row['ficha']],
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function onError(Throwable $error){

    }

    public function rules(): array
    {
        return [
            '*.numero_documento' => [
                'integer',
                'required'
            ],
            '*.nombre' => [
                'string',
                'required'
            ],
            '*.ficha' => [
                'integer',
                'required'
            ]
        ];
    }
}
