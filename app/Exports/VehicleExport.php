<?php

namespace App\Exports;

use App\Models\Vehicle;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithProperties;



class VehicleExport implements FromView, WithEvents, ShouldAutoSize, WithColumnWidths, WithProperties
{

    use Exportable;

    public function __construct(Builder | null $query = null)
    {
        $this->query = $query;
    }

    /**
    */
    public function view(): View
    {
        return view('exports.vehicles', [
            'vehicles' => $this->query ? $this->query->get() : Vehicle::all(),
        ]);
    }

    public function properties(): array
        {
            return [
                'creator'        => 'Safety Sigaf',
                'title'          => __('Listado de vehículos'),
                'description'    => __('Lista de vehículos creados en el sistema Safety Sigaf'),
                'subject'        => __('Listado de vehículos'),
                'keywords'       => 'safetysigaf, vehicles, list',
                'category'       => 'vehicles',
                'company'        => 'Safety Sigaf',
            ];
        }

    public function columnWidths(): array
        {
            return [
                'A' => 25,
                'B' => 25,
                'C' => 25,
                'D' => 25,
            ];
        }

    public function registerEvents(): array
        {
            return [
                AfterSheet::class  => function(AfterSheet $event) {
                    $event->sheet->getPageSetup()->setFitToWidth(1);
                    $event->sheet->getPageSetup()->setFitToHeight(0);
                    $event->sheet->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 3);
                    $event->sheet->getProtection()->setSheet(true);
                    $event->sheet->getProtection()->setSort(true);
                    $event->sheet->getProtection()->setAutoFilter(false);
                    $event->sheet->getProtection()->setFormatCells(false);
                    $event->sheet->getProtection()->setPassword("Pi$204Oo_");
                    $event->sheet->getPageMargins()->setTop(0);
                    $event->sheet->getPageMargins()->setRight(0.3);
                    $event->sheet->getPageMargins()->setLeft(0.3);
                    $event->sheet->getPageMargins()->setBottom(1);
                },

            ];
        }

}