<?php
  
namespace App\Exports;
  
use App\User;
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
class UsersExport implements FromCollection,WithHeadings,WithEvents,  ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $array;

    function __construct($array) {
            $this->array = $array;
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
        $users = User::select('id','uuid','name', 'company','type','role','email','subscription',
        DB::raw('(CASE WHEN email_verified_at IS NOT NULL THEN "Email verified" ELSE "not verified" END) AS not_verified_lable'),
        DB::raw('(CASE WHEN status = "1" THEN "Active" ELSE "Blocked" END) AS status_lable')
        );
        
        if( !empty($this->array['type'])){
            $users = $users->where('type', '=', $this->array['type']);
        }
        if( !empty($this->array['role'])){
            $users = $users->where('role', '=', $this->array['role']);
        }
        if(!empty($this->array['status'])){ 
            $status = $this->array['status'];
            if($status =='blocked')       
                    $users = $users->where('status', '=', 0);
            else if($status =='active')   
                    $users = $users->where('status', '=', 1);


        }
        
        if( !empty($this->array['name'])){
            $users = $users->where('name', 'LIKE', "%" . $this->array['name'] . "%");
        }
        if( !empty($this->array['company'])){
            $users = $users->where('company', 'LIKE', "%" . $this->array['company'] . "%");
        }
        if( !empty($this->array['email'])){
            $users = $users->where('email', 'LIKE', "%" . $this->array['email'] . "%");
        }
        return $users->get();

    }
    
    public function headings(): array
    {
        return [
            'ID',
            'UUID',
            ' Name',
            'Company',
            'Type',
            'Role',
            'Email',
            'Subscription',
            'Email verification Status',
            'Status'
        ];
    }
}