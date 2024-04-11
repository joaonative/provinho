<x-layout>
    <div class="flex flex-col gap-2">
        <h1 class="text-2xl font-bold">Detalhes do Funcionário:</h1>
        <div class="flex flex-col gap-2 text-xl font-medium">
            <p>Funcionário: {{ $data['name'] }}</p>
            <p>Número de Inscrição: {{ $data['regNumber'] }}</p>
            <p>Cargo: {{ $data['type'] }}</p>
            <p>Salário por hora trabalhada: {{ $data['salary'] }}</p>
            <p>Horas trabalhadas no mês: {{ $data['workedHours'] }}</p>
            <p>Imposto de Renda: {{ $data['taxes'] }}</p>
            <p>INSS: {{ $data['inss']}}</p>
            <p>Sindicato: {{ $data['syndicate']}}</p>
            <p>Salário liquido do mês: {{ $data['liquid'] }}</p>
        </div>
    </div>
</x-layout>