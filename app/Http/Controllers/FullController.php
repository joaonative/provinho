<?php

namespace App\Http\Controllers;

use App\Models\Full;
use Illuminate\Http\Request;

class FullController extends Controller
{
    public function show(Request $request, $name, int $salaryPerHour, int $regNumber )
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
}
