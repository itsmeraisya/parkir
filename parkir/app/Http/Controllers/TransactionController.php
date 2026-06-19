<?php

namespace App\Http\Controllers;

use App\Models\location;
use App\Models\transactions;
use App\Models\vehicle_types;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $locations = location::withCount([
            'transactions as occupied_motorcycle' => function ($query) {
                $query->whereHas('vehicleType', function ($query) {
                    $query->where('jenis', 'motorcycle');
                });
            },
            'transactions as occupied_car' => function ($query) {
                $query->whereHas('vehicleType', function ($query) {
                    $query->where('jenis', 'car');
                });
            },
            'transactions as occupied_other' => function ($query) {
                $query->whereHas('vehicleType', function ($query) {
                    $query->where('jenis', 'other');
                });
            },
        ])->get();

        $vehicleTypes = vehicle_types::all();
        $transactions = transactions::with(['location', 'vehicleType'])->orderByDesc('created_at')->get();

        return view('transactions.index', compact('transactions', 'locations', 'vehicleTypes'));
    }

    public function create()
    {
        return redirect()->route('transactions.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_lokasi' => 'required|exists:locations,id',
            'no_tiket' => 'required|string|max:255',
            'no_polisi' => 'required|string|max:15',
            'id_jenis' => 'required|exists:vehicle_types,id',
            'masuk' => 'required|date',
            'keluar' => 'required|date|after:masuk',
        ]);

        [$masuk, $keluar, $totalHours, $vehicleType, $totalBayar] = $this->buildTransactionPayload($request);

        transactions::create([
            'id_lokasi' => $request->input('id_lokasi'),
            'no_tiket' => $request->input('no_tiket'),
            'no_polisi' => $request->input('no_polisi'),
            'id_jenis' => $request->input('id_jenis'),
            'masuk' => $masuk,
            'keluar' => $keluar,
            'perjam_pertama' => $vehicleType->perjam_pertama,
            'perjam_berikutnya' => $vehicleType->perjam_berikutnya,
            'max_perhari' => $vehicleType->max_perhari,
            'total_jam' => $totalHours,
            'total_bayar' => $totalBayar,
        ]);

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction saved successfully. Total bayar: Rp ' . number_format($totalBayar, 0, ',', '.'));
    }

    public function edit(transactions $transaction)
    {
        $locations = location::all();
        $vehicleTypes = vehicle_types::all();

        return view('transactions.edit', compact('transaction', 'locations', 'vehicleTypes'));
    }

    public function update(Request $request, transactions $transaction)
    {
        $request->validate([
            'id_lokasi' => 'required|exists:locations,id',
            'no_tiket' => 'required|string|max:255',
            'no_polisi' => 'required|string|max:15',
            'id_jenis' => 'required|exists:vehicle_types,id',
            'masuk' => 'required|date',
            'keluar' => 'required|date|after:masuk',
        ]);

        [$masuk, $keluar, $totalHours, $vehicleType, $totalBayar] = $this->buildTransactionPayload($request);

        $transaction->update([
            'id_lokasi' => $request->input('id_lokasi'),
            'no_tiket' => $request->input('no_tiket'),
            'no_polisi' => $request->input('no_polisi'),
            'id_jenis' => $request->input('id_jenis'),
            'masuk' => $masuk,
            'keluar' => $keluar,
            'perjam_pertama' => $vehicleType->perjam_pertama,
            'perjam_berikutnya' => $vehicleType->perjam_berikutnya,
            'max_perhari' => $vehicleType->max_perhari,
            'total_jam' => $totalHours,
            'total_bayar' => $totalBayar,
        ]);

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction updated successfully. Total bayar: Rp ' . number_format($totalBayar, 0, ',', '.'));
    }

    public function destroy(transactions $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction deleted successfully.');
    }

    private function buildTransactionPayload(Request $request): array
    {
        $masuk = Carbon::parse($request->input('masuk'));
        $keluar = Carbon::parse($request->input('keluar'));
        $minutes = max(1, $masuk->diffInMinutes($keluar));
        $totalHours = (int) ceil($minutes / 60);

        $vehicleType = vehicle_types::findOrFail($request->input('id_jenis'));
        $totalBayar = $this->calculateParkingFee(
            $totalHours,
            $vehicleType->perjam_pertama,
            $vehicleType->perjam_berikutnya,
            $vehicleType->max_perhari
        );

        return [$masuk, $keluar, $totalHours, $vehicleType, $totalBayar];
    }

    private function calculateParkingFee(int $hours, int $firstRate, int $nextRate, int $maxDaily): int
    {
        if ($hours <= 24) {
            $total = $firstRate + $nextRate * max(0, $hours - 1);
            return min($total, $maxDaily);
        }

        $days = intdiv($hours, 24);
        $dailyCharge = (int) ceil($maxDaily * 0.6);
        return $dailyCharge * max(1, $days);
    }
}
