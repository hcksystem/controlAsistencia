<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use DB;
use Excel;
use App\Exports\AccountsExport;
use App\Exports\OperationsExport;
use App\Exports\LateShipmentsExport;
use App\Exports\VpmtNotApliedExport;
use App\Exports\LateInstructionsExport;
use App\Exports\LateDepositCExport;
use App\Exports\LateDepositSExport;
use App\Exports\LateDocsExport;
use App\Exports\LatePmtFreightExport;
use App\Exports\LateBalanceCustomer;
use App\Exports\ProductLinesExport;
use App\Exports\ProductGensExport;
use App\Exports\UsersExport;
use App\Exports\PortsExport;
use App\Exports\BankExport;
use App\Exports\CountriesExport;
use App\Exports\AccountCategoriesExport;
use App\Exports\AccountMetasExport;
use App\Exports\AccountMetaTypeExport;

class excelController extends Controller
{
	/**
	 * { function_description }
	 * @return     <type>  ( description_of_the_return_value )
	 */
	public function importExport()
	{
		$datosPag = ['titlePag'=> 'Usuarios', 'titleBox'=>'Registros'];
		return view('importExport',compact('datosPag'));
	}

	/**
	 * Downloads an excel.
	 * @param      <type>  $type   The type
	 * @return     <type>  ( description_of_the_return_value )
	 */
	
	public function downloadExcelG1()
	{
		return Excel::download(new LateShipmentsExport,'LateShipments.xlsx');
	}

	public function downloadExcelG2()
	{
		return Excel::download(new LateInstructionsExport,'LateInstruction.xlsx');
	}

	public function downloadExcelG3()
	{
		return Excel::download(new LateDepositCExport,'Late-DepositC.xlsx');
	}

	public function downloadExcelG4()
	{
		return Excel::download(new LateDepositSExport,'Late-DepositS.xlsx');
	} 

	public function downloadExcelG5()
	{
		return Excel::download(new LateDocsExport,'Late-Docs.xlsx');
	}

	public function downloadExcelG6()
	{
		return Excel::download(new LatePmtFreightExport,'Late-Balance-Supplier.xlsx');
	}

	public function downloadExcelG7()
	{
		return Excel::download(new LatePmtFreightExport,'Late-Balance-Customer.xlsx');
	} 

	public function downloadExcelVpmt()
	{
		return Excel::download(new VpmtNotApliedExport,'report-list.xlsx');
	}

	public function downloadExcelOperations()
	{
		return Excel::download(new OperationsExport,'report-operations-list.xlsx');
	}

	public function downloadExcelAccounts()
	{
		return Excel::download(new AccountsExport,'report-accounts-list.xlsx');
	}

	public function downloadExcelProductLine()
	{
		return Excel::download(new ProductLinesExport,'report-product-lines-list.xlsx');
	}

	public function downloadExcelProductGens()
	{
		return Excel::download(new ProductGensExport,'report-product-gens-list.xlsx');
	}

	public function downloadExcelUsers()
	{
		return Excel::download(new UsersExport,'report-users-list.xlsx');
	}

	public function downloadExcelAccountCategories()
	{
		return Excel::download(new AccountCategoriesExport,'report-account-categories-list.xlsx');
	}

	public function downloadExcelAccountMetas()
	{
		return Excel::download(new AccountMetasExport,'report-account-metas-list.xlsx');
	}

	public function downloadExcelAccountMetaType()
	{
		return Excel::download(new AccountMetaTypeExport,'report-account-metas-type-list.xlsx');
	}

	public function downloadExcelPorts()
	{
		return Excel::download(new PortsExport,'report-ports-list.xlsx');
	}

	public function downloadExcelCountries()
	{
		return Excel::download(new CountriesExport,'report-countries-list.xlsx');
	}

	public function downloadExcelBank($id)
	{
		//dd($id);
		$query = DB::table('QryBankLedgerbyAccount')->where('partnerbank_id', $id)->get();
		return Excel::download(new BankExport($query),'report-bank.xlsx');
	}

	
	public function downloadExcel($type)
	{
		$data = User::get()->toArray();
		return Excel::create('Users', function($excel) use ($data){
			$excel->sheet('Users', function($sheet) use ($data){
				$sheet->fromArray($data);
			});
		})->download($type);
	}
	
	/**
	 * { function_description }
	 * @return     <type>  ( description_of_the_return_value )
	 */
	public function importExcel()
	{
		$path = Input::file('import_file')->getRealPath();
		Excel::load($path, function($reader) {
		// Getting all results
		$results = $reader->select(array('title', 'description'))->get();
		//Recorre los resultados
		foreach ($results as $result) {
			if (isset($result->title)) {
				$item = [
					'title' 		=> $result->title,
					'description' 	=> $result->description
				];
				Item::create($item); //guarda el registro
				dd($item);
			}else{
				dd('Error al tratar de almacenar los datos del archivo');
			}
		}
		});
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
				$data = Excel::load($path, function($reader) {})->get(['title','description']);
				if(!empty($data) && $data->count()){
					foreach ($data as $key => $value) {
						$insert[] = ['title' => $value->title, 'description' => $value->description];
					}
					if(!empty($insert)){
						// DB::table('user')->insert($insert);
						foreach ($insert as $key => $item) {
							User::create($item);
						}
						dd('Insert Record successfully.');
					}
					}
		}
		return back();
	}
}