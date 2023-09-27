<?php

namespace App\Exports;

use App\Models\Visitor;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class VisitorsExport implements FromQuery, WithEvents, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:J1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->getColor()
                    ->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FF17a2b8');
                // $event->sheet->setAutoFilter($cellRange);
            },
        ];
    }
    public function map($visitor): array
    {
        return [
            $visitor->name,
            $visitor->company,
            $visitor->office,
            $visitor->phone_number,
            ($visitor->is_given_card) ? 'Yes' : 'No',
            $visitor->identity_number,
            $visitor->purpose,
            $visitor->out_at,
            $visitor->created_at,
            $visitor->approved_by,
        ];
    }
    public function headings(): array
    {
        return [
            'NAMA',
            'ASAL PERUSAHAAN',
            'KANTOR',
            'NO HP',
            'DI BERIKAN KARTU ',
            'NO IDENTITAS',
            'TUJUAN',
            'TANGGAL KELUAR',
            'TANGGAL MASUK',
            'SECURITY',
        ];
    }
    public function query()
    {
        return Visitor::filter(request(['search', 'from_date', 'to_date']))
            ->orderBy('created_at', 'desc');
    }
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Visitor::all();
    // }
}
