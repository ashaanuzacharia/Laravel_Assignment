<?php
  
namespace App\Exports;
  
use App\ChallengeSolution;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use App\Exports\Sheet;
use DB;
use RegistersEventListeners;
class SolutionsExport implements FromCollection,WithHeadings,WithEvents,  ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    function __construct($id) {
        $this->id = $id;
    }
    public function registerEvents(): array
    {
        return [
               AfterSheet::class    => function(AfterSheet $event) {
                 $cellRange = 'A1:AZ1';
                 $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                 $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);
                 $HighestRow = $event->sheet->getHighestRow();
                 for($i= 2; $i <= $HighestRow; $i++){
                    $cell = $event->sheet->getCell('A'.$i)->getValue();  
                    $ABcell = $event->sheet->getCell('AB'.$i)->getValue();   
                    $Ecell = $event->sheet->getCell('E'.$i)->getValue();

                    $iValue = trim(strip_tags($event->sheet->getCell('I'.$i)->getValue()));   
                    $iValue = str_replace("&nbsp;"," ",$iValue);
                    $jValue = trim(strip_tags($event->sheet->getCell('J'.$i)->getValue()));   
                    $jValue = str_replace("&nbsp;"," ",$jValue);

                    $mValue = trim(strip_tags($event->sheet->getCell('M'.$i)->getValue()));   
                    $mValue = str_replace("&nbsp;"," ",$mValue);
                    $oValue = trim(strip_tags($event->sheet->getCell('O'.$i)->getValue()));   
                    $oValue = str_replace("&nbsp;"," ",$oValue);
                    $qValue = trim(strip_tags($event->sheet->getCell('Q'.$i)->getValue()));   
                    $qValue = str_replace("&nbsp;"," ",$qValue);
                    $sValue = trim(strip_tags($event->sheet->getCell('S'.$i)->getValue()));   
                    $sValue = str_replace("&nbsp;"," ",$sValue);

                    $uValue = trim(strip_tags($event->sheet->getCell('U'.$i)->getValue()));   
                    $uValue = str_replace("&nbsp;"," ",$uValue);
                    $wValue = trim(strip_tags($event->sheet->getCell('W'.$i)->getValue()));   
                    $wValue = str_replace("&nbsp;"," ",$wValue);

                    $path = url('challenges/'.$cell.'/solutions/download'); 
                    $profile_url = url($ABcell.'/'.$Ecell);
                    $y_path = $event->sheet->getCell('Y'.$i)->getValue(); 
                    $z_path = $event->sheet->getCell('Z'.$i)->getValue(); 
                    $ac_path= $event->sheet->getCell('AC'.$i)->getValue(); 
                    $event->sheet->getDelegate()->setCellValue('I'.$i, $iValue);
                    $event->sheet->getDelegate()->setCellValue('J'.$i, $jValue);
                    $event->sheet->getDelegate()->setCellValue('M'.$i, $mValue);
                    $event->sheet->getDelegate()->setCellValue('O'.$i, $oValue);
                    $event->sheet->getDelegate()->setCellValue('Q'.$i, $qValue);
                    $event->sheet->getDelegate()->setCellValue('S'.$i, $sValue);
                    $event->sheet->getDelegate()->setCellValue('U'.$i, $uValue);
                    $event->sheet->getDelegate()->setCellValue('W'.$i, $wValue);

                    $event->sheet->getDelegate()->setCellValue('AB'.$i, $path);
                    // $event->sheet->getCell('AB'.$i)->getHyperlink()->setUrl($path);
                    $event->sheet->getDelegate()->getComment('AB'.$i)->getText()->createTextRun('Copy and Paste this Link into a Browser Address Bar');

                    $event->sheet->getDelegate()->setCellValue('E'.$i, $profile_url);
                    $event->sheet->getCell('E'.$i)->getHyperlink()->setUrl($profile_url);
                    $event->sheet->getCell('E'.$i)->getHyperlink()->setUrl($profile_url)->setTooltip('Click here to access file'); 
                    if(!empty($y_path))
                        $event->sheet->getCell('Y'.$i)->getHyperlink()->setUrl($y_path)->setTooltip('Click here to access file'); 
                    if(!empty($z_path))
                        $event->sheet->getCell('Z'.$i)->getHyperlink()->setUrl($z_path)->setTooltip('Click here to access file'); 
                    if(!empty($ac_path))
                        $event->sheet->getCell('AC'.$i)->getHyperlink()->setUrl($ac_path)->setTooltip('Click here to access file'); 
                    $event->sheet->getDelegate()->setCellValue('AE'.$i, '=SUM(K'.$i.',N'.$i.',P'.$i.',R'.$i.',T'.$i.',V'.$i.',X'.$i.',AA'.$i.',AD'.$i.')');

                 }
                 // Set first row to height 20
                 $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(20);
         },
      ];
    }
    public function collection()
    {
        return ChallengeSolution::select('challenge_solutions.id',
                                         'challenge_solutions.profile_id',
                                         'profiles.company',
                                         'offices.address',
                                         'profiles.uuid',
                                         'profiles.email',
                                         'profiles.phone',                                        
                                         'challenge_solutions.title', 
                                         'challenge_solutions.problem_statement',
                                         'challenge_solutions.solution',
                                         DB::raw('null as score_one'),
                                         'challenge_solutions.stage',
                                         'challenge_solutions.business_model',
                                         DB::raw('null as score_two'),
                                         'challenge_solutions.market',
                                         DB::raw('null as score_one_one'),
                                         'challenge_solutions.competition',
                                         DB::raw('null as score_one_two'),
                                         'challenge_solutions.market_strategy',
                                         DB::raw('null as score_three'),
                                         'challenge_solutions.roadmap',
                                         DB::raw('null as score_one_three'),
                                         'challenge_solutions.partnership',
                                         DB::raw('null as score_four'),
                                         'challenge_solutions.youtube',
                                         'challenge_solutions.vimeo',
                                         DB::raw('null as score_five'),
                                         'profiles.type',
                                         'challenge_solutions.url',
                                         DB::raw('null as score_six'),
                                         DB::raw('null as score_seven'),)
                                    ->join('profiles', 'challenge_solutions.profile_id', '=', 'profiles.id')
                                    ->join('offices', 'offices.parent_profile', '=', 'profiles.id')
                                    ->where(['challenge_id' => $this->id])
                                    ->distinct()
                                    ->get();
        }
    
    public function headings(): array
    {
        return [
            'Solution Id',
            'Profile Id',
            'Profile',
            'Profile Address',
            'I4g Profile URL',
            'Profile Email Id',
            'Profile Phone number',            
            'Summary',
            'The Problem',
            'The Solution',
            'Score',
            'Stage of Development',
            'Business Model',
            'Score',
            'Market Analysis',
            'Score',
            'USP',
            'Score',
            'go-to-market strategy',
            'Score',
            'Roadmap',
            'Score',
            'Partnerships',
            'Score',
            'Pitch Deck Youtube Video',
            'Pitch Deck Vimeo Video',
            'Score',
            'Pitch Deck URL',
            'Solution URL',
            'Score',
            'Total Score',
        ];
    }
}