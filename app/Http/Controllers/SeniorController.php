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
        
        if (!is_numeric($workedHours)) {
            return response()->json(['error' => 'Horas trabalhadas somente em valor numérico'], 400);
        }
    
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
        
        if (!is_numeric($workedHours)) {
            return response()->json(['error' => 'Horas trabalhadas somente em valor numérico'], 400);
        }

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

    public function calcTaxes(Request $request, $name, int $salaryPerHour, int $regNumber)
    {
        $workedHours = $request->query('workedHours');
        
        if (!is_numeric($workedHours)) {
            return response()->json(['error' => 'Horas trabalhadas somente em valor numérico'], 400);
        }

        
        try {
            $senior = new Senior($name, $salaryPerHour, $regNumber, $workedHours);

            $data = [
                'name' => $senior->getName(),
                'regNumber' => $senior->getRegNumber(),
                'type' => 'Senior',
                'salary' => $senior->getSalary(),
                'workedHours' => $senior->getWorkedHours(),
                'totalSalary' => $senior->getSalary() * $senior->getWorkedHours(),
                'taxes' => $senior->getSalary() * $senior->getWorkedHours() * 0.11,
                'inss' => $senior->getSalary() * $senior->getWorkedHours() * 0.08,
                'syndicate' => $senior->getSalary() * $senior->getWorkedHours() * 0.05,
            ];

            $senior->calcTaxes();
            $data['liquid'] = $senior->getSalary() * $senior->getWorkedHours();
            
            return view('senior.taxes', compact('data'));
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function upCalcTaxes(Request $request, $name, int $salaryPerHour, int $regNumber)
    {
        $workedHours = $request->query('workedHours');
        
        if (!is_numeric($workedHours)) {
            return response()->json(['error' => 'Horas trabalhadas somente em valor numérico'], 400);
        }

        
        try {
            $senior = new senior($name, $salaryPerHour, $regNumber, $workedHours);

            $data = [
                'name' => $senior->getName(),
                'regNumber' => $senior->getRegNumber(),
                'type' => 'Senior',
                'salary' => $senior->getSalary(),
                'workedHours' => $senior->getWorkedHours(),
                'totalSalary' => $senior->getSalary() * $senior->getWorkedHours(),
                'incrPercentage' => 20
            ];

            $senior->incrSalary();
            $data['incrSalary'] = $senior->getSalary() * $senior->getWorkedHours();

            $data['taxes'] = $senior->getSalary() * $senior->getWorkedHours() * 0.11;
            $data['inss'] = $senior->getSalary() * $senior->getWorkedHours() * 0.08;
            $data['syndicate'] = $senior->getSalary() * $senior->getWorkedHours() * 0.05;

            $senior->calcTaxes();
            $data['liquid'] = $senior->getSalary() * $senior->getWorkedHours();
            
            return view('senior.upTaxes', compact('data'));
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}