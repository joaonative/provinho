<?php

namespace App\Http\Controllers;

use App\Models\Full;
use Illuminate\Http\Request;

class FullController extends Controller
{
    public function show(Request $request, $name, int $salaryPerHour, int $regNumber )
    {
        $workedHours = $request->query('workedHours');

        if (!is_numeric(workedHours)) {
            return response()->json(['error' => 'Horas trabalhadas somente em valor numérico'], 400);
        }

        try{
            $full = new Full($name, $salaryPerHour, $regNumber, $workedHours);

            $data = [
                'name' => $full->getName(),
                'regNumber' => $full->getRegNumber(),
                'type' => 'Pleno',
                'salary' => $full->getSalary(),
                'workedHours' => $full->getWorkedHours(),
                'totalSalary' => $full->getSalary() * $full->getWorkedHours()
            ];
            return view("full.show", compact('data'));
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function incrSalary(Request $request, $name, int $salaryPerHour, int $regNumber)
    {
        $workedHours = $request->query('workedHours');

        try{
            $full = new Full($name, $salaryPerHour, $regNumber, $workedHours);

            $data = [
                'name' => $full->getName(),
                'regNumber' => $full->getRegNumber(),
                'type' => 'Pleno',
                'salary' => $full->getSalary(),
                'workedHours' => $full->getWorkedHours(),
                'totalSalary' => $full->getSalary() * $full->getWorkedHours(),
                'incrPercentage' => 15
            ];
            
            $full->incrSalary();
            $data['incrSalary'] = $full->getSalary() * $full->getWorkedHours();

            return view('full.incrSalary', compact('data'));
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function calcTaxes(Request $request, $name, int $salaryPerHour, int $regNumber)
    {
        $workedHours = $request->query('workedHours');
        
        if (!is_numeric(workedHours)) {
            return response()->json(['error' => 'Horas trabalhadas somente em valor numérico'], 400);
        }

        
        try {
            $full = new Full($name, $salaryPerHour, $regNumber, $workedHours);

            $data = [
                'name' => $full->getName(),
                'regNumber' => $full->getRegNumber(),
                'type' => 'Pleno',
                'salary' => $full->getSalary(),
                'workedHours' => $full->getWorkedHours(),
                'totalSalary' => $full->getSalary() * $full->getWorkedHours(),
                'taxes' => $full->getSalary() * $full->getWorkedHours() * 0.11,
                'inss' => $full->getSalary() * $full->getWorkedHours() * 0.08,
                'syndicate' => $full->getSalary() * $full->getWorkedHours() * 0.05,
            ];

            $full->calcTaxes();
            $data['liquid'] = $full->getSalary() * $full->getWorkedHours();
            
            return view('full.taxes', compact('data'));
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function upCalcTaxes(Request $request, $name, int $salaryPerHour, int $regNumber)
    {
        $workedHours = $request->query('workedHours');
        
        if (!is_numeric(workedHours)) {
            return response()->json(['error' => 'Horas trabalhadas somente em valor numérico'], 400);
        }

        
        try {
            $full = new Full($name, $salaryPerHour, $regNumber, $workedHours);

            $data = [
                'name' => $full->getName(),
                'regNumber' => $full->getRegNumber(),
                'type' => 'Pleno',
                'salary' => $full->getSalary(),
                'workedHours' => $full->getWorkedHours(),
                'totalSalary' => $full->getSalary() * $full->getWorkedHours(),
                'incrPercentage' => 15
            ];

            $full->incrSalary();
            $data['incrSalary'] = $full->getSalary() * $full->getWorkedHours();

            $data['taxes'] = $full->getSalary() * $full->getWorkedHours() * 0.11;
            $data['inss'] = $full->getSalary() * $full->getWorkedHours() * 0.08;
            $data['syndicate'] = $full->getSalary() * $full->getWorkedHours() * 0.05;

            $full->calcTaxes();
            $data['liquid'] = $full->getSalary() * $full->getWorkedHours();
            
            return view('full.upTaxes', compact('data'));
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
