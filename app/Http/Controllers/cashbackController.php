<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\Cashback;
use App\Models\BonusView;
use App\Models\User;
use App\Models\Role;

class CashbackController extends Controller
{
    public function __construct(Cashback $cashback, Role $role, User $user, BonusView $bonus)
    {
        $this->cashbackRepo = $cashback;
        $this->bonusRepo    = $bonus;
        $this->userRepo     = $user;
        $this->roleRepo     = $role;
    }

    public function index()
    {
        $user = Auth::user();
        $cashback = $this->cashbackRepo->getAll();

        return view('backend.bonus.cashback.index')->with([
            'user' => $user,
            'cashback' => $cashback
        ]);

        return $cashback;
    }

    public function datatable()
    {
        $cashback = $this->cashbackRepo->getAll();

        return DataTables::of($cashback)
            ->editColumn('cb_pribadi', function($cashback) {
                return $this->rupiah($cashback->cb_pribadi);
            })
            ->editColumn('cb_group', function($cashback) {
                return $this->rupiah($cashback->cb_group);
            })
            ->editColumn('rabat', function($cashback) {
                return $this->rupiah($cashback->rabat);
            })
            ->editColumn('cb_total', function($cashback) {
                return $this->rupiah($cashback->cb_total);
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function rupiah($rp)
    {
        $rupiah = "";
        $p = strlen($rp);
        
		while ($p > 3) {
			$rupiah = "." . substr($rp, -3) . $rupiah;
			$l = strlen($rp) - 3;
			$rp = substr($rp, 0, $l);
			$p = strlen($rp);
        }
        
        $rupiah = $rp . $rupiah;
        
		return $rupiah;
    }

    public function hitung(Request $request)
    {
        $bulan = date('Y') . '-' . $request->bulan . '-' . date('d');

        if (!empty($bulan)) {
            $mark = 0;
            $awal = date('Y-m-01', strtotime($bulan));
            $akhir = date('Y-m-t', strtotime($awal));

            Cashback::truncate();

            // poin pribadi
            $data = $this->bonusRepo->somePoin($awal, $akhir);

            foreach ($data as $value)
            {
                $some = array(
                    'no_member' => $value->no_member,
                    'nama' => $value->nama,
                    'tanggal' => $akhir,
                    'pp' => $value->poin,
                    'kode_up' => $value->kode_up,
                    'kode_dr' => $value->kode_dr,
                );

                Cashback::insert($some);

                $member = $some['no_member'];
                $poin = $some['pp'];

                // poin tambahan dari non-reseller
                $data = $this->bonusRepo->morePoin($awal, $akhir, $member);

                foreach ($data as $value)
                {
                    $more = array('pp' => $value->poin + $poin);
                    $update = $this->cashbackRepo->editCashback($more, $member);
                }

                // status stokis
                switch ($member) {
                    case "00004": $operator = "FITROH"; $mark = 1; break;
                    case "00005": $operator = "IRA C"; $mark = 1; break;
                    case "00014": $operator = "RIZKY"; $mark = 1; break;
                    case "00042": $operator = "RISKA"; $mark = 1; break;
                    case "00307": $operator = "ETIKA"; $mark = 1; break;
                    case "00539": $operator = "DIAN"; $mark = 1; break;
                    case "00553": $operator = "HAMIDAH"; $mark = 1; break;
                    case "00985": $operator = "SITI K"; $mark = 1; break;
                    case "01340": $operator = "HABIBAH"; $mark = 1; break;
                    case "01835": $operator = "NIA"; $mark = 1; break;
                    case "13722": $operator = "NEMAH"; $mark = 1; break;

                    default: $mark = 0; break;
                }

                // poin rabat
                if ($mark == 1) {
                    $data = $this->bonusRepo->getRabat($awal, $akhir, $operator);

                    foreach ($data as $value)
                    {
                        $rabat = array('pr' => $value->poin);
                        $update = $this->cashbackRepo->editCashback($rabat, $member);
                    }
                }
            }

            // poin group
            $data = $this->cashbackRepo->callGroup($akhir);

            foreach ($data as $value)
            {
                $cashback = array(
                    'no_member' => $value->no_member,
                    'pp' => $value->pp,
                );

                $member = $cashback['no_member'];
                $poin = $cashback['pp'];
                
                $data = $this->cashbackRepo->getGroup($akhir, $member);

                foreach ($data as $value)
                {
                    $group = array('pgp' => $value->poin + $poin);
                    $update = $this->cashbackRepo->editCashback($group, $member);
                }
            }

            // poin level
            $data = $this->cashbackRepo->callLevel($akhir);

            foreach ($data as $value)
            {
                $cashback = array(
                    'no_member' => $value->no_member,
                    'pgp' => $value->pgp,
                );

                $member = $cashback['no_member'];
                
                $data = $this->cashbackRepo->getLevel($akhir, $member);

                foreach ($data as $value)
                {
                    $level = array('pgl' => $value->poin);
                    $update = $this->cashbackRepo->editCashback($level, $member);
                }
            }

            // sponsor
            $data = $this->bonusRepo->getSponsor($awal, $akhir);

            foreach ($data as $value)
            {
                $sponsor = array(
                    'no_member' => $value->kode_up,
                    'sponsor' => $value->jumlah * 90000,
                );

                $member = $sponsor['no_member'];
                
                $update = $this->cashbackRepo->editCashback($sponsor, $member);
            }

            // title reseller
            $data = $this->cashbackRepo->callTitle($akhir);

            foreach ($data as $value)
            {
                $cashback = array(
                    'no_member' => $value->no_member,
                    'pp' => $value->pp,
                    'pgp' => $value->pgp,
                    'pgl' => $value->pgl,
                );

                $member = $cashback['no_member'];
                $poin = $cashback['pp'];
                $group = $cashback['pgp'];
                $level = $cashback['pgl'];

                $title = "RES";

                if ($poin < 147) {
                    $title = "EM3";
                } else {
                    if ($level >= 33333) {
                        if ($group >= 3333) {
                            $title = "DR3";
                        } else {
                            $title = "DR2";
                        }
                    }

                    if ($level < 33333) {
                        if ($group >= 3000) {
                            $title = "DR2";
                        } else {
                            $title = "DR1";
                        }
                    }

                    if ($level < 30000) {
                        if ($group >= 2667) {
                            $title = "DR1";
                        } else {
                            $title = "EM3";
                        }
                    }
                }

                if ($poin < 120) {
                    $title = "SM3";
                } else {
                    if ($level < 26667) {
                        if ($group >= 2333) {
                            $title = "EM3";
                        } else {
                            $title = "EM2";
                        }
                    }

                    if ($level < 23333) {
                        if ($group >= 2000) {
                            $title = "EM2";
                        } else {
                            $title = "EM1";
                        }
                    }

                    if ($level < 20000) {
                        if ($group >= 1667) {
                            $title = "EM1";
                        } else {
                            $title = "SM3";
                        }
                    }
                }

                if ($poin < 93) {
                    $title = "LD3";
                } else {
                    if ($level < 16667) {
                        if ($group >= 1333) {
                            $title = "SM3";
                        } else {
                            $title = "SM2";
                        }
                    }

                    if ($level < 13333) {
                        if ($group >= 1000) {
                            $title = "SM2";
                        } else {
                            $title = "SM1";
                        }
                    }

                    if ($level < 10000) {
                        if ($group >= 667) {
                            $title = "SM1";
                        } else {
                            $title = "MAN";
                        }
                    }

                    if ($level < 6667) {
                        if ($group >= 320) {
                            $title = "MAN";
                        } else {
                            $title = "LD3";
                        }
                    }
                }

                if ($poin < 45) {
                    $title = "RES";
                } else {
                    if ($level < 3200) {
                        if ($group >= 240) {
                            $title = "LD3";
                        } else {
                            $title = "LD2";
                        }
                    }

                    if ($level < 2400) {
                        if ($group >= 160) {
                            $title = "LD2";
                        } else {
                            $title = "LD1";
                        }
                    }

                    if ($level < 1600) {
                        if ($group >= 80) {
                            $title = "LD1";
                        } else {
                            $title = "RES";
                        }
                    }
                }

                if ($level < 800) {
                    $title = "RES";
                }

                $reach = array(
                    'no_member' => $member,
                    'title' => $title,
                );

                $update = $this->cashbackRepo->editCashback($reach, $member);
            }

            // hitung bonus
            $data = $this->cashbackRepo->getAll();

            foreach ($data as $value)
            {
                $hitung = array(
                    'no_member' => $value->no_member,
                    'pp' => $value->pp,
                    'pgp' => $value->pgp,
                    'pgl' => $value->pgl,
                    'pr' => $value->pr,
                    'title' => $value->title,
                    'sponsor' => $value->sponsor,
                );

                $member = $hitung['no_member'];
                $bonusSponsor = $hitung['sponsor'];

                $bonusPribadi = ceil($hitung['pp'] * 0.04) * 7500;

                switch ($value['title']) {
                    case "RES": $persen = 0.04; $prs = 4; break;
                    case "LD1": $persen = 0.05; $prs = 5; break;
                    case "LD2": $persen = 0.06; $prs = 6; break;
                    case "LD3": $persen = 0.07; $prs = 7; break;
                    case "MAN": $persen = 0.08; $prs = 8; break;
                    
                    case "SM1": $persen = 0.09; $prs = 9; break;
                    case "SM2": $persen = 0.09; $prs = 9; break;
                    case "SM3": $persen = 0.09; $prs = 9; break;

                    case "EM1": $persen = 0.10; $prs = 10; break;
                    case "EM2": $persen = 0.10; $prs = 10; break;
                    case "EM3": $persen = 0.10; $prs = 10; break;

                    case "DR1": $persen = 0.11; $prs = 11; break;
                    case "DR2": $persen = 0.12; $prs = 12; break;
                    case "DR3": $persen = 0.12; $prs = 12; break;
                }

                $bonusGroup = ceil($hitung['pgl'] * $persen) * 7500;

                if ($value['pr'] > 0) {
                    $bonusRabat = ceil($hitung['pr'] * 0.025) * 7500;
                } else {
                    $bonusRabat = 0;
                }

                $total = $bonusPribadi + $bonusGroup + $bonusRabat + $bonusSponsor;

                $subtotal = array(
                    'no_member' => $member,
                    'prs' => $prs,
                    'cb_pribadi' => $bonusPribadi,
                    'cb_group' => $bonusGroup,
                    'rabat' => $bonusRabat,
                    'sponsor' => $bonusSponsor,
                    'cb_total' => $total,
                );

                $update = $this->cashbackRepo->editCashback($subtotal, $member);
            }

            $done = 1;
        } else {
            $done = 0;

            return false;
        }

        if (isset($done) && $done == 1)
        {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Hitung bonus berhasil</strong>')->success()->important();
            return redirect()->route('admin.cashback.index');
        } else {
            flash('<i class="fa fa-info"></i>&nbsp; <strong>Hitung bonus gagal</strong>')->error()->important();
            return redirect()->route('admin.cashback.index');
        }
    }

    public function getPenjualan()
    {
        // wait
    }
}
