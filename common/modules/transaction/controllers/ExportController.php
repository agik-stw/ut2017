<?php
/**
 * Created by
 * User: wisard17
 * Date: 6/7/2017
 * Time: 11:41 AM
 */

namespace common\modules\transaction\controllers;

use common\modules\transaction\models\Transaction;
use spec\Prophecy\Argument\Token\IdenticalValueTokenSpec;
use yii\web\Controller;
use common\modules\transaction\models\ExcelLib;

/**
 * Class ExportController
 * @package common\modules\transaction\controllers
 */
class ExportController extends Controller
{
    public function actionCriticalItem()
    {
        $sample_dt1 = '2017-01-01';
        $sample_dt2 = '2017-01-10';
        $data = new Transaction();

        $d = $data->getCriticalItem($sample_dt1, $sample_dt2);
//        print_r(($d));
//        die;
        $excel = new ExcelLib();
        $excel->setHeader('Critical_Item.xls');
        $excel->BOF();
        $this->row = 0;
        $j = 0;$a = 0;
        foreach ($data->getCriticalItem($sample_dt1, $sample_dt2) as $unit => $value1) {
            foreach ($value1 as $serialnum => $value2) {
                foreach ($value2 as $model => $value3) {
                    foreach ($value3 as $componen => $value4) {
                        $this->renderItem($unit, $serialnum, $model, $componen, $value4, $this->row, $j, $excel);
                    }
                }
            }
        }
        $excel->EOF();
        exit();
    }

    public $row;

    /**
     * @param $unit
     * @param $serialnum
     * @param $model
     * @param $componen
     * @param $value4
     * @param $i
     * @param $j
     * @param $excel ExcelLib
     */
    protected function renderItem($unit, $serialnum, $model, $componen, $value4, $i, $j, $excel)
    {
//        print_r($i . '<br>');
        $i_in = $i;
        $j_in = 4;
        $this->row = $i;
        if ($value4['count'] > 1) {
            for ($n = 1; $n < $value4['count']; $n++) {
                $j = $j_in + $n;
                $this->row = $i_in;
                foreach ($value4[$n] as $label => $value) {
                    if ($j == 5) {
                        $this->renderDepan($unit, $serialnum, $model, $componen, $this->row, $excel);
                        $excel->writeLabel($this->row, 4, $label);
                    }

                    $excel->writeLabel($this->row, $j, $value4[$n][$label]);
                    $this->row++;
                }
            }
        }

    }

    /**
     * @param $unit
     * @param $serialnum
     * @param $model
     * @param $componen
     * @param $i
     * @param $j
     * @param $excel ExcelLib
     */
    protected function renderDepan($unit, $serialnum, $model, $componen, $i, $excel)
    {
        $excel->writeLabel($i, 0, $unit);
        $excel->writeLabel($i, 1, $serialnum);
        $excel->writeLabel($i, 2, $model);
        $excel->writeLabel($i, 3, $componen);
    }

}