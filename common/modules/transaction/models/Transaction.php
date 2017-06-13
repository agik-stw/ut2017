<?php
/**
 * Created by PhpStorm.
 * User: wisard17
 * Date: 6/7/2017
 * Time: 1:02 PM
 */

namespace common\modules\transaction\models;


class Transaction extends TblTransaction
{

    public function getCriticalItem($sample_dt1, $sample_dt2)
    {
        $out = [];
        /** @var self[] $data */
        $data = self::find()
            ->select('tbl_transaction.UNIT_NO,
tbl_transaction.ADD_MET,
tbl_transaction.MODEL,
tbl_transaction.COMPONENT,
tbl_transaction.Lab_No,
tbl_transaction.SAMPL_DT1,
tbl_transaction.EVAL_CODE,
tbl_transaction.HRS_KM_OC,
tbl_transaction.VISC_CST,
tbl_transaction.T_B_N,
tbl_transaction.DILUTION,
tbl_transaction.SODIUM,
tbl_transaction.IRON,
tbl_transaction.COPPER,
tbl_transaction.PQIndex,
tbl_transaction.WATER,
tbl_transaction.DIR_TRANS')
            ->distinct()
            ->innerJoin("(select ComponentID, GROUP_CONCAT(Lab_No order by SAMPL_DT1 DESC) grouped_componen 
from tbl_transaction 
where SAMPL_DT1 <= '$sample_dt2' 
and UNIT_NO in (select distinct UNIT_NO from tbl_transaction where SAMPL_DT1 between '$sample_dt1' and '$sample_dt2')
group by ComponentID) as unt", 'tbl_transaction.ComponentID = unt.ComponentID AND FIND_IN_SET(Lab_No, grouped_componen) BETWEEN 1 AND 6')
//            ->where(" SAMPL_DT1>='$sample_dt1' and SAMPL_DT1<='$sample_dt2' and ComponentID >0 and COMPONENT <> ''")
            ->orderBy('unit_id, COMPONENT, SAMPL_DT1 DESC')
            ->all();
//print_r($data);die;
        // UNIT_NO,ADD_MET,MODEL,COMPONENT,Lab_No,SAMPL_DT1,EVAL_CODE,HRS_KM_OC,VISC_CST as VISC,T_B_N as TBN,DILUTION as FUEL_DILUTION,SODIUM as Na,IRON as Fe,COPPER as Cu,PQIndex as PQ_Index,WATER,DIR_TRANS as Soot
        foreach ($data as $datum) {
            if ($datum->COMPONENT != '' && $datum->UNIT_NO != '') {
                $count = isset($out[$datum->UNIT_NO][$datum->ADD_MET][$datum->MODEL][$datum->COMPONENT]['count']) ?
                    $out[$datum->UNIT_NO][$datum->ADD_MET][$datum->MODEL][$datum->COMPONENT]['count'] : 1;

                $out[$datum->UNIT_NO][$datum->ADD_MET][$datum->MODEL][$datum->COMPONENT][$count] = [
                    'Lab_No' => $datum->Lab_No,
                    'SAMPL_DT1' => $datum->SAMPL_DT1,
                    'EVAL_CODE' => $datum->EVAL_CODE,
                    'HRS_KM_OC' => $datum->HRS_KM_OC,
                    'VISC' => $datum->VISC_CST,
                    'TBN' => $datum->T_B_N,
                    'FUEL_DILUTION' => $datum->DILUTION,
                    'Na' => $datum->SODIUM,
                    'Fe' => $datum->IRON,
                    'Cu' => $datum->COPPER,
                    'PQ_Index' => $datum->PQIndex,
                    'WATER' => $datum->WATER,
                    'Soot' => $datum->DIR_TRANS,
                ];

                $out[$datum->UNIT_NO][$datum->ADD_MET][$datum->MODEL][$datum->COMPONENT]['count'] = $count + 1;
            }
        }

        return $out;
    }
}