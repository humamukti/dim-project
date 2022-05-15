<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManajerController extends Controller
{
    public function eoq()
    {
        $eoq = DB::table('products')
            ->select(
                'nama_barang',
                'harga_barang',
                'konversi',
                DB::raw('SUM(purchases.pakai) as D'),
                DB::raw('SUM(purchases.jumlah_pesanan) as pesan'),
                DB::raw('biaya_penyimpanan as H'),
                DB::raw('ROUND(AVG(harga_barang * purchases.jumlah_pesanan),2) AS C'),
                DB::raw('ROUND(AVG(purchases.jumlah_pesanan),3) AS R'),
                DB::raw('ROUND(SQRT((2 * (AVG(harga_barang * purchases.jumlah_pesanan)) * SUM(purchases.pakai)) / AVG(biaya_penyimpanan)),3) AS EOQ'),
                DB::raw('(SUM(purchases.jumlah_pesanan) * konversi) AS kuantitas'),
                DB::raw('ROUND((Sum(purchases.pakai)) / SQRT((2 * (AVG(harga_barang * purchases.jumlah_pesanan)) * SUM(purchases.pakai)) / AVG(biaya_penyimpanan)),3) AS pembelian_optimum'),
                DB::raw('ROUND((360 / ((Sum(purchases.pakai)) / SQRT((2 * (AVG(harga_barang * purchases.jumlah_pesanan)) * SUM(purchases.pakai)) / AVG(biaya_penyimpanan)))),3) AS daur_pembelian')
            )
            ->join('purchases', 'purchases.product_id', 'products.id')
            ->groupBy('nama_barang')
            ->get();
		return view('manajer.eoq',compact('eoq'));
    }

    public function rop()
    {
        $rop = DB::table('products')
            ->select(
                'nama_barang',
                'harga_barang',
                'satuan',
                'konversi',
                'purchases.lead_time',
                DB::raw('Sum(purchases.jumlah_pesanan) AS pesanan_total,
						(
                            konversi * Sum(purchases.jumlah_pesanan)
                        ) AS total_barang'),
                DB::raw('(
                            (
                                (5 / 100) * (SUM(purchases.pakai))
                            ) + (SUM(purchases.pakai))
                        ) AS X'),

                DB::raw('SUM(purchases.pakai) AS Y,
						(
                            (
                                (
                                    (5 / 100) * (SUM(purchases.pakai))
                                ) + (SUM(purchases.pakai))
                            ) - (SUM(purchases.pakai))
                        ) AS "X-Y"'),
                DB::raw('POW(
                            (
                                (
                                    (
                                        (5 / 100) * (SUM(purchases.pakai))
                                    ) + (SUM(purchases.pakai))
                                ) - (SUM(purchases.pakai))
                            ),
                            2
                        ) AS "X-Y^2"'),
                DB::raw('ROUND(
                            SQRT(
                                POW(
                                    (
                                        (
                                            (
                                                (5 / 100) * (SUM(purchases.pakai))
                                            ) + (SUM(purchases.pakai))
                                        ) - (SUM(purchases.pakai))
                                    ),
                                    2
                                ) / 12
                            ),
                            3
                        ) AS sigma'),
                DB::raw('ROUND(
                            (
                                1.65 * (
                                SQRT(
                                    POW(
                                        (
                                            (
                                                (
                                                    (5 / 100) * (SUM(purchases.pakai))
                                                ) + (SUM(purchases.pakai))
                                            ) - (SUM(purchases.pakai))
                                        ),
                                        2
                                    ) / 12
                                )
                                )
                            ),
                            3
                        ) AS safety_stock'),
                DB::raw('ROUND(
                            (
                                AVG(purchases.lead_time) * (SUM(purchases.pakai) / 360)
                            ),
                            3
                        ) AS LQ'),
                DB::raw('ROUND(
                            (
                                (
                                    1.65 * (
                                    SQRT(
                                        POW(
                                            (
                                                (
                                                    (
                                                        (5 / 100) * (SUM(purchases.pakai))
                                                    ) + (SUM(purchases.pakai))
                                                ) - (SUM(purchases.pakai))
                                            ),
                                            2
                                        ) / 12
                                    )
                                    )
                                ) + (
                                    AVG(purchases.lead_time) * (SUM(purchases.pakai) / 360)
                                )
                            ),
                            3
                        ) AS ROP')
            )
            ->join('purchases', 'purchases.product_id', 'products.id')
            ->groupBy('nama_barang')
            ->get();
        return view('manajer.rop',compact('rop'));

    }
}
