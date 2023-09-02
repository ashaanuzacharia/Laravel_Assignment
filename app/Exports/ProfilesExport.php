<?php
  
namespace App\Exports;
  
use App\Profile;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB; 
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use App\Exports\Sheet;
use RegistersEventListeners;
class ProfilesExport implements FromCollection,WithHeadings,WithEvents,  ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $array;

    function __construct($array,$typedetails) {
            $this->array = $array;
            $this->type = $typedetails;
    }
    public function registerEvents(): array
    {
        return [
               AfterSheet::class    => function(AfterSheet $event) {
                 $cellRange = 'A1:AZ1';
                 $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                 $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);
                 // Set first row to height 20
                 $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(20);
         },
      ];
    }
    public function collection()
    {
        $profiles = Profile::select('id','uuid','name','company','type','sector','email','website','location','phone',
                            DB::raw('(CASE WHEN featured = "1" THEN "Yes" ELSE "No" END) AS featured_lable'),
                            DB::raw('(CASE WHEN status = "1" THEN "Verified by I4G" ELSE "Not Verified" END) AS status_lable')
                    );
        if(!empty($this->array['name']))
                $profiles = $profiles->where('company', 'LIKE', "%" . $this->array['name'] . "%");
        if(!empty($this->array['country']))
                $profiles = $profiles->where('location', '=', $this->array['country']);
        if(!empty($this->array['sector']))
                $profiles = $profiles->where('sector', '=', $this->array['sector']);
        if(!empty($this->array['status'])){ 
                $status = $this->array['status'];
                if($status =='Verified')
                        $profiles = $profiles->where('status', '=', 1);
                else if($status =='notVerified')
                        $profiles = $profiles->where('status', '=', 0);
        }
        if(!empty($this->array['type']))
                $profiles = $profiles->where('type', '=', $this->array['type']);
        else if(!empty($this->type))
                $profiles = $profiles->where('type', '=', $this->type);
         return $profiles->get();
    }
    
    public function headings(): array
    {
        return [
            'ID',
            'UUID',
            'Name',
            'Company',
            'Type',
            'Sector',
            'Email',
            'Website',
            'Location',
            'Phone',
            'Featured',
            'Status'
        ];
    }
}