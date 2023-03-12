<?php

namespace App\Exports;

use App\Models\Buku;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BukuExport implements FromView, WithHeadings, WithEvents
{
    /**
     * @return View
     */
    public function view(): View
    {
        return view('export', [
            'books' => Buku::all()
        ]);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Judul',
            'Pengarang',
            'Penerbit',
            'Tahun Terbit',
            'Deskripsi',
            'Gambar',
            'Dibuat Pada',
            'Diupdate Pada'
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:I1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
            },
        ];
    }
}
