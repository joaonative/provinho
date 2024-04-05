<x-layout>
    <div class="flex flex-col gap-2">
        <h1 class="text-2xl font-bold">Detalhes do Funcionário:</h1>
        <div class="flex flex-col gap-2 text-xl font-medium">
            <p>Funcionário: {{ $data['name'] }}</p>
            <p>Número de Inscrição: {{ $data['regNumber'] }}</p>
            <p>Cargo: {{ $data['type'] }}</p>
            <p>Salário por hora trabalhada: {{ $data['salary'] }}</p>
            <p>Horas trabalhadas no mês: {{ $data['workedHours'] }}</p>
            <p>Salário total do mês: {{ $data['totalSalary'] }} </p>
            <p>Porcentagem de aumento no salário: {{ $data['incrPercentage'] }}%</p>
            <p>Salário com aumento: {{ $data['incrSalary'] }}</p>
        </div>
    </div>
</x-layout>