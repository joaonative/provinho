<?php 

namespace App\Http\Controllers;

use App\Models\Senior;
use Illuminate\Http\Request;

class SeniorController extends Controller
{
    public function show(Request $request, $name, int $salaryPerHour, int $regNumber)
    {
        {
            $workedHours = $request->query('workedHours');
    
            try {
                $senior = new Senior($name, $salaryPerHour, $regNumber, $workedHours);
                
                $data = [
                    'name' => $senior->getName(),
                    'regNumber' => $senior->getRegNumber(),
                    'type' => 'Senior',
                    'salary' => $senior->getSalary(),
                    'workedHours' => $senior->getWorkedHours(),
                    'totalSalary' => $senior->getSalary() * $senior->getWorkedHours()
                ];
    
                return view('senior.show', compact('data'));
            } catch (\InvalidArgumentException $e) {
                return response()->json(['error' => $e->getMessage()], 400);
            }
        }
    }
    public function incrSalary(Request $request, $name, int $salaryPerHour, int $regNumber)
    {
        $workedHours = $request->query('workedHours');

        try {
            $senior = new Senior($name, $salaryPerHour, $regNumber, $workedHours);

            $data = [
                'name' => $senior->getName(),
                'regNumber' => $senior->getRegNumber(),
                'type' => 'Senior',
                'salary' => $senior->getSalary(),
                'workedHours' => $senior->getWorkedHours(),
                'totalSalary' => $senior->getSalary() * $senior->getWorkedHours(),
                'incrPercentage' => 20,
            ];

            $senior->incrSalary();
            $data['incrSalary'] = $senior->getSalary() * $senior->getWorkedHours();
            
            return view('junior.incrSalary', compact('data'));
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}