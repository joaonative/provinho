<?php

namespace App\Http\Controllers;

use App\Models\Junior;
use Illuminate\Http\Request;

class JuniorController extends Controller
{
    public function show(Request $request, $name, int $salaryPerHour, int $regNumber)
    {
        $workedHours = $request->query('workedHours');

        try {
            $junior = new Junior($name, $salaryPerHour, $regNumber, $workedHours);
            
            $data = [
                'name' => $junior->getName(),
                'regNumber' => $junior->getRegNumber(),
                'type' => 'Junior',
                'salary' => $junior->getSalary(),
                'workedHours' => $junior->getWorkedHours(),
                'totalSalary' => $junior->getSalary() * $junior->getWorkedHours()
            ];

            return view('junior.show', compact('data'));
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function incrSalary(Request $request, $name, int $salaryPerHour, int $regNumber)
    {
        $workedHours = $request->query('workedHours');

        try {
            $junior = new Junior($name, $salaryPerHour, $regNumber, $workedHours);

            $data = [
                'name' => $junior->getName(),
                'regNumber' => $junior->getRegNumber(),
                'type' => 'Junior',
                'salary' => $junior->getSalary(),
                'workedHours' => $junior->getWorkedHours(),
                'totalSalary' => $junior->getSalary() * $junior->getWorkedHours(),
                'incrPercentage' => 10,
            ];

            $junior->incrSalary();
            $data['incrSalary'] = $junior->getSalary() * $junior->getWorkedHours();
            
            return view('junior.incrSalary', compact('data'));
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function calcTaxes(Request $request, $name, int $salaryPerHour, int $regNumber)
    {
        $workedHours = $request->query('workedHours');

        
        try {
            $junior = new Junior($name, $salaryPerHour, $regNumber, $workedHours);

            $data = [
                'name' => $junior->getName(),
                'regNumber' => $junior->getRegNumber(),
                'type' => 'Junior',
                'salary' => $junior->getSalary(),
                'workedHours' => $junior->getWorkedHours(),
                'totalSalary' => $junior->getSalary() * $junior->getWorkedHours(),
                'taxes' => $junior->getSalary() * $junior->getWorkedHours() * 0.11,
                'inss' => $junior->getSalary() * $junior->getWorkedHours() * 0.08,
                'syndicate' => $junior->getSalary() * $junior->getWorkedHours() * 0.05,
            ];

            $junior->calcTaxes();
            $data['liquid'] = $junior->getSalary() * $junior->getWorkedHours();
            
            return view('junior.taxes', compact('data'));
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function upCalcTaxes(Request $request, $name, int $salaryPerHour, int $regNumber)
    {
        $workedHours = $request->query('workedHours');

        
        try {
            $junior = new Junior($name, $salaryPerHour, $regNumber, $workedHours);

            $data = [
                'name' => $junior->getName(),
                'regNumber' => $junior->getRegNumber(),
                'type' => 'Junior',
                'salary' => $junior->getSalary(),
                'workedHours' => $junior->getWorkedHours(),
                'totalSalary' => $junior->getSalary() * $junior->getWorkedHours(),
                'incrPercentage' => 10
            ];

            $junior->incrSalary();
            $data['incrSalary'] = $junior->getSalary() * $junior->getWorkedHours();

            $data['taxes'] = $junior->getSalary() * $junior->getWorkedHours() * 0.11;
            $data['inss'] = $junior->getSalary() * $junior->getWorkedHours() * 0.08;
            $data['syndicate'] = $junior->getSalary() * $junior->getWorkedHours() * 0.05;

            $junior->calcTaxes();
            $data['liquid'] = $junior->getSalary() * $junior->getWorkedHours();
            
            return view('junior.upTaxes', compact('data'));
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}

